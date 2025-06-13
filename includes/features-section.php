<?php
/**
 * Features Section Component
 * Bastion Hosting - A 17 Solutions LLC Company
 */

$features = [
    [
        'icon' => '<path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z"/>',
        'title' => 'Never Oversold',
        'description' => 'We actually provision the resources we promise. No hidden limits, no surprise slowdowns. Your site gets the performance you paid for, guaranteed.'
    ],
    [
        'icon' => '<path d="M13 3c-4.97 0-9 4.03-9 9H1l3.89 3.89.07.14L9 12H6c0-3.87 3.13-7 7-7s7 3.13 7 7-3.13 7-7 7c-1.93 0-3.68-.79-4.94-2.06l-1.42 1.42C8.27 19.99 10.51 21 13 21c4.97 0 9-4.03 9-9s-4.03-9-9-9z"/>',
        'title' => 'Lightning Fast',
        'description' => 'NVMe SSD storage, enterprise-grade caching, and our custom-tuned servers deliver sub-second load times. Speed isn\'t extra - it\'s standard.'
    ],
    [
        'icon' => '<path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.94-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"/>',
        'title' => 'Privacy First',
        'description' => 'No Google Analytics spying on your visitors. No data mining. No corporate surveillance. Your data stays yours, period.'
    ],
    [
        'icon' => '<path d="M12 2c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2zm9 7h-6v13h-2v-6h-2v6H9V9H3V7h18v2z"/>',
        'title' => 'Human Support',
        'description' => 'Real people, based in the US, who actually know hosting. No chatbots, no offshore call centers. When you need help, you get an expert.'
    ],
    [
        'icon' => '<path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>',
        'title' => 'Transparent Pricing',
        'description' => 'No hidden fees, no surprise renewals at 10x the price. What you see is what you pay, forever. We make money by being great, not by being sneaky.'
    ],
    [
        'icon' => '<path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>',
        'title' => 'Enterprise Grade',
        'description' => 'Military-grade security, 99.9% uptime guarantee, and infrastructure that scales. We run Fortune 500 workloads - your blog will be just fine.'
    ]
];
?>

<section class="features" id="features">
    <div class="features-container">
        <div class="section-header">
            <h2>Why Choose <span class="text-gradient">Bastion</span>?</h2>
            <p>We're building hosting the way it should be: fast, secure, and focused on your success.</p>
        </div>
        <div class="features-grid">
            <?php foreach ($features as $index => $feature): ?>
                <div class="feature-card" data-animate="scroll" style="animation-delay: <?= $index * 0.1 ?>s">
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
