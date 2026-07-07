(function () {
    var header = document.getElementById('site-header');
    if (!header) return;

    var heroMode = document.body.classList.contains('has-hero-header');
    var threshold = 32;

    function update() {
        if (!heroMode) {
            header.classList.add('is-scrolled');
            return;
        }

        if (window.scrollY > threshold) {
            header.classList.add('is-scrolled');
        } else {
            header.classList.remove('is-scrolled');
        }
    }

    update();
    window.addEventListener('scroll', update, { passive: true });
    window.addEventListener('resize', update, { passive: true });
})();
