<?php
// Bastion Hosting - Main Index Page
// A 17 Solutions LLC Company

// Basic security headers
header("X-Content-Type-Options: nosniff");
header("X-Frame-Options: DENY");
header("X-XSS-Protection: 1; mode=block");
header("Referrer-Policy: strict-origin-when-cross-origin");

// No tracking, no analytics - we respect privacy
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bastion Hosting - Premium Web Hosting & Cloud Solutions</title>
    <meta name="description" content="Premium web hosting without the corporate nonsense. Bastion Hosting delivers enterprise-grade infrastructure with personal service.">
    <meta name="keywords" content="web hosting, VPS hosting, managed hosting, premium hosting, dedicated servers">
    <meta name="author" content="Bastion Hosting - A 17 Solutions LLC Company">
    
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="/assets/images/favicon.svg">
    <link rel="icon" type="image/png" href="/assets/images/favicon.png">
    
    <!-- Preload critical fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- CSS -->
    <link rel="stylesheet" href="/assets/css/styles.css">
    <link rel="stylesheet" href="/assets/css/components.css">
    
    <!-- JSON-LD Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "Bastion Hosting",
        "url": "https://bastionhosting.com",
        "logo": "https://bastionhosting.com/assets/images/logo.svg",
        "description": "Premium web hosting without the corporate nonsense",
        "parentOrganization": {
            "@type": "Organization",
            "name": "17 Solutions LLC"
        }
    }
    </script>
</head>
<body>
    <!-- Navigation -->
    <?php include 'includes/navigation.php'; ?>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="hero-container">
            <h1 class="animate-fade-in-up">
                Premium Hosting<br>
                <span class="hero-gradient">Without the Corporate BS</span>
            </h1>
            <p class="animate-fade-in-up">
                We're not trying to be the biggest. We're focused on being the best. 
                Enterprise-grade infrastructure with personal service, minus the big tech surveillance.
            </p>
            <div class="hero-buttons animate-fade-in-up">
                <a href="#hosting" class="cta-button">View Hosting Plans</a>
                <a href="/contact" class="btn-secondary">Talk to a Human</a>
            </div>
            <div class="trust-indicators animate-fade-in-up">
                <div class="trust-item">
                    <svg class="trust-icon" viewBox="0 0 24 24">
                        <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z"/>
                    </svg>
                    <span>100% Uptime SLA</span>
                </div>
                <div class="trust-item">
                    <svg class="trust-icon" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                    </svg>
                    <span>No Overselling</span>
                </div>
                <div class="trust-item">
                    <svg class="trust-icon" viewBox="0 0 24 24">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                    </svg>
                    <span>US-Based Support</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <?php include 'includes/features-section.php'; ?>

    <!-- Domain Search Section -->
    <?php include 'includes/domain-search.php'; ?>

    <!-- Pricing Section -->
    <?php include 'includes/pricing-section.php'; ?>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

    <!-- JavaScript -->
    <script src="/assets/js/main.js"></script>
    <script src="/assets/js/components.js"></script>
    
    <!-- Performance monitoring (privacy-friendly) -->
    <script>
        // Basic performance monitoring without tracking
        window.addEventListener('load', function() {
            const loadTime = performance.now().toFixed(0);
            console.log(`Page loaded in ${loadTime}ms`);
        });
    </script>
</body>
</html>
