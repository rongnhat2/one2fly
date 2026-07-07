@extends('layouts.magazine')

@section('title', 'Ẩm thực Việt Nam — one2FLY!')
@section('meta_description', $food['hero']['desc'])

@push('head')
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;1,400&family=Playfair+Display:ital,wght@0,400;0,500;1,400&display=swap" rel="stylesheet">
@endpush

@section('content')
    <div class="food-guide relative overflow-hidden bg-[#FAFAF8] text-[#101828]">

        {{-- 1. Editorial Hero --}}
        <section class="food-guide-hero relative min-h-[85vh] flex items-end overflow-hidden">
            <img
                src="{{ $food['hero']['image'] }}"
                alt="Ẩm thực Việt Nam"
                class="food-guide-hero-img dest-cinema-bg absolute inset-0 h-full w-full object-cover object-center"
                data-food-parallax
            >
            <div class="dest-cinema-overlay absolute inset-0"></div>
            <svg class="absolute inset-0 w-full h-full pointer-events-none hidden md:block" viewBox="0 0 1440 800" fill="none" preserveAspectRatio="xMidYMid slice" aria-hidden="true">
                <path class="food-guide-route-path" d="M-40 600 C 300 450, 520 650, 800 500 S 1200 280, 1500 180" stroke="#0368B4" stroke-width="1" stroke-dasharray="6 10" opacity="0.22"/>
            </svg>
            <p class="absolute top-[100px] right-6 text-[9px] uppercase tracking-[0.18em] text-white/45 hidden lg:block pointer-events-none" aria-hidden="true">{{ $food['hero']['coords'] }}</p>

            <div class="relative z-10 max-w-[1280px] mx-auto px-6 pb-16 md:pb-24 pt-[120px] w-full">
                <div class="max-w-[640px] food-guide-reveal">
                    <p class="text-[10px] uppercase tracking-[0.28em] text-white/75 font-semibold mb-6">{{ $food['hero']['label'] }}</p>
                    <h1 class="food-guide-serif text-[40px] sm:text-[52px] md:text-[64px] lg:text-[72px] leading-[1.05] font-medium tracking-[-0.02em] text-white mb-8 whitespace-pre-line">{{ $food['hero']['title'] }}</h1>
                    <p class="text-[16px] md:text-[17px] leading-[1.85] text-white/85 mb-10 max-w-[52ch]">{{ $food['hero']['desc'] }}</p>
                    <div class="flex flex-wrap items-center gap-x-5 gap-y-2 text-[10px] uppercase tracking-[0.18em] text-white/65 mb-10">
                        @foreach ($food['hero']['stats'] as $stat)
                            <span>{{ $stat }}</span>
                            @unless ($loop->last)<span class="text-white/30">|</span>@endunless
                        @endforeach
                    </div>
                    <div class="flex flex-wrap gap-3">
                        <a href="#food-dishes" class="inline-flex items-center justify-center bg-white text-[#101828] px-7 py-3 rounded-[4px] text-[11px] uppercase tracking-[0.16em] font-semibold hover:bg-[#FAFAF8] transition-colors">
                            Khám phá món ăn
                        </a>
                        <a href="#food-restaurants" class="inline-flex items-center justify-center border border-white/40 text-white px-7 py-3 rounded-[4px] text-[11px] uppercase tracking-[0.16em] font-semibold hover:border-white hover:bg-white/10 transition-colors">
                            Xem quán gợi ý
                        </a>
                    </div>
                </div>
            </div>
        </section>

        {{-- 2. Editor's Note --}}
        <section class="py-20 md:py-28 border-b border-[#E6E8EC]">
            <div class="max-w-[1280px] mx-auto px-6">
                <div class="food-guide-reveal max-w-[720px] mx-auto text-center">
                    <p class="text-[11px] uppercase tracking-[0.24em] text-[#667085] font-semibold mb-8">Editor's Note</p>
                    <blockquote class="food-guide-serif text-[28px] sm:text-[34px] md:text-[40px] leading-[1.25] font-medium italic text-[#101828] mb-12">
                        "{{ $food['editor_quote'] }}"
                    </blockquote>
                    <div class="space-y-5 text-[16px] md:text-[17px] leading-[1.9] text-[#667085] text-left md:text-center">
                        @foreach ($food['editor_note'] as $para)
                            <p>{{ $para }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        {{-- 3. Món nên thử --}}
        <section id="food-dishes" class="py-20 md:py-28 border-b border-[#E6E8EC] bg-white">
            <div class="max-w-[1280px] mx-auto px-6">
                <header class="food-guide-reveal mb-12 md:mb-16">
                    <p class="text-[11px] uppercase tracking-[0.24em] text-[#667085] font-semibold mb-3">Tuyển chọn</p>
                    <h2 class="food-guide-serif text-[32px] md:text-[40px] font-medium text-[#101828]">Những món nên thử</h2>
                </header>
                <div class="food-guide-reveal border-t border-[#E6E8EC]">
                    @foreach ($food['dishes'] as $dish)
                        <a href="{{ route('food.region', $dish['region_slug']) }}" class="food-guide-dish-row group grid grid-cols-[auto_72px_1fr_auto] sm:grid-cols-[48px_100px_1fr_auto_auto] gap-4 md:gap-8 items-center py-6 md:py-8 border-b border-[#E6E8EC] transition-colors">
                            <span class="text-[13px] uppercase tracking-[0.14em] text-[#667085] font-medium">{{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                            <div class="overflow-hidden rounded-[4px] w-[72px] sm:w-[100px]">
                                <img src="{{ $dish['image'] }}" alt="{{ $dish['name'] }}" class="w-full aspect-square object-cover transition-transform duration-500 group-hover:scale-[1.05]" loading="lazy">
                            </div>
                            <div class="min-w-0">
                                <h3 class="food-guide-dish-title text-[18px] md:text-[20px] font-medium text-[#101828] mb-1 transition-colors">{{ $dish['name'] }}</h3>
                                <p class="text-[10px] uppercase tracking-[0.16em] text-[#667085] mb-1">{{ $dish['region'] }}</p>
                                <p class="text-[14px] leading-[1.65] text-[#667085]">{{ $dish['desc'] }}</p>
                                <p class="text-[13px] text-[#667085] mt-2 sm:hidden">{{ $dish['price'] }}</p>
                            </div>
                            <span class="text-[13px] text-[#667085] whitespace-nowrap hidden sm:block">{{ $dish['price'] }}</span>
                            <span class="food-guide-dish-arrow text-[#101828] transition-transform justify-self-end" aria-hidden="true">→</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- 4. Quán nên ghé --}}
        <section id="food-restaurants" class="py-20 md:py-28 border-b border-[#E6E8EC]">
            <div class="max-w-[1280px] mx-auto px-6">
                <header class="food-guide-reveal mb-12 md:mb-16">
                    <p class="text-[11px] uppercase tracking-[0.24em] text-[#0368B4] font-semibold mb-3">Địa điểm</p>
                    <h2 class="food-guide-serif text-[32px] md:text-[40px] font-medium text-[#101828]">Quán nên ghé</h2>
                </header>

                @php $feat = $food['featured_restaurant']; @endphp
                <div class="food-guide-reveal grid lg:grid-cols-[1.4fr_1fr] gap-10 lg:gap-14">
                    <article class="group">
                        <div class="overflow-hidden rounded-[4px] mb-8">
                            <img src="{{ $feat['image'] }}" alt="{{ $feat['name'] }}" class="w-full aspect-[16/10] object-cover transition-transform duration-500 group-hover:scale-[1.02]" loading="lazy">
                        </div>
                        <h3 class="food-guide-serif text-[28px] md:text-[36px] font-medium text-[#101828] mb-3">{{ $feat['name'] }}</h3>
                        <p class="text-[14px] text-[#667085] mb-4">{{ $feat['location'] }}</p>
                        <div class="flex flex-wrap gap-x-6 gap-y-2 text-[12px] uppercase tracking-[0.12em] text-[#667085] mb-6">
                            <span>{{ $feat['price'] }}</span>
                            <span>★ {{ $feat['rating'] }}</span>
                            <span>{{ $feat['hours'] }}</span>
                        </div>
                        <p class="text-[16px] leading-[1.8] text-[#667085] mb-6 max-w-[52ch]">{{ $feat['desc'] }}</p>
                        <a href="{{ $feat['maps'] }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 text-[11px] uppercase tracking-[0.16em] font-semibold text-[#101828] border-b border-[#101828] pb-1 hover:text-[#0368B4] hover:border-[#0368B4] transition-colors">
                            Google Maps <span class="food-guide-arrow">→</span>
                        </a>
                    </article>

                    <nav class="border-t border-[#E6E8EC] lg:border-t-0 lg:border-l lg:pl-14 lg:pt-0 pt-10" aria-label="Quán gợi ý khác">
                        @foreach ($food['restaurants'] as $rest)
                            <a href="#food-restaurants" class="food-guide-rest-row group flex flex-col sm:flex-row sm:items-center gap-4 py-7 border-b border-[#E6E8EC] first:pt-0 transition-colors hover:bg-[#F3F8FD] -mx-2 px-2">
                                <div class="flex-1 min-w-0">
                                    <h4 class="food-guide-serif text-[22px] font-medium text-[#101828] group-hover:text-[#0368B4] transition-colors mb-1">{{ $rest['name'] }}</h4>
                                    <p class="text-[12px] text-[#667085] mb-1">{{ $rest['location'] }} · {{ $rest['price'] }}</p>
                                    <p class="text-[14px] text-[#667085]">{{ $rest['note'] }}</p>
                                </div>
                                <span class="text-xl text-[#667085] group-hover:text-[#0368B4] shrink-0">→</span>
                            </a>
                        @endforeach
                    </nav>
                </div>
            </div>
        </section>

        {{-- 5. Price Guide --}}
        <section class="py-20 md:py-28 border-b border-[#E6E8EC] bg-white">
            <div class="max-w-[1280px] mx-auto px-6">
                <header class="food-guide-reveal mb-12">
                    <h2 class="food-guide-serif text-[32px] md:text-[40px] font-medium text-[#101828]">Giá tham khảo</h2>
                </header>
                <div class="food-guide-reveal border-t border-[#E6E8EC] max-w-[640px]">
                    @foreach ($food['price_guide'] as $row)
                        <div class="flex items-baseline justify-between gap-6 py-5 border-b border-[#E6E8EC]">
                            <span class="text-[15px] md:text-[16px] text-[#101828]">{{ $row['cat'] }}</span>
                            <span class="text-[14px] uppercase tracking-[0.1em] text-[#667085] font-medium">{{ $row['range'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- 6. Food Warnings --}}
        <section id="food-warnings" class="py-20 md:py-28 border-b border-[#E6E8EC]">
            <div class="max-w-[1280px] mx-auto px-6">
                <div class="food-guide-reveal food-guide-warnings border-l-[3px] border-[#C97A00] bg-[#FFF8EC] px-8 md:px-12 py-12 md:py-16">
                    <p class="text-[11px] uppercase tracking-[0.24em] text-[#C97A00] font-semibold mb-4">Ghi chú biên tập</p>
                    <h2 class="food-guide-serif text-[32px] md:text-[40px] font-medium text-[#101828] mb-10">Né mất tiền oan</h2>
                    <ul class="space-y-6 md:space-y-8">
                        @foreach ($food['warnings'] as $warning)
                            <li class="food-guide-warning-item text-[16px] md:text-[17px] leading-[1.75] text-[#101828] pl-6 relative">
                                <span class="absolute left-0 top-[0.55em] w-1.5 h-1.5 rounded-full bg-[#C97A00]/60" aria-hidden="true"></span>
                                {{ $warning }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>

        {{-- 7. Ăn theo vùng --}}
        <section class="py-20 md:py-28 border-b border-[#E6E8EC] bg-white">
            <div class="max-w-[1280px] mx-auto px-6">
                <header class="food-guide-reveal mb-12 md:mb-16">
                    <h2 class="food-guide-serif text-[32px] md:text-[40px] font-medium text-[#101828]">Khám phá theo vùng miền</h2>
                </header>
                <div class="food-guide-reveal space-y-6">
                    @foreach ($food['regions'] as $region)
                        <a href="{{ route('food.region', $region['slug']) }}" class="food-guide-region group grid md:grid-cols-[1.2fr_1fr] gap-0 border border-[#E6E8EC] rounded-[4px] overflow-hidden transition-colors hover:bg-[#FAFAF8]">
                            <div class="overflow-hidden min-h-[220px] md:min-h-[280px]">
                                <img src="{{ $region['image'] }}" alt="{{ $region['name'] }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-[1.03]" loading="lazy">
                            </div>
                            <div class="flex flex-col justify-center p-8 md:p-10">
                                <h3 class="food-guide-serif text-[28px] md:text-[32px] font-medium text-[#101828] mb-4 group-hover:text-[#0368B4] transition-colors">{{ $region['name'] }}</h3>
                                <p class="text-[15px] leading-[1.8] text-[#667085] mb-6">{{ $region['desc'] }}</p>
                                <span class="inline-flex items-center gap-2 text-[11px] uppercase tracking-[0.16em] font-semibold text-[#101828] group-hover:text-[#0368B4] transition-colors">
                                    Khám phá <span class="food-guide-arrow">→</span>
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- 8. Local Dining Tips --}}
        <section class="py-20 md:py-28 border-b border-[#E6E8EC]">
            <div class="max-w-[1280px] mx-auto px-6">
                <header class="food-guide-reveal mb-12 md:mb-16">
                    <p class="text-[11px] uppercase tracking-[0.24em] text-[#667085] font-semibold mb-3">Sổ tay</p>
                    <h2 class="food-guide-serif text-[32px] md:text-[40px] font-medium text-[#101828]">Mẹo ăn uống khi đi du lịch</h2>
                </header>
                <div class="food-guide-reveal max-w-[720px] space-y-0">
                    @foreach ($food['tips'] as $tip)
                        <div class="food-guide-tip flex gap-8 md:gap-12 py-8 md:py-10 border-b border-[#E6E8EC] first:pt-0">
                            <span class="food-guide-serif text-[32px] md:text-[40px] leading-none text-[#E6E8EC] font-medium shrink-0">{{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                            <p class="text-[16px] md:text-[17px] leading-[1.85] text-[#101828] pt-2">{{ $tip }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- 9. Food Gallery --}}
        <section class="py-16 md:py-24 border-b border-[#E6E8EC] bg-white overflow-hidden">
            <div class="max-w-[1280px] mx-auto px-6 mb-10 food-guide-reveal">
                <p class="text-[11px] uppercase tracking-[0.24em] text-[#667085] font-semibold mb-3">Photo Essay</p>
                <h2 class="food-guide-serif text-[28px] md:text-[36px] font-medium text-[#101828]">Hương vị qua ống kính</h2>
            </div>
            <div class="max-w-[1280px] mx-auto px-6 food-guide-reveal">
                <div class="food-guide-gallery">
                    @foreach ($food['gallery'] as $photo)
                        <figure @class(['food-guide-gallery-item', 'food-guide-gallery-item--tall' => $photo['tall']])>
                            <img src="{{ $photo['src'] }}" alt="{{ $photo['cap'] }}" class="w-full h-full object-cover rounded-[4px]" loading="lazy">
                            <figcaption class="mt-2 text-[10px] uppercase tracking-[0.16em] text-[#667085]">{{ $photo['cap'] }}</figcaption>
                        </figure>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- 10. Related Guides --}}
        <section class="py-20 md:py-28 border-b border-[#E6E8EC]">
            <div class="max-w-[1280px] mx-auto px-6">
                <header class="food-guide-reveal mb-12">
                    <h2 class="food-guide-serif text-[28px] md:text-[36px] font-medium text-[#101828]">Cẩm nang liên quan</h2>
                </header>
                <div class="food-guide-reveal border-t border-[#E6E8EC]">
                    @foreach ($food['related'] as $guide)
                        <a href="{{ $guide['url'] }}" class="food-guide-related group grid grid-cols-[1fr_auto] md:grid-cols-[120px_1fr_auto_auto] gap-x-4 md:gap-x-8 gap-y-2 items-baseline py-6 md:py-7 border-b border-[#E6E8EC] transition-colors hover:bg-[#F3F8FD] px-2 -mx-2">
                            <span class="text-[10px] uppercase tracking-[0.2em] text-[#0368B4] font-semibold">{{ $guide['cat'] }}</span>
                            <h3 class="col-span-2 md:col-span-1 text-[18px] md:text-[20px] font-medium text-[#101828] group-hover:text-[#0368B4] transition-colors">{{ $guide['title'] }}</h3>
                            <span class="text-[12px] text-[#667085] hidden md:block">{{ $guide['time'] }}</span>
                            <span class="food-guide-arrow justify-self-end">→</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- 11. Closing --}}
        <section class="py-24 md:py-32">
            <div class="max-w-[1280px] mx-auto px-6">
                <div class="food-guide-reveal max-w-[640px] mx-auto text-center">
                    <blockquote class="food-guide-serif text-[28px] sm:text-[34px] md:text-[40px] leading-[1.25] font-medium italic text-[#101828] mb-12">
                        "Một chuyến đi đẹp luôn kết thúc bằng một bữa ăn đáng nhớ."
                    </blockquote>
                    <div class="flex flex-wrap justify-center gap-3 mb-16">
                        <a href="{{ route('guide') }}" class="inline-flex items-center justify-center bg-[#0368B4] text-white px-7 py-3 rounded-[4px] text-[11px] uppercase tracking-[0.16em] font-semibold hover:bg-[#025a9a] transition-colors">
                            Khám phá thêm cẩm nang
                        </a>
                        <a href="{{ route('destinations') }}" class="inline-flex items-center justify-center border border-[#E6E8EC] text-[#101828] px-7 py-3 rounded-[4px] text-[11px] uppercase tracking-[0.16em] font-semibold hover:border-[#0368B4] hover:text-[#0368B4] transition-colors">
                            Xem điểm đến
                        </a>
                    </div>
                    <div class="pt-10 border-t border-[#E6E8EC]">
                        <p class="text-[11px] uppercase tracking-[0.2em] text-[#667085] font-semibold mb-5">Newsletter</p>
                        <form class="flex flex-col sm:flex-row gap-3 max-w-[440px] mx-auto" action="#" method="post" onsubmit="return false;">
                            <label for="food-newsletter-email" class="sr-only">Email</label>
                            <input id="food-newsletter-email" type="email" name="email" placeholder="Email" class="flex-1 min-w-0 px-4 py-3 rounded-[4px] border border-[#E6E8EC] bg-white text-[#101828] text-[15px] placeholder:text-[#667085] focus:outline-none focus:border-[#0368B4] transition-colors">
                            <button type="submit" class="shrink-0 bg-[#101828] text-white px-7 py-3 rounded-[4px] text-[11px] uppercase tracking-[0.16em] font-semibold hover:bg-[#0368B4] transition-colors">Theo dõi</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
<script>
(function () {
    var reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    var nodes = document.querySelectorAll('.food-guide-reveal');
    if (reduced || !('IntersectionObserver' in window)) {
        nodes.forEach(function (el) { el.classList.add('is-visible'); });
    } else {
        var obs = new IntersectionObserver(function (entries) {
            entries.forEach(function (e) {
                if (!e.isIntersecting) return;
                e.target.classList.add('is-visible');
                obs.unobserve(e.target);
            });
        }, { threshold: 0.08, rootMargin: '0px 0px -40px 0px' });
        nodes.forEach(function (el) { obs.observe(el); });
    }
    if (!reduced) {
        var heroImg = document.querySelector('[data-food-parallax]');
        var ticking = false;
        function parallax() {
            if (!heroImg) return;
            var rect = heroImg.getBoundingClientRect();
            if (rect.bottom < 0) return;
            var progress = rect.top / window.innerHeight;
            heroImg.style.transform = 'scale(1.05) translateY(' + (progress * 28).toFixed(1) + 'px)';
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
