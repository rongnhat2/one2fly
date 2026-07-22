(function () {
    var header = document.getElementById('site-header');
    if (header) {
        var heroMode = document.body.classList.contains('has-hero-header');
        function updateHeader() {
            if (!heroMode) { header.classList.add('is-scrolled'); return; }
            header.classList.toggle('is-scrolled', window.scrollY > 32);
        }
        updateHeader();
        window.addEventListener('scroll', updateHeader, { passive: true });
    }
    var menuBtn = document.getElementById('menu-toggle');
    var mobileMenu = document.getElementById('mobile-menu');
    var menuClose = document.getElementById('menu-close');
    if (menuBtn && mobileMenu) {
        menuBtn.addEventListener('click', function () { mobileMenu.classList.add('is-open'); document.body.style.overflow = 'hidden'; });
        function closeMenu() { mobileMenu.classList.remove('is-open'); document.body.style.overflow = ''; }
        if (menuClose) menuClose.addEventListener('click', closeMenu);
        mobileMenu.querySelectorAll('a').forEach(function (l) { l.addEventListener('click', closeMenu); });
    }
    document.querySelectorAll('.video-reel-track').forEach(function (track) {
        var isDown = false, startX, scrollLeft;
        track.addEventListener('mousedown', function (e) { isDown = true; startX = e.pageX - track.offsetLeft; scrollLeft = track.scrollLeft; track.style.cursor = 'grabbing'; });
        track.addEventListener('mouseleave', function () { isDown = false; track.style.cursor = ''; });
        track.addEventListener('mouseup', function () { isDown = false; track.style.cursor = ''; });
        track.addEventListener('mousemove', function (e) { if (!isDown) return; e.preventDefault(); track.scrollLeft = scrollLeft - (e.pageX - track.offsetLeft - startX) * 1.5; });
    });
})();
