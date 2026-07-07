<header
    id="site-header"
    @class([
        'site-header dest-cinema-nav fixed top-0 left-0 right-0 z-50',
        'is-scrolled' => ! ($heroHeader ?? true),
    ])
>
    <div class="max-w-[1440px] mx-auto px-6 h-[88px] flex items-center justify-between gap-6">
        <a href="{{ route('home') }}" class="site-header-logo flex items-center gap-3 shrink-0">
            <img src="{{ asset('assets/logo.png') }}" class="site-header-logo-img h-8 w-auto" alt="one2FLY!">
        </a>
        <nav class="site-header-nav hidden xl:flex items-center gap-10 text-[11px] uppercase tracking-[0.2em] font-medium">
            <a href="{{ route('explore') }}" @class(['is-active' => ($activeNav ?? '') === 'explore'])>Khám phá</a>
            <a href="{{ route('issue') }}" @class(['is-active' => ($activeNav ?? '') === 'issue'])>Ấn phẩm</a>
            <a href="{{ route('destinations') }}" @class(['is-active' => ($activeNav ?? '') === 'destinations'])>Điểm đến</a>
            <a href="{{ route('guide') }}" @class(['is-active' => ($activeNav ?? '') === 'guide'])>Cẩm nang</a>
            <a href="{{ route('food') }}" @class(['is-active' => ($activeNav ?? '') === 'food'])>Ẩm thực</a>
            <a href="{{ route('about') }}" @class(['is-active' => ($activeNav ?? '') === 'about'])>Giới thiệu</a>
        </nav>
        <button type="button" class="site-header-menu text-[11px] uppercase tracking-[0.2em] font-medium transition-colors" aria-label="Menu">Menu</button>
    </div>
</header>
