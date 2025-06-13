<?php
/**
 * Bastion Hosting Configuration
 * A 17 Solutions LLC Company
 * 
 * Main configuration file for the website
 */

// Prevent direct access
if (!defined('BASTION_INIT')) {
    define('BASTION_INIT', true);
}

// Environment Configuration
define('ENVIRONMENT', $_ENV['APP_ENV'] ?? 'production'); // development, staging, production
define('DEBUG_MODE', ENVIRONMENT === 'development');

// Site Configuration
define('SITE_NAME', 'Bastion Hosting');
define('SITE_URL', $_ENV['SITE_URL'] ?? 'https://bastionhosting.com');
define('SITE_EMAIL', 'support@bastionhosting.com');
define('COMPANY_NAME', '17 Solutions LLC');

// Database Configuration
define('DB_HOST', $_ENV['DB_HOST'] ?? 'localhost');
define('DB_NAME', $_ENV['DB_NAME'] ?? 'bastion_hosting');
define('DB_USER', $_ENV['DB_USER'] ?? 'bastion_user');
define('DB_PASS', $_ENV['DB_PASS'] ?? '');
define('DB_CHARSET', 'utf8mb4');

// Security Configuration
define('SECRET_KEY', $_ENV['SECRET_KEY'] ?? 'your-secret-key-here');
define('ENCRYPT_KEY', $_ENV['ENCRYPT_KEY'] ?? 'your-encryption-key-here');
define('CSRF_TOKEN_NAME', 'bastion_csrf_token');
define('SESSION_NAME', 'bastion_session');

// Email Configuration (for contact forms)
define('SMTP_HOST', $_ENV['SMTP_HOST'] ?? 'smtp.gmail.com');
define('SMTP_PORT', $_ENV['SMTP_PORT'] ?? 587);
define('SMTP_USER', $_ENV['SMTP_USER'] ?? '');
define('SMTP_PASS', $_ENV['SMTP_PASS'] ?? '');
define('SMTP_ENCRYPTION', 'tls');

// Blesta Integration
define('BLESTA_URL', $_ENV['BLESTA_URL'] ?? 'https://billing.bastionhosting.com');
define('BLESTA_API_KEY', $_ENV['BLESTA_API_KEY'] ?? '');
define('BLESTA_COMPANY_ID', $_ENV['BLESTA_COMPANY_ID'] ?? '1');

// Domain API Configuration
define('DOMAIN_API_URL', $_ENV['DOMAIN_API_URL'] ?? '');
define('DOMAIN_API_KEY', $_ENV['DOMAIN_API_KEY'] ?? '');

// Paths
define('ROOT_PATH', dirname(__FILE__));
define('INCLUDES_PATH', ROOT_PATH . '/includes');
define('ASSETS_PATH', ROOT_PATH . '/assets');
define('UPLOADS_PATH', ROOT_PATH . '/uploads');
define('LOGS_PATH', ROOT_PATH . '/logs');

// URLs
define('ASSETS_URL', '/assets');
define('UPLOADS_URL', '/uploads');

// Error Reporting
if (DEBUG_MODE) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    ini_set('log_errors', 1);
    ini_set('error_log', LOGS_PATH . '/error.log');
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
    ini_set('log_errors', 1);
    ini_set('error_log', LOGS_PATH . '/error.log');
}

// Timezone
date_default_timezone_set('America/New_York');

// Session Configuration
ini_set('session.name', SESSION_NAME);
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_secure', !DEBUG_MODE ? 1 : 0);
ini_set('session.cookie_samesite', 'Strict');
ini_set('session.use_strict_mode', 1);

// Security Headers Function
function set_security_headers() {
    header("X-Content-Type-Options: nosniff");
    header("X-Frame-Options: DENY");
    header("X-XSS-Protection: 1; mode=block");
    header("Referrer-Policy: strict-origin-when-cross-origin");
    header("Content-Security-Policy: default-src 'self'; script-src 'self' 'unsafe-inline' https://fonts.googleapis.com; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com; font-src 'self' https://fonts.gstatic.com; img-src 'self' data:; connect-src 'self';");
    
    if (!DEBUG_MODE) {
        header("Strict-Transport-Security: max-age=31536000; includeSubDomains; preload");
    }
}

// Database Connection Class
class Database {
    private static $instance = null;
    private $pdo;
    
    private function __construct() {
        try {
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES " . DB_CHARSET
            ];
            
            $this->pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
        } catch (PDOException $e) {
            if (DEBUG_MODE) {
                die("Database connection failed: " . $e->getMessage());
            } else {
                error_log("Database connection failed: " . $e->getMessage());
                die("Database connection failed. Please try again later.");
            }
        }
    }
    
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    public function getConnection() {
        return $this->pdo;
    }
    
    public function query($sql, $params = []) {
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);
            return $stmt;
        } catch (PDOException $e) {
            error_log("Database query failed: " . $e->getMessage());
            if (DEBUG_MODE) {
                throw $e;
            }
            return false;
        }
    }
    
    public function lastInsertId() {
        return $this->pdo->lastInsertId();
    }
}

// Utility Functions
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

function generate_csrf_token() {
    if (!isset($_SESSION[CSRF_TOKEN_NAME])) {
        $_SESSION[CSRF_TOKEN_NAME] = bin2hex(random_bytes(32));
    }
    return $_SESSION[CSRF_TOKEN_NAME];
}

function verify_csrf_token($token) {
    if (!isset($_SESSION[CSRF_TOKEN_NAME])) {
        return false;
    }
    return hash_equals($_SESSION[CSRF_TOKEN_NAME], $token);
}

function log_error($message, $context = []) {
    $timestamp = date('Y-m-d H:i:s');
    $log_entry = "[{$timestamp}] {$message}";
    
    if (!empty($context)) {
        $log_entry .= " Context: " . json_encode($context);
    }
    
    error_log($log_entry . PHP_EOL, 3, LOGS_PATH . '/application.log');
}

function redirect($url, $status_code = 302) {
    header("Location: {$url}", true, $status_code);
    exit();
}

function is_valid_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function is_valid_domain($domain) {
    return preg_match('/^[a-zA-Z0-9][a-zA-Z0-9-]{0,61}[a-zA-Z0-9]?\.[a-zA-Z]{2,}$/', $domain) 
           && strlen($domain) <= 253;
}

// Rate Limiting
function check_rate_limit($identifier, $limit = 10, $window = 3600) {
    $key = "rate_limit_{$identifier}";
    
    if (!isset($_SESSION[$key])) {
        $_SESSION[$key] = [
            'count' => 0,
            'window_start' => time()
        ];
    }
    
    $current_time = time();
    $rate_data = $_SESSION[$key];
    
    // Reset if window has passed
    if ($current_time - $rate_data['window_start'] > $window) {
        $_SESSION[$key] = [
            'count' => 1,
            'window_start' => $current_time
        ];
        return true;
    }
    
    // Check if limit exceeded
    if ($rate_data['count'] >= $limit) {
        return false;
    }
    
    // Increment counter
    $_SESSION[$key]['count']++;
    return true;
}

// Initialize session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Set security headers
set_security_headers();

// Load environment variables if .env file exists
if (file_exists(ROOT_PATH . '/.env')) {
    $env_content = file_get_contents(ROOT_PATH . '/.env');
    $lines = explode("\n", $env_content);
    
    foreach ($lines as $line) {
        $line = trim($line);
        if (empty($line) || strpos($line, '#') === 0) {
            continue;
        }
        
        list($key, $value) = explode('=', $line, 2);
        $key = trim($key);
        $value = trim($value, ' "\'');
        
        if (!empty($key) && !empty($value)) {
            $_ENV[$key] = $value;
        }
    }
}
