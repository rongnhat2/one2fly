(function () {
    /* Header scroll */
    var header = document.getElementById('site-header');
    if (header) {
        var heroMode = document.body.classList.contains('has-hero-header');
        function updateHeader() {
            if (!heroMode) {
                header.classList.add('is-scrolled');
                return;
            }
            header.classList.toggle('is-scrolled', window.scrollY > 32);
        }
        updateHeader();
        window.addEventListener('scroll', updateHeader, { passive: true });
    }

    /* Mobile menu */
    var menuBtn = document.getElementById('menu-toggle');
    var mobileMenu = document.getElementById('mobile-menu');
    var menuClose = document.getElementById('menu-close');
    if (menuBtn && mobileMenu) {
        menuBtn.addEventListener('click', function () {
            mobileMenu.classList.add('is-open');
            document.body.style.overflow = 'hidden';
        });
        function closeMenu() {
            mobileMenu.classList.remove('is-open');
            document.body.style.overflow = '';
        }
        if (menuClose) menuClose.addEventListener('click', closeMenu);
        mobileMenu.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', closeMenu);
        });
    }

    /* Deal countdown */
    document.querySelectorAll('[data-countdown]').forEach(function (el) {
        var end = new Date(el.getAttribute('data-countdown')).getTime();
        var units = el.querySelectorAll('.deal-countdown-unit b');
        function tick() {
            var diff = Math.max(0, end - Date.now());
            var h = Math.floor(diff / 3600000);
            var m = Math.floor((diff % 3600000) / 60000);
            var s = Math.floor((diff % 60000) / 1000);
            if (units[0]) units[0].textContent = String(h).padStart(2, '0');
            if (units[1]) units[1].textContent = String(m).padStart(2, '0');
            if (units[2]) units[2].textContent = String(s).padStart(2, '0');
        }
        tick();
        setInterval(tick, 1000);
    });

    /* Video reel drag scroll */
    document.querySelectorAll('.video-reel-track').forEach(function (track) {
        var isDown = false, startX, scrollLeft;
        track.addEventListener('mousedown', function (e) {
            isDown = true;
            startX = e.pageX - track.offsetLeft;
            scrollLeft = track.scrollLeft;
            track.style.cursor = 'grabbing';
        });
        track.addEventListener('mouseleave', function () { isDown = false; track.style.cursor = ''; });
        track.addEventListener('mouseup', function () { isDown = false; track.style.cursor = ''; });
        track.addEventListener('mousemove', function (e) {
            if (!isDown) return;
            e.preventDefault();
            track.scrollLeft = scrollLeft - (e.pageX - track.offsetLeft - startX) * 1.5;
        });
    });
})();
