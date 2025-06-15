<?php
// Coming Soon - Bastion Hosting
// A 17 Solutions LLC Company

header("X-Content-Type-Options: nosniff");
header("X-Frame-Options: DENY");
header("X-XSS-Protection: 1; mode=block");
header("Referrer-Policy: strict-origin-when-cross-origin");

// Simple email collection for early access
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    if ($email) {
        // Store email in simple file (replace with database in production)
        $emails_file = __DIR__ . '/early_access_emails.txt';
        file_put_contents($emails_file, $email . PHP_EOL, FILE_APPEND | LOCK_EX);
        $success_message = "Thanks! We'll notify you when we launch.";
    } else {
        $error_message = "Please enter a valid email address.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coming Soon - Bastion Hosting | Premium Web Hosting</title>
    <meta name="description" content="Bastion Hosting is coming soon. Premium web hosting without the corporate nonsense. Get notified when we launch.">
    <meta name="robots" content="index, follow">
    
    <link rel="icon" type="image/svg+xml" href="/assets/images/favicon.svg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <style>
        /* CSS Variables */
        :root {
            --primary: #0066ff;
            --primary-light: #66b3ff;
            --text-primary: #ffffff;
            --text-secondary: #a0a0a0;
            --text-muted: #707070;
            --bg-primary: #0a0a0a;
            --bg-secondary: #1a1a1a;
            --bg-tertiary: #2a2a2a;
            --border: #333333;
            --gradient-primary: linear-gradient(135deg, #0066ff 0%, #66b3ff 100%);
            --gradient-background: linear-gradient(135deg, #1a1a1a 0%, #2a2a2a 100%);
            --shadow-lg: 0 10px 25px rgba(0, 0, 0, 0.2);
            --space-xs: 0.25rem;
            --space-sm: 0.5rem;
            --space-md: 1rem;
            --space-lg: 1.5rem;
            --space-xl: 2rem;
            --space-2xl: 3rem;
            --space-3xl: 4rem;
            --font-size-sm: 0.875rem;
            --font-size-base: 1rem;
            --font-size-lg: 1.125rem;
            --font-size-xl: 1.25rem;
            --font-size-2xl: 1.5rem;
            --font-size-3xl: 1.875rem;
            --font-size-4xl: 2.25rem;
            --font-size-5xl: 3rem;
            --radius-md: 0.5rem;
            --radius-lg: 0.75rem;
            --radius-xl: 1rem;
            --radius-2xl: 1.5rem;
            --radius-full: 9999px;
            --transition-base: 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: var(--bg-primary);
            color: var(--text-primary);
            line-height: 1.6;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .coming-soon-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            padding: var(--space-xl);
        }

        /* Animated background */
        .coming-soon-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 20% 30%, rgba(0, 102, 255, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 80% 70%, rgba(102, 179, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 50% 20%, rgba(0, 102, 255, 0.05) 0%, transparent 60%);
            z-index: -1;
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(1deg); }
        }

        .content {
            text-align: center;
            max-width: 600px;
            position: relative;
            z-index: 1;
        }

        .logo {
            font-size: var(--font-size-3xl);
            font-weight: 800;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: var(--space-lg);
            animation: glow 2s ease-in-out infinite alternate;
        }

        @keyframes glow {
            from { filter: drop-shadow(0 0 5px rgba(0, 102, 255, 0.3)); }
            to { filter: drop-shadow(0 0 20px rgba(0, 102, 255, 0.6)); }
        }

        h1 {
            font-size: clamp(2rem, 5vw, 3.5rem);
            font-weight: 900;
            margin-bottom: var(--space-lg);
            line-height: 1.1;
            animation: slideInUp 0.8s ease-out;
        }

        .tagline {
            font-size: var(--font-size-xl);
            color: var(--text-secondary);
            margin-bottom: var(--space-2xl);
            animation: slideInUp 0.8s ease-out 0.2s both;
        }

        .hero-gradient {
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .features-preview {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: var(--space-lg);
            margin: var(--space-3xl) 0;
            animation: slideInUp 0.8s ease-out 0.4s both;
        }

        .feature-item {
            padding: var(--space-lg);
            background: var(--bg-secondary);
            border: 1px solid var(--border);
            border-radius: var(--radius-xl);
            transition: all var(--transition-base);
        }

        .feature-item:hover {
            transform: translateY(-5px);
            border-color: var(--primary);
            box-shadow: var(--shadow-lg);
        }

        .feature-icon {
            width: 48px;
            height: 48px;
            background: var(--gradient-primary);
            border-radius: var(--radius-lg);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto var(--space-md);
        }

        .feature-title {
            font-weight: 700;
            margin-bottom: var(--space-sm);
            color: var(--text-primary);
        }

        .feature-description {
            font-size: var(--font-size-sm);
            color: var(--text-secondary);
        }

        .notify-form {
            background: var(--bg-secondary);
            border: 1px solid var(--border);
            border-radius: var(--radius-2xl);
            padding: var(--space-xl);
            margin: var(--space-3xl) 0;
            animation: slideInUp 0.8s ease-out 0.6s both;
        }

        .form-group {
            display: flex;
            gap: var(--space-md);
            margin-bottom: var(--space-lg);
        }

        .email-input {
            flex: 1;
            padding: var(--space-md) var(--space-lg);
            background: var(--bg-tertiary);
            border: 1px solid var(--border);
            border-radius: var(--radius-full);
            color: var(--text-primary);
            font-size: var(--font-size-base);
            outline: none;
            transition: border-color var(--transition-base);
        }

        .email-input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(0, 102, 255, 0.1);
        }

        .email-input::placeholder {
            color: var(--text-muted);
        }

        .notify-button {
            padding: var(--space-md) var(--space-xl);
            background: var(--gradient-primary);
            color: white;
            border: none;
            border-radius: var(--radius-full);
            font-weight: 600;
            cursor: pointer;
            transition: all var(--transition-base);
            white-space: nowrap;
        }

        .notify-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(0, 102, 255, 0.3);
        }

        .success-message {
            color: #00aa44;
            font-weight: 600;
            margin-bottom: var(--space-md);
            padding: var(--space-md);
            background: rgba(0, 170, 68, 0.1);
            border-radius: var(--radius-md);
        }

        .error-message {
            color: #ff4444;
            font-weight: 600;
            margin-bottom: var(--space-md);
            padding: var(--space-md);
            background: rgba(255, 68, 68, 0.1);
            border-radius: var(--radius-md);
        }

        .construction-note {
            font-size: var(--font-size-sm);
            color: var(--text-muted);
            margin-top: var(--space-xl);
            animation: slideInUp 0.8s ease-out 0.8s both;
        }

        .company-info {
            margin-top: var(--space-2xl);
            padding-top: var(--space-xl);
            border-top: 1px solid var(--border);
            animation: slideInUp 0.8s ease-out 1s both;
        }

        .company-info p {
            color: var(--text-muted);
            font-size: var(--font-size-sm);
        }

        /* Animations */
        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .form-group {
                flex-direction: column;
            }
            
            .features-preview {
                grid-template-columns: 1fr;
            }
            
            .coming-soon-container {
                padding: var(--space-md);
            }
        }

        /* Floating particles effect */
        .particles {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }

        .particle {
            position: absolute;
            width: 2px;
            height: 2px;
            background: var(--primary);
            border-radius: 50%;
            opacity: 0.3;
            animation: float-particle 8s linear infinite;
        }

        @keyframes float-particle {
            0% {
                transform: translateY(100vh) rotate(0deg);
                opacity: 0;
            }
            10% {
                opacity: 0.3;
            }
            90% {
                opacity: 0.3;
            }
            100% {
                transform: translateY(-10px) rotate(360deg);
                opacity: 0;
            }
        }
    </style>
</head>
<body>
    <div class="coming-soon-container">
        <!-- Floating particles -->
        <div class="particles">
            <div class="particle" style="left: 10%; animation-delay: 0s;"></div>
            <div class="particle" style="left: 20%; animation-delay: 1s;"></div>
            <div class="particle" style="left: 30%; animation-delay: 2s;"></div>
            <div class="particle" style="left: 40%; animation-delay: 3s;"></div>
            <div class="particle" style="left: 50%; animation-delay: 4s;"></div>
            <div class="particle" style="left: 60%; animation-delay: 5s;"></div>
            <div class="particle" style="left: 70%; animation-delay: 6s;"></div>
            <div class="particle" style="left: 80%; animation-delay: 7s;"></div>
            <div class="particle" style="left: 90%; animation-delay: 8s;"></div>
        </div>

        <div class="content">
            <div class="logo">Bastion Hosting</div>
            
            <h1>
                Premium Hosting<br>
                <span class="hero-gradient">Coming Soon</span>
            </h1>
            
            <p class="tagline">
                We're building something special. Premium web hosting without the corporate nonsense.
            </p>

            <!-- Features Preview -->
            <div class="features-preview">
                <div class="feature-item">
                    <div class="feature-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="white">
                            <path d="M13 3c-4.97 0-9 4.03-9 9H1l3.89 3.89.07.14L9 12H6c0-3.87 3.13-7 7-7s7 3.13 7 7-3.13 7-7 7c-1.93 0-3.68-.79-4.94-2.06l-1.42 1.42C8.27 19.99 10.51 21 13 21c4.97 0 9-4.03 9-9s-4.03-9-9-9z"/>
                        </svg>
                    </div>
                    <h3 class="feature-title">Lightning Fast</h3>
                    <p class="feature-description">NVMe SSD storage and enterprise-grade infrastructure</p>
                </div>
                
                <div class="feature-item">
                    <div class="feature-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="white">
                            <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z"/>
                        </svg>
                    </div>
                    <h3 class="feature-title">Never Oversold</h3>
                    <p class="feature-description">Guaranteed resources with 99.9% uptime SLA</p>
                </div>
                
                <div class="feature-item">
                    <div class="feature-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="white">
                            <path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                    </div>
                    <h3 class="feature-title">Real Support</h3>
                    <p class="feature-description">US-based experts, not chatbots or call centers</p>
                </div>
            </div>

            <!-- Email Notification Form -->
            <div class="notify-form">
                <h3 style="margin-bottom: var(--space-lg); color: var(--text-primary);">
                    Get Early Access
                </h3>
                <p style="color: var(--text-secondary); margin-bottom: var(--space-lg);">
                    Be the first to know when we launch. No spam, just the good stuff.
                </p>
                
                <?php if (isset($success_message)): ?>
                    <div class="success-message"><?= htmlspecialchars($success_message) ?></div>
                <?php endif; ?>
                
                <?php if (isset($error_message)): ?>
                    <div class="error-message"><?= htmlspecialchars($error_message) ?></div>
                <?php endif; ?>
                
                <form method="post" action="">
                    <div class="form-group">
                        <input type="email" 
                               name="email" 
                               class="email-input" 
                               placeholder="Enter your email address" 
                               required>
                        <button type="submit" class="notify-button">Notify Me</button>
                    </div>
                </form>
                
                <p style="font-size: var(--font-size-sm); color: var(--text-muted);">
                    We respect your privacy. Unsubscribe at any time.
                </p>
            </div>

            <div class="construction-note">
                <p>🚧 Currently under construction. Stay tuned for something amazing!</p>
            </div>

            <div class="company-info">
                <p>Bastion Hosting - A 17 Solutions LLC Company</p>
                <p>Premium hosting without the corporate BS</p>
            </div>
        </div>
    </div>

    <script>
        // Add some interactive particle effects
        document.addEventListener('DOMContentLoaded', function() {
            const particles = document.querySelector('.particles');
            
            // Create additional random particles
            setInterval(() => {
                if (Math.random() > 0.7) {
                    const particle = document.createElement('div');
                    particle.className = 'particle';
                    particle.style.left = Math.random() * 100 + '%';
                    particle.style.animationDelay = '0s';
                    particle.style.animationDuration = (Math.random() * 3 + 5) + 's';
                    particles.appendChild(particle);
                    
                    // Remove particle after animation
                    setTimeout(() => {
                        particle.remove();
                    }, 8000);
                }
            }, 1000);
            
            // Form enhancement
            const form = document.querySelector('form');
            const emailInput = document.querySelector('.email-input');
            const submitButton = document.querySelector('.notify-button');
            
            if (form) {
                form.addEventListener('submit', function() {
                    submitButton.textContent = 'Submitting...';
                    submitButton.disabled = true;
                });
            }
            
            // Add subtle cursor following effect
            document.addEventListener('mousemove', function(e) {
                const cursor = document.querySelector('.cursor-glow');
                if (!cursor) {
                    const glowDiv = document.createElement('div');
                    glowDiv.className = 'cursor-glow';
                    glowDiv.style.cssText = `
                        position: fixed;
                        width: 20px;
                        height: 20px;
                        background: radial-gradient(circle, rgba(0,102,255,0.1) 0%, transparent 70%);
                        border-radius: 50%;
                        pointer-events: none;
                        mix-blend-mode: screen;
                        z-index: 9999;
                        transition: transform 0.1s ease;
                    `;
                    document.body.appendChild(glowDiv);
                }
                
                const glow = document.querySelector('.cursor-glow');
                if (glow) {
                    glow.style.left = (e.clientX - 10) + 'px';
                    glow.style.top = (e.clientY - 10) + 'px';
                }
            });
        });
    </script>
</body>
</html>
