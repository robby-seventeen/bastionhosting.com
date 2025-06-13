<?php
// Domains Page
// Bastion Hosting - A 17 Solutions LLC Company

header("X-Content-Type-Options: nosniff");
header("X-Frame-Options: DENY");
header("X-XSS-Protection: 1; mode=block");
header("Referrer-Policy: strict-origin-when-cross-origin");

$domain_pricing = [
    'popular' => [
        '.com' => ['price' => 12.99, 'renewal' => 14.99, 'description' => 'Most popular choice for businesses'],
        '.net' => ['price' => 14.99, 'renewal' => 16.99, 'description' => 'Great for tech and network companies'],
        '.org' => ['price' => 13.99, 'renewal' => 15.99, 'description' => 'Perfect for organizations and nonprofits'],
        '.io' => ['price' => 49.99, 'renewal' => 54.99, 'description' => 'Popular with startups and tech companies'],
        '.app' => ['price' => 18.99, 'renewal' => 22.99, 'description' => 'Secure domain for mobile apps'],
        '.dev' => ['price' => 15.99, 'renewal' => 18.99, 'description' => 'Perfect for developers and tech projects']
    ],
    'business' => [
        '.biz' => ['price' => 16.99, 'renewal' => 19.99, 'description' => 'Business-focused domain extension'],
        '.info' => ['price' => 17.99, 'renewal' => 20.99, 'description' => 'Informational websites and resources'],
        '.pro' => ['price' => 24.99, 'renewal' => 28.99, 'description' => 'Professional services and individuals'],
        '.co' => ['price' => 32.99, 'renewal' => 35.99, 'description' => 'Short, memorable alternative to .com'],
        '.shop' => ['price' => 38.99, 'renewal' => 42.99, 'description' => 'E-commerce and online stores'],
        '.store' => ['price' => 59.99, 'renewal' => 64.99, 'description' => 'Online retail businesses']
    ],
    'creative' => [
        '.design' => ['price' => 52.99, 'renewal' => 56.99, 'description' => 'Designers and creative agencies'],
        '.art' => ['price' => 19.99, 'renewal' => 23.99, 'description' => 'Artists and creative professionals'],
        '.music' => ['price' => 149.99, 'renewal' => 159.99, 'description' => 'Musicians and music industry'],
        '.photo' => ['price' => 32.99, 'renewal' => 36.99, 'description' => 'Photographers and photography'],
        '.blog' => ['price' => 29.99, 'renewal' => 33.99, 'description' => 'Bloggers and content creators'],
        '.news' => ['price' => 29.99, 'renewal' => 33.99, 'description' => 'News sites and publications']
    ],
    'geographic' => [
        '.us' => ['price' => 9.99, 'renewal' => 12.99, 'description' => 'United States country code'],
        '.uk' => ['price' => 11.99, 'renewal' => 14.99, 'description' => 'United Kingdom domain'],
        '.ca' => ['price' => 19.99, 'renewal' => 22.99, 'description' => 'Canadian domain extension'],
        '.de' => ['price' => 14.99, 'renewal' => 17.99, 'description' => 'German domain extension'],
        '.fr' => ['price' => 12.99, 'renewal' => 15.99, 'description' => 'French domain extension'],
        '.au' => ['price' => 24.99, 'renewal' => 28.99, 'description' => 'Australian domain extension']
    ]
];

$domain_features = [
    [
        'icon' => '<path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z"/>',
        'title' => 'Free WHOIS Privacy',
        'description' => 'Protect your personal information from spam and identity theft with free domain privacy protection.'
    ],
    [
        'icon' => '<path d="M13 3c-4.97 0-9 4.03-9 9H1l3.89 3.89.07.14L9 12H6c0-3.87 3.13-7 7-7s7 3.13 7 7-3.13 7-7 7c-1.93 0-3.68-.79-4.94-2.06l-1.42 1.42C8.27 19.99 10.51 21 13 21c4.97 0 9-4.03 9-9s-4.03-9-9-9z"/>',
        'title' => 'Easy DNS Management',
        'description' => 'Full DNS control with our intuitive interface. Add records, manage subdomains, and configure settings easily.'
    ],
    [
        'icon' => '<path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>',
        'title' => 'Free Domain Forwarding',
        'description' => 'Redirect your domain to any website, email, or subdomain. Perfect for brand protection and marketing.'
    ],
    [
        'icon' => '<path d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>',
        'title' => 'Email Forwarding',
        'description' => 'Create unlimited email forwards for your domain. Perfect for professional communication.'
    ],
    [
        'icon' => '<path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>',
        'title' => 'No Hidden Fees',
        'description' => 'Transparent pricing with no surprise charges. What you see is what you pay, now and at renewal.'
    ],
    [
        'icon' => '<path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>',
        'title' => 'Expert Support',
        'description' => 'Get help from real domain experts, not chatbots. We\'re here to help with transfers, setup, and troubleshooting.'
    ]
];

$domain_services = [
    [
        'title' => 'Domain Registration',
        'description' => 'Register new domains with instant activation and full management tools.',
        'features' => ['Instant activation', 'Free WHOIS privacy', 'DNS management', 'Email forwarding']
    ],
    [
        'title' => 'Domain Transfer',
        'description' => 'Transfer your existing domains to us with free 1-year extension.',
        'features' => ['Free 1-year extension', 'No downtime', 'Keep existing settings', 'Expert assistance']
    ],
    [
        'title' => 'Domain Management',
        'description' => 'Complete control over your domains with our advanced management tools.',
        'features' => ['Advanced DNS editor', 'Subdomain management', 'Bulk operations', 'API access']
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Domain Names - Register & Manage Domains | Bastion Hosting</title>
    <meta name="description" content="Register domain names with free WHOIS privacy, DNS management, and expert support. Transparent pricing with no hidden fees.">
    <meta name="keywords" content="domain registration, domain names, WHOIS privacy, DNS management, domain transfer">
    
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
                Find Your Perfect <span class="hero-gradient">Domain Name</span>
            </h1>
            <p class="animate-fade-in-up">
                Register domains with free WHOIS privacy, advanced DNS management, and transparent pricing. 
                No hidden fees, no surprise renewals.
            </p>
        </div>
    </section>

    <!-- Domain Search Section -->
    <?php include 'includes/domain-search.php'; ?>

    <!-- Domain Services -->
    <section class="section">
        <div class="container">
            <div class="section-header">
                <h2>Complete Domain Services</h2>
                <p>Everything you need to register, transfer, and manage your domains.</p>
            </div>
            <div style="
                display: grid; 
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); 
                gap: var(--space-xl); 
                margin-top: var(--space-2xl);
            ">
                <?php foreach ($domain_services as $service): ?>
                    <div style="
                        background: var(--bg-secondary);
                        border: 1px solid var(--border);
                        border-radius: var(--radius-lg);
                        padding: var(--space-xl);
                        text-align: center;
                        transition: all var(--transition-base);
                    " class="service-card">
                        <h3 style="color: var(--text-primary); margin-bottom: var(--space-md);">
                            <?= htmlspecialchars($service['title']) ?>
                        </h3>
                        <p style="color: var(--text-secondary); margin-bottom: var(--space-lg);">
                            <?= htmlspecialchars($service['description']) ?>
                        </p>
                        <ul style="list-style: none; text-align: left;">
                            <?php foreach ($service['features'] as $feature): ?>
                                <li style="
                                    display: flex; 
                                    align-items: center; 
                                    gap: var(--space-sm); 
                                    margin-bottom: var(--space-sm);
                                    color: var(--text-secondary);
                                ">
                                    <svg width="16" height="16" viewBox="0 0 24 24" style="fill: var(--primary); flex-shrink: 0;">
                                        <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                                    </svg>
                                    <span><?= htmlspecialchars($feature) ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Domain Pricing -->
    <section class="section" style="background: var(--bg-secondary);">
        <div class="container">
            <div class="section-header">
                <h2>Domain Pricing</h2>
                <p>Transparent pricing with no hidden fees. All domains include free WHOIS privacy protection.</p>
            </div>
            
            <!-- Pricing Tabs -->
            <div class="pricing-tabs" style="
                display: flex;
                justify-content: center;
                gap: var(--space-md);
                margin: var(--space-2xl) 0;
                flex-wrap: wrap;
            ">
                <button class="tab-button active" data-tab="popular" style="
                    padding: var(--space-md) var(--space-lg);
                    background: var(--primary);
                    color: white;
                    border: none;
                    border-radius: var(--radius-full);
                    font-weight: 600;
                    cursor: pointer;
                    transition: all var(--transition-base);
                ">Popular</button>
                <button class="tab-button" data-tab="business" style="
                    padding: var(--space-md) var(--space-lg);
                    background: var(--bg-tertiary);
                    color: var(--text-secondary);
                    border: 1px solid var(--border);
                    border-radius: var(--radius-full);
                    font-weight: 600;
                    cursor: pointer;
                    transition: all var(--transition-base);
                ">Business</button>
                <button class="tab-button" data-tab="creative" style="
                    padding: var(--space-md) var(--space-lg);
                    background: var(--bg-tertiary);
                    color: var(--text-secondary);
                    border: 1px solid var(--border);
                    border-radius: var(--radius-full);
                    font-weight: 600;
                    cursor: pointer;
                    transition: all var(--transition-base);
                ">Creative</button>
                <button class="tab-button" data-tab="geographic" style="
                    padding: var(--space-md) var(--space-lg);
                    background: var(--bg-tertiary);
                    color: var(--text-secondary);
                    border: 1px solid var(--border);
                    border-radius: var(--radius-full);
                    font-weight: 600;
                    cursor: pointer;
                    transition: all var(--transition-base);
                ">Geographic</button>
            </div>

            <!-- Pricing Content -->
            <?php foreach ($domain_pricing as $category => $domains): ?>
                <div class="tab-content <?= $category === 'popular' ? 'active' : '' ?>" data-content="<?= $category ?>" style="<?= $category !== 'popular' ? 'display: none;' : '' ?>">
                    <div style="
                        display: grid; 
                        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); 
                        gap: var(--space-lg);
                    ">
                        <?php foreach ($domains as $extension => $details): ?>
                            <div style="
                                background: var(--bg-tertiary);
                                border: 1px solid var(--border);
                                border-radius: var(--radius-lg);
                                padding: var(--space-xl);
                                text-align: center;
                                transition: all var(--transition-base);
                            " class="domain-card">
                                <h3 style="
                                    color: var(--primary);
                                    font-size: var(--font-size-2xl);
                                    font-weight: 800;
                                    margin-bottom: var(--space-sm);
                                ">
                                    <?= htmlspecialchars($extension) ?>
                                </h3>
                                <p style="
                                    color: var(--text-secondary);
                                    font-size: var(--font-size-sm);
                                    margin-bottom: var(--space-lg);
                                    min-height: 40px;
                                ">
                                    <?= htmlspecialchars($details['description']) ?>
                                </p>
                                <div style="margin-bottom: var(--space-lg);">
                                    <div style="
                                        font-size: var(--font-size-3xl);
                                        font-weight: 800;
                                        color: var(--text-primary);
                                        margin-bottom: var(--space-xs);
                                    ">
                                        $<?= number_format($details['price'], 2) ?>
                                    </div>
                                    <div style="
                                        font-size: var(--font-size-sm);
                                        color: var(--text-muted);
                                    ">
                                        Renewal: $<?= number_format($details['renewal'], 2) ?>/year
                                    </div>
                                </div>
                                <button class="cta-button" style="width: 100%;" onclick="searchSpecificDomain('<?= $extension ?>')">
                                    Register Now
                                </button>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="features-container">
            <div class="section-header">
                <h2>Why Choose Our <span class="text-gradient">Domain Services</span>?</h2>
                <p>Premium domain management with all the features you need, included at no extra cost.</p>
            </div>
            <div class="features-grid">
                <?php foreach ($domain_features as $feature): ?>
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

    <!-- Domain Transfer Section -->
    <section class="section" style="background: var(--bg-secondary);">
        <div class="container">
            <div class="section-header">
                <h2>Transfer Your Domains</h2>
                <p>Move your domains to us and get a free 1-year extension plus better management tools.</p>
            </div>
            
            <div style="
                max-width: 600px;
                margin: var(--space-2xl) auto 0;
                background: var(--bg-tertiary);
                border: 1px solid var(--border);
                border-radius: var(--radius-lg);
                padding: var(--space-2xl);
                text-align: center;
            ">
                <h3 style="color: var(--text-primary); margin-bottom: var(--space-lg);">
                    Transfer Benefits
                </h3>
                <div style="
                    display: grid;
                    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                    gap: var(--space-lg);
                    margin-bottom: var(--space-xl);
                ">
                    <div>
                        <div style="
                            font-size: var(--font-size-2xl);
                            font-weight: 800;
                            color: var(--primary);
                            margin-bottom: var(--space-xs);
                        ">FREE</div>
                        <div style="color: var(--text-secondary); font-size: var(--font-size-sm);">
                            1-Year Extension
                        </div>
                    </div>
                    <div>
                        <div style="
                            font-size: var(--font-size-2xl);
                            font-weight: 800;
                            color: var(--primary);
                            margin-bottom: var(--space-xs);
                        ">$0</div>
                        <div style="color: var(--text-secondary); font-size: var(--font-size-sm);">
                            Transfer Fee
                        </div>
                    </div>
                    <div>
                        <div style="
                            font-size: var(--font-size-2xl);
                            font-weight: 800;
                            color: var(--primary);
                            margin-bottom: var(--space-xs);
                        ">0%</div>
                        <div style="color: var(--text-secondary); font-size: var(--font-size-sm);">
                            Downtime
                        </div>
                    </div>
                </div>
                <a href="/domain-transfer" class="cta-button">Start Transfer</a>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="section">
        <div class="container">
            <div class="section-header">
                <h2>Domain FAQ</h2>
                <p>Common questions about domain registration and management.</p>
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
                            Do you really provide free WHOIS privacy?
                        </h3>
                        <p>Yes! WHOIS privacy protection is included free with every domain registration. Your personal information stays private and protected from spam and identity theft.</p>
                    </div>
                    
                    <div class="faq-item" style="
                        background: var(--bg-secondary);
                        border: 1px solid var(--border);
                        border-radius: var(--radius-lg);
                        padding: var(--space-xl);
                    ">
                        <h3 style="color: var(--text-primary); margin-bottom: var(--space-md);">
                            Can I transfer my existing domains?
                        </h3>
                        <p>Absolutely! We offer free domain transfers with a complimentary 1-year extension. Our experts handle the entire process with zero downtime guaranteed.</p>
                    </div>
                    
                    <div class="faq-item" style="
                        background: var(--bg-secondary);
                        border: 1px solid var(--border);
                        border-radius: var(--radius-lg);
                        padding: var(--space-xl);
                    ">
                        <h3 style="color: var(--text-primary); margin-bottom: var(--space-md);">
                            What happens at renewal time?
                        </h3>
                        <p>We send renewal notices 60, 30, and 7 days before expiration. Renewal prices are clearly stated upfront - no surprise price increases or hidden fees.</p>
                    </div>
                    
                    <div class="faq-item" style="
                        background: var(--bg-secondary);
                        border: 1px solid var(--border);
                        border-radius: var(--radius-lg);
                        padding: var(--space-xl);
                    ">
                        <h3 style="color: var(--text-primary); margin-bottom: var(--space-md);">
                            Do I get full DNS control?
                        </h3>
                        <p>Yes! You get complete DNS management with our advanced editor. Add A records, CNAME, MX records, and more. Perfect for developers and advanced users.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>

    <script src="/assets/js/main.js"></script>
    <script src="/assets/js/components.js"></script>

    <script>
    // Domain page specific JavaScript
    document.addEventListener('DOMContentLoaded', function() {
        // Tab switching functionality
        const tabButtons = document.querySelectorAll('.tab-button');
        const tabContents = document.querySelectorAll('.tab-content');
        
        tabButtons.forEach(button => {
            button.addEventListener('click', function() {
                const targetTab = this.dataset.tab;
                
                // Remove active class from all buttons
                tabButtons.forEach(btn => {
                    btn.classList.remove('active');
                    btn.style.background = 'var(--bg-tertiary)';
                    btn.style.color = 'var(--text-secondary)';
                });
                
                // Add active class to clicked button
                this.classList.add('active');
                this.style.background = 'var(--primary)';
                this.style.color = 'white';
                
                // Hide all tab contents
                tabContents.forEach(content => {
                    content.style.display = 'none';
                    content.classList.remove('active');
                });
                
                // Show target tab content
                const targetContent = document.querySelector(`[data-content="${targetTab}"]`);
                if (targetContent) {
                    targetContent.style.display = 'block';
                    targetContent.classList.add('active');
                }
            });
        });
        
        // Domain card hover effects
        const domainCards = document.querySelectorAll('.domain-card');
        domainCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px)';
                this.style.borderColor = 'var(--primary)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
                this.style.borderColor = 'var(--border)';
            });
        });
        
        // Service card hover effects
        const serviceCards = document.querySelectorAll('.service-card');
        serviceCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px)';
                this.style.borderColor = 'var(--primary)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
                this.style.borderColor = 'var(--border)';
            });
        });
    });
    
    // Function to search for specific domain extension
    function searchSpecificDomain(extension) {
        const domainInput = document.getElementById('domain-input');
        if (domainInput) {
            const currentValue = domainInput.value.replace(/\.[a-z]+$/i, '');
            domainInput.value = currentValue + extension;
            domainInput.focus();
            
            // Scroll to search form
            document.querySelector('.domain-search').scrollIntoView({
                behavior: 'smooth',
                block: 'center'
            });
        }
    }
    </script>
</body>
</html>
