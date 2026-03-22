/**
 * TMAS.az — Main JavaScript
 * Hero Slider + Header Effects
 */

document.addEventListener('DOMContentLoaded', () => {

    // ========================
    // Mobile menu toggle
    // ========================
    const burger = document.getElementById('burger');
    const nav = document.getElementById('mainNav');

    if (burger && nav) {
        burger.addEventListener('click', () => {
            nav.classList.toggle('open');
            burger.classList.toggle('active');
            document.body.style.overflow = nav.classList.contains('open') ? 'hidden' : '';
        });
    }

    // ========================
    // Header & Top Bar scroll
    // ========================
    const header = document.getElementById('header');
    const topBar = document.getElementById('topBar');
    let lastScroll = 0;

    if (header) {
        const onScroll = () => {
            const y = window.scrollY;
            header.classList.toggle('scrolled', y > 100);
            if (topBar) {
                topBar.classList.toggle('hidden', y > 60);
            }
            lastScroll = y;
        };
        window.addEventListener('scroll', onScroll, { passive: true });
        onScroll();
    }

    // ========================
    // Hero Slider
    // ========================
    const slider = document.getElementById('heroSlider');
    if (slider) {
        const slides = slider.querySelectorAll('.hero-slide');
        const dots = slider.querySelectorAll('.slider-dot');
        const prevBtn = slider.querySelector('.slider-prev');
        const nextBtn = slider.querySelector('.slider-next');
        const progressBars = slider.querySelectorAll('.slider-progress-bar');

        let current = 0;
        const total = slides.length;
        const autoplayDuration = 6000;
        let autoplayTimer = null;
        let progressInterval = null;

        function goToSlide(index) {
            if (index === current) return;

            // Reset animations on current slide
            slides[current].classList.remove('active');
            dots[current].classList.remove('active');

            current = ((index % total) + total) % total;

            slides[current].classList.add('active');
            dots[current].classList.add('active');

            resetProgress();
            startProgress();
        }

        function nextSlide() {
            goToSlide(current + 1);
        }

        function prevSlide() {
            goToSlide(current - 1);
        }

        // Progress bar
        function resetProgress() {
            progressBars.forEach(bar => {
                bar.style.transition = 'none';
                bar.style.width = '0%';
            });
        }

        function startProgress() {
            // Find the progress bar after the current dot
            const progressIndex = current < total - 1 ? current : -1;

            if (progressIndex >= 0 && progressBars[progressIndex]) {
                requestAnimationFrame(() => {
                    progressBars[progressIndex].style.transition = `width ${autoplayDuration}ms linear`;
                    progressBars[progressIndex].style.width = '100%';
                });
            }
        }

        // Autoplay
        function startAutoplay() {
            stopAutoplay();
            autoplayTimer = setInterval(nextSlide, autoplayDuration);
            resetProgress();
            startProgress();
        }

        function stopAutoplay() {
            if (autoplayTimer) {
                clearInterval(autoplayTimer);
                autoplayTimer = null;
            }
        }

        // Event listeners
        if (prevBtn) {
            prevBtn.addEventListener('click', () => {
                prevSlide();
                startAutoplay();
            });
        }

        if (nextBtn) {
            nextBtn.addEventListener('click', () => {
                nextSlide();
                startAutoplay();
            });
        }

        dots.forEach(dot => {
            dot.addEventListener('click', () => {
                const index = parseInt(dot.dataset.slide, 10);
                goToSlide(index);
                startAutoplay();
            });
        });

        // Touch/swipe support
        let touchStartX = 0;
        let touchEndX = 0;

        slider.addEventListener('touchstart', (e) => {
            touchStartX = e.changedTouches[0].screenX;
        }, { passive: true });

        slider.addEventListener('touchend', (e) => {
            touchEndX = e.changedTouches[0].screenX;
            const diff = touchStartX - touchEndX;
            if (Math.abs(diff) > 50) {
                if (diff > 0) nextSlide();
                else prevSlide();
                startAutoplay();
            }
        }, { passive: true });

        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowRight') { nextSlide(); startAutoplay(); }
            if (e.key === 'ArrowLeft') { prevSlide(); startAutoplay(); }
        });

        // Pause on hover
        slider.addEventListener('mouseenter', stopAutoplay);
        slider.addEventListener('mouseleave', startAutoplay);

        // Start
        startAutoplay();
    }

    // ========================
    // Service Tabs
    // ========================
    const tabsSection = document.getElementById('serviceTabs');
    if (tabsSection) {
        const tabBtns = tabsSection.querySelectorAll('.tab-btn');
        const tabPanels = tabsSection.querySelectorAll('.tab-panel');

        tabBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                const targetId = btn.dataset.tab;

                // Deactivate all
                tabBtns.forEach(b => {
                    b.classList.remove('active');
                    b.setAttribute('aria-selected', 'false');
                });
                tabPanels.forEach(p => p.classList.remove('active'));

                // Activate clicked
                btn.classList.add('active');
                btn.setAttribute('aria-selected', 'true');

                const target = document.getElementById(targetId);
                if (target) {
                    target.classList.add('active');
                }
            });
        });

        // Keyboard navigation for tabs
        const tabNav = tabsSection.querySelector('.tabs-nav');
        if (tabNav) {
            tabNav.addEventListener('keydown', (e) => {
                const btns = Array.from(tabBtns);
                const currentIdx = btns.findIndex(b => b.classList.contains('active'));
                let newIdx = currentIdx;

                if (e.key === 'ArrowRight') {
                    newIdx = (currentIdx + 1) % btns.length;
                } else if (e.key === 'ArrowLeft') {
                    newIdx = (currentIdx - 1 + btns.length) % btns.length;
                } else {
                    return;
                }

                e.preventDefault();
                btns[newIdx].click();
                btns[newIdx].focus();
            });
        }
    }

    // ========================
    // Smooth scroll for anchor links
    // ========================
    document.querySelectorAll('a[href^="#"]').forEach(link => {
        link.addEventListener('click', (e) => {
            const target = document.querySelector(link.getAttribute('href'));
            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: 'smooth' });
            }
        });
    });
});
