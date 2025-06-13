<?php
/**
 * Contact Form Handler
 * Bastion Hosting - A 17 Solutions LLC Company
 * 
 * Handles contact form submissions
 */

require_once 'config.php';

header('Content-Type: application/json');

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit();
}

try {
    // Rate limiting check
    $client_ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
    if (!check_rate_limit($client_ip, 5, 3600)) { // 5 submissions per hour
        http_response_code(429);
        echo json_encode(['error' => 'Too many requests. Please try again later.']);
        exit();
    }
    
    // Validate CSRF token if present
    if (isset($_POST['csrf_token'])) {
        if (!verify_csrf_token($_POST['csrf_token'])) {
            http_response_code(400);
            echo json_encode(['error' => 'Invalid security token']);
            exit();
        }
    }
    
    // Validate required fields
    $required_fields = ['name', 'email', 'subject', 'message'];
    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            http_response_code(400);
            echo json_encode(['error' => "Field '{$field}' is required"]);
            exit();
        }
    }
    
    // Sanitize and validate input
    $name = sanitize_input($_POST['name']);
    $email = sanitize_input($_POST['email']);
    $department = sanitize_input($_POST['department'] ?? 'general-support');
    $subject = sanitize_input($_POST['subject']);
    $message = sanitize_input($_POST['message']);
    
    // Validate email
    if (!is_valid_email($email)) {
        http_response_code(400);
        echo json_encode(['error' => 'Invalid email address']);
        exit();
    }
    
    // Additional validation
    if (strlen($name) < 2 || strlen($name) > 100) {
        http_response_code(400);
        echo json_encode(['error' => 'Name must be between 2 and 100 characters']);
        exit();
    }
    
    if (strlen($subject) < 5 || strlen($subject) > 200) {
        http_response_code(400);
        echo json_encode(['error' => 'Subject must be between 5 and 200 characters']);
        exit();
    }
    
    if (strlen($message) < 10 || strlen($message) > 5000) {
        http_response_code(400);
        echo json_encode(['error' => 'Message must be between 10 and 5000 characters']);
        exit();
    }
    
    // Simple spam detection
    $spam_keywords = ['viagra', 'casino', 'lottery', 'winner', 'congratulations', 'click here'];
    $message_lower = strtolower($message);
    foreach ($spam_keywords as $keyword) {
        if (strpos($message_lower, $keyword) !== false) {
            // Log potential spam but don't notify the user
            log_error('Potential spam detected', [
                'email' => $email,
                'keyword' => $keyword,
                'ip' => $client_ip
            ]);
            // Return success to prevent spam bots from detecting filtering
            echo json_encode(['success' => true, 'message' => 'Thank you for your message!']);
            exit();
        }
    }
    
    // Store in database
    $db = Database::getInstance();
    $sql = "INSERT INTO contact_submissions (name, email, department, subject, message, ip_address, user_agent, created_at) 
            VALUES (?, ?, ?, ?, ?, ?, ?, NOW())";
    
    $params = [
        $name,
        $email,
        $department,
        $subject,
        $message,
        $client_ip,
        $_SERVER['HTTP_USER_AGENT'] ?? ''
    ];
    
    $result = $db->query($sql, $params);
    
    if (!$result) {
        throw new Exception('Failed to store contact submission');
    }
    
    $submission_id = $db->lastInsertId();
    
    // Send email notification (if configured)
    if (!empty(SMTP_HOST) && !empty(SMTP_USER)) {
        send_contact_notification($name, $email, $department, $subject, $message, $submission_id);
    }
    
    // Log successful submission
    log_error('Contact form submitted successfully', [
        'submission_id' => $submission_id,
        'email' => $email,
        'department' => $department
    ]);
    
    // Return success response
    echo json_encode([
        'success' => true, 
        'message' => 'Thank you for your message! We\'ll get back to you within 2 hours.',
        'submission_id' => $submission_id
    ]);
    
} catch (Exception $e) {
    log_error('Contact form error: ' . $e->getMessage());
    
    http_response_code(500);
    echo json_encode(['error' => 'Sorry, there was an error processing your request. Please try again.']);
}

/**
 * Send email notification for contact form submission
 */
function send_contact_notification($name, $email, $department, $subject, $message, $submission_id) {
    try {
        // Determine recipient based on department
        $recipients = [
            'general-support' => 'support@bastionhosting.com',
            'sales' => 'sales@bastionhosting.com',
            'billing' => 'billing@bastionhosting.com',
            'technical' => 'tech@bastionhosting.com',
            'abuse' => 'abuse@bastionhosting.com'
        ];
        
        $to_email = $recipients[$department] ?? $recipients['general-support'];
        
        // Email headers
        $headers = [
            'From: ' . SITE_NAME . ' <' . SITE_EMAIL . '>',
            'Reply-To: ' . $email,
            'X-Mailer: PHP/' . phpversion(),
            'Content-Type: text/html; charset=UTF-8',
            'X-Submission-ID: ' . $submission_id
        ];
        
        // Email subject
        $email_subject = '[' . SITE_NAME . '] New Contact Form Submission: ' . $subject;
        
        // Email body
        $email_body = "
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                .header { background: #0066ff; color: white; padding: 20px; text-align: center; }
                .content { padding: 20px; }
                .field { margin-bottom: 15px; }
                .label { font-weight: bold; color: #0066ff; }
                .footer { background: #f5f5f5; padding: 15px; font-size: 12px; color: #666; }
            </style>
        </head>
        <body>
            <div class='header'>
                <h2>" . SITE_NAME . " - New Contact Form Submission</h2>
            </div>
            <div class='content'>
                <div class='field'>
                    <span class='label'>Submission ID:</span> #" . $submission_id . "
                </div>
                <div class='field'>
                    <span class='label'>Name:</span> " . htmlspecialchars($name) . "
                </div>
                <div class='field'>
                    <span class='label'>Email:</span> " . htmlspecialchars($email) . "
                </div>
                <div class='field'>
                    <span class='label'>Department:</span> " . ucwords(str_replace('-', ' ', $department)) . "
                </div>
                <div class='field'>
                    <span class='label'>Subject:</span> " . htmlspecialchars($subject) . "
                </div>
                <div class='field'>
                    <span class='label'>Message:</span><br>
                    " . nl2br(htmlspecialchars($message)) . "
                </div>
            </div>
            <div class='footer'>
                <p>This message was sent from the " . SITE_NAME . " contact form.</p>
                <p>Submitted: " . date('Y-m-d H:i:s T') . "</p>
            </div>
        </body>
        </html>";
        
        // Send email
        $success = mail($to_email, $email_subject, $email_body, implode("\r\n", $headers));
        
        if (!$success) {
            throw new Exception('Failed to send email notification');
        }
        
        // Send auto-reply to customer
        send_auto_reply($email, $name, $subject, $submission_id);
        
    } catch (Exception $e) {
        log_error('Failed to send contact notification: ' . $e->getMessage());
        // Don't throw - we don't want to fail the form submission just because email failed
    }
}

/**
 * Send auto-reply to customer
 */
function send_auto_reply($customer_email, $customer_name, $subject, $submission_id) {
    try {
        $headers = [
            'From: ' . SITE_NAME . ' Support <' . SITE_EMAIL . '>',
            'X-Mailer: PHP/' . phpversion(),
            'Content-Type: text/html; charset=UTF-8',
            'X-Auto-Response: yes'
        ];
        
        $reply_subject = 'Re: ' . $subject . ' [#' . $submission_id . ']';
        
        $reply_body = "
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                .header { background: #0066ff; color: white; padding: 20px; text-align: center; }
                .content { padding: 20px; }
                .footer { background: #f5f5f5; padding: 15px; font-size: 12px; color: #666; }
                .cta { background: #0066ff; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; display: inline-block; margin: 10px 0; }
            </style>
        </head>
        <body>
            <div class='header'>
                <h2>Thank you for contacting " . SITE_NAME . "!</h2>
            </div>
            <div class='content'>
                <p>Hi " . htmlspecialchars($customer_name) . ",</p>
                
                <p>Thank you for reaching out to us. We've received your message and will get back to you within 2 hours during business hours.</p>
                
                <p><strong>Your submission details:</strong></p>
                <ul>
                    <li>Ticket ID: #" . $submission_id . "</li>
                    <li>Subject: " . htmlspecialchars($subject) . "</li>
                    <li>Submitted: " . date('Y-m-d H:i:s T') . "</li>
                </ul>
                
                <p>If you need immediate assistance, you can:</p>
                <ul>
                    <li>Call us at <strong>1-800-BASTION</strong> for 24/7 technical support</li>
                    <li>Check our <a href='" . SITE_URL . "/status'>system status page</a> for known issues</li>
                    <li>Browse our <a href='" . SITE_URL . "/support'>help center</a> for common solutions</li>
                </ul>
                
                <p>Thank you for choosing " . SITE_NAME . "!</p>
                
                <p>Best regards,<br>
                The " . SITE_NAME . " Support Team</p>
            </div>
            <div class='footer'>
                <p>This is an automated response. Please do not reply to this email.</p>
                <p>" . SITE_NAME . " - A " . COMPANY_NAME . " Company</p>
            </div>
        </body>
        </html>";
        
        mail($customer_email, $reply_subject, $reply_body, implode("\r\n", $headers));
        
    } catch (Exception $e) {
        log_error('Failed to send auto-reply: ' . $e->getMessage());
    }
}
