<?php
/**
 * Pricing Section Component
 * Bastion Hosting - A 17 Solutions LLC Company
 */

$pricing_plans = [
    [
        'name' => 'Shared Plus',
        'description' => 'Perfect for personal sites and small businesses',
        'price' => '$9',
        'period' => '/month',
        'featured' => false,
        'features' => [
            '20GB NVMe SSD Storage',
            'Unlimited Bandwidth',
            '5 Websites Maximum',
            'Free SSL Certificate',
            'Daily Backups',
            'cPanel Control Panel',
            'Email Support'
        ],
        'cta_text' => 'Get Started',
        'cta_url' => '/checkout?plan=shared-plus'
    ],
    [
        'name' => 'Business Pro',
        'description' => 'For growing businesses that need more power',
        'price' => '$19',
        'period' => '/month',
        'featured' => true,
        'features' => [
            '100GB NVMe SSD Storage',
            'Unlimited Bandwidth',
            '25 Websites Maximum',
            'Priority Support',
            'Free SSL Certificate',
            'Hourly Backups',
            'Advanced Security',
            'Performance Monitoring'
        ],
        'cta_text' => 'Get Started',
        'cta_url' => '/checkout?plan=business-pro'
    ],
    [
        'name' => 'Enterprise',
        'description' => 'For high-traffic sites and applications',
        'price' => '$39',
        'period' => '/month',
        'featured' => false,
        'features' => [
            '500GB NVMe SSD Storage',
            'Unlimited Bandwidth',
            'Unlimited Websites',
            'White-Glove Support',
            'Custom Server Config',
            'Advanced Monitoring',
            'CDN Integration',
            'Dedicated Resources'
        ],
        'cta_text' => 'Contact Sales',
        'cta_url' => '/contact?plan=enterprise'
    ]
];
?>

<section class="pricing" id="hosting">
    <div class="pricing-container">
        <div class="section-header">
            <h2>Hosting That Actually Works</h2>
            <p>No overselling. No hidden limits. No corporate BS. Just fast, reliable hosting with real support.</p>
        </div>
        <div class="pricing-grid">
            <?php foreach ($pricing_plans as $plan): ?>
                <div class="pricing-card<?= $plan['featured'] ? ' featured' : '' ?>" data-animate="scroll">
                    <h3 class="plan-name"><?= htmlspecialchars($plan['name']) ?></h3>
                    <p class="plan-description"><?= htmlspecialchars($plan['description']) ?></p>
                    <div class="plan-price">
                        <?= htmlspecialchars($plan['price']) ?>
                        <span><?= htmlspecialchars($plan['period']) ?></span>
                    </div>
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
                    <a href="<?= htmlspecialchars($plan['cta_url']) ?>" 
                       class="cta-button"
                       data-plan="<?= htmlspecialchars(strtolower(str_replace(' ', '-', $plan['name']))) ?>">
                        <?= htmlspecialchars($plan['cta_text']) ?>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
        
        <!-- Additional pricing info -->
        <div class="pricing-footer" style="text-align: center; margin-top: 2rem; color: var(--text-secondary);">
            <p>All plans include 99.9% uptime guarantee, free migrations, and no setup fees.</p>
            <p><strong>30-day money-back guarantee</strong> - No questions asked.</p>
        </div>
    </div>
</section>
