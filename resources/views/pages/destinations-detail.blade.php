@extends('layouts.magazine')

@section('title', $dest['name'] . ' — Điểm đến · one2FLY!')
@section('meta_description', $dest['tagline'])

@push('head')
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;1,400&display=swap" rel="stylesheet">
@endpush

@section('content')
    {{-- 1. Hero — magazine cover --}}
    <section class="dest-profile-hero relative overflow-hidden flex flex-col min-h-[80vh]">
        <img class="dest-cinema-bg absolute inset-0 h-full w-full object-cover object-center" src="{{ $dest['hero_image'] }}" alt="{{ $dest['name'] }}">
        <div class="dest-cinema-overlay absolute inset-0"></div>

        <svg class="dest-profile-route absolute inset-0 w-full h-full pointer-events-none" viewBox="0 0 1440 800" fill="none" preserveAspectRatio="xMidYMid slice" aria-hidden="true">
            <path class="dest-profile-route-path" d="M-40 600 C 300 450, 520 650, 800 500 S 1200 280, 1500 180" stroke="#0368B4" stroke-width="1" stroke-dasharray="6 10" opacity="0.25"/>
            <g opacity="0.5" transform="translate(1100 240) rotate(20)">
                <path d="M0 0 L14 4 L0 8 L2.5 4 Z" fill="#0368B4"/>
            </g>
        </svg>

        <div class="relative z-10 flex-1 flex items-end pt-[88px]">
            <div class="max-w-[1280px] mx-auto px-6 pb-20 md:pb-28 w-full">
                <div class="max-w-[720px]">
                    <p class="text-[11px] uppercase tracking-[0.28em] text-white/75 mb-4">{{ $dest['label'] }}</p>
                    <h1 class="dest-profile-serif text-[48px] sm:text-[64px] lg:text-[88px] xl:text-[104px] leading-[0.95] font-medium tracking-[-0.02em] text-white mb-5">
                        {{ $dest['name'] }}
                    </h1>
                    <p class="dest-profile-serif text-[20px] md:text-[24px] leading-[1.4] text-white/90 italic mb-8 max-w-[540px]">
                        "{{ $dest['tagline'] }}"
                    </p>
                    <div class="flex flex-wrap items-center gap-x-4 gap-y-2 text-[11px] uppercase tracking-[0.16em] text-white/70 mb-4">
                        <span>{{ $dest['country'] }}</span>
                        <span class="text-white/35">•</span>
                        <span><span class="text-white/50">Best time:</span> {{ $dest['best_time'] }}</span>
                        <span class="text-white/35">•</span>
                        <span><span class="text-white/50">Mood:</span> {{ $dest['mood'] }}</span>
                    </div>
                    <p class="text-[10px] uppercase tracking-[0.14em] text-white/55">{{ $dest['coords'] }}</p>
                </div>
            </div>
        </div>

        <a href="#dest-facts" class="absolute bottom-8 left-1/2 -translate-x-1/2 z-20 flex flex-col items-center gap-3 text-[10px] uppercase tracking-[0.22em] text-white/55 hover:text-white/80 transition-colors">
            <span class="dest-cinema-scroll-line block h-10 w-px bg-white/70"></span>
            <span>Cuộn để khám phá</span>
        </a>
    </section>

    <div class="dest-profile bg-[#FAFAF8] text-[#101828]">

        {{-- 2. Quick facts --}}
        <section id="dest-facts" class="border-b border-[#E6E8EC] bg-white">
            <div class="max-w-[1280px] mx-auto px-6">
                <div class="dest-detail-reveal grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 divide-y md:divide-y-0 md:divide-x divide-[#E6E8EC] border-b border-[#E6E8EC] lg:border-0">
                    @foreach ($dest['facts'] as $fact)
                        <div class="py-8 md:py-10 lg:px-6 first:lg:pl-0 last:lg:pr-0">
                            <p class="text-[10px] uppercase tracking-[0.2em] text-[#667085] mb-2">{{ $fact['label'] }}</p>
                            <p class="text-[15px] md:text-[16px] font-medium text-[#101828]">{{ $fact['value'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- 3. Editorial intro --}}
        <section class="py-20 md:py-28 border-b border-[#E6E8EC]">
            <div class="max-w-[1280px] mx-auto px-6 dest-detail-reveal">
                <div class="grid lg:grid-cols-2 gap-12 lg:gap-20 items-start">
                    <h2 class="dest-profile-serif text-[32px] md:text-[44px] lg:text-[52px] leading-[1.1] font-medium text-[#101828]">
                        {{ $dest['intro_title'] }}
                    </h2>
                    <div class="space-y-5 text-[16px] md:text-[17px] leading-[1.85] text-[#667085]">
                        @foreach ($dest['intro'] as $para)
                            <p>{{ $para }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        {{-- 4. Photo story --}}
        <section class="py-16 md:py-24 border-b border-[#E6E8EC] bg-white">
            <div class="max-w-[1280px] mx-auto px-6 dest-detail-reveal">
                <p class="text-[11px] uppercase tracking-[0.24em] text-[#0368B4] font-semibold mb-3">Photo story</p>
                <h2 class="dest-profile-serif text-[28px] md:text-[36px] font-medium text-[#101828] mb-10">Travel diary</h2>

                <div class="dest-profile-gallery">
                    @foreach ($dest['photos'] as $photo)
                        <figure @class(['dest-profile-gallery-item', 'dest-profile-gallery-item--large' => $photo['large']])>
                            <img src="{{ $photo['src'] }}" alt="{{ $photo['cap'] }}" class="w-full h-full object-cover rounded-[4px]" loading="lazy">
                            <figcaption class="mt-2 text-[10px] uppercase tracking-[0.16em] text-[#667085]">{{ $photo['cap'] }}</figcaption>
                        </figure>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- 5. Things to experience --}}
        <section class="py-20 md:py-28 border-b border-[#E6E8EC]">
            <div class="max-w-[1280px] mx-auto px-6 dest-detail-reveal">
                <p class="text-[11px] uppercase tracking-[0.24em] text-[#0368B4] font-semibold mb-3">Trải nghiệm</p>
                <h2 class="dest-profile-serif text-[32px] md:text-[40px] font-medium text-[#101828] mb-12">Những trải nghiệm nên thử</h2>

                <div class="border-t border-[#E6E8EC]">
                    @foreach ($dest['experiences'] as $exp)
                        <article class="dest-profile-exp group grid md:grid-cols-[3rem_1fr_140px] lg:grid-cols-[4rem_1fr_180px] gap-6 items-center py-8 md:py-10 border-b border-[#E6E8EC] px-2 -mx-2 transition-colors duration-300 hover:bg-[#F3F8FD]">
                            <span class="text-[12px] uppercase tracking-[0.2em] text-[#0368B4] font-semibold">{{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                            <div>
                                <h3 class="dest-profile-serif text-[22px] md:text-[28px] font-medium text-[#101828] mb-2 group-hover:text-[#0368B4] transition-colors">{{ $exp['title'] }}</h3>
                                <p class="text-[15px] leading-[1.75] text-[#667085] max-w-[48ch]">{{ $exp['desc'] }}</p>
                            </div>
                            <div class="hidden md:block overflow-hidden rounded-[4px] opacity-70 group-hover:opacity-100 transition-opacity">
                                <img src="{{ $exp['img'] }}" alt="" class="w-full h-[100px] lg:h-[120px] object-cover transition-transform duration-500 group-hover:scale-[1.03]" loading="lazy">
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- 6. Suggested route --}}
        <section class="py-20 md:py-28 border-b border-[#E6E8EC] bg-white">
            <div class="max-w-[1280px] mx-auto px-6 dest-detail-reveal">
                <p class="text-[11px] uppercase tracking-[0.24em] text-[#0368B4] font-semibold mb-3">Lịch trình</p>
                <h2 class="dest-profile-serif text-[32px] md:text-[40px] font-medium text-[#101828] mb-12">{{ $dest['route_title'] }}</h2>

                <div class="grid lg:grid-cols-[1fr_0.75fr] gap-14 lg:gap-20 items-start">
                    <div class="dest-profile-timeline relative pl-8">
                        <div class="absolute left-[7px] top-2 bottom-2 w-px bg-[#E6E8EC]" aria-hidden="true"></div>
                        @foreach ($dest['route'] as $stop)
                            <article class="relative pb-9 last:pb-0">
                                <span class="absolute -left-8 top-1.5 w-[15px] h-[15px] rounded-full border-2 border-[#0368B4] bg-[#FAFAF8]" aria-hidden="true"></span>
                                <p class="text-[11px] uppercase tracking-[0.2em] text-[#0368B4] font-semibold mb-1">{{ $stop['time'] }}</p>
                                <h3 class="dest-profile-serif text-[22px] md:text-[26px] font-medium text-[#101828] mb-1">{{ $stop['title'] }}</h3>
                                <p class="text-[14px] text-[#667085]">{{ $stop['note'] }}</p>
                            </article>
                        @endforeach
                    </div>
                    <figure class="hidden lg:block overflow-hidden rounded-[4px] sticky top-[108px]">
                        <img src="{{ $dest['route_image'] }}" alt="{{ $dest['route_title'] }}" class="w-full aspect-[3/4] object-cover" loading="lazy">
                    </figure>
                </div>
            </div>
        </section>

        {{-- 7. Area guide --}}
        <section class="py-20 md:py-28 border-b border-[#E6E8EC]">
            <div class="max-w-[1280px] mx-auto px-6 dest-detail-reveal">
                <p class="text-[11px] uppercase tracking-[0.24em] text-[#0368B4] font-semibold mb-3">Khu vực</p>
                <h2 class="dest-profile-serif text-[32px] md:text-[40px] font-medium text-[#101828] mb-12">Các khu vực nên biết</h2>

                <div class="grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">
                    <div class="dest-profile-map relative aspect-[4/3] bg-[#F3F8FD] border border-[#E6E8EC] rounded-[4px] overflow-hidden" aria-hidden="true">
                        <svg class="absolute inset-0 w-full h-full p-8" viewBox="0 0 400 300" fill="none">
                            <path d="M40 220 C 120 180, 200 240, 280 160 S 360 80, 380 60" stroke="#0368B4" stroke-width="1.5" stroke-dasharray="5 8" opacity="0.4"/>
                            <circle cx="120" cy="200" r="6" fill="#0368B4" opacity="0.6"/>
                            <circle cx="200" cy="140" r="6" fill="#0368B4" opacity="0.6"/>
                            <circle cx="280" cy="180" r="6" fill="#0368B4" opacity="0.6"/>
                            <circle cx="160" cy="100" r="6" fill="#0368B4" opacity="0.6"/>
                            <circle cx="240" cy="220" r="6" fill="#0368B4" opacity="0.6"/>
                        </svg>
                    </div>
                    <div class="space-y-0 border-t border-[#E6E8EC]">
                        @foreach ($dest['areas'] as $area)
                            <div class="py-6 border-b border-[#E6E8EC] group hover:pl-2 transition-all duration-300">
                                <h3 class="dest-profile-serif text-[22px] font-medium text-[#101828] mb-1 group-hover:text-[#0368B4] transition-colors">{{ $area['name'] }}</h3>
                                <p class="text-[15px] text-[#667085]">{{ $area['desc'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        {{-- 8. Related guides --}}
        <section class="py-20 md:py-28 border-b border-[#E6E8EC] bg-white">
            <div class="max-w-[1280px] mx-auto px-6 dest-detail-reveal">
                <p class="text-[11px] uppercase tracking-[0.24em] text-[#0368B4] font-semibold mb-3">Cẩm nang</p>
                <h2 class="dest-profile-serif text-[32px] md:text-[40px] font-medium text-[#101828] mb-10">Bài liên quan</h2>

                <div class="border-t border-[#E6E8EC]">
                    @foreach ($dest['guides'] as $guide)
                        <a href="{{ $guide['url'] }}" class="dest-profile-guide group flex flex-col sm:flex-row sm:items-center justify-between gap-4 py-7 border-b border-[#E6E8EC] hover:bg-[#F3F8FD] px-2 -mx-2 transition-colors">
                            <div>
                                <p class="text-[10px] uppercase tracking-[0.2em] text-[#0368B4] font-semibold mb-2">{{ $guide['cat'] }}</p>
                                <h3 class="dest-profile-serif text-[24px] md:text-[28px] font-medium text-[#101828] group-hover:text-[#0368B4] transition-colors">{{ $guide['title'] }}</h3>
                            </div>
                            <span class="dest-detail-cta-arrow text-xl text-[#667085] group-hover:text-[#0368B4] shrink-0">→</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- 9. Related destinations --}}
        <section class="py-20 md:py-28 border-b border-[#E6E8EC]">
            <div class="max-w-[1280px] mx-auto px-6 dest-detail-reveal">
                <p class="text-[11px] uppercase tracking-[0.24em] text-[#0368B4] font-semibold mb-3">Tiếp tục</p>
                <h2 class="dest-profile-serif text-[32px] md:text-[40px] font-medium text-[#101828] mb-10">Điểm đến liên quan</h2>

                <div class="dest-detail-nearby-track flex gap-5 overflow-x-auto pb-4 -mx-6 px-6 md:mx-0 md:px-0">
                    @foreach ($dest['related'] as $near)
                        <a href="{{ route('destinations.detail') }}" class="group relative shrink-0 w-[260px] md:w-[300px] h-[380px] block overflow-hidden rounded-[4px]">
                            <img class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-[1.04]" src="{{ $near['img'] }}" alt="{{ $near['name'] }}">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/65 via-black/15 to-transparent"></div>
                            <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                                <p class="text-[10px] uppercase tracking-[0.16em] text-white/75 mb-1">{{ $near['country'] }} · {{ $near['mood'] }}</p>
                                <h3 class="dest-profile-serif text-[28px] font-medium flex items-end justify-between">
                                    {{ $near['name'] }}
                                    <span class="dest-detail-cta-arrow text-lg opacity-70 group-hover:opacity-100">→</span>
                                </h3>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- 10. Closing CTA --}}
        <section class="py-24 md:py-32">
            <div class="max-w-[1280px] mx-auto px-6 text-center dest-detail-reveal">
                <p class="dest-profile-serif text-[28px] md:text-[40px] leading-[1.3] font-medium text-[#101828] max-w-[30ch] mx-auto mb-10 italic">
                    "Có những nơi không cần đi thật xa, chỉ cần đi chậm hơn."
                </p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <button type="button" class="inline-flex items-center gap-2 px-8 py-3.5 text-[11px] uppercase tracking-[0.18em] font-semibold text-[#101828] border border-[#E6E8EC] rounded-[4px] hover:border-[#0368B4] transition-colors">
                        Lưu điểm đến
                    </button>
                    <a href="{{ route('guide') }}" class="inline-flex items-center gap-2 bg-[#0368B4] text-white px-8 py-3.5 text-[11px] uppercase tracking-[0.18em] font-semibold rounded-[4px] hover:opacity-90 transition-opacity">
                        Xem cẩm nang {{ $dest['name'] }} <span class="dest-detail-cta-arrow">→</span>
                    </a>
                    <a href="{{ route('explore') }}" class="inline-flex items-center gap-2 px-8 py-3.5 text-[11px] uppercase tracking-[0.18em] font-semibold text-[#101828] border border-[#E6E8EC] rounded-[4px] hover:border-[#0368B4] transition-colors">
                        Khám phá thêm {{ $dest['country'] }} <span class="dest-detail-cta-arrow">→</span>
                    </a>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
<script>
(function () {
    var nodes = document.querySelectorAll('.dest-detail-reveal');
    if (!nodes.length) return;
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        nodes.forEach(function (el) { el.classList.add('is-visible'); });
        return;
    }
    var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (!entry.isIntersecting) return;
            entry.target.classList.add('is-visible');
            observer.unobserve(entry.target);
        });
    }, { threshold: 0.08, rootMargin: '0px 0px -40px 0px' });
    nodes.forEach(function (el) { observer.observe(el); });
})();
</script>
@endpush
