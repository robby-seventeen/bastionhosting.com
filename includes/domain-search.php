<?php
/**
 * Domain Search Section Component
 * Bastion Hosting - A 17 Solutions LLC Company
 */

$popular_extensions = [
    '.com' => '$12.99',
    '.net' => '$14.99', 
    '.org' => '$13.99',
    '.io' => '$49.99',
    '.app' => '$18.99',
    '.dev' => '$15.99'
];
?>

<section class="domain-search" id="domains">
    <div class="domain-container">
        <div class="section-header">
            <h2>Find Your Perfect Domain</h2>
            <p>AI-powered domain suggestions with transparent pricing. No surprises, no games.</p>
        </div>
        
        <form class="search-form" id="domain-search-form" method="post" action="/domain-check">
            <input type="text" 
                   id="domain-input" 
                   name="domain" 
                   class="search-input" 
                   placeholder="Enter your domain name..." 
                   required
                   autocomplete="off"
                   pattern="[a-zA-Z0-9.-]+"
                   title="Domain name can only contain letters, numbers, dots, and hyphens">
            <div class="ai-badge">AI Enhanced</div>
            <button type="submit" class="cta-button">Search</button>
        </form>
        
        <div id="domain-suggestions" class="domain-suggestions" style="display: none;"></div>
        
        <!-- Popular Extensions -->
        <div class="popular-extensions" style="margin-top: 3rem;">
            <h3 style="text-align: center; margin-bottom: 1.5rem; color: var(--text-secondary);">
                Popular Extensions
            </h3>
            <div class="extensions-grid" style="
                display: grid; 
                grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); 
                gap: 1rem; 
                max-width: 600px; 
                margin: 0 auto;
            ">
                <?php foreach ($popular_extensions as $ext => $price): ?>
                    <div class="extension-item" style="
                        background: var(--bg-tertiary);
                        border: 1px solid var(--border);
                        border-radius: var(--radius-lg);
                        padding: 1rem;
                        text-align: center;
                        transition: all var(--transition-base);
                    ">
                        <span class="ext-name" style="
                            font-weight: 700;
                            color: var(--text-primary);
                            display: block;
                            margin-bottom: 0.5rem;
                        "><?= htmlspecialchars($ext) ?></span>
                        <span class="ext-price" style="
                            color: var(--primary);
                            font-weight: 600;
                        "><?= htmlspecialchars($price) ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<style>
.domain-suggestions {
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    background: var(--bg-tertiary);
    border: 1px solid var(--border);
    border-top: none;
    border-radius: 0 0 var(--radius-xl) var(--radius-xl);
    max-height: 300px;
    overflow-y: auto;
    z-index: 100;
}

.suggestion-item {
    padding: var(--space-md);
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid var(--border);
    cursor: pointer;
    transition: background-color var(--transition-base);
}

.suggestion-item:hover {
    background: var(--bg-secondary);
}

.suggestion-item:last-child {
    border-bottom: none;
}

.domain-name {
    font-weight: 600;
    color: var(--text-primary);
}

.availability {
    font-size: var(--font-size-sm);
    padding: var(--space-xs) var(--space-sm);
    border-radius: var(--radius-full);
    font-weight: 500;
}

.availability.available {
    background: rgba(0, 170, 68, 0.2);
    color: #00aa44;
}

.availability.unavailable {
    background: rgba(255, 68, 68, 0.2);
    color: #ff4444;
}

.btn-small {
    padding: var(--space-xs) var(--space-sm);
    font-size: var(--font-size-xs);
    background: var(--gradient-primary);
    color: white;
    border: none;
    border-radius: var(--radius-md);
    cursor: pointer;
    transition: all var(--transition-base);
}

.btn-small:hover {
    transform: translateY(-1px);
}

.extension-item:hover {
    transform: translateY(-2px);
    border-color: var(--primary);
}

.search-form {
    position: relative;
}
</style>
