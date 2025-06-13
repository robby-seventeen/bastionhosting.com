/**
 * Bastion Hosting - Component JavaScript
 * A 17 Solutions LLC Company
 * 
 * Component-specific functionality and interactions
 */

'use strict';

// Component modules
const Components = {
    
    // Pricing component functionality
    Pricing: {
        init() {
            this.setupPlanComparison();
            this.setupPlanSelection();
        },

        setupPlanComparison() {
            const compareButtons = document.querySelectorAll('[data-action="compare-plans"]');
            compareButtons.forEach(button => {
                button.addEventListener('click', () => this.showComparison());
            });
        },

        setupPlanSelection() {
            const planButtons = document.querySelectorAll('.pricing-card .cta-button');
            planButtons.forEach(button => {
                button.addEventListener('click', (e) => {
                    e.preventDefault();
                    const planCard = button.closest('.pricing-card');
                    const planName = planCard.querySelector('.plan-name').textContent;
                    this.selectPlan(planName, button.href);
                });
            });
        },

        selectPlan(planName, planUrl) {
            // Store selected plan in sessionStorage for Blesta integration
            sessionStorage.setItem('selectedPlan', JSON.stringify({
                name: planName,
                url: planUrl,
                timestamp: Date.now()
            }));

            // Show confirmation
            BastionApp.showNotification(`Selected ${planName} plan. Redirecting to checkout...`, 'success');
            
            // Redirect after brief delay
            setTimeout(() => {
                window.location.href = planUrl || '/checkout';
            }, 1500);
        },

        showComparison() {
            // This would open a comparison modal
            console.log('Plan comparison feature coming soon');
            BastionApp.showNotification('Plan comparison feature coming soon!', 'info');
        }
    },

    // Domain search enhanced functionality
    DomainSearch: {
        cache: new Map(),
        
        init() {
            this.setupAdvancedSearch();
            this.setupSuggestions();
        },

        setupAdvancedSearch() {
            const searchInput = document.getElementById('domain-input');
            if (!searchInput) return;

            // Real-time suggestions as user types
            let timeoutId;
            searchInput.addEventListener('input', (e) => {
                clearTimeout(timeoutId);
                timeoutId = setTimeout(() => {
                    this.showSuggestions(e.target.value);
                }, 300);
            });
        },

        setupSuggestions() {
            // Create suggestions dropdown container
            const searchForm = document.querySelector('.search-form');
            if (searchForm && !document.getElementById('domain-suggestions')) {
                const suggestionsEl = document.createElement('div');
                suggestionsEl.id = 'domain-suggestions';
                suggestionsEl.className = 'domain-suggestions';
                searchForm.appendChild(suggestionsEl);
            }
        },

        async showSuggestions(query) {
            if (!query || query.length < 2) {
                this.hideSuggestions();
                return;
            }

            const suggestionsEl = document.getElementById('domain-suggestions');
            if (!suggestionsEl) return;

            // Check cache first
            if (this.cache.has(query)) {
                this.renderSuggestions(this.cache.get(query));
                return;
            }

            // Simulate AI-powered suggestions (replace with actual API)
            const suggestions = this.generateAISuggestions(query);
            this.cache.set(query, suggestions);
            this.renderSuggestions(suggestions);
        },

        generateAISuggestions(query) {
            // Simulate AI suggestions based on query
            const extensions = ['.com', '.net', '.org', '.io', '.app', '.dev', '.tech'];
            const prefixes = ['get', 'my', 'the', 'go', 'try'];
            const suffixes = ['hub', 'lab', 'pro', 'zone', 'space', 'cloud'];
            
            const suggestions = [];
            const baseQuery = query.toLowerCase().replace(/[^a-z0-9]/g, '');
            
            // Direct extensions
            extensions.forEach(ext => {
                suggestions.push({
                    domain: baseQuery + ext,
                    type: 'direct',
                    available: Math.random() > 0.3 // Simulate availability
                });
            });

            // Prefix suggestions
            prefixes.slice(0, 2).forEach(prefix => {
                suggestions.push({
                    domain: prefix + baseQuery + '.com',
                    type: 'prefix',
                    available: Math.random() > 0.5
                });
            });

            // Suffix suggestions
            suffixes.slice(0, 2).forEach(suffix => {
                suggestions.push({
                    domain: baseQuery + suffix + '.com',
                    type: 'suffix',
                    available: Math.random() > 0.4
                });
            });

            return suggestions.slice(0, 6); // Limit to 6 suggestions
        },

        renderSuggestions(suggestions) {
            const suggestionsEl = document.getElementById('domain-suggestions');
            if (!suggestionsEl || !suggestions.length) return;

            const html = suggestions.map(suggestion => `
                <div class="suggestion-item ${suggestion.available ? 'available' : 'unavailable'}" 
                     data-domain="${suggestion.domain}">
                    <span class="domain-name">${suggestion.domain}</span>
                    <span class="availability ${suggestion.available ? 'available' : 'unavailable'}">
                        ${suggestion.available ? 'Available' : 'Taken'}
                    </span>
                    ${suggestion.available ? '<button class="btn-small">Register</button>' : ''}
                </div>
            `).join('');

            suggestionsEl.innerHTML = html;
            suggestionsEl.style.display = 'block';

            // Add click handlers
            suggestionsEl.querySelectorAll('.suggestion-item').forEach(item => {
                item.addEventListener('click', () => {
                    const domain = item.dataset.domain;
                    document.getElementById('domain-input').value = domain;
                    this.hideSuggestions();
                });
            });
        },

        hideSuggestions() {
            const suggestionsEl = document.getElementById('domain-suggestions');
            if (suggestionsEl) {
                suggestionsEl.style.display = 'none';
            }
        }
    },

    // Feature cards interactions
    Features: {
        init() {
            this.setupFeatureModals();
            this.setupFeatureAnimations();
        },

        setupFeatureModals() {
            const featureCards = document.querySelectorAll('.feature-card');
            featureCards.forEach(card => {
                card.addEventListener('click', () => {
                    const featureTitle = card.querySelector('h3').textContent;
                    this.showFeatureDetail(featureTitle, card);
                });
            });
        },

        setupFeatureAnimations() {
            const cards = document.querySelectorAll('.feature-card');
            cards.forEach((card, index) => {
                card.style.animationDelay = `${index * 0.1}s`;
            });
        },

        showFeatureDetail(title, cardElement) {
            // Extract more details about the feature
            const description = cardElement.querySelector('p').textContent;
            
            // Create and show modal (simple implementation)
            const modal = this.createModal(title, description);
            document.body.appendChild(modal);
            
            // Show modal with animation
            setTimeout(() => {
                modal.classList.add('active');
            }, 10);
        },

        createModal(title, description) {
            const modal = document.createElement('div');
            modal.className = 'feature-modal';
            modal.innerHTML = `
                <div class="modal-backdrop"></div>
                <div class="modal-content">
                    <div class="modal-header">
                        <h3>${title}</h3>
                        <button class="modal-close">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>${description}</p>
                        <p>Learn more about how this feature can benefit your website and improve your hosting experience.</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn-secondary modal-close">Close</button>
                        <button class="cta-button">Get Started</button>
                    </div>
                </div>
            `;

            // Add close functionality
            modal.querySelectorAll('.modal-close, .modal-backdrop').forEach(el => {
                el.addEventListener('click', () => {
                    modal.classList.remove('active');
                    setTimeout(() => modal.remove(), 300);
                });
            });

            return modal;
        }
    },

    // Form handling
    Forms: {
        init() {
            this.setupContactForms();
            this.setupValidation();
        },

        setupContactForms() {
            const contactForms = document.querySelectorAll('form[data-form="contact"]');
            contactForms.forEach(form => {
                form.addEventListener('submit', (e) => this.handleContactSubmit(e));
            });
        },

        setupValidation() {
            const inputs = document.querySelectorAll('input[required], textarea[required]');
            inputs.forEach(input => {
                input.addEventListener('blur', () => this.validateField(input));
                input.addEventListener('input', () => this.clearFieldError(input));
            });
        },

        validateField(field) {
            const isValid = field.checkValidity();
            field.classList.toggle('invalid', !isValid);
            return isValid;
        },

        clearFieldError(field) {
            field.classList.remove('invalid');
        },

        async handleContactSubmit(e) {
            e.preventDefault();
            const form = e.target;
            const formData = new FormData(form);
            
            // Basic validation
            const isValid = Array.from(form.querySelectorAll('[required]'))
                .every(field => this.validateField(field));
            
            if (!isValid) {
                BastionApp.showNotification('Please fill in all required fields', 'error');
                return;
            }

            // Show loading state
            const submitBtn = form.querySelector('[type="submit"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Sending...';
            submitBtn.disabled = true;

            try {
                // Simulate form submission (replace with actual endpoint)
                await new Promise(resolve => setTimeout(resolve, 1500));
                
                BastionApp.showNotification('Thank you! We\'ll get back to you soon.', 'success');
                form.reset();
            } catch (error) {
                BastionApp.showNotification('Sorry, there was an error. Please try again.', 'error');
            } finally {
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
            }
        }
    },

    // Performance monitoring component
    Performance: {
        init() {
            this.trackPageLoad();
            this.trackUserInteractions();
        },

        trackPageLoad() {
            window.addEventListener('load', () => {
                if ('performance' in window) {
                    const perfData = performance.getEntriesByType('navigation')[0];
                    const metrics = {
                        loadTime: Math.round(perfData.loadEventEnd - perfData.loadEventStart),
                        domReady: Math.round(perfData.domContentLoadedEventEnd - perfData.domContentLoadedEventStart),
                        firstByte: Math.round(perfData.responseStart - perfData.requestStart)
                    };
                    
                    // Store metrics (could send to your own analytics service)
                    this.storeMetrics('pageLoad', metrics);
                }
            });
        },

        trackUserInteractions() {
            // Track CTA clicks
            document.querySelectorAll('.cta-button').forEach(button => {
                button.addEventListener('click', (e) => {
                    this.storeMetrics('ctaClick', {
                        text: button.textContent.trim(),
                        url: button.href || 'javascript:void(0)',
                        timestamp: Date.now()
                    });
                });
            });
        },

        storeMetrics(event, data) {
            // Store in localStorage for now (could send to your analytics endpoint)
            const metrics = JSON.parse(localStorage.getItem('bastionMetrics') || '[]');
            metrics.push({ event, data, timestamp: Date.now() });
            
            // Keep only last 100 metrics
            if (metrics.length > 100) {
                metrics.splice(0, metrics.length - 100);
            }
            
            localStorage.setItem('bastionMetrics', JSON.stringify(metrics));
        }
    }
};

// Initialize all components when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    Components.Pricing.init();
    Components.DomainSearch.init();
    Components.Features.init();
    Components.Forms.init();
    Components.Performance.init();
});

// Export for use in other scripts
window.Components = Components;
