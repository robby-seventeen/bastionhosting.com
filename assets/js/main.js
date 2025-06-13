/**
 * Bastion Hosting - Main JavaScript
 * A 17 Solutions LLC Company
 * 
 * Modern, performant, privacy-focused JavaScript
 * No tracking, no analytics, just functionality
 */

'use strict';

// Main application object
const BastionApp = {
    // Configuration
    config: {
        animationDuration: 300,
        scrollOffset: 50,
        debounceDelay: 100
    },

    // Initialize the application
    init() {
        this.setupEventListeners();
        this.initializeAnimations();
        this.initializeNavigation();
        this.initializeDomainSearch();
        console.log('Bastion Hosting loaded successfully');
    },

    // Event listeners
    setupEventListeners() {
        // DOM Content Loaded
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', () => this.onDOMReady());
        } else {
            this.onDOMReady();
        }

        // Window events
        window.addEventListener('scroll', this.debounce(() => this.handleScroll(), this.config.debounceDelay));
        window.addEventListener('resize', this.debounce(() => this.handleResize(), this.config.debounceDelay));
        window.addEventListener('load', () => this.onWindowLoad());
    },

    // DOM ready handler
    onDOMReady() {
        this.initializeNavigation();
        this.initializeSmoothScrolling();
        this.initializeAnimations();
    },

    // Window load handler
    onWindowLoad() {
        // Performance monitoring (privacy-friendly)
        const loadTime = Math.round(performance.now());
        console.log(`Page loaded in ${loadTime}ms`);
        
        // Hide loading indicators if any
        this.hideLoadingIndicators();
    },

    // Navigation functionality
    initializeNavigation() {
        const navbar = document.getElementById('navbar');
        if (!navbar) return;

        // Mobile menu toggle (if implemented)
        const mobileToggle = navbar.querySelector('.mobile-toggle');
        if (mobileToggle) {
            mobileToggle.addEventListener('click', () => this.toggleMobileMenu());
        }

        // Active navigation highlighting
        this.updateActiveNavigation();
    },

    // Smooth scrolling for anchor links
    initializeSmoothScrolling() {
        const anchorLinks = document.querySelectorAll('a[href^="#"]');
        
        anchorLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                const targetId = link.getAttribute('href');
                const targetElement = document.querySelector(targetId);
                
                if (targetElement) {
                    const offsetTop = targetElement.offsetTop - 80; // Account for fixed navbar
                    
                    window.scrollTo({
                        top: offsetTop,
                        behavior: 'smooth'
                    });
                }
            });
        });
    },

    // Scroll event handler
    handleScroll() {
        this.updateNavbarOnScroll();
        this.updateActiveNavigation();
        this.handleScrollAnimations();
    },

    // Update navbar appearance on scroll
    updateNavbarOnScroll() {
        const navbar = document.getElementById('navbar');
        if (!navbar) return;

        if (window.scrollY > this.config.scrollOffset) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    },

    // Update active navigation item based on scroll position
    updateActiveNavigation() {
        const sections = document.querySelectorAll('section[id]');
        const navLinks = document.querySelectorAll('.nav-links a[href^="#"]');
        
        let currentSection = '';
        
        sections.forEach(section => {
            const sectionTop = section.offsetTop - 100;
            const sectionHeight = section.offsetHeight;
            
            if (window.scrollY >= sectionTop && window.scrollY < sectionTop + sectionHeight) {
                currentSection = section.getAttribute('id');
            }
        });

        navLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href') === `#${currentSection}`) {
                link.classList.add('active');
            }
        });
    },

    // Initialize scroll-based animations
    initializeAnimations() {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fade-in-up');
                    // Unobserve after animation to improve performance
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        // Observe elements for animation
        const animatedElements = document.querySelectorAll('.feature-card, .pricing-card, .domain-container');
        animatedElements.forEach(el => observer.observe(el));
    },

    // Handle scroll animations manually for better control
    handleScrollAnimations() {
        const elements = document.querySelectorAll('[data-animate="scroll"]');
        
        elements.forEach(element => {
            const elementTop = element.getBoundingClientRect().top;
            const elementVisible = 150;
            
            if (elementTop < window.innerHeight - elementVisible) {
                element.classList.add('animate-fade-in-up');
            }
        });
    },

    // Domain search functionality
    initializeDomainSearch() {
        const searchButton = document.querySelector('[onclick="searchDomain()"]');
        const searchInput = document.getElementById('domain-input');
        
        if (searchButton && searchInput) {
            // Remove inline onclick and add proper event listener
            searchButton.removeAttribute('onclick');
            searchButton.addEventListener('click', () => this.handleDomainSearch());
            
            // Add enter key support
            searchInput.addEventListener('keypress', (e) => {
                if (e.key === 'Enter') {
                    this.handleDomainSearch();
                }
            });

            // Add input validation
            searchInput.addEventListener('input', (e) => this.validateDomainInput(e.target));
        }
    },

    // Domain search handler
    handleDomainSearch() {
        const input = document.getElementById('domain-input');
        const domain = input?.value.trim();
        
        if (!domain) {
            this.showNotification('Please enter a domain name to search', 'warning');
            return;
        }

        if (!this.isValidDomain(domain)) {
            this.showNotification('Please enter a valid domain name', 'error');
            return;
        }

        // Show loading state
        this.setDomainSearchLoading(true);
        
        // Simulate API call (replace with actual implementation)
        setTimeout(() => {
            this.setDomainSearchLoading(false);
            this.showDomainResults(domain);
        }, 1500);
    },

    // Validate domain input
    validateDomainInput(input) {
        const value = input.value.trim();
        const isValid = this.isValidDomain(value) || value === '';
        
        input.classList.toggle('invalid', !isValid && value !== '');
        return isValid;
    },

    // Basic domain validation
    isValidDomain(domain) {
        const domainRegex = /^[a-zA-Z0-9][a-zA-Z0-9-]{0,61}[a-zA-Z0-9]?\.[a-zA-Z]{2,}$/;
        return domainRegex.test(domain) && domain.length <= 253;
    },

    // Set loading state for domain search
    setDomainSearchLoading(isLoading) {
        const button = document.querySelector('.search-form .cta-button');
        const input = document.getElementById('domain-input');
        
        if (button) {
            button.disabled = isLoading;
            button.textContent = isLoading ? 'Searching...' : 'Search';
        }
        
        if (input) {
            input.disabled = isLoading;
        }
    },

    // Show domain search results
    showDomainResults(domain) {
        // This would integrate with actual domain API
        // For now, show a placeholder modal or notification
        this.showNotification(
            `Searching for "${domain}" - AI-enhanced search and Blesta integration coming soon!`, 
            'info'
        );
    },

    // Notification system
    showNotification(message, type = 'info') {
        const notification = document.createElement('div');
        notification.className = `notification notification-${type}`;
        notification.textContent = message;
        
        // Style the notification
        Object.assign(notification.style, {
            position: 'fixed',
            top: '20px',
            right: '20px',
            padding: '12px 24px',
            borderRadius: '8px',
            color: 'white',
            fontWeight: '500',
            zIndex: '10000',
            maxWidth: '400px',
            opacity: '0',
            transform: 'translateY(-20px)',
            transition: 'all 0.3s ease'
        });

        // Set background color based on type
        const colors = {
            info: '#0066ff',
            success: '#00aa44',
            warning: '#ff8800',
            error: '#ff4444'
        };
        notification.style.backgroundColor = colors[type] || colors.info;

        document.body.appendChild(notification);

        // Animate in
        setTimeout(() => {
            notification.style.opacity = '1';
            notification.style.transform = 'translateY(0)';
        }, 10);

        // Auto remove after 5 seconds
        setTimeout(() => {
            notification.style.opacity = '0';
            notification.style.transform = 'translateY(-20px)';
            setTimeout(() => notification.remove(), 300);
        }, 5000);
    },

    // Mobile menu toggle
    toggleMobileMenu() {
        const navbar = document.getElementById('navbar');
        const mobileMenu = navbar?.querySelector('.nav-links');
        
        if (mobileMenu) {
            mobileMenu.classList.toggle('mobile-open');
        }
    },

    // Resize handler
    handleResize() {
        // Handle any resize-specific logic
        this.updateActiveNavigation();
    },

    // Hide loading indicators
    hideLoadingIndicators() {
        const loaders = document.querySelectorAll('.loading, .skeleton');
        loaders.forEach(loader => {
            loader.style.opacity = '0';
            setTimeout(() => loader.remove(), 300);
        });
    },

    // Utility: Debounce function
    debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    },

    // Utility: Throttle function
    throttle(func, limit) {
        let inThrottle;
        return function(...args) {
            if (!inThrottle) {
                func.apply(this, args);
                inThrottle = true;
                setTimeout(() => inThrottle = false, limit);
            }
        };
    },

    // Performance monitoring
    trackPerformance() {
        if ('performance' in window) {
            const perfData = performance.getEntriesByType('navigation')[0];
            const metrics = {
                loadTime: Math.round(perfData.loadEventEnd - perfData.loadEventStart),
                domReady: Math.round(perfData.domContentLoadedEventEnd - perfData.domContentLoadedEventStart),
                firstByte: Math.round(perfData.responseStart - perfData.requestStart)
            };
            
            console.log('Performance Metrics:', metrics);
            
            // In production, you could send this to your own analytics
            // (privacy-friendly, no third-party tracking)
        }
    }
};

// Global functions for backward compatibility
window.searchDomain = () => BastionApp.handleDomainSearch();

// Initialize when DOM is ready
BastionApp.init();

// Track performance on load
window.addEventListener('load', () => BastionApp.trackPerformance());

// Export for module systems
if (typeof module !== 'undefined' && module.exports) {
    module.exports = BastionApp;
}
