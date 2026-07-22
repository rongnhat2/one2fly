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
        track.addEventListener('mousedown', function (e) { isDown = true; startX = e.pageX - track.offsetLeft; scrollLeft = track.scrollLeft; });
        track.addEventListener('mouseleave', function () { isDown = false; });
        track.addEventListener('mouseup', function () { isDown = false; });
        track.addEventListener('mousemove', function (e) { if (!isDown) return; e.preventDefault(); track.scrollLeft = scrollLeft - (e.pageX - track.offsetLeft - startX) * 1.5; });
    });
    document.querySelectorAll('.journey-search').forEach(function (form) {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            var q = (form.querySelector('input') || {}).value || '';
            q = q.trim().toLowerCase();
            var map = { 'đà lạt': 'da-lat', 'da lat': 'da-lat', 'đà nẵng': 'da-nang', 'da nang': 'da-nang', 'phú quốc': 'phu-quoc', 'phu quoc': 'phu-quoc', 'hội an': 'hoi-an', 'hoi an': 'hoi-an', 'hà giang': 'ha-giang', 'ha giang': 'ha-giang' };
            if (map[q]) window.location.href = 'destinations/' + map[q] + '.html';
        });
    });
    var hubNav = document.querySelector('.hub-nav');
    if (hubNav) {
        var links = hubNav.querySelectorAll('a[href^="#"]');
        function setActive() {
            var scrollY = window.scrollY + 160;
            var current = null;
            links.forEach(function (link) {
                var id = link.getAttribute('href').slice(1);
                var el = document.getElementById(id);
                if (el && el.offsetTop <= scrollY) current = link;
            });
            links.forEach(function (l) { l.classList.toggle('is-active', l === current); });
        }
        window.addEventListener('scroll', setActive, { passive: true });
        setActive();
    }
})();
