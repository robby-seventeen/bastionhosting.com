<?php
/**
 * Navigation Component
 * Bastion Hosting - A 17 Solutions LLC Company
 */

// Get current page for active navigation
$current_page = basename($_SERVER['PHP_SELF'], '.php');
$nav_items = [
    'home' => ['url' => '/', 'label' => 'Home'],
    'hosting' => ['url' => '/hosting.php', 'label' => 'Hosting'],
    'vps' => ['url' => '/vps.php', 'label' => 'VPS'],
    'domains' => ['url' => '/domains.php', 'label' => 'Domains'],
    'support' => ['url' => '/support.php', 'label' => 'Support']
];
?>

<nav class="nav" id="navbar">
    <div class="nav-container">
        <div class="logo">
            <a href="/" aria-label="Bastion Hosting Home">
                Bastion Hosting
            </a>
        </div>
        
        <ul class="nav-links" role="menubar">
            <?php foreach ($nav_items as $key => $item): ?>
                <li role="none">
                    <a href="<?= htmlspecialchars($item['url']) ?>" 
                       role="menuitem"
                       <?= ($current_page === $key || ($current_page === 'index' && $key === 'home')) ? 'class="active"' : '' ?>>
                        <?= htmlspecialchars($item['label']) ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
        
        <div class="nav-actions">
            <a href="/client-portal" class="cta-button" aria-label="Access Client Portal">
                Client Portal
            </a>
            <button class="mobile-toggle" aria-label="Toggle mobile menu" aria-expanded="false">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"/>
                </svg>
            </button>
        </div>
    </div>
</nav>
