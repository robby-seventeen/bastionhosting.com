<?php
// Contact Page
// Bastion Hosting - A 17 Solutions LLC Company

header("X-Content-Type-Options: nosniff");
header("X-Frame-Options: DENY");
header("X-XSS-Protection: 1; mode=block");
header("Referrer-Policy: strict-origin-when-cross-origin");

$contact_methods = [
    [
        'icon' => '<path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>',
        'title' => 'Phone Support',
        'description' => 'Talk to a real human, based in the US',
        'contact' => '1-800-BASTION',
        'hours' => '24/7 Technical Support'
    ],
    [
        'icon' => '<path d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>',
        'title' => 'Email Support',
        'description' => 'Get detailed help via email',
        'contact' => 'support@bastionhosting.com',
        'hours' => '< 2 hour response time'
    ],
    [
        'icon' => '<path d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>',
        'title' => 'Live Chat',
        'description' => 'Instant help when you need it',
        'contact' => 'Available on all pages',
        'hours' => 'Mon-Fri 9AM-6PM EST'
    ]
];

$departments = [
    'General Support' => 'For hosting questions and technical issues',
    'Sales' => 'New accounts and plan upgrades',
    'Billing' => 'Invoices, payments, and account questions',
    'Technical' => 'Server issues and advanced configurations',
    'Abuse' => 'Report spam, malware, or policy violations'
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Get Real Human Support | Bastion Hosting</title>
    <meta name="description" content="Get help from real humans, not bots. 24/7 phone support, live chat, and expert technical assistance.">
    
    <link rel="icon" type="image/svg+xml" href="/assets/images/favicon.svg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="/assets/css/styles.css">
    <link rel="stylesheet" href="/assets/css/components.css">
</head>
<body>
    <?php include 'includes/navigation.php'; ?>

    <!-- Hero Section -->
    <section class="hero" style="min-height: 60vh;">
        <div class="hero-container">
            <h1 class="animate-fade-in-up">
                Get Help From <span class="hero-gradient">Real Humans</span>
            </h1>
            <p class="animate-fade-in-up">
                No chatbots, no offshore call centers. When you need support, 
                you get an expert who actually knows hosting.
            </p>
        </div>
    </section>

    <!-- Contact Methods -->
    <section class="features">
        <div class="features-container">
            <div class="section-header">
                <h2>How to Reach Us</h2>
                <p>Choose the method that works best for you.</p>
            </div>
            <div class="features-grid">
                <?php foreach ($contact_methods as $method): ?>
                    <div class="feature-card" data-animate="scroll">
                        <div class="feature-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2">
                                <?= $method['icon'] ?>
                            </svg>
                        </div>
                        <h3><?= htmlspecialchars($method['title']) ?></h3>
                        <p><?= htmlspecialchars($method['description']) ?></p>
                        <div style="margin-top: var(--space-md); padding-top: var(--space-md); border-top: 1px solid var(--border);">
                            <p style="color: var(--primary); font-weight: 600; margin-bottom: var(--space-xs);">
                                <?= htmlspecialchars($method['contact']) ?>
                            </p>
                            <p style="color: var(--text-muted); font-size: var(--font-size-sm);">
                                <?= htmlspecialchars($method['hours']) ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Contact Form -->
    <section class="section" style="background: var(--bg-secondary);">
        <div class="container">
            <div class="section-header">
                <h2>Send Us a Message</h2>
                <p>Fill out the form below and we'll get back to you within 2 hours.</p>
            </div>
            
            <div style="max-width: 800px; margin: 0 auto;">
                <form class="contact-form" data-form="contact" method="post" action="/contact-submit">
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: var(--space-lg); margin-bottom: var(--space-lg);">
                        <div class="form-group">
                            <label for="name" style="display: block; margin-bottom: var(--space-sm); color: var(--text-primary); font-weight: 500;">
                                Full Name *
                            </label>
                            <input type="text" 
                                   id="name" 
                                   name="name" 
                                   required
                                   style="
                                       width: 100%;
                                       padding: var(--space-md);
                                       background: var(--bg-tertiary);
                                       border: 1px solid var(--border);
                                       border-radius: var(--radius-md);
                                       color: var(--text-primary);
                                       font-size: var(--font-size-base);
                                       transition: border-color var(--transition-base);
                                   ">
                        </div>
                        
                        <div class="form-group">
                            <label for="email" style="display: block; margin-bottom: var(--space-sm); color: var(--text-primary); font-weight: 500;">
                                Email Address *
                            </label>
                            <input type="email" 
                                   id="email" 
                                   name="email" 
                                   required
                                   style="
                                       width: 100%;
                                       padding: var(--space-md);
                                       background: var(--bg-tertiary);
                                       border: 1px solid var(--border);
                                       border-radius: var(--radius-md);
                                       color: var(--text-primary);
                                       font-size: var(--font-size-base);
                                       transition: border-color var(--transition-base);
                                   ">
                        </div>
                    </div>
                    
                    <div class="form-group" style="margin-bottom: var(--space-lg);">
                        <label for="department" style="display: block; margin-bottom: var(--space-sm); color: var(--text-primary); font-weight: 500;">
                            Department
                        </label>
                        <select id="department" 
                                name="department"
                                style="
                                    width: 100%;
                                    padding: var(--space-md);
                                    background: var(--bg-tertiary);
                                    border: 1px solid var(--border);
                                    border-radius: var(--radius-md);
                                    color: var(--text-primary);
                                    font-size: var(--font-size-base);
                                    transition: border-color var(--transition-base);
                                ">
                            <?php foreach ($departments as $dept => $description): ?>
                                <option value="<?= htmlspecialchars(strtolower(str_replace(' ', '-', $dept))) ?>">
                                    <?= htmlspecialchars($dept) ?> - <?= htmlspecialchars($description) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="form-group" style="margin-bottom: var(--space-lg);">
                        <label for="subject" style="display: block; margin-bottom: var(--space-sm); color: var(--text-primary); font-weight: 500;">
                            Subject *
                        </label>
                        <input type="text" 
                               id="subject" 
                               name="subject" 
                               required
                               style="
                                   width: 100%;
                                   padding: var(--space-md);
                                   background: var(--bg-tertiary);
                                   border: 1px solid var(--border);
                                   border-radius: var(--radius-md);
                                   color: var(--text-primary);
                                   font-size: var(--font-size-base);
                                   transition: border-color var(--transition-base);
                               ">
                    </div>
                    
                    <div class="form-group" style="margin-bottom: var(--space-xl);">
                        <label for="message" style="display: block; margin-bottom: var(--space-sm); color: var(--text-primary); font-weight: 500;">
                            Message *
                        </label>
                        <textarea id="message" 
                                  name="message" 
                                  required
                                  rows="8"
                                  placeholder="Tell us how we can help..."
                                  style="
                                      width: 100%;
                                      padding: var(--space-md);
                                      background: var(--bg-tertiary);
                                      border: 1px solid var(--border);
                                      border-radius: var(--radius-md);
                                      color: var(--text-primary);
                                      font-size: var(--font-size-base);
                                      font-family: inherit;
                                      resize: vertical;
                                      transition: border-color var(--transition-base);
                                  "></textarea>
                    </div>
                    
                    <div style="text-align: center;">
                        <button type="submit" class="cta-button" style="min-width: 200px;">
                            Send Message
                        </button>
                        <p style="margin-top: var(--space-md); color: var(--text-secondary); font-size: var(--font-size-sm);">
                            We typically respond within 2 hours during business hours.
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="section">
        <div class="container">
            <div class="section-header">
                <h2>Frequently Asked Questions</h2>
                <p>Quick answers to common questions.</p>
            </div>
            
            <div style="max-width: 800px; margin: 0 auto;">
                <div class="faq-grid" style="display: grid; gap: var(--space-lg);">
                    <div class="faq-item" style="
                        background: var(--bg-secondary);
                        border: 1px solid var(--border);
                        border-radius: var(--radius-lg);
                        padding: var(--space-xl);
                    ">
                        <h3 style="color: var(--text-primary); margin-bottom: var(--space-md);">
                            How quickly do you respond to support requests?
                        </h3>
                        <p>We aim to respond to all support requests within 2 hours during business hours, and within 4 hours outside business hours. Emergency issues are handled immediately.</p>
                    </div>
                    
                    <div class="faq-item" style="
                        background: var(--bg-secondary);
                        border: 1px solid var(--border);
                        border-radius: var(--radius-lg);
                        padding: var(--space-xl);
                    ">
                        <h3 style="color: var(--text-primary); margin-bottom: var(--space-md);">
                            Do you offer phone support?
                        </h3>
                        <p>Yes! We offer 24/7 phone support for technical issues. Our support team is based in the US and consists of actual hosting experts, not scripted call center agents.</p>
                    </div>
                    
                    <div class="faq-item" style="
                        background: var(--bg-secondary);
                        border: 1px solid var(--border);
                        border-radius: var(--radius-lg);
                        padding: var(--space-xl);
                    ">
                        <h3 style="color: var(--text-primary); margin-bottom: var(--space-md);">
                            Can you help with website migrations?
                        </h3>
                        <p>Absolutely! We offer free website migrations for all new customers. Our team will handle the entire process to ensure zero downtime during the transfer.</p>
                    </div>
                    
                    <div class="faq-item" style="
                        background: var(--bg-secondary);
                        border: 1px solid var(--border);
                        border-radius: var(--radius-lg);
                        padding: var(--space-xl);
                    ">
                        <h3 style="color: var(--text-primary); margin-bottom: var(--space-md);">
                            What if I'm not satisfied with the service?
                        </h3>
                        <p>We offer a 30-day money-back guarantee, no questions asked. If you're not completely satisfied, we'll refund your money and help you migrate to another provider if needed.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>

    <script src="/assets/js/main.js"></script>
    <script src="/assets/js/components.js"></script>

    <style>
    .contact-form input:focus,
    .contact-form textarea:focus,
    .contact-form select:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(0, 102, 255, 0.1);
    }
    
    .contact-form input.invalid,
    .contact-form textarea.invalid {
        border-color: #ff4444;
    }
    
    .contact-form input::placeholder,
    .contact-form textarea::placeholder {
        color: var(--text-muted);
    }
    
    .faq-item:hover {
        border-color: var(--primary);
        transform: translateY(-2px);
        transition: all var(--transition-base);
    }
    </style>
</body>
</html>
