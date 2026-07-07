@extends('layouts.magazine')

@section('title', 'Cẩm nang — one2FLY!')
@section('meta_description', 'Cẩm nang du lịch one2FLY — điểm đến, lịch trình, trải nghiệm và gợi ý được biên soạn như một cuốn sổ tay du lịch.')

@section('content')
    <div class="guide-desk relative overflow-hidden bg-[#FAFAF8] text-[#101828]">

        {{-- Nền trang trí --}}
        <svg class="guide-desk-route absolute top-0 left-0 w-full h-[900px] pointer-events-none" viewBox="0 0 1440 900" fill="none" preserveAspectRatio="xMidYMid slice" aria-hidden="true">
            <path class="guide-desk-route-path" d="M-80 680 C 200 520, 480 740, 760 580 S 1180 280, 1540 160" stroke="#0368B4" stroke-width="1" stroke-dasharray="6 10" opacity="0.22"/>
            <g class="guide-desk-plane" opacity="0.45" transform="translate(1080 220) rotate(18)">
                <path d="M0 0 L16 5 L0 10 L3 5 Z" fill="#0368B4"/>
            </g>
        </svg>

        {{-- 1. Hero — Editorial Travel Desk --}}
        <section class="relative pt-[88px] border-b border-[#E6E8EC]">
            <div class="max-w-[1280px] mx-auto px-6 py-20 md:py-28 lg:py-32">
                <div class="grid lg:grid-cols-2 gap-14 lg:gap-20 items-center">
                    <div class="guide-desk-reveal">
                        <p class="text-[11px] uppercase tracking-[0.28em] text-[#0368B4] font-semibold mb-6">Cẩm nang one2FLY</p>
                        <h1 class="guide-desk-serif text-[48px] sm:text-[64px] lg:text-[80px] leading-[0.98] font-medium tracking-[-0.02em] text-[#101828] mb-8">
                            Đi để hiểu một nơi
                        </h1>
                        <p class="text-[17px] leading-[1.8] text-[#667085] max-w-[48ch] mb-10">
                            Những gợi ý du lịch được biên soạn như một cuốn sổ tay: điểm đến, văn hóa,
                            ẩm thực, lịch trình và những điều nhỏ đáng nhớ.
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4">
                            <a href="#guide-featured" class="guide-desk-btn inline-flex items-center justify-center gap-2 bg-[#0368B4] text-white px-8 py-3.5 text-[11px] uppercase tracking-[0.18em] font-semibold rounded-[4px]">
                                Khám phá cẩm nang <span class="guide-desk-arrow" aria-hidden="true">→</span>
                            </a>
                            <a href="{{ route('destinations') }}" class="guide-desk-btn inline-flex items-center justify-center gap-2 px-8 py-3.5 text-[11px] uppercase tracking-[0.18em] font-semibold text-[#101828] border border-[#E6E8EC] rounded-[4px] hover:border-[#0368B4] transition-colors">
                                Xem điểm đến <span class="guide-desk-arrow" aria-hidden="true">→</span>
                            </a>
                        </div>
                    </div>

                    <div class="guide-desk-reveal relative">
                        <figure class="relative overflow-hidden rounded-[4px]" data-guide-parallax>
                            <img
                                src="https://images.unsplash.com/photo-1493976040374-85c8e12f0c0e?q=80&w=1400&auto=format&fit=crop"
                                alt="Kyoto — phố cổ và đền chùa"
                                class="w-full aspect-[4/5] sm:aspect-[5/6] object-cover"
                                width="640" height="768" loading="eager"
                            >
                            <figcaption class="absolute bottom-6 left-6 right-6 border border-white/30 bg-white/90 backdrop-blur-[2px] px-5 py-4 text-[11px] uppercase tracking-[0.16em] text-[#101828] rounded-[4px]">
                                <span class="text-[#0368B4] font-semibold">Editor's Route</span>
                                <span class="text-[#667085]"> · Tokyo → Kyoto → Osaka</span>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>
        </section>

        {{-- 2. Featured Guide --}}
        <section id="guide-featured" class="py-20 md:py-28 border-b border-[#E6E8EC]">
            <div class="max-w-[1280px] mx-auto px-6">
                <header class="guide-desk-reveal mb-14 md:mb-16">
                    <p class="text-[11px] uppercase tracking-[0.24em] text-[#0368B4] font-semibold mb-3">Biên tập</p>
                    <h2 class="guide-desk-serif text-[36px] md:text-[48px] leading-[1.05] font-medium text-[#101828]">Cẩm nang nổi bật</h2>
                </header>

                <div class="guide-desk-reveal grid lg:grid-cols-[1.5fr_1fr] gap-12 lg:gap-16">
                    <article class="group border-t border-[#E6E8EC] pt-10">
                        <a href="{{ route('destinations.detail') }}" class="block">
                            <div class="overflow-hidden rounded-[4px] mb-8">
                                <img
                                    src="https://images.unsplash.com/photo-1493976040374-85c8e12f0c0e?q=80&w=1400&auto=format&fit=crop"
                                    alt="24 giờ ở Kyoto"
                                    class="w-full aspect-[16/10] object-cover transition-transform duration-500 group-hover:scale-[1.02]"
                                    width="900" height="563" loading="lazy"
                                >
                            </div>
                            <p class="text-[10px] uppercase tracking-[0.22em] text-[#0368B4] font-semibold mb-4">City Guide</p>
                            <h3 class="guide-desk-serif text-[32px] md:text-[40px] leading-[1.1] font-medium text-[#101828] mb-4 group-hover:text-[#0368B4] transition-colors duration-300">
                                24 giờ ở Kyoto
                            </h3>
                            <p class="text-[16px] leading-[1.8] text-[#667085] max-w-[52ch] mb-6">
                                Một ngày đi bộ qua Gion, Higashiyama và những con phố mà du khách thường bỏ lỡ —
                                không vội, không checklist, chỉ quan sát và ăn đúng chỗ.
                            </p>
                            <span class="inline-flex items-center gap-2 text-[11px] uppercase tracking-[0.18em] font-semibold text-[#101828] group-hover:text-[#0368B4] transition-colors">
                                Đọc cẩm nang <span class="guide-desk-arrow">→</span>
                            </span>
                        </a>
                    </article>

                    <nav class="border-t border-[#E6E8EC] pt-10 flex flex-col" aria-label="Cẩm nang liên quan">
                        @foreach ([
                            ['title' => 'Ăn sáng ở đâu', 'meta' => 'Food · 5 phút', 'url' => route('food')],
                            ['title' => 'Những con phố nên đi bộ', 'meta' => 'Route · 7 phút', 'url' => route('destinations.detail')],
                            ['title' => 'Một buổi tối yên tĩnh', 'meta' => 'Evening · 6 phút', 'url' => route('guide').'#guide-route'],
                        ] as $link)
                            <a href="{{ $link['url'] }}" class="guide-desk-side-link group flex items-start justify-between gap-6 py-7 border-b border-[#E6E8EC] last:border-b-0">
                                <div>
                                    <h4 class="guide-desk-serif text-[22px] md:text-[26px] leading-tight font-medium text-[#101828] group-hover:text-[#0368B4] transition-colors duration-300">{{ $link['title'] }}</h4>
                                    <p class="text-[11px] uppercase tracking-[0.16em] text-[#667085] mt-2">{{ $link['meta'] }}</p>
                                </div>
                                <span class="guide-desk-arrow text-[#667085] group-hover:text-[#0368B4] shrink-0 mt-1">→</span>
                            </a>
                        @endforeach
                    </nav>
                </div>
            </div>
        </section>

        {{-- 3. Destination Atlas --}}
        <section id="guide-atlas" class="py-20 md:py-28 border-b border-[#E6E8EC]">
            <div class="max-w-[1280px] mx-auto px-6">
                <header class="guide-desk-reveal mb-14">
                    <p class="text-[11px] uppercase tracking-[0.24em] text-[#0368B4] font-semibold mb-3">Atlas</p>
                    <h2 class="guide-desk-serif text-[36px] md:text-[48px] leading-[1.05] font-medium text-[#101828]">Khám phá theo điểm đến</h2>
                </header>

                <div class="guide-desk-reveal grid lg:grid-cols-2 gap-12 lg:gap-20 items-start">
                    <div class="flex flex-col" role="list" id="guide-atlas-list">
                        @foreach ($atlas as $dest)
                            <a
                                href="{{ $dest['url'] }}"
                                class="guide-atlas-row group text-left w-full py-7 border-t border-[#E6E8EC] last:border-b flex items-center justify-between gap-6 {{ $loop->first ? 'is-active' : '' }}"
                                data-atlas-image="{{ $dest['image'] }}"
                                data-atlas-label="{{ $dest['label'] }}"
                                role="listitem"
                            >
                                <div>
                                    <h3 class="guide-desk-serif text-[28px] md:text-[36px] font-medium text-[#101828] group-hover:text-[#0368B4] transition-colors duration-300">{{ $dest['name'] }}</h3>
                                    <p class="text-[12px] uppercase tracking-[0.14em] text-[#667085] mt-2">{{ $dest['guides'] }} cẩm nang</p>
                                    <p class="text-[15px] text-[#667085] mt-2 max-w-[36ch] hidden sm:block">{{ $dest['desc'] }}</p>
                                </div>
                                <span class="guide-desk-arrow text-xl text-[#667085] group-hover:text-[#0368B4] shrink-0">→</span>
                            </a>
                        @endforeach
                    </div>

                    <div class="hidden lg:block sticky top-[108px]">
                        <figure class="relative overflow-hidden rounded-[4px]">
                            <img
                                id="guide-atlas-preview"
                                src="{{ $atlas[0]['image'] }}"
                                alt="{{ $atlas[0]['label'] }}"
                                class="w-full aspect-[4/5] object-cover transition-opacity duration-500"
                                width="560" height="700"
                            >
                            <figcaption id="guide-atlas-caption" class="absolute bottom-0 left-0 right-0 px-6 py-4 text-[11px] uppercase tracking-[0.18em] text-white bg-gradient-to-t from-black/50 to-transparent">
                                {{ $atlas[0]['label'] }}
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>
        </section>

        {{-- 4. Route Timeline --}}
        <section id="guide-route" class="py-20 md:py-28 border-b border-[#E6E8EC] bg-white">
            <div class="max-w-[1280px] mx-auto px-6">
                <header class="guide-desk-reveal mb-14 md:mb-16">
                    <p class="text-[11px] uppercase tracking-[0.24em] text-[#0368B4] font-semibold mb-3">Lịch trình</p>
                    <h2 class="guide-desk-serif text-[36px] md:text-[48px] leading-[1.05] font-medium text-[#101828]">Hành trình gợi ý</h2>
                </header>

                <div class="guide-desk-reveal grid lg:grid-cols-[1fr_0.85fr] gap-14 lg:gap-20 items-start">
                    <div class="guide-desk-timeline relative pl-8">
                        <div class="guide-desk-timeline-line absolute left-[7px] top-2 bottom-2 w-px bg-[#E6E8EC]" aria-hidden="true"></div>
                        <svg class="guide-desk-timeline-route absolute -left-2 top-0 h-full w-8 pointer-events-none overflow-visible" aria-hidden="true">
                            <path class="guide-desk-route-path" d="M14 0 V 420" stroke="#0368B4" stroke-width="1" stroke-dasharray="4 8" opacity="0.35"/>
                        </svg>

                        @foreach ($timeline as $stop)
                            <article class="guide-desk-timeline-item relative pb-10 last:pb-0">
                                <span class="absolute -left-8 top-1.5 w-[15px] h-[15px] rounded-full border-2 border-[#0368B4] bg-[#FAFAF8]" aria-hidden="true"></span>
                                <p class="text-[11px] uppercase tracking-[0.2em] text-[#0368B4] font-semibold mb-1">{{ $stop['time'] }}</p>
                                <h3 class="guide-desk-serif text-[24px] md:text-[28px] font-medium text-[#101828] mb-1">{{ $stop['title'] }}</h3>
                                <p class="text-[14px] text-[#667085]">{{ $stop['note'] }}</p>
                            </article>
                        @endforeach
                    </div>

                    <figure class="relative overflow-hidden rounded-[4px] hidden md:block" data-guide-parallax>
                        <img
                            src="https://images.unsplash.com/photo-1545569341-9eb8b30979d9?q=80&w=900&auto=format&fit=crop"
                            alt="Phố cổ Kyoto"
                            class="w-full aspect-[3/4] object-cover"
                            width="480" height="640" loading="lazy"
                        >
                    </figure>
                </div>
            </div>
        </section>

        {{-- 5. Guide Collections --}}
        <section id="guide-collections" class="py-20 md:py-28 border-b border-[#E6E8EC]">
            <div class="max-w-[1280px] mx-auto px-6">
                <header class="guide-desk-reveal mb-12">
                    <p class="text-[11px] uppercase tracking-[0.24em] text-[#0368B4] font-semibold mb-3">Bộ sưu tập</p>
                    <h2 class="guide-desk-serif text-[36px] md:text-[48px] leading-[1.05] font-medium text-[#101828]">Bộ sưu tập cẩm nang</h2>
                </header>

                <div class="guide-desk-reveal border-t border-[#E6E8EC]">
                    @foreach ($collections as $col)
                        <a href="{{ $col['url'] }}" class="guide-collection-row group flex flex-col sm:flex-row sm:items-center justify-between gap-4 py-8 md:py-10 border-b border-[#E6E8EC] px-2 -mx-2 transition-colors duration-300 hover:bg-[#F3F8FD]">
                            <div class="flex-1">
                                <p class="text-[10px] uppercase tracking-[0.2em] text-[#667085] mb-2">{{ $col['name'] }}</p>
                                <h3 class="guide-desk-serif text-[26px] md:text-[32px] font-medium text-[#101828] mb-2 group-hover:text-[#0368B4] transition-colors">{{ $col['label'] }}</h3>
                                <p class="text-[15px] text-[#667085] max-w-[48ch]">{{ $col['desc'] }}</p>
                            </div>
                            <div class="flex items-center gap-6 shrink-0">
                                <span class="text-[11px] uppercase tracking-[0.16em] text-[#667085]">{{ $col['count'] }} bài</span>
                                <span class="guide-desk-arrow text-lg text-[#667085] group-hover:text-[#0368B4]">→</span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- 6. Latest Guides — asymmetric masonry --}}
        <section id="guide-latest" class="py-20 md:py-28 border-b border-[#E6E8EC] bg-white">
            <div class="max-w-[1280px] mx-auto px-6">
                <header class="guide-desk-reveal mb-14">
                    <p class="text-[11px] uppercase tracking-[0.24em] text-[#0368B4] font-semibold mb-3">Mới cập nhật</p>
                    <h2 class="guide-desk-serif text-[36px] md:text-[48px] leading-[1.05] font-medium text-[#101828]">Mới nhất</h2>
                </header>

                <div class="guide-desk-reveal guide-desk-masonry">
                    @foreach ($latest as $item)
                        <article @class([
                            'guide-masonry-item group border-t border-[#E6E8EC] pt-8',
                            'guide-masonry-item--tall' => $item['tall'],
                        ])>
                            <a href="{{ $item['url'] }}" class="block h-full">
                                @if ($item['image'])
                                    <div class="overflow-hidden rounded-[4px] mb-6 {{ $item['tall'] ? 'aspect-[3/4]' : 'aspect-[4/3]' }}">
                                        <img
                                            src="{{ $item['image'] }}"
                                            alt="{{ $item['title'] }}"
                                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-[1.02]"
                                            loading="lazy"
                                        >
                                    </div>
                                @endif
                                <p class="text-[10px] uppercase tracking-[0.2em] text-[#0368B4] font-semibold mb-3">{{ $item['cat'] }}</p>
                                <h3 class="guide-desk-serif text-[24px] md:text-[28px] leading-tight font-medium text-[#101828] mb-3 group-hover:text-[#0368B4] transition-colors duration-300">{{ $item['title'] }}</h3>
                                <p class="text-[15px] leading-[1.75] text-[#667085] mb-4">{{ $item['excerpt'] }}</p>
                                <p class="text-[11px] uppercase tracking-[0.14em] text-[#667085]">{{ $item['time'] }} đọc</p>
                            </a>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- 7. Bottom CTA --}}
        <section class="py-24 md:py-32">
            <div class="max-w-[1280px] mx-auto px-6 text-center guide-desk-reveal">
                <p class="guide-desk-serif text-[28px] md:text-[40px] leading-[1.3] font-medium text-[#101828] max-w-[28ch] mx-auto mb-10">
                    Một chuyến đi tốt bắt đầu từ một gợi ý đúng.
                </p>
                <a href="#guide-latest" class="guide-desk-btn inline-flex items-center gap-2 px-10 py-4 text-[11px] uppercase tracking-[0.2em] font-semibold text-[#0368B4] border border-[#0368B4] rounded-[4px] hover:bg-[#0368B4] hover:text-white transition-colors mb-14">
                    Xem tất cả cẩm nang <span class="guide-desk-arrow">→</span>
                </a>

                <form class="max-w-md mx-auto flex flex-col sm:flex-row gap-3 border-t border-[#E6E8EC] pt-12" action="#" method="post">
                    @csrf
                    <label class="sr-only" for="guide-newsletter">Email</label>
                    <input
                        type="email"
                        id="guide-newsletter"
                        name="email"
                        placeholder="Email của bạn"
                        class="flex-1 px-5 py-3.5 text-[15px] text-[#101828] bg-white border border-[#E6E8EC] rounded-[4px] placeholder:text-[#667085] focus:outline-none focus:border-[#0368B4]"
                    >
                    <button type="submit" class="guide-desk-btn px-8 py-3.5 text-[11px] uppercase tracking-[0.16em] font-semibold bg-[#101828] text-white rounded-[4px] hover:bg-[#0368B4] transition-colors whitespace-nowrap">
                        Nhận gợi ý du lịch
                    </button>
                </form>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
<script>
(function () {
    var reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    var nodes = document.querySelectorAll('.guide-desk-reveal');
    if (reduced || !('IntersectionObserver' in window)) {
        nodes.forEach(function (el) { el.classList.add('is-visible'); });
    } else {
        var observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (!entry.isIntersecting) return;
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            });
        }, { threshold: 0.08, rootMargin: '0px 0px -40px 0px' });
        nodes.forEach(function (el) { observer.observe(el); });
    }

    var atlasRows = document.querySelectorAll('.guide-atlas-row');
    var preview = document.getElementById('guide-atlas-preview');
    var caption = document.getElementById('guide-atlas-caption');
    atlasRows.forEach(function (row) {
        row.addEventListener('mouseenter', function () {
            atlasRows.forEach(function (r) { r.classList.remove('is-active'); });
            row.classList.add('is-active');
            if (!preview) return;
            preview.style.opacity = '0';
            setTimeout(function () {
                preview.src = row.getAttribute('data-atlas-image');
                preview.alt = row.getAttribute('data-atlas-label');
                if (caption) caption.textContent = row.getAttribute('data-atlas-label');
                preview.style.opacity = '1';
            }, 180);
        });
    });

    if (!reduced) {
        var parallaxEls = document.querySelectorAll('[data-guide-parallax]');
        var ticking = false;
        function parallax() {
            var vh = window.innerHeight;
            parallaxEls.forEach(function (el) {
                var rect = el.getBoundingClientRect();
                if (rect.bottom < 0 || rect.top > vh) return;
                var p = (rect.top + rect.height / 2 - vh / 2) / vh;
                el.style.setProperty('--guide-parallax', (p * -16).toFixed(1) + 'px');
            });
            ticking = false;
        }
        window.addEventListener('scroll', function () {
            if (!ticking) { ticking = true; requestAnimationFrame(parallax); }
        }, { passive: true });
        parallax();
    }
})();
</script>
@endpush
