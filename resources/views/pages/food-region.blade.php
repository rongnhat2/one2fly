@extends('layouts.magazine')

@section('title', $region['hero']['title'] . ' — one2FLY!')
@section('meta_description', $region['hero']['tagline'])

@push('head')
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;1,400&family=Playfair+Display:ital,wght@0,400;0,500;1,400&display=swap" rel="stylesheet">
@endpush

@section('content')
    <div class="food-region relative overflow-hidden bg-[#FAFAF8] text-[#101828]">

        {{-- 1. Region Hero --}}
        <section class="food-region-hero relative min-h-[88vh] flex items-end overflow-hidden">
            <img
                src="{{ $region['hero']['image'] }}"
                alt="{{ $region['hero']['title'] }}"
                class="food-region-hero-img dest-cinema-bg absolute inset-0 h-full w-full object-cover object-center"
                data-food-region-parallax
            >
            <div class="dest-cinema-overlay absolute inset-0"></div>
            <svg class="absolute inset-0 w-full h-full pointer-events-none hidden md:block" viewBox="0 0 1440 800" fill="none" preserveAspectRatio="xMidYMid slice" aria-hidden="true">
                <path class="food-region-route-path" d="M-40 620 C 280 480, 540 680, 820 520 S 1180 300, 1520 200" stroke="#0368B4" stroke-width="1" stroke-dasharray="6 10" opacity="0.22"/>
            </svg>
            <p class="absolute top-[100px] right-6 text-[9px] uppercase tracking-[0.18em] text-white/45 hidden lg:block pointer-events-none" aria-hidden="true">{{ $region['hero']['coords'] }}</p>

            <div class="relative z-10 max-w-[1280px] mx-auto px-6 pb-16 md:pb-24 pt-[120px] w-full">
                <div class="max-w-[680px] food-region-reveal">
                    <p class="text-[10px] uppercase tracking-[0.28em] text-white/75 font-semibold mb-6">{{ $region['hero']['label'] }}</p>
                    <h1 class="food-region-serif text-[40px] sm:text-[52px] md:text-[64px] lg:text-[72px] leading-[1.05] font-medium tracking-[-0.02em] text-white mb-8">{{ $region['hero']['title'] }}</h1>
                    <p class="text-[16px] md:text-[17px] leading-[1.85] text-white/85 mb-10 max-w-[52ch] italic food-region-serif">{{ $region['hero']['tagline'] }}</p>
                    <div class="flex flex-wrap items-center gap-x-5 gap-y-2 text-[10px] uppercase tracking-[0.18em] text-white/65 mb-10">
                        @foreach ($region['hero']['stats'] as $stat)
                            <span>{{ $stat }}</span>
                            @unless ($loop->last)<span class="text-white/30">|</span>@endunless
                        @endforeach
                    </div>
                    <div class="flex flex-wrap gap-3">
                        <a href="#region-dishes" class="inline-flex items-center justify-center bg-white text-[#101828] px-7 py-3 rounded-[4px] text-[11px] uppercase tracking-[0.16em] font-semibold hover:bg-[#FAFAF8] transition-colors">
                            Khám phá món ăn
                        </a>
                        <a href="#region-restaurants" class="inline-flex items-center justify-center border border-white/40 text-white px-7 py-3 rounded-[4px] text-[11px] uppercase tracking-[0.16em] font-semibold hover:border-white hover:bg-white/10 transition-colors">
                            Xem quán gợi ý
                        </a>
                    </div>
                </div>
            </div>
        </section>

        {{-- 2. Region Overview --}}
        <section class="py-20 md:py-28 border-b border-[#E6E8EC]">
            <div class="max-w-[1280px] mx-auto px-6">
                <div class="food-region-reveal grid lg:grid-cols-[1fr_1.4fr] gap-12 lg:gap-20 items-start">
                    <h2 class="food-region-serif text-[32px] sm:text-[38px] md:text-[44px] leading-[1.15] font-medium text-[#101828] lg:sticky lg:top-28">{{ $region['overview']['heading'] }}</h2>
                    <div>
                        <div class="space-y-6 text-[16px] md:text-[17px] leading-[1.9] text-[#667085] mb-10">
                            @foreach ($region['overview']['paragraphs'] as $para)
                                <p>{{ $para }}</p>
                            @endforeach
                        </div>
                        <div class="flex flex-wrap gap-2">
                            @foreach ($region['overview']['keywords'] as $kw)
                                <span class="inline-block px-4 py-2 text-[11px] uppercase tracking-[0.14em] text-[#667085] border border-[#E6E8EC] rounded-full bg-white">{{ $kw }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- 3. Signature Dishes --}}
        <section id="region-dishes" class="py-20 md:py-28 border-b border-[#E6E8EC] bg-white">
            <div class="max-w-[1280px] mx-auto px-6">
                <header class="food-region-reveal mb-12 md:mb-16">
                    <p class="text-[11px] uppercase tracking-[0.24em] text-[#667085] font-semibold mb-3">Tuyển chọn</p>
                    <h2 class="food-region-serif text-[32px] md:text-[40px] font-medium text-[#101828]">Đặc sản nổi bật</h2>
                </header>
                <div class="food-region-reveal border-t border-[#E6E8EC]">
                    @foreach ($region['dishes'] as $dish)
                        <article class="food-region-dish-row group grid grid-cols-[auto_80px_1fr_auto] sm:grid-cols-[48px_120px_1fr_auto_auto] gap-4 md:gap-8 items-center py-7 md:py-9 border-b border-[#E6E8EC] transition-colors">
                            <span class="text-[13px] uppercase tracking-[0.14em] text-[#667085] font-medium">{{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                            <div class="overflow-hidden rounded-[4px] w-[80px] sm:w-[120px]">
                                <img src="{{ $dish['image'] }}" alt="{{ $dish['name'] }}" class="w-full aspect-square object-cover transition-transform duration-500 group-hover:scale-[1.06]" loading="lazy">
                            </div>
                            <div class="min-w-0">
                                <h3 class="food-region-dish-title text-[20px] md:text-[24px] font-medium text-[#101828] mb-1 transition-colors food-region-serif">{{ $dish['name'] }}</h3>
                                <p class="text-[10px] uppercase tracking-[0.16em] text-[#667085] mb-2">{{ $dish['province'] }}</p>
                                <p class="text-[14px] md:text-[15px] leading-[1.7] text-[#667085]">{{ $dish['desc'] }}</p>
                                <p class="text-[13px] text-[#667085] mt-2 sm:hidden">{{ $dish['price'] }}</p>
                            </div>
                            <span class="text-[13px] text-[#667085] whitespace-nowrap hidden sm:block">{{ $dish['price'] }}</span>
                            <span class="food-region-arrow text-[#101828] justify-self-end" aria-hidden="true">→</span>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- 4. Recommended Restaurants --}}
        <section id="region-restaurants" class="py-20 md:py-28 border-b border-[#E6E8EC]">
            <div class="max-w-[1280px] mx-auto px-6">
                <header class="food-region-reveal mb-12 md:mb-16">
                    <p class="text-[11px] uppercase tracking-[0.24em] text-[#0368B4] font-semibold mb-3">Địa điểm</p>
                    <h2 class="food-region-serif text-[32px] md:text-[40px] font-medium text-[#101828]">Quán nên ghé</h2>
                </header>

                @php $feat = $region['featured_restaurant']; @endphp
                <div class="food-region-reveal grid lg:grid-cols-[1.4fr_1fr] gap-10 lg:gap-14 mb-12">
                    <article class="group">
                        <div class="overflow-hidden rounded-[4px] mb-8">
                            <img src="{{ $feat['image'] }}" alt="{{ $feat['name'] }}" class="w-full aspect-[16/10] object-cover transition-transform duration-500 group-hover:scale-[1.02]" loading="lazy">
                        </div>
                        <h3 class="food-region-serif text-[28px] md:text-[36px] font-medium text-[#101828] mb-3">{{ $feat['name'] }}</h3>
                        <p class="text-[14px] text-[#667085] mb-4">{{ $feat['location'] }}</p>
                        <div class="flex flex-wrap gap-x-6 gap-y-2 text-[12px] uppercase tracking-[0.12em] text-[#667085] mb-6">
                            <span>{{ $feat['price'] }}</span>
                            <span>{{ $feat['hours'] }}</span>
                        </div>
                        <p class="text-[16px] leading-[1.8] text-[#667085] mb-6 max-w-[52ch]">{{ $feat['desc'] }}</p>
                        <a href="{{ $feat['maps'] }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 text-[11px] uppercase tracking-[0.16em] font-semibold text-[#101828] border-b border-[#101828] pb-1 hover:text-[#0368B4] hover:border-[#0368B4] transition-colors">
                            Google Maps <span class="food-region-arrow">→</span>
                        </a>
                    </article>

                    <div class="border-t border-[#E6E8EC] lg:border-t-0 lg:border-l lg:pl-14 lg:pt-0 pt-10">
                        <table class="w-full text-left" aria-label="Quán gợi ý khác">
                            <thead>
                                <tr class="text-[10px] uppercase tracking-[0.18em] text-[#667085] border-b border-[#E6E8EC]">
                                    <th class="pb-4 font-semibold">Quán</th>
                                    <th class="pb-4 font-semibold hidden sm:table-cell">Quận</th>
                                    <th class="pb-4 font-semibold">Giá</th>
                                    <th class="pb-4 font-semibold text-right">Đánh giá</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($region['restaurants'] as $rest)
                                    <tr class="food-region-rest-row group border-b border-[#E6E8EC] transition-colors">
                                        <td class="py-5 pr-4">
                                            <span class="text-[16px] md:text-[17px] font-medium text-[#101828] group-hover:text-[#0368B4] transition-colors">{{ $rest['name'] }}</span>
                                        </td>
                                        <td class="py-5 pr-4 text-[13px] text-[#667085] hidden sm:table-cell">{{ $rest['district'] }}</td>
                                        <td class="py-5 pr-4 text-[13px] text-[#667085] whitespace-nowrap">{{ $rest['price'] }}</td>
                                        <td class="py-5 text-[13px] text-[#667085] text-right whitespace-nowrap">★ {{ $rest['rating'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>

        {{-- 5. Province Explorer --}}
        <section class="py-20 md:py-28 border-b border-[#E6E8EC] bg-white">
            <div class="max-w-[1280px] mx-auto px-6">
                <header class="food-region-reveal mb-12 md:mb-16">
                    <h2 class="food-region-serif text-[32px] md:text-[40px] font-medium text-[#101828]">Khám phá theo tỉnh</h2>
                </header>
                <div class="food-region-reveal food-region-province-grid">
                    @foreach ($region['provinces'] as $prov)
                        <a href="{{ $prov['url'] }}" class="food-region-province group relative overflow-hidden rounded-[4px] border border-[#E6E8EC] min-h-[220px] md:min-h-[260px]">
                            <img src="{{ $prov['image'] }}" alt="{{ $prov['name'] }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-[1.04]" loading="lazy">
                            <div class="absolute inset-0 bg-gradient-to-t from-[#101828]/75 via-[#101828]/20 to-transparent"></div>
                            <div class="relative z-10 flex flex-col justify-end h-full p-6 md:p-8 min-h-[220px] md:min-h-[260px]">
                                <h3 class="food-region-serif text-[26px] md:text-[30px] font-medium text-white mb-2 group-hover:text-white/90 transition-colors">{{ $prov['name'] }}</h3>
                                <p class="text-[11px] uppercase tracking-[0.16em] text-white/70 mb-4">{{ $prov['guides'] }} cẩm nang ẩm thực</p>
                                <span class="inline-flex items-center gap-2 text-[10px] uppercase tracking-[0.16em] font-semibold text-white/90">
                                    Khám phá <span class="food-region-arrow">→</span>
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- 6. Price Reference --}}
        <section class="py-20 md:py-28 border-b border-[#E6E8EC]">
            <div class="max-w-[1280px] mx-auto px-6">
                <header class="food-region-reveal mb-12">
                    <h2 class="food-region-serif text-[32px] md:text-[40px] font-medium text-[#101828]">Chi phí tham khảo</h2>
                </header>
                <div class="food-region-reveal border-t border-[#E6E8EC] max-w-[720px]">
                    @foreach ($region['price_guide'] as $row)
                        <div class="flex items-baseline justify-between gap-6 py-5 md:py-6 border-b border-[#E6E8EC]">
                            <span class="text-[15px] md:text-[17px] text-[#101828]">{{ $row['cat'] }}</span>
                            <span class="text-[14px] uppercase tracking-[0.1em] text-[#667085] font-medium">{{ $row['range'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- 7. Regional Dining Tips --}}
        <section class="py-20 md:py-28 border-b border-[#E6E8EC] bg-white">
            <div class="max-w-[1280px] mx-auto px-6">
                <header class="food-region-reveal mb-12 md:mb-16">
                    <p class="text-[11px] uppercase tracking-[0.24em] text-[#667085] font-semibold mb-3">Sổ tay</p>
                    <h2 class="food-region-serif text-[32px] md:text-[40px] font-medium text-[#101828]">Mẹo ăn uống khi đi du lịch</h2>
                </header>
                <div class="food-region-reveal food-region-notebook max-w-[760px] mx-auto border border-[#E6E8EC] rounded-[4px] bg-[#FAFAF8] px-8 md:px-14 py-10 md:py-14">
                    @foreach ($region['tips'] as $tip)
                        <div class="food-region-tip flex gap-6 md:gap-10 py-7 md:py-8 border-b border-[#E6E8EC]/80 last:border-0">
                            <span class="food-region-serif text-[28px] md:text-[36px] leading-none text-[#0368B4]/30 font-medium shrink-0">{{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                            <p class="food-region-handwritten text-[17px] md:text-[19px] leading-[1.75] text-[#101828] pt-1">{{ $tip }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- 8. Things To Avoid --}}
        <section class="py-20 md:py-28 border-b border-[#E6E8EC]">
            <div class="max-w-[1280px] mx-auto px-6">
                <div class="food-region-reveal food-region-avoid border border-[#C97A00]/25 bg-[#FFF8EC] px-8 md:px-14 py-12 md:py-16 rounded-[4px]">
                    <p class="text-[11px] uppercase tracking-[0.24em] text-[#C97A00] font-semibold mb-4">Ghi chú biên tập</p>
                    <h2 class="food-region-serif text-[32px] md:text-[40px] font-medium text-[#101828] mb-10">Những điều nên lưu ý</h2>
                    <ul class="space-y-6 md:space-y-7">
                        @foreach ($region['avoid'] as $item)
                            <li class="food-region-avoid-item flex gap-4 items-start text-[16px] md:text-[17px] leading-[1.75] text-[#101828]">
                                <span class="shrink-0 w-5 h-5 mt-0.5 rounded-full border border-[#C97A00]/40 flex items-center justify-center text-[10px] text-[#C97A00]" aria-hidden="true">!</span>
                                {{ $item }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>

        {{-- 9. Food Journey --}}
        <section class="py-20 md:py-28 border-b border-[#E6E8EC] bg-white overflow-hidden">
            <div class="max-w-[1280px] mx-auto px-6">
                <header class="food-region-reveal mb-12 md:mb-16">
                    <h2 class="food-region-serif text-[32px] md:text-[40px] font-medium text-[#101828]">{{ $region['journey']['title'] }}</h2>
                </header>
                <div class="food-region-reveal grid lg:grid-cols-[1fr_340px] gap-12 lg:gap-16 items-start">
                    <div class="food-region-journey">
                        @foreach ($region['journey']['steps'] as $step)
                            <div class="food-region-journey-step">
                                <time class="block text-[11px] uppercase tracking-[0.2em] text-[#667085] font-semibold mb-2">{{ $step['time'] }}</time>
                                <p class="food-region-serif text-[28px] md:text-[34px] font-medium text-[#101828]">{{ $step['label'] }}</p>
                            </div>
                            @unless ($loop->last)
                                <span class="food-region-journey-arrow" aria-hidden="true">↓</span>
                            @endunless
                        @endforeach
                    </div>
                    <div class="overflow-hidden rounded-[4px] lg:sticky lg:top-28">
                        <img src="{{ $region['journey']['image'] }}" alt="{{ $region['name'] }}" class="w-full aspect-[3/4] object-cover" loading="lazy">
                    </div>
                </div>
            </div>
        </section>

        {{-- 10. Related Food Guides --}}
        <section class="py-20 md:py-28 border-b border-[#E6E8EC]">
            <div class="max-w-[1280px] mx-auto px-6">
                <header class="food-region-reveal mb-12">
                    <h2 class="food-region-serif text-[28px] md:text-[36px] font-medium text-[#101828]">Cẩm nang ẩm thực liên quan</h2>
                </header>
                <div class="food-region-reveal border-t border-[#E6E8EC]">
                    @foreach ($region['related_guides'] as $guide)
                        <a href="{{ $guide['url'] }}" class="food-region-related group grid grid-cols-[1fr_auto] md:grid-cols-[120px_1fr_auto_auto] gap-x-4 md:gap-x-8 gap-y-2 items-baseline py-6 md:py-7 border-b border-[#E6E8EC] transition-colors hover:bg-[#F3F8FD] px-2 -mx-2">
                            <span class="text-[10px] uppercase tracking-[0.2em] text-[#0368B4] font-semibold">{{ $guide['cat'] }}</span>
                            <h3 class="col-span-2 md:col-span-1 text-[18px] md:text-[20px] font-medium text-[#101828] group-hover:text-[#0368B4] transition-colors">{{ $guide['title'] }}</h3>
                            <span class="text-[12px] text-[#667085] hidden md:block">{{ $guide['time'] }}</span>
                            <span class="food-region-arrow justify-self-end">→</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- 11. Related Destinations --}}
        <section class="py-20 md:py-28 border-b border-[#E6E8EC] bg-white overflow-hidden">
            <div class="max-w-[1280px] mx-auto px-6 mb-10 food-region-reveal">
                <h2 class="food-region-serif text-[28px] md:text-[36px] font-medium text-[#101828]">Điểm đến liên quan</h2>
            </div>
            <div class="food-region-reveal">
                <div class="food-region-dest-carousel flex gap-5 md:gap-6 px-6 max-w-[1280px] mx-auto pb-2">
                    @foreach ($region['related_destinations'] as $dest)
                        <a href="{{ $dest['url'] }}" class="food-region-dest-item group shrink-0 w-[260px] md:w-[300px]">
                            <div class="overflow-hidden rounded-[4px] mb-4">
                                <img src="{{ $dest['image'] }}" alt="{{ $dest['name'] }}" class="w-full aspect-[4/3] object-cover transition-transform duration-500 group-hover:scale-[1.03]" loading="lazy">
                            </div>
                            <h3 class="food-region-serif text-[24px] font-medium text-[#101828] mb-1 group-hover:text-[#0368B4] transition-colors">{{ $dest['name'] }}</h3>
                            <p class="text-[12px] uppercase tracking-[0.14em] text-[#667085] mb-2">{{ $dest['mood'] }}</p>
                            <span class="inline-flex items-center gap-2 text-[10px] uppercase tracking-[0.16em] font-semibold text-[#101828] group-hover:text-[#0368B4] transition-colors">
                                Khám phá <span class="food-region-arrow">→</span>
                            </span>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- 12. Closing --}}
        <section class="py-24 md:py-32">
            <div class="max-w-[1280px] mx-auto px-6">
                <div class="food-region-reveal max-w-[640px] mx-auto text-center">
                    <blockquote class="food-region-serif text-[28px] sm:text-[34px] md:text-[40px] leading-[1.25] font-medium italic text-[#101828] mb-12">
                        "Mỗi vùng đất đều có một hương vị riêng. Hãy để hành trình của bạn bắt đầu từ bàn ăn."
                    </blockquote>
                    <div class="flex flex-wrap justify-center gap-3">
                        @if (count($region['siblings']) > 0)
                            <div class="relative inline-block" id="region-siblings-wrap">
                                <button type="button" class="inline-flex items-center justify-center bg-[#0368B4] text-white px-7 py-3 rounded-[4px] text-[11px] uppercase tracking-[0.16em] font-semibold hover:bg-[#025a9a] transition-colors" aria-haspopup="true" aria-expanded="false" id="region-siblings-toggle">
                                    Khám phá vùng khác
                                </button>
                                <div class="hidden absolute left-1/2 -translate-x-1/2 top-full mt-2 min-w-[200px] bg-white border border-[#E6E8EC] rounded-[4px] py-2 z-20" id="region-siblings-menu" role="menu">
                                    @foreach ($region['siblings'] as $sib)
                                        <a href="{{ route('food.region', $sib['slug']) }}" class="block px-5 py-3 text-[14px] text-[#101828] hover:bg-[#F3F8FD] hover:text-[#0368B4] transition-colors">{{ $sib['name'] }}</a>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        <a href="{{ route('food') }}" class="inline-flex items-center justify-center border border-[#E6E8EC] text-[#101828] px-7 py-3 rounded-[4px] text-[11px] uppercase tracking-[0.16em] font-semibold hover:border-[#0368B4] hover:text-[#0368B4] transition-colors">
                            Quay lại Cẩm nang Ẩm thực
                        </a>
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
    var nodes = document.querySelectorAll('.food-region-reveal');
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
        var heroImg = document.querySelector('[data-food-region-parallax]');
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
    var sibToggle = document.getElementById('region-siblings-toggle');
    var sibMenu = document.getElementById('region-siblings-menu');
    if (sibToggle && sibMenu) {
        sibToggle.addEventListener('click', function (e) {
            e.stopPropagation();
            var open = !sibMenu.classList.contains('hidden');
            sibMenu.classList.toggle('hidden');
            sibToggle.setAttribute('aria-expanded', open ? 'false' : 'true');
        });
        document.addEventListener('click', function () {
            sibMenu.classList.add('hidden');
            sibToggle.setAttribute('aria-expanded', 'false');
        });
    }
})();
</script>
@endpush
