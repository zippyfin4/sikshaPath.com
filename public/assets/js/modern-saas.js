// Modern SaaS JavaScript for Enhanced Interactions
document.addEventListener('DOMContentLoaded', function() {
    
    // Initialize currency toggle
    initializeCurrencyToggle();
    
    // Initialize pricing card animations
    initializePricingAnimations();
    
    // Initialize smooth scrolling
    initializeSmoothScrolling();
    
    // Initialize interactive effects
    initializeInteractiveEffects();
});

// Currency Toggle Functionality
function initializeCurrencyToggle() {
    const currencyToggle = document.getElementById('currencyToggle');
    const currencyLabels = document.querySelectorAll('.currency-label');
    const usdPrices = document.querySelectorAll('.usd-price');
    const inrPrices = document.querySelectorAll('.inr-price');
    
    if (!currencyToggle) return;
    
    // Set initial state
    updateCurrencyLabels(false);
    
    currencyToggle.addEventListener('change', function() {
        const isINR = this.checked;
        
        // Update currency labels
        updateCurrencyLabels(isINR);
        
        // Toggle price visibility with animation
        togglePrices(isINR);
    });
    
    function updateCurrencyLabels(isINR) {
        currencyLabels.forEach(label => {
            label.classList.remove('active');
            if ((label.dataset.currency === 'inr' && isINR) || 
                (label.dataset.currency === 'usd' && !isINR)) {
                label.classList.add('active');
            }
        });
    }
    
    function togglePrices(showINR) {
        if (showINR) {
            usdPrices.forEach(price => {
                price.style.animation = 'fadeOut 0.3s ease-out forwards';
                setTimeout(() => {
                    price.style.display = 'none';
                }, 300);
            });
            
            setTimeout(() => {
                inrPrices.forEach(price => {
                    price.style.display = 'flex';
                    price.style.animation = 'fadeIn 0.3s ease-out forwards';
                });
            }, 300);
        } else {
            inrPrices.forEach(price => {
                price.style.animation = 'fadeOut 0.3s ease-out forwards';
                setTimeout(() => {
                    price.style.display = 'none';
                }, 300);
            });
            
            setTimeout(() => {
                usdPrices.forEach(price => {
                    price.style.display = 'flex';
                    price.style.animation = 'fadeIn 0.3s ease-out forwards';
                });
            }, 300);
        }
    }
}

// Pricing Card Animations
function initializePricingAnimations() {
    const pricingCards = document.querySelectorAll('.pricing-card');
    
    // Staggered entrance animation
    pricingCards.forEach((card, index) => {
        card.style.animationDelay = `${index * 0.1}s`;
        
        // Add hover effects
        card.addEventListener('mouseenter', function() {
            this.style.transform = this.classList.contains('featured') 
                ? 'translateY(-10px) scale(1.07)' 
                : 'translateY(-10px) scale(1.02)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = this.classList.contains('featured') 
                ? 'scale(1.05)' 
                : 'translateY(0) scale(1)';
        });
    });
    
    // Animate numbers on scroll
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateNumbers(entry.target);
            }
        });
    }, { threshold: 0.5 });
    
    const statNumbers = document.querySelectorAll('.stat-number');
    statNumbers.forEach(stat => observer.observe(stat));
}

// Animate numbers
function animateNumbers(element) {
    const target = parseInt(element.textContent.replace(/,/g, ''));
    const duration = 2000;
    const step = target / (duration / 16);
    let current = 0;
    
    const timer = setInterval(() => {
        current += step;
        if (current >= target) {
            current = target;
            clearInterval(timer);
        }
        element.textContent = Math.floor(current).toLocaleString();
    }, 16);
}

// Smooth Scrolling
function initializeSmoothScrolling() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
}

// Interactive Effects
function initializeInteractiveEffects() {
    // Add ripple effect to buttons
    const buttons = document.querySelectorAll('.cta-button, .commonBtn');
    buttons.forEach(button => {
        button.addEventListener('click', function(e) {
            createRipple(e, this);
        });
    });
    
    // Feature card hover effects
    const featureCards = document.querySelectorAll('.features .card');
    featureCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-8px) scale(1.02)';
            this.style.transition = 'all 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });
    
    // Add parallax effect to background elements
    window.addEventListener('scroll', function() {
        const scrolled = window.pageYOffset;
        const parallaxElements = document.querySelectorAll('.pricing-modern::before');
        
        parallaxElements.forEach(element => {
            const speed = 0.5;
            element.style.transform = `translateY(${scrolled * speed}px)`;
        });
    });
}

// Create ripple effect
function createRipple(event, element) {
    const ripple = document.createElement('span');
    const rect = element.getBoundingClientRect();
    const size = Math.max(rect.width, rect.height);
    const x = event.clientX - rect.left - size / 2;
    const y = event.clientY - rect.top - size / 2;
    
    ripple.style.cssText = `
        position: absolute;
        width: ${size}px;
        height: ${size}px;
        left: ${x}px;
        top: ${y}px;
        background: rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        transform: scale(0);
        animation: ripple 0.6s linear;
        pointer-events: none;
        z-index: 1000;
    `;
    
    element.style.position = 'relative';
    element.style.overflow = 'hidden';
    element.appendChild(ripple);
    
    setTimeout(() => {
        ripple.remove();
    }, 600);
}

// Add CSS animations
const style = document.createElement('style');
style.textContent = `
    @keyframes ripple {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }
    
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @keyframes fadeOut {
        from {
            opacity: 1;
            transform: translateY(0);
        }
        to {
            opacity: 0;
            transform: translateY(-10px);
        }
    }
    
    .pricing-card {
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .cta-button {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .feature-item {
        transition: all 0.3s ease;
    }
    
    .feature-item:hover {
        background: rgba(86, 204, 153, 0.05);
        padding-left: 1rem;
    }
`;
document.head.appendChild(style);

// Initialize AOS (Animate On Scroll) if available
if (typeof AOS !== 'undefined') {
    AOS.init({
        duration: 800,
        easing: 'ease-out-cubic',
        once: true,
        offset: 100
    });
}

// Loading animation for pricing section
function showPricingSection() {
    const pricingSection = document.querySelector('.pricing-modern');
    if (pricingSection) {
        pricingSection.style.opacity = '0';
        pricingSection.style.transform = 'translateY(50px)';
        
        setTimeout(() => {
            pricingSection.style.transition = 'all 0.8s cubic-bezier(0.4, 0, 0.2, 1)';
            pricingSection.style.opacity = '1';
            pricingSection.style.transform = 'translateY(0)';
        }, 100);
    }
}

// Initialize pricing section animation
showPricingSection();