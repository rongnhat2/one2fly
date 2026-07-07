<header class="fixed top-0 left-0 right-0 z-50 bg-surface/95 border-b border-line backdrop-blur-sm">
    <div class="max-w-[1440px] mx-auto px-6 h-[76px] flex items-center justify-between gap-4">
        <a href="{{ route('home') }}" class="flex items-center gap-3 shrink-0">
            <img src="{{ asset('assets/logo.png') }}" class="h-8 w-auto" alt="one2FLY!">
        </a>
        <p class="font-display text-base truncate text-center flex-1 hidden md:block text-dark">{{ $readerTitle ?? 'Đọc online' }}</p>
        <a href="{{ route('issue.detail') }}" class="bg-brand text-dark px-5 py-3 rounded-2xl text-[10px] uppercase tracking-[.16em] font-semibold shrink-0 transition-opacity hover:opacity-90">Thoát đọc</a>
    </div>
</header>
