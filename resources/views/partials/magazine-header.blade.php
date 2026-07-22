<header
    id="site-header"
    @class([ 'site-header dest-cinema-nav fixed top-0 left-0 right-0 z-50' , 'is-scrolled'=> ! ($heroHeader ?? true),
    ])
    >
    <div class="max-w-[1440px] mx-auto px-6 h-[88px] flex items-center justify-between gap-6">
        <a href="{{ route('home') }}" class="site-header-logo flex items-center gap-3 shrink-0">
            <img src="{{ asset('assets/logo.png') }}" class="site-header-logo-img h-8 w-auto" alt="one2FLY!">
        </a>
        <nav class="site-header-nav hidden xl:flex items-center gap-10 text-[11px] uppercase tracking-[0.2em] font-medium">
            <a href="{{ route('explore') }}" @class(['is-active'=> ($activeNav ?? '') === 'explore'])>Săn deal</a>
            <a href="{{ route('issue') }}" @class(['is-active'=> ($activeNav ?? '') === 'issue'])>Đọc tin mà tức</a>
            <a href="{{ route('destinations') }}" @class(['is-active'=> ($activeNav ?? '') === 'destinations'])>Du lịch đừng để chặt chém</a>
            <a href="{{ route('guide') }}" @class(['is-active'=> ($activeNav ?? '') === 'guide'])>Ấn phẩm</a>
            <a href="{{ route('about') }}" @class(['is-active'=> ($activeNav ?? '') === 'about'])>Giới thiệu</a>
        </nav>
        <div class="relative">
            <button type="button" class="site-header-lang text-[11px] uppercase tracking-[0.2em] font-medium transition-colors flex items-center gap-1" aria-label="Chọn ngôn ngữ" id="langMenuButton">
                VI
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M19 9l-7 7-7-7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>
            <div class="absolute right-0 mt-2 w-24 bg-white border border-line rounded shadow text-dark text-xs font-medium hidden" id="langMenuDropdown">
                <a href="#" class="block px-4 py-2 hover:bg-gray-100">VI</a>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100">EN</a>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const button = document.getElementById('langMenuButton');
                const dropdown = document.getElementById('langMenuDropdown');
                if (button && dropdown) {
                    button.addEventListener('click', function(e) {
                        dropdown.classList.toggle('hidden');
                    });
                    document.addEventListener('click', function(e) {
                        if (!button.contains(e.target) && !dropdown.contains(e.target)) {
                            dropdown.classList.add('hidden');
                        }
                    });
                }
            });
        </script>

    </div>
</header>