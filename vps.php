<?php
// VPS Hosting Page
// Bastion Hosting - A 17 Solutions LLC Company

header("X-Content-Type-Options: nosniff");
header("X-Frame-Options: DENY");
header("X-XSS-Protection: 1; mode=block");
header("Referrer-Policy: strict-origin-when-cross-origin");

$vps_plans = [
    [
        'name' => 'VPS Starter',
        'description' => 'Perfect for small applications and development',
        'price' => '$29',
        'period' => '/month',
        'specs' => [
            'cpu' => '2 vCPU Cores',
            'ram' => '4GB DDR4 RAM',
            'storage' => '80GB NVMe SSD',
            'bandwidth' => '4TB Bandwidth',
            'ip' => '1 Dedicated IP'
        ],
        'features' => [
            'Full Root Access',
            'Choice of OS',
            'KVM Virtualization',
            'Free Backups',
            'DDoS Protection',
            '24/7 Monitoring'
        ],
        'popular' => false
    ],
    [
        'name' => 'VPS Professional',
        'description' => 'Ideal for production applications',
        'price' => '$59',
        'period' => '/month',
        'specs' => [
            'cpu' => '4 vCPU Cores',
            'ram' => '8GB DDR4 RAM',
            'storage' => '160GB NVMe SSD',
            'bandwidth' => '8TB Bandwidth',
            'ip' => '2 Dedicated IPs'
        ],
        'features' => [
            'Full Root Access',
            'Choice of OS',
            'KVM Virtualization',
            'Free Backups',
            'DDoS Protection',
            '24/7 Monitoring',
            'Load Balancer Ready'
        ],
        'popular' => true
    ],
    [
        'name' => 'VPS Enterprise',
        'description' => 'For high-traffic applications',
        'price' => '$119',
        'period' => '/month',
        'specs' => [
            'cpu' => '8 vCPU Cores',
            'ram' => '16GB DDR4 RAM',
            'storage' => '320GB NVMe SSD',
            'bandwidth' => '12TB Bandwidth',
            'ip' => '4 Dedicated IPs'
        ],
        'features' => [
            'Full Root Access',
            'Choice of OS',
            'KVM Virtualization',
            'Free Backups',
            'DDoS Protection',
            '24/7 Monitoring',
            'Load Balancer Ready',
            'Priority Support'
        ],
        'popular' => false
    ]
];

$operating_systems = [
    'Ubuntu 22.04 LTS',
    'CentOS 8',
    'Debian 11',
    'Rocky Linux 8',
    'AlmaLinux 8',
    'Windows Server 2022'
];

$features = [
    [
        'icon' => '<path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>',
        'title' => 'Enterprise Hardware',
        'description' => 'Intel Xeon processors, NVMe SSDs, and enterprise-grade infrastructure in our own data centers.'
    ],
    [
        'icon' => '<path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z"/>',
        'title' => 'Full Root Access',
        'description' => 'Complete control over your server. Install what you want, configure as needed.'
    ],
    [
        'icon' => '<path d="M13 3c-4.97 0-9 4.03-9 9H1l3.89 3.89.07.14L9 12H6c0-3.87 3.13-7 7-7s7 3.13 7 7-3.13 7-7 7c-1.93 0-3.68-.79-4.94-2.06l-1.42 1.42C8.27 19.99 10.51 21 13 21c4.97 0 9-4.03 9-9s-4.03-9-9-9z"/>',
        'title' => 'Instant Deployment',
        'description' => 'Your VPS is ready in under 60 seconds. No waiting, no delays.'
    ],
    [
        'icon' => '<path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>',
        'title' => 'Guaranteed Resources',
        'description' => 'Your CPU, RAM, and storage are dedicated to you. No overselling, no sharing.'
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VPS Hosting - Enterprise Virtual Private Servers | Bastion Hosting</title>
    <meta name="description" content="Powerful VPS hosting with guaranteed resources, full root access, and enterprise-grade hardware. Deploy in under 60 seconds.">
    
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
                VPS Hosting That <span class="hero-gradient">Actually Delivers</span>
            </h1>
            <p class="animate-fade-in-up">
                Guaranteed resources, blazing-fast NVMe storage, and full root access. 
                Deploy your VPS in under 60 seconds with our enterprise-grade infrastructure.
            </p>
            <div class="hero-buttons animate-fade-in-up">
                <a href="#vps-plans" class="cta-button">View VPS Plans</a>
                <a href="/contact" class="btn-secondary">Custom Solutions</a>
            </div>
        </div>
    </section>

    <!-- VPS Features -->
    <section class="features">
        <div class="features-container">
            <div class="section-header">
                <h2>Why Choose Our <span class="text-gradient">VPS Hosting</span>?</h2>
                <p>Enterprise-grade infrastructure with the flexibility you need to grow.</p>
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

    <!-- VPS Plans -->
    <section class="pricing" id="vps-plans">
        <div class="pricing-container">
            <div class="section-header">
                <h2>Choose Your VPS Plan</h2>
                <p>All plans include full root access, choice of OS, and 24/7 monitoring.</p>
            </div>
            <div class="pricing-grid">
                <?php foreach ($vps_plans as $plan): ?>
                    <div class="pricing-card<?= $plan['popular'] ? ' featured' : '' ?>">
                        <h3 class="plan-name"><?= htmlspecialchars($plan['name']) ?></h3>
                        <p class="plan-description"><?= htmlspecialchars($plan['description']) ?></p>
                        <div class="plan-price">
                            <?= htmlspecialchars($plan['price']) ?>
                            <span><?= htmlspecialchars($plan['period']) ?></span>
                        </div>
                        
                        <!-- Specs -->
                        <div class="plan-specs" style="margin: var(--space-lg) 0; padding: var(--space-md); background: var(--bg-tertiary); border-radius: var(--radius-lg);">
                            <?php foreach ($plan['specs'] as $spec_key => $spec_value): ?>
                                <div style="display: flex; justify-content: space-between; margin-bottom: var(--space-sm);">
                                    <span style="color: var(--text-secondary); text-transform: capitalize;"><?= str_replace('_', ' ', $spec_key) ?>:</span>
                                    <span style="color: var(--text-primary); font-weight: 600;"><?= htmlspecialchars($spec_value) ?></span>
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
                        
                        <a href="/checkout?plan=<?= htmlspecialchars(strtolower(str_replace(' ', '-', $plan['name']))) ?>" 
                           class="cta-button">
                            Deploy Now
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Operating Systems -->
    <section class="section" style="background: var(--bg-secondary);">
        <div class="container">
            <div class="section-header">
                <h2>Supported Operating Systems</h2>
                <p>Choose from our curated selection of the most popular and secure operating systems.</p>
            </div>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: var(--space-lg); margin-top: var(--space-2xl);">
                <?php foreach ($operating_systems as $os): ?>
                    <div style="
                        background: var(--bg-tertiary);
                        border: 1px solid var(--border);
                        border-radius: var(--radius-lg);
                        padding: var(--space-lg);
                        text-align: center;
                        transition: all var(--transition-base);
                    " class="os-card">
                        <h4 style="color: var(--text-primary); margin-bottom: var(--space-sm);">
                            <?= htmlspecialchars($os) ?>
                        </h4>
                        <p style="color: var(--text-secondary); font-size: var(--font-size-sm);">
                            One-click installation
                        </p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="section">
        <div class="container" style="text-align: center;">
            <h2>Ready to Deploy Your VPS?</h2>
            <p style="font-size: var(--font-size-lg); color: var(--text-secondary); margin-bottom: var(--space-2xl);">
                Get started in under 60 seconds with our enterprise-grade infrastructure.
            </p>
            <div style="display: flex; gap: var(--space-md); justify-content: center; flex-wrap: wrap;">
                <a href="#vps-plans" class="cta-button">Choose Your Plan</a>
                <a href="/contact" class="btn-secondary">Need Help Choosing?</a>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>

    <script src="/assets/js/main.js"></script>
    <script src="/assets/js/components.js"></script>

    <style>
    .os-card:hover {
        transform: translateY(-5px);
        border-color: var(--primary);
    }
    
    .plan-specs {
        font-size: var(--font-size-sm);
    }
    </style>
</body>
</html>
