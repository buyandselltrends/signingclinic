document.addEventListener("DOMContentLoaded", function() {
    // 1. Element Intersection Observer for FadeUp Animations (Performance-friendly scroll reveals)
    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.1
    };

    const observer = new IntersectionObserver((entries, obs) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-fade-up');
                obs.unobserve(entry.target);
            }
        });
    }, observerOptions);

    document.querySelectorAll('.gad-card, .ims-stat-card, .tm-job-card').forEach(el => {
        // Pre-hide elements before observing to ensure animation plays cleanly
        el.style.opacity = '0';
        observer.observe(el);
    });

    // 2. Preload critical links dynamically (Instant-page behavior)
    let prefetchCache = new Set();
    document.addEventListener('mouseover', (e) => {
        let target = e.target.closest('a');
        if (target && target.href && target.href.startsWith(window.location.origin) && !prefetchCache.has(target.href)) {
            let link = document.createElement('link');
            link.rel = 'prefetch';
            link.href = target.href;
            document.head.appendChild(link);
            prefetchCache.add(target.href);
        }
    });

    // 3. Optional: Defer non-critical DOM rendering if needed
});
