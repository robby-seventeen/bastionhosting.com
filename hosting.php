<?php
// Shared Hosting Page
// Bastion Hosting - A 17 Solutions LLC Company

header("X-Content-Type-Options: nosniff");
header("X-Frame-Options: DENY");
header("X-XSS-Protection: 1; mode=block");
header("Referrer-Policy: strict-origin-when-cross-origin");

$hosting_plans = [
    [
        'name' => 'Starter',
        'description' => 'Perfect for personal websites and blogs',
        'price' => '$5',
        'period' => '/month',
        'original_price' => '$9',
        'savings' => 'Save 44%',
        'specs' => [
            'websites' => '1 Website',
            'storage' => '10GB NVMe SSD',
            'bandwidth' => 'Unlimited',
            'email' => '5 Email Accounts',
            'databases' => '2 MySQL Databases'
        ],
        'features' => [
            'Free SSL Certificate',
            'Daily Backups',
            'cPanel Control Panel',
            'Softaculous Installer',
            'Email Support',
            'CloudFlare CDN',
            '99.9% Uptime Guarantee'
        ],
        'popular' => false,
        'best_for' => 'Personal blogs, portfolios, small business sites'
    ],
    [
        'name' => 'Professional',
        'description' => 'Ideal for growing businesses and multiple sites',
        'price' => '$9',
        'period' => '/month',
        'original_price' => '$19',
        'savings' => 'Save 53%',
        'specs' => [
            'websites' => '5 Websites',
            'storage' => '25GB NVMe SSD',
            'bandwidth' => 'Unlimited',
            'email' => '25 Email Accounts',
            'databases' => 'Unlimited MySQL'
        ],
        'features' => [
            'Free SSL Certificate',
            'Daily Backups',
            'cPanel Control Panel',
            'Softaculous Installer',
            'Priority Email Support',
            'CloudFlare CDN',
            'Site Builder Included',
            'Advanced Security',
            '99.9% Uptime Guarantee'
        ],
        'popular' => true,
        'best_for' => 'Business websites, e-commerce, multiple projects'
    ],
    [
        'name' => 'Business Plus',
        'description' => 'For high-traffic sites and agencies',
        'price' => '$19',
        'period' => '/month',
        'original_price' => '$39',
        'savings' => 'Save 51%',
        'specs' => [
            'websites' => 'Unlimited Websites',
            'storage' => '100GB NVMe SSD',
            'bandwidth' => 'Unlimited',
            'email' => 'Unlimited Email',
            'databases' => 'Unlimited MySQL'
        ],
        'features' => [
            'Free SSL Certificate',
            'Hourly Backups',
            'cPanel Control Panel',
            'Softaculous Installer',
            'Phone + Email Support',
            'CloudFlare CDN',
            'Site Builder Included',
            'Advanced Security',
            'Performance Monitoring',
            'Free Domain for 1 Year',
            '99.9% Uptime Guarantee'
        ],
        'popular' => false,
        'best_for' => 'High-traffic sites, agencies, resellers'
    ]
];

$features = [
    [
        'icon' => '<path d="M13 3c-4.97 0-9 4.03-9 9H1l3.89 3.89.07.14L9 12H6c0-3.87 3.13-7 7-7s7 3.13 7 7-3.13 7-7 7c-1.93 0-3.68-.79-4.94-2.06l-1.42 1.42C8.27 19.99 10.51 21 13 21c4.97 0 9-4.03 9-9s-4.03-9-9-9z"/>',
        'title' => 'Lightning Fast NVMe',
        'description' => 'All accounts include blazing-fast NVMe SSD storage that\'s up to 10x faster than traditional hosting.'
    ],
    [
        'icon' => '<path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z"/>',
        'title' => 'Never Oversold',
        'description' => 'We actually provision the resources we promise. Your site gets dedicated CPU, RAM, and storage.'
    ],
    [
        'icon' => '<path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>',
        'title' => 'Free Website Migration',
        'description' => 'Our experts will migrate your existing website for free with zero downtime guaranteed.'
    ],
    [
        'icon' => '<path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>',
        'title' => 'Real Human Support',
        'description' => 'Talk to actual hosting experts based in the US. No chatbots, no offshore call centers.'
    ],
    [
        'icon' => '<path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>',
        'title' => 'Everything Included',
        'description' => 'Free SSL, daily backups, email accounts, and premium features included at no extra cost.'
    ],
    [
        'icon' => '<path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>',
        'title' => '99.9% Uptime SLA',
        'description' => 'Enterprise-grade infrastructure with monitoring and automatic failover systems.'
    ]
];

$included_features = [
    'Free SSL Certificate' => 'Secure your site with Let\'s Encrypt SSL',
    'Daily Backups' => 'Automatic daily backups with 30-day retention',
    'cPanel Control Panel' => 'Industry-standard hosting control panel',
    'Softaculous Installer' => '400+ one-click app installations',
    'CloudFlare CDN' => 'Global content delivery network included',
    'Email Accounts' => 'Professional email with spam protection',
    'MySQL Databases' => 'Reliable database hosting',
    'FTP/SFTP Access' => 'Secure file transfer protocols',
    'Cron Jobs' => 'Automated task scheduling',
    'PHP 8.3 Support' => 'Latest PHP version with performance boost',
    'Git Integration' => 'Version control for developers',
    'Staging Environment' => 'Test changes before going live'
];

$comparison_features = [
    'Websites' => ['1', '5', 'Unlimited'],
    'Storage' => ['10GB NVMe', '25GB NVMe', '100GB NVMe'],
    'Bandwidth' => ['Unlimited', 'Unlimited', 'Unlimited'],
    'Email Accounts' => ['5', '25', 'Unlimited'],
    'MySQL Databases' => ['2', 'Unlimited', 'Unlimited'],
    'Free SSL' => ['✓', '✓', '✓'],
    'Daily Backups' => ['✓', '✓', 'Hourly'],
    'cPanel' => ['✓', '✓', '✓'],
    'Support' => ['Email', 'Priority Email', 'Phone + Email'],
    'Free Domain' => ['—', '—', '1 Year'],
    'Site Builder' => ['—', '✓', '✓'],
    'Staging' => ['—', '—', '✓']
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shared Hosting - Fast, Reliable Web Hosting | Bastion Hosting</title>
    <meta name="description" content="Premium shared hosting with NVMe SSD storage, free SSL, daily backups, and 99.9% uptime guarantee. No overselling, no hidden fees.">
    <meta name="keywords" content="shared hosting, web hosting, NVMe hosting, cPanel hosting, reliable hosting">
    
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
    <section class="hero">
        <div class="hero-container">
            <h1 class="animate-fade-in-up">
                <span class="hero-gradient">Shared Hosting</span> That Actually Works
            </h1>
            <p class="animate-fade-in-up">
                Lightning-fast NVMe storage, never oversold servers, and real human support. 
                Everything you need to build and grow your website, starting at just $5/month.
            </p>
            <div class="hero-buttons animate-fade-in-up">
                <a href="#hosting-plans" class="cta-button">View Hosting Plans</a>
                <a href="/contact" class="btn-secondary">Need Help Choosing?</a>
            </div>
            <div class="trust-indicators animate-fade-in-up">
                <div class="trust-item">
                    <svg class="trust-icon" viewBox="0 0 24 24">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                    </svg>
                    <span>30-Day Money Back</span>
                </div>
                <div class="trust-item">
                    <svg class="trust-icon" viewBox="0 0 24 24">
                        <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z"/>
                    </svg>
                    <span>99.9% Uptime SLA</span>
                </div>
                <div class="trust-item">
                    <svg class="trust-icon" viewBox="0 0 24 24">
                        <path d="M13 3c-4.97 0-9 4.03-9 9H1l3.89 3.89.07.14L9 12H6c0-3.87 3.13-7 7-7s7 3.13 7 7-3.13 7-7 7c-1.93 0-3.68-.79-4.94-2.06l-1.42 1.42C8.27 19.99 10.51 21 13 21c4.97 0 9-4.03 9-9s-4.03-9-9-9z"/>
                    </svg>
                    <span>Free Migration</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Hosting Plans -->
    <section class="pricing" id="hosting-plans">
        <div class="pricing-container">
            <div class="section-header">
                <h2>Choose Your Hosting Plan</h2>
                <p>All plans include free SSL, daily backups, and our 99.9% uptime guarantee.</p>
            </div>
            <div class="pricing-grid">
                <?php foreach ($hosting_plans as $plan): ?>
                    <div class="pricing-card<?= $plan['popular'] ? ' featured' : '' ?>">
                        <h3 class="plan-name"><?= htmlspecialchars($plan['name']) ?></h3>
                        <p class="plan-description"><?= htmlspecialchars($plan['description']) ?></p>
                        
                        <!-- Pricing -->
                        <div class="plan-pricing" style="margin: var(--space-lg) 0;">
                            <div class="plan-price">
                                <?= htmlspecialchars($plan['price']) ?>
                                <span><?= htmlspecialchars($plan['period']) ?></span>
                            </div>
                            <div style="text-align: center; margin-top: var(--space-sm);">
                                <span style="text-decoration: line-through; color: var(--text-muted); font-size: var(--font-size-sm);">
                                    <?= htmlspecialchars($plan['original_price']) ?>/mo
                                </span>
                                <span style="color: #00aa44; font-weight: 600; font-size: var(--font-size-sm); margin-left: var(--space-sm);">
                                    <?= htmlspecialchars($plan['savings']) ?>
                                </span>
                            </div>
                        </div>
                        
                        <!-- Specs -->
                        <div class="plan-specs" style="
                            margin: var(--space-lg) 0; 
                            padding: var(--space-md); 
                            background: var(--bg-tertiary); 
                            border-radius: var(--radius-lg);
                            border: 1px solid var(--border);
                        ">
                            <?php foreach ($plan['specs'] as $spec_key => $spec_value): ?>
                                <div style="display: flex; justify-content: space-between; margin-bottom: var(--space-sm); font-size: var(--font-size-sm);">
                                    <span style="color: var(--text-secondary); text-transform: capitalize;">
                                        <?= str_replace('_', ' ', $spec_key) ?>:
                                    </span>
                                    <span style="color: var(--text-primary); font-weight: 600;">
                                        <?= htmlspecialchars($spec_value) ?>
                                    </span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        
                        <!-- Features -->
                        <ul class="plan-features">
                            <?php foreach ($plan['features'] as $feature): ?>
                                <li>
                                    <svg class="checkmark" viewBox="0 0 24 24">
                                        <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                                    </svg>
                                    <span><?= htmlspecialchars($feature) ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        
                        <!-- Best For -->
                        <div style="margin: var(--space-lg) 0; padding: var(--space-md); background: rgba(0, 102, 255, 0.1); border-radius: var(--radius-md); border-left: 3px solid var(--primary);">
                            <p style="color: var(--text-secondary); font-size: var(--font-size-sm); margin: 0;">
                                <strong style="color: var(--primary);">Best For:</strong><br>
                                <?= htmlspecialchars($plan['best_for']) ?>
                            </p>
                        </div>
                        
                        <a href="/checkout?plan=<?= htmlspecialchars(strtolower(str_replace(' ', '-', $plan['name']))) ?>" 
                           class="cta-button">
                            Get Started Now
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <!-- Money Back Guarantee -->
            <div style="text-align: center; margin-top: var(--space-2xl); padding: var(--space-xl); background: var(--bg-secondary); border-radius: var(--radius-2xl); border: 1px solid var(--border);">
                <h3 style="color: var(--text-primary); margin-bottom: var(--space-md);">
                    🛡️ 30-Day Money-Back Guarantee
                </h3>
                <p style="color: var(--text-secondary); max-width: 600px; margin: 0 auto;">
                    Not satisfied? Get a full refund within 30 days, no questions asked. 
                    We'll even help you migrate to another provider if needed.
                </p>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="features-container">
            <div class="section-header">
                <h2>Why Choose Our <span class="text-gradient">Shared Hosting</span>?</h2>
                <p>We're not like other hosting companies. Here's what makes us different.</p>
            </div>
            <div class="features-grid">
                <?php foreach ($features as $feature): ?>
                    <div class="feature-card" data-animate="scroll">
                        <div class="feature-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="white">
                                <?= $feature['icon'] ?>
                            </svg>
                        </div>
                        <h3><?= htmlspecialchars($feature['title']) ?></h3>
                        <p><?= htmlspecialchars($feature['description']) ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Included Features -->
    <section class="section" style="background: var(--bg-secondary);">
        <div class="container">
            <div class="section-header">
                <h2>Everything You Need, Included</h2>
                <p>No hidden fees, no surprise charges. These premium features are included with every plan.</p>
            </div>
            <div style="
                display: grid; 
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); 
                gap: var(--space-lg); 
                margin-top: var(--space-2xl);
            ">
                <?php foreach ($included_features as $feature => $description): ?>
                    <div style="
                        display: flex; 
                        align-items: flex-start; 
                        gap: var(--space-md);
                        padding: var(--space-lg);
                        background: var(--bg-tertiary);
                        border-radius: var(--radius-lg);
                        border: 1px solid var(--border);
                        transition: all var(--transition-base);
                    " class="included-feature">
                        <svg width="20" height="20" viewBox="0 0 24 24" style="fill: var(--primary); flex-shrink: 0; margin-top: 2px;">
                            <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                        </svg>
                        <div>
                            <h4 style="color: var(--text-primary); margin-bottom: var(--space-xs); font-size: var(--font-size-base);">
                                <?= htmlspecialchars($feature) ?>
                            </h4>
                            <p style="color: var(--text-secondary); font-size: var(--font-size-sm); margin: 0;">
                                <?= htmlspecialchars($description) ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Plan Comparison Table -->
    <section class="section">
        <div class="container">
            <div class="section-header">
                <h2>Detailed Plan Comparison</h2>
                <p>Compare all features side-by-side to find the perfect plan for your needs.</p>
            </div>
            
            <div style="overflow-x: auto; margin-top: var(--space-2xl);">
                <table style="
                    width: 100%; 
                    border-collapse: collapse; 
                    background: var(--bg-secondary);
                    border-radius: var(--radius-lg);
                    overflow: hidden;
                    border: 1px solid var(--border);
                ">
                    <thead>
                        <tr style="background: var(--bg-tertiary);">
                            <th style="padding: var(--space-lg); text-align: left; color: var(--text-primary); font-weight: 600;">
                                Feature
                            </th>
                            <?php foreach ($hosting_plans as $plan): ?>
                                <th style="
                                    padding: var(--space-lg); 
                                    text-align: center; 
                                    color: var(--text-primary); 
                                    font-weight: 600;
                                    <?= $plan['popular'] ? 'background: rgba(0, 102, 255, 0.1);' : '' ?>
                                ">
                                    <?= htmlspecialchars($plan['name']) ?>
                                    <?php if ($plan['popular']): ?>
                                        <div style="font-size: var(--font-size-xs); color: var(--primary); margin-top: var(--space-xs);">
                                            Most Popular
                                        </div>
                                    <?php endif; ?>
                                </th>
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($comparison_features as $feature => $values): ?>
                            <tr style="border-top: 1px solid var(--border);">
                                <td style="padding: var(--space-md) var(--space-lg); color: var(--text-secondary); font-weight: 500;">
                                    <?= htmlspecialchars($feature) ?>
                                </td>
                                <?php foreach ($values as $index => $value): ?>
                                    <td style="
                                        padding: var(--space-md) var(--space-lg); 
                                        text-align: center; 
                                        color: var(--text-primary);
                                        font-weight: 600;
                                        <?= $hosting_plans[$index]['popular'] ? 'background: rgba(0, 102, 255, 0.05);' : '' ?>
                                    ">
                                        <?= $value === '✓' ? '<span style="color: var(--primary);">✓</span>' : htmlspecialchars($value) ?>
                                    </td>
                                <?php endforeach; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="section" style="background: var(--bg-secondary);">
        <div class="container">
            <div class="section-header">
                <h2>Frequently Asked Questions</h2>
                <p>Get answers to common hosting questions.</p>
            </div>
            
            <div style="max-width: 800px; margin: 0 auto;">
                <div class="faq-grid" style="display: grid; gap: var(--space-lg);">
                    <div class="faq-item" style="background: var(--bg-tertiary); border: 1px solid var(--border); border-radius: var(--radius-lg); padding: var(--space-xl);">
                        <h3 style="color: var(--text-primary); margin-bottom: var(--space-md);">
                            What makes your hosting different from other providers?
                        </h3>
                        <p>We never oversell our servers, meaning you get the resources you pay for. We use enterprise-grade NVMe SSD storage, provide real human support, and maintain a 99.9% uptime guarantee. Plus, no hidden fees or surprise price increases.</p>
                    </div>
                    
                    <div class="faq-item" style="background: var(--bg-tertiary); border: 1px solid var(--border); border-radius: var(--radius-lg); padding: var(--space-xl);">
                        <h3 style="color: var(--text-primary); margin-bottom: var(--space-md);">
                            Will you migrate my existing website for free?
                        </h3>
                        <p>Yes! Our technical team will migrate your website from your current host completely free of charge. We handle everything and guarantee zero downtime during the migration process.</p>
                    </div>
                    
                    <div class="faq-item" style="background: var(--bg-tertiary); border: 1px solid var(--border); border-radius: var(--radius-lg); padding: var(--space-xl);">
                        <h3 style="color: var(--text-primary); margin-bottom: var(--space-md);">
                            What if my website outgrows shared hosting?
                        </h3>
                        <p>We offer seamless upgrades to VPS or dedicated hosting. Our team will help you identify when it's time to upgrade and handle the migration process with zero downtime.</p>
                    </div>
                    
                    <div class="faq-item" style="background: var(--bg-tertiary); border: 1px solid var(--border); border-radius: var(--radius-lg); padding: var(--space-xl);">
                        <h3 style="color: var(--text-primary); margin-bottom: var(--space-md);">
                            Do you really offer 30-day money-back guarantee?
                        </h3>
                        <p>Absolutely! If you're not completely satisfied within 30 days, we'll refund your money with no questions asked. We'll even help you migrate to another provider if needed.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="section">
        <div class="container" style="text-align: center;">
            <h2>Ready to Get Started?</h2>
            <p style="font-size: var(--font-size-lg); color: var(--text-secondary); margin-bottom: var(--space-2xl);">
                Join thousands of satisfied customers who chose reliability over marketing hype.
            </p>
            <div style="display: flex; gap: var(--space-md); justify-content: center; flex-wrap: wrap;">
                <a href="#hosting-plans" class="cta-button">Choose Your Plan</a>
                <a href="/contact" class="btn-secondary">Talk to an Expert</a>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>

    <script src="/assets/js/main.js"></script>
    <script src="/assets/js/components.js"></script>

    <style>
    .included-feature:hover {
        transform: translateY(-2px);
        border-color: var(--primary);
    }
    
    .faq-item:hover {
        border-color: var(--primary);
        transform: translateY(-2px);
        transition: all var(--transition-base);
    }
    
    table th, table td {
        border-right: 1px solid var(--border);
    }
    
    table th:last-child, table td:last-child {
        border-right: none;
    }
    
    @media (max-width: 768px) {
        .pricing-grid {
            grid-template-columns: 1fr;
        }
        
        table {
            font-size: var(--font-size-sm);
        }
        
        table th, table td {
            padding: var(--space-sm);
        }
    }
    </style>
</body>
</html>
