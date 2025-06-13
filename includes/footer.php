<?php
/**
 * Footer Component
 * Bastion Hosting - A 17 Solutions LLC Company
 */

$footer_sections = [
    'Company' => [
        'About Us' => '/about',
        'Contact' => '/contact',
        'Careers' => '/careers',
        'Blog' => '/blog'
    ],
    'Services' => [
        'Shared Hosting' => '/hosting',
        'VPS Hosting' => '/vps',
        'Managed Hosting' => '/managed',
        'Domain Names' => '/domains'
    ],
    'Support' => [
        'Help Center' => '/support',
        'System Status' => '/status',
        'Contact Support' => '/contact-support',
        'Server Locations' => '/locations'
    ],
    'Legal' => [
        'Terms of Service' => '/terms',
        'Privacy Policy' => '/privacy',
        'Acceptable Use' => '/aup',
        'GDPR Compliance' => '/gdpr'
    ]
];

$social_links = [
    'twitter' => '#',
    'linkedin' => '#',
    'github' => '#'
];
?>

<footer class="footer">
    <div class="footer-container">
        <div class="footer-grid">
            <!-- Company Info -->
            <div class="footer-section">
                <div class="footer-logo" style="margin-bottom: var(--space-lg);">
                    <h3 class="text-gradient" style="font-size: var(--font-size-xl); margin-bottom: var(--space-sm);">
                        Bastion Hosting
                    </h3>
                    <p style="color: var(--text-secondary); font-size: var(--font-size-sm); line-height: 1.6;">
                        Premium web hosting without the corporate nonsense. 
                        Built by developers, for developers.
                    </p>
                </div>
                
                <!-- Social Links -->
                <div class="social-links" style="display: flex; gap: var(--space-md);">
                    <?php foreach ($social_links as $platform => $url): ?>
                        <a href="<?= htmlspecialchars($url) ?>" 
                           class="social-link"
                           aria-label="Follow us on <?= ucfirst($platform) ?>"
                           style="
                               display: flex;
                               align-items: center;
                               justify-content: center;
                               width: 40px;
                               height: 40px;
                               background: var(--bg-tertiary);
                               border-radius: var(--radius-md);
                               transition: all var(--transition-base);
                           ">
                            <?php if ($platform === 'twitter'): ?>
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"/>
                                </svg>
                            <?php elseif ($platform === 'linkedin'): ?>
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"/>
                                    <circle cx="4" cy="4" r="2"/>
                                </svg>
                            <?php elseif ($platform === 'github'): ?>
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 00-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0020 4.77 5.07 5.07 0 0019.91 1S18.73.65 16 2.48a13.38 13.38 0 00-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 005 4.77a5.44 5.44 0 00-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 009 18.13V22"/>
                                </svg>
                            <?php endif; ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
            
            <!-- Footer Sections -->
            <?php foreach ($footer_sections as $section_title => $links): ?>
                <div class="footer-section">
                    <h4><?= htmlspecialchars($section_title) ?></h4>
                    <ul>
                        <?php foreach ($links as $link_text => $url): ?>
                            <li>
                                <a href="<?= htmlspecialchars($url) ?>">
                                    <?= htmlspecialchars($link_text) ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endforeach; ?>
        </div>
        
        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: var(--space-md);">
                <div>
                    <p>&copy; <?= date('Y') ?> Bastion Hosting - A 17 Solutions LLC Company. All rights reserved.</p>
                </div>
                <div style="display: flex; gap: var(--space-lg); align-items: center;">
                    <span style="color: var(--text-muted); font-size: var(--font-size-xs);">
                        Hosted with ❤️ in the USA
                    </span>
                    <div class="trust-badges" style="display: flex; gap: var(--space-md); align-items: center;">
                        <span style="
                            background: var(--bg-tertiary);
                            padding: var(--space-xs) var(--space-sm);
                            border-radius: var(--radius-sm);
                            font-size: var(--font-size-xs);
                            color: var(--text-secondary);
                        ">99.9% Uptime</span>
                        <span style="
                            background: var(--bg-tertiary);
                            padding: var(--space-xs) var(--space-sm);
                            border-radius: var(--radius-sm);
                            font-size: var(--font-size-xs);
                            color: var(--text-secondary);
                        ">No Tracking</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
.social-link:hover {
    background: var(--primary) !important;
    color: white;
    transform: translateY(-2px);
}

@media (max-width: 768px) {
    .footer-bottom > div {
        flex-direction: column;
        text-align: center;
    }
    
    .trust-badges {
        justify-content: center;
    }
}
</style>
