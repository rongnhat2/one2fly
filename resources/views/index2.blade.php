@extends('layouts.magazine')

@section('title', 'one2FLY! — Travel Magazine')
@section('meta_description', 'one2FLY! — Tạp chí du lịch số, điểm đến, ẩm thực, săn deal và cẩm nang du lịch thông minh.')

@push('head')
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;1,400&family=Playfair+Display:ital,wght@0,400;0,500;1,400&display=swap" rel="stylesheet">
@endpush

@section('content')
<div class="home-editorial bg-[#FAFAF8] text-[#101828]">

    {{-- Hero — nội dung từ index.blade.php --}}
    <section class="home-cinema-hero relative min-h-[690px] md:min-h-[760px] flex items-center overflow-hidden">
        <img class="dest-cinema-bg absolute inset-0 h-full w-full object-cover object-center" src="{{ $home['hero']['image'] }}" alt="">
        <div class="dest-cinema-overlay absolute inset-0"></div>
        <svg class="absolute inset-0 w-full h-full pointer-events-none" viewBox="0 0 1440 800" fill="none" preserveAspectRatio="xMidYMid slice" aria-hidden="true">
            <path class="issue-mag-route-path" d="M-40 600 C 300 450, 520 650, 800 500 S 1200 280, 1500 180" stroke="#0368B4" stroke-width="1" stroke-dasharray="6 10" opacity="0.25" />
        </svg>
        <div class="relative z-10 max-w-[1280px] mx-auto px-6 w-full pt-[88px] pb-20">
            <div class="max-w-[680px] home-reveal">
                <p class="home-serif italic text-[22px] md:text-[24px] text-white/90 mb-5">{{ $home['hero']['eyebrow'] }}</p>
                <h1 class="home-serif text-[56px] sm:text-[72px] md:text-[96px] lg:text-[112px] leading-[0.92] font-medium tracking-[-0.02em] text-white mb-7 whitespace-pre-line">{{ $home['hero']['title'] }}</h1>
                <p class="text-[17px] md:text-xl leading-[1.75] text-white/85 mb-10 max-w-[52ch]">{{ $home['hero']['intro'] }}</p>
                <a href="{{ $home['hero']['cta_href'] }}" class="inline-flex items-center gap-5 text-white group">
                    <span class="w-12 h-12 rounded-[4px] bg-white text-[#101828] flex items-center justify-center text-sm transition-transform group-hover:scale-105">▶</span>
                    <span class="text-sm font-medium">{{ $home['hero']['cta'] }}</span>
                </a>
            </div>
        </div>
    </section>

    {{-- Teasers --}}
    <section class="relative z-10 -mt-16 md:-mt-20 pb-4 border-b border-[#E6E8EC]">
        <div class="max-w-[1280px] mx-auto px-6 grid md:grid-cols-3 gap-4 md:gap-5">
            @foreach ($home['teasers'] as $teaser)
            <a href="{{ $teaser['url'] }}" class="home-reveal home-teaser group relative min-h-[280px] md:min-h-[320px] overflow-hidden rounded-[4px] block">
                <img src="{{ $teaser['image'] }}" alt="{{ $teaser['title'] }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-[1.03]" loading="lazy">
                <div class="absolute inset-0 bg-gradient-to-t from-black/75 via-black/20 to-transparent"></div>
                <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                    <p class="text-[10px] uppercase tracking-[0.2em] text-white/80 font-semibold mb-2">{{ $teaser['label'] }}</p>
                    <h3 class="home-serif text-[22px] md:text-[24px] leading-[1.15] font-medium">{{ $teaser['title'] }}</h3>
                </div>
            </a>
            @endforeach
        </div>
    </section>

    {{-- Campaign --}}
    <section id="campaign-editorial" class="py-16 md:py-24 border-b border-[#E6E8EC]">
        <div class="max-w-[1280px] mx-auto px-6">
            <div class="grid lg:grid-cols-[1.35fr_0.65fr] gap-5 md:gap-6 items-stretch">
                <article class="home-reveal relative min-h-[480px] lg:min-h-[560px] overflow-hidden rounded-[4px]">
                    <img src="{{ $home['campaign']['image'] }}" alt="{{ $home['campaign']['title'] }}" class="absolute inset-0 w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/35 to-black/15"></div>
                    <div class="relative z-10 flex flex-col justify-end min-h-[480px] lg:min-h-[560px] p-8 md:p-10">
                        <div class="mb-8 md:mb-10">
                            <p class="inline-flex items-center gap-2 text-[11px] uppercase tracking-[0.18em] font-semibold text-[#ffffff] mb-4">
                                <span class="w-6 h-px bg-[#ffffff]"></span>
                                {{ $home['campaign']['eyebrow'] }}
                            </p>
                            <h2 class="home-serif text-[32px] md:text-[40px] lg:text-[44px] leading-[1.08] font-medium text-white mb-4">
                                Du lịch đừng để bị <span class="text-[#7dd3fc] font-semibold">{{ $home['campaign']['title_accent'] }}</span>
                            </h2>
                            <p class="text-[15px] md:text-[16px] leading-[1.8] text-white/85 max-w-[52ch]">{{ $home['campaign']['lead'] }}</p>
                        </div>
                        <div class="home-campaign-stats grid grid-cols-2 md:grid-cols-4 gap-2 md:gap-3" id="campaign-stats">
                            @foreach ($home['campaign']['stats'] as $stat)
                            <div class="home-campaign-stat image-card-stat">
                                <b>{{ $stat['num'] }}</b>
                                <span>{{ $stat['label'] }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </article>

                <div id="daily" class="grid gap-4 md:gap-5">
                    @foreach ($home['campaign']['daily'] as $daily)
                    <article class="home-reveal home-teaser group relative min-h-[240px] lg:min-h-[268px] overflow-hidden rounded-[4px]">
                        <img src="{{ $daily['image'] }}" alt="" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-[1.03]" loading="lazy">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/25 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                            <p class="text-[10px] uppercase tracking-[0.2em] text-white/80 font-semibold mb-2">{{ $daily['label'] }}</p>
                            <h3 class="home-serif text-[22px] leading-[1.15] font-medium mb-2 whitespace-pre-line">{{ $daily['title'] }}</h3>
                            <p class="text-[14px] leading-[1.65] text-white/85">{{ $daily['desc'] }}</p>
                        </div>
                    </article>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- Offers --}}
    <section id="offers-editorial" class="py-16 md:py-24 lg:py-28 border-b border-[#E6E8EC] bg-white">
        <div class="max-w-[1280px] mx-auto px-6">
            <header class="home-reveal mb-12 md:mb-16">
                <p class="text-[11px] uppercase tracking-[0.2em] font-semibold text-[#667085] mb-3">{{ $home['offers']['eyebrow'] }}</p>
                <h2 class="home-serif text-[32px] md:text-[44px] lg:text-[52px] leading-[1.05] font-medium tracking-[-0.02em] text-[#101828]">{{ $home['offers']['title'] }}</h2>
            </header>

            <div class="grid grid-cols-1 lg:grid-cols-[1fr_2fr_1fr] gap-10 lg:gap-12">
                <aside class="home-reveal order-2 lg:order-1 flex flex-col gap-12 lg:gap-14">
                    @foreach ($home['offers']['side'] as $offer)
                    <article>
                        <a href="{{ $offer['url'] }}" class="group block">
                            <div class="overflow-hidden rounded-[4px] mb-5">
                                <img class="w-full aspect-[4/3] object-cover transition-transform duration-500 group-hover:scale-[1.03]" src="{{ $offer['image'] }}" alt="{{ $offer['title'] }}" loading="lazy">
                            </div>
                            <p class="text-[11px] uppercase tracking-[0.18em] font-semibold text-[#667085] mb-2">{{ $offer['eyebrow'] }}</p>
                            <h3 class="home-serif text-[26px] leading-tight font-medium text-[#101828] mb-3 group-hover:text-[#0368B4] transition-colors">{{ $offer['title'] }}</h3>
                            <p class="text-[15px] leading-[1.75] text-[#667085] mb-4">{{ $offer['desc'] }}</p>
                            <span class="inline-flex items-center gap-2 text-[12px] uppercase tracking-[0.14em] font-semibold text-[#101828] group-hover:text-[#0368B4] transition-colors">
                                Xem ưu đãi <span class="issue-mag-btn-arrow">→</span>
                            </span>
                        </a>
                    </article>
                    @endforeach
                </aside>

                <div class="home-reveal order-1 lg:order-2 md:col-span-2 lg:col-span-1">
                    @php $feat = $home['offers']['featured']; @endphp
                    <article class="mb-12 lg:mb-14">
                        <a href="{{ $feat['url'] }}" class="group block">
                            <div class="overflow-hidden rounded-[4px] mb-8">
                                <img class="w-full aspect-[16/10] md:aspect-[5/3] object-cover transition-transform duration-500 group-hover:scale-[1.02]" src="{{ $feat['image'] }}" alt="{{ $feat['title'] }}" loading="lazy">
                            </div>
                            <p class="text-[11px] uppercase tracking-[0.2em] font-semibold text-[#667085] mb-4">{{ $feat['eyebrow'] }}</p>
                            <h3 class="home-serif text-[32px] md:text-[44px] lg:text-[48px] leading-[1.02] font-medium tracking-[-0.03em] text-[#101828] mb-5 group-hover:text-[#0368B4] transition-colors max-w-[18ch]">{{ $feat['title'] }}</h3>
                            <p class="text-base md:text-lg leading-[1.8] text-[#667085] max-w-[52ch] mb-8">{{ $feat['desc'] }}</p>
                            <span class="inline-flex items-center gap-2 text-[12px] uppercase tracking-[0.16em] font-semibold text-[#101828] border-b border-[#101828] pb-1 group-hover:text-[#0368B4] group-hover:border-[#0368B4] transition-colors">
                                {{ $feat['cta'] }} <span class="issue-mag-btn-arrow">→</span>
                            </span>
                        </a>
                    </article>

                    @php $pick = $home['offers']['editor_pick']; @endphp
                    <article class="border-t border-[#E6E8EC] pt-10">
                        <a href="{{ $pick['url'] }}" class="group grid md:grid-cols-[1.1fr_0.9fr] gap-6 md:gap-8 items-center">
                            <div>
                                <p class="text-[11px] uppercase tracking-[0.18em] font-semibold text-[#667085] mb-3">{{ $pick['eyebrow'] }}</p>
                                <h4 class="home-serif text-2xl md:text-3xl leading-tight font-medium text-[#101828] mb-3 group-hover:text-[#0368B4] transition-colors">{{ $pick['title'] }}</h4>
                                <p class="text-[15px] leading-[1.75] text-[#667085]">{{ $pick['desc'] }}</p>
                            </div>
                            <div class="overflow-hidden rounded-[4px]">
                                <img class="w-full aspect-[4/3] object-cover transition-transform duration-500 group-hover:scale-[1.03]" src="{{ $pick['image'] }}" alt="{{ $pick['title'] }}" loading="lazy">
                            </div>
                        </a>
                    </article>
                </div>

                <aside class="home-reveal order-3">
                    <h3 class="home-serif text-[28px] md:text-[32px] leading-none font-medium text-[#101828] mb-8 pb-4 border-b border-[#E6E8EC]">Ưu đãi nổi bật</h3>
                    <div class="flex flex-col border-t border-[#E6E8EC]">
                        @foreach ($home['offers']['highlights'] as $item)
                        <a href="{{ $item['url'] }}" class="group grid grid-cols-[1fr_72px] gap-5 items-start py-5 border-b border-[#E6E8EC] first:pt-5 hover:bg-[#F3F8FD] -mx-2 px-2 transition-colors">
                            <div>
                                <h4 class="home-serif text-xl leading-tight font-medium text-[#101828] mb-2 group-hover:text-[#0368B4] transition-colors">{{ $item['title'] }}</h4>
                                <p class="text-sm leading-6 text-[#667085]">{{ $item['desc'] }}</p>
                            </div>
                            <img class="w-[72px] h-[72px] rounded-[4px] object-cover" src="{{ $item['image'] }}" alt="{{ $item['title'] }}" loading="lazy">
                        </a>
                        @endforeach
                    </div>
                    <a href="{{ $home['offers']['all_url'] }}" class="group inline-flex items-center gap-2 mt-8 text-[12px] uppercase tracking-[0.16em] font-semibold text-[#101828] hover:text-[#0368B4] transition-colors">
                        Xem tất cả ưu đãi <span class="issue-mag-btn-arrow">→</span>
                    </a>
                </aside>
            </div>
        </div>
    </section>

    {{-- Food guide --}}
    <section id="food-guide" class="py-16 md:py-20 border-b border-[#E6E8EC]">
        <div class="max-w-[1280px] mx-auto px-6">
            <header class="home-reveal text-center mb-10 md:mb-12">
                <p class="text-[11px] uppercase tracking-[0.2em] font-semibold text-[#667085] mb-2">{{ $home['food']['eyebrow'] }}</p>
                <h2 class="home-serif text-[36px] md:text-[44px] font-medium text-[#101828]">{{ $home['food']['title'] }}</h2>
                <a href="{{ route('food') }}" class="inline-flex items-center gap-2 mt-6 text-[11px] uppercase tracking-[0.16em] font-semibold text-[#101828] border-b border-[#101828] pb-1 hover:text-[#0368B4] hover:border-[#0368B4] transition-colors">
                    Xem cẩm nang ẩm thực <span class="issue-mag-btn-arrow">→</span>
                </a>
            </header>
            <div class="grid lg:grid-cols-[1.05fr_0.95fr] gap-5 items-stretch">
                @php $foodFeat = $home['food']['feature']; @endphp
                <a href="{{ route('food') }}" class="home-reveal home-teaser group relative min-h-[480px] md:min-h-[560px] lg:min-h-[620px] overflow-hidden rounded-[4px] block">
                    <img src="{{ $foodFeat['image'] }}" alt="{{ $foodFeat['title'] }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-[1.02]">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/30 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-8 md:p-10 text-white">
                        <p class="text-[10px] uppercase tracking-[0.2em] text-white/80 font-semibold mb-3">{{ $foodFeat['label'] }}</p>
                        <h2 class="home-serif text-[32px] md:text-[40px] leading-[1.05] font-medium tracking-[-0.03em] max-w-[640px] mb-4">{{ $foodFeat['title'] }}</h2>
                        <p class="text-[15px] md:text-base leading-[1.8] text-white/85 max-w-[580px]">{{ $foodFeat['desc'] }}</p>
                    </div>
                </a>

                <div class="grid gap-4">
                    <article class="home-reveal bg-white p-8 md:p-10 rounded-[4px] border border-[#E6E8EC]">
                        <p class="text-[11px] uppercase tracking-[0.22em] font-semibold text-[#667085] mb-4">{{ $home['food']['panels'][0]['eyebrow'] }}</p>
                        <h3 class="home-serif text-[28px] md:text-[36px] leading-tight font-medium tracking-[-0.03em] text-[#101828]">{{ $home['food']['panels'][0]['title'] }}</h3>
                        <p class="text-[#667085] leading-[1.75] mt-4">{{ $home['food']['panels'][0]['desc'] }}</p>
                        <a href="{{ route('food') }}#food-dishes" class="inline-flex items-center gap-2 mt-6 text-[11px] uppercase tracking-[0.14em] font-semibold text-[#101828] hover:text-[#0368B4] transition-colors">
                            Xem món nên thử <span class="issue-mag-btn-arrow">→</span>
                        </a>
                    </article>
                    <div class="grid md:grid-cols-2 gap-4">
                        @foreach (array_slice($home['food']['panels'], 1, 2) as $panel)
                        <a href="{{ route('food') }}" class="home-reveal bg-white p-6 rounded-[4px] border border-[#E6E8EC] block hover:border-[#0368B4] transition-colors">
                            <span class="inline-flex w-10 h-10 items-center justify-center rounded-[4px] border border-[#E6E8EC] text-[#0368B4] home-serif text-lg mb-5">{{ $panel['eyebrow'] }}</span>
                            <h3 class="home-serif text-2xl md:text-[28px] font-medium leading-tight mb-3 text-[#101828]">{{ $panel['title'] }}</h3>
                            <p class="text-[#667085] leading-[1.75]">{{ $panel['desc'] }}</p>
                        </a>
                        @endforeach
                    </div>
                    @php $dark = $home['food']['panels'][3]; @endphp
                    <a href="{{ route('food') }}#food-warnings" class="home-reveal bg-[#FFF8EC] border-l-[3px] border-[#C97A00] text-[#101828] p-8 md:p-10 rounded-[4px] block hover:bg-[#FFF3E0] transition-colors">
                        <p class="text-[11px] uppercase tracking-[0.22em] font-semibold text-[#C97A00] mb-4">{{ $dark['eyebrow'] }}</p>
                        <h3 class="home-serif text-[28px] md:text-[36px] leading-tight font-medium tracking-[-0.03em] mb-4">{{ $dark['title'] }}</h3>
                        <p class="text-[#667085] leading-[1.75]">{{ $dark['desc'] }}</p>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- E-Magazine --}}
    <section id="emagazine-feature" class="py-16 md:py-24 lg:py-28 border-b border-[#E6E8EC] bg-white">
        <div class="max-w-[1280px] mx-auto px-6">
            <header class="home-reveal mb-10 md:mb-12">
                <p class="text-[11px] uppercase tracking-[0.2em] font-semibold text-[#0368B4] mb-3">{{ $home['emagazine']['eyebrow'] }}</p>
                <h2 class="home-serif text-[32px] md:text-[44px] lg:text-[52px] leading-[1.05] font-medium tracking-[-0.02em] text-[#101828]">{{ $home['emagazine']['title'] }}</h2>
            </header>

            @php $em = $home['emagazine']['feature']; @endphp
            <div class="home-reveal border border-[#E6E8EC] rounded-[4px] overflow-hidden">
                <div class="grid grid-cols-1 lg:grid-cols-[1.15fr_0.85fr]">
                    <div class="relative min-h-[300px] sm:min-h-[380px] lg:min-h-[520px] overflow-hidden">
                        <img class="absolute inset-0 w-full h-full object-cover" src="{{ $em['image'] }}" alt="{{ $em['title'] }}" loading="lazy">
                        <div class="absolute top-5 left-5 lg:top-8 lg:left-8">
                            <span class="inline-flex items-center gap-2 bg-white/95 border border-[#E6E8EC] text-[#101828] text-[10px] uppercase tracking-[0.18em] font-semibold px-4 py-2 rounded-[4px]">
                                <span class="w-2 h-2 rounded-full bg-[#0368B4]"></span>
                                {{ $em['badge'] }}
                            </span>
                        </div>
                    </div>
                    <div class="flex flex-col justify-center px-8 py-10 md:px-12 md:py-14 lg:px-14 bg-[#FAFAF8]">
                        <p class="text-[11px] font-semibold uppercase tracking-[0.2em] text-[#0368B4] mb-4">{{ $em['label'] }}</p>
                        <h3 class="home-serif text-[28px] sm:text-[36px] lg:text-[40px] font-medium leading-[1.06] text-[#101828] max-w-[16ch]">{{ $em['title'] }}</h3>
                        <p class="text-[13px] font-medium uppercase tracking-[0.18em] text-[#667085] mt-6 mb-4">{{ $em['date'] }}</p>
                        <p class="text-base leading-[1.8] text-[#667085] max-w-[42ch] mb-8">{{ $em['desc'] }}</p>
                        <a href="{{ $em['url'] }}" class="inline-flex items-center gap-2 self-start bg-[#0368B4] text-white text-[12px] font-semibold uppercase tracking-[0.14em] px-8 py-3.5 rounded-[4px] hover:bg-[#025a9a] transition-colors">
                            {{ $em['cta'] }} <span aria-hidden="true">→</span>
                        </a>
                    </div>
                </div>
                <nav class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 border-t border-[#E6E8EC] bg-[#FAFAF8]" aria-label="Ấn phẩm E-Magazine khác">
                    @foreach ($home['emagazine']['more'] as $issue)
                    <a href="{{ $issue['url'] }}" class="group block p-6 md:p-7 border-t sm:border-t-0 lg:border-l lg:first:border-l-0 border-[#E6E8EC] hover:bg-white transition-colors">
                        <p class="text-[10px] font-semibold uppercase tracking-[0.2em] text-[#0368B4] mb-3">E-Magazine</p>
                        <h4 class="home-serif text-xl leading-tight font-medium text-[#101828] max-w-[22ch] group-hover:text-[#0368B4] transition-colors">{{ $issue['title'] }}</h4>
                    </a>
                    @endforeach
                </nav>
            </div>
        </div>
    </section>

    {{-- Afar editorial --}}
    <section id="afar-editorial" class="py-20 md:py-28 border-b border-[#E6E8EC]">
        <div class="max-w-[1280px] mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-[7fr_3fr] gap-12 xl:gap-16">
                <div class="min-w-0">
                    <div class="afar-collage home-reveal mb-12 md:mb-16">
                        @foreach ($home['afar']['collage'] as $img)
                        <div class="afar-collage__cell afar-collage__cell--{{ $img['cell'] }} rounded-[4px] overflow-hidden">
                            <img src="{{ $img['src'] }}" alt="{{ $img['alt'] }}" loading="lazy">
                        </div>
                        @endforeach
                    </div>

                    @php $afarFeat = $home['afar']['feature']; @endphp
                    <article class="home-reveal mb-16 md:mb-20">
                        <p class="text-[11px] uppercase tracking-[0.18em] font-semibold text-[#667085] mb-5">{{ $afarFeat['eyebrow'] }}</p>
                        <h2 class="home-serif text-[32px] md:text-[40px] lg:text-[48px] leading-none font-medium text-[#101828] tracking-[-0.02em] mb-6 max-w-[18ch]">{{ $afarFeat['title'] }}</h2>
                        <p class="text-lg leading-[1.8] text-[#667085] max-w-[720px] mb-6">{{ $afarFeat['desc'] }}</p>
                        <p class="text-[13px] italic text-[#667085]/80">{{ $afarFeat['byline'] }}</p>
                    </article>

                    <div class="grid md:grid-cols-3 gap-10 md:gap-8 home-reveal">
                        @foreach ($home['afar']['cards'] as $card)
                        <a href="{{ $card['url'] }}" class="afar-card group block">
                            <div class="afar-card-img rounded-[4px] overflow-hidden">
                                <img src="{{ $card['image'] }}" alt="{{ $card['title'] }}" loading="lazy">
                            </div>
                            <p class="text-[11px] uppercase tracking-[0.18em] font-semibold text-[#667085] mb-2 mt-4">{{ $card['label'] }}</p>
                            <h3 class="afar-card-title home-serif text-2xl leading-tight font-medium text-[#101828] mb-2">{{ $card['title'] }}</h3>
                            <p class="text-[13px] italic text-[#667085]/80">{{ $card['author'] }}</p>
                        </a>
                        @endforeach
                    </div>
                </div>

                <aside class="lg:pt-2 home-reveal">
                    <h3 class="home-serif text-[28px] md:text-[32px] leading-none font-medium uppercase tracking-[0.06em] text-[#101828] mb-10">
                        Travel Tips<br>+ News
                    </h3>
                    <nav class="mb-10 border-t border-[#E6E8EC]" aria-label="Travel tips and news">
                        @foreach ($home['afar']['tips'] as $tip)
                        <a href="{{ $tip['url'] }}" class="afar-sidebar-link"><span>{{ $tip['text'] }}</span><em>→</em></a>
                        @endforeach
                    </nav>
                    <a href="{{ $home['afar']['tips_all_url'] }}" class="afar-btn-outline mb-12">
                        View More
                        <span class="afar-btn-arrow">→</span>
                    </a>
                    <div class="border border-[#E6E8EC] rounded-[4px] p-8 bg-[#FAFAF8]">
                        <p class="text-[11px] uppercase tracking-[0.18em] font-semibold text-[#667085] mb-3">Newsletter</p>
                        <h4 class="home-serif text-2xl leading-tight font-medium text-[#101828] mb-3">Nhận bản tin du lịch mỗi tuần</h4>
                        <p class="text-sm leading-7 text-[#667085] mb-6">Câu chuyện, điểm đến và kinh nghiệm thực tế — không spam, chỉ nội dung đáng đọc.</p>
                        <form class="flex flex-col gap-3" action="#" method="post" onsubmit="return false;">
                            <input type="email" placeholder="Email của bạn" class="w-full border border-[#E6E8EC] bg-white px-4 py-3 text-sm outline-none focus:border-[#0368B4] transition-colors rounded-[4px]">
                            <button type="submit" class="w-full inline-flex items-center justify-center bg-[#0368B4] text-white px-4 py-3 text-[11px] uppercase tracking-[0.16em] font-semibold rounded-[4px] border-0 cursor-pointer hover:bg-[#025a9a] transition-colors">Đăng ký</button>
                        </form>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    {{-- Stories moodboard --}}
    <section id="stories-moodboard" class="py-20 md:py-28 border-b border-[#E6E8EC] bg-white">
        <div class="max-w-[1280px] mx-auto px-6">
            <header class="home-reveal text-center mb-12 md:mb-16">
                <p class="text-[11px] uppercase tracking-[0.2em] font-semibold text-[#667085] mb-2">{{ $home['stories']['eyebrow'] }}</p>
                <h2 class="home-serif text-[36px] md:text-[44px] font-medium text-[#101828]">{{ $home['stories']['title'] }}</h2>
            </header>

            <div class="home-stories-grid home-reveal">
                @foreach ($home['stories']['items'] as $item)
                @if ($item['type'] === 'story')
                <a href="{{ $item['url'] }}" class="home-story-card group flex flex-col border border-[#E6E8EC] rounded-[4px] overflow-hidden bg-white">
                    <div class="h-[280px] md:h-[340px] overflow-hidden">
                        <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-[1.03]" src="{{ $item['image'] }}" alt="{{ $item['title'] }}" loading="lazy">
                    </div>
                    <div class="flex-1 p-5 md:p-6">
                        <p class="text-[10px] uppercase tracking-[0.18em] font-semibold text-[#667085] mb-2">{{ $item['label'] }}</p>
                        <h3 class="home-serif text-[28px] leading-none font-medium text-[#101828] mb-3 group-hover:text-[#0368B4] transition-colors">{{ $item['title'] }}</h3>
                        <p class="text-xs leading-relaxed text-[#667085]">{{ $item['desc'] }}</p>
                    </div>
                </a>
                @elseif ($item['type'] === 'quote')
                <article class="home-story-card flex flex-col items-center justify-center border border-[#E6E8EC] rounded-[4px] p-8 md:p-10 text-center bg-[#FAFAF8]">
                    <span class="home-serif text-base tracking-[0.12em] uppercase text-[#101828] mb-10">one2FLY</span>
                    <blockquote class="home-serif text-2xl md:text-[28px] leading-tight font-medium text-[#101828] max-w-[24ch]">“{{ $item['quote'] }}”</blockquote>
                    <cite class="mt-10 text-xs not-italic text-[#667085]">— {{ $item['cite'] }}</cite>
                </article>
                @elseif ($item['type'] === 'visual')
                <a href="{{ $item['url'] }}" class="home-story-card group relative block min-h-[400px] overflow-hidden rounded-[4px] border border-[#E6E8EC]">
                    <img class="absolute inset-0 w-full h-full object-cover grayscale transition-transform duration-500 group-hover:scale-[1.03]" src="{{ $item['image'] }}" alt="{{ $item['label'] }}" loading="lazy">
                    <span class="absolute top-4 left-4 z-10 text-[10px] uppercase tracking-[0.18em] font-semibold text-white/90">one2FLY</span>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/25 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-5 z-10 text-white">
                        <p class="text-[10px] uppercase tracking-[0.18em] font-semibold text-[#7dd3fc] mb-2">{{ $item['label'] }}</p>
                        <p class="text-sm leading-relaxed text-white/90">{{ $item['desc'] }}</p>
                    </div>
                </a>
                @elseif ($item['type'] === 'split')
                <a href="{{ $item['url'] }}" class="home-story-card group grid grid-cols-1 sm:grid-cols-[1.15fr_0.85fr] border border-[#E6E8EC] rounded-[4px] overflow-hidden bg-white">
                    <div class="min-h-[220px] sm:min-h-full overflow-hidden">
                        <img class="w-full h-full min-h-[220px] sm:min-h-full object-cover transition-transform duration-500 group-hover:scale-[1.03]" src="{{ $item['image'] }}" alt="{{ $item['title'] }}" loading="lazy">
                    </div>
                    <div class="flex flex-col justify-between p-5 md:p-6 border-t sm:border-t-0 sm:border-l border-[#E6E8EC] bg-[#FAFAF8]">
                        <p class="text-[10px] uppercase tracking-[0.18em] font-semibold text-[#667085]">{{ $item['label'] }}</p>
                        <h3 class="home-serif text-2xl leading-none font-medium text-[#101828] my-4 group-hover:text-[#0368B4] transition-colors">{{ $item['title'] }}</h3>
                        <p class="text-xs leading-relaxed text-[#667085]">{{ $item['desc'] }}</p>
                    </div>
                </a>
                @elseif ($item['type'] === 'boutique')
                <a href="{{ $item['url'] }}" class="home-story-card group relative block min-h-[400px] border border-[#E6E8EC] rounded-[4px] overflow-hidden bg-white p-6 md:p-7">
                    <p class="text-[10px] uppercase tracking-[0.18em] font-semibold text-[#667085] mb-3">{{ $item['label'] }}</p>
                    <h3 class="home-serif text-4xl leading-[0.95] font-medium text-[#101828] max-w-[12ch] relative z-10 group-hover:text-[#0368B4] transition-colors">{{ $item['title'] }}</h3>
                    <p class="text-xs leading-relaxed text-[#667085] max-w-[20ch] mt-4 relative z-10">{{ $item['desc'] }}</p>
                    <div class="absolute bottom-0 right-0 w-[58%] max-w-[280px] overflow-hidden border-t border-l border-[#E6E8EC]">
                        <img class="w-full aspect-[4/3] object-cover transition-transform duration-500 group-hover:scale-[1.03]" src="{{ $item['image'] }}" alt="{{ $item['title'] }}" loading="lazy">
                    </div>
                </a>
                @elseif ($item['type'] === 'food_list')
                <article class="home-story-card group relative min-h-[400px] border border-[#E6E8EC] rounded-[4px] bg-white p-6 md:p-7 overflow-hidden">
                    <p class="absolute right-3 top-1/2 -translate-y-1/2 [writing-mode:vertical-rl] rotate-180 text-[10px] uppercase tracking-[0.2em] font-semibold text-[#667085]/40 select-none">{{ $item['side_label'] }}</p>
                    <div class="pr-8">
                        <p class="text-[10px] uppercase tracking-[0.18em] font-semibold text-[#667085] mb-5">{{ $item['label'] }}</p>
                        <ul class="space-y-4 mb-8">
                            @foreach ($item['links'] as $link)
                            <li><a href="{{ $link['url'] }}" class="block text-sm leading-snug text-[#101828] hover:text-[#0368B4] transition-colors">{{ $link['text'] }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="overflow-hidden border border-[#E6E8EC] rounded-[4px]">
                        <img class="w-full h-36 object-cover transition-transform duration-500 group-hover:scale-[1.03]" src="{{ $item['image'] }}" alt="{{ $item['label'] }}" loading="lazy">
                    </div>
                </article>
                @endif
                @endforeach
            </div>
        </div>
    </section>

    {{-- Digital Magazine --}}
    <section id="digital-magazine" class="py-20 md:py-28">
        <div class="max-w-[1280px] mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">
                @php $cov = $home['magazine']['cover']; @endphp
                <div class="home-reveal home-magazine-stack group flex justify-center lg:justify-end order-1">
                    <div class="relative w-full max-w-[300px] sm:max-w-[340px] md:max-w-[380px]">
                        <div class="absolute inset-0 aspect-[3/4] bg-[#F3F4F6] border border-[#E6E8EC] -rotate-[7deg] translate-x-4 translate-y-5 transition-transform duration-300 group-hover:translate-x-5 group-hover:translate-y-6" aria-hidden="true"></div>
                        <div class="absolute inset-0 aspect-[3/4] bg-[#FAFAF8] border border-[#E6E8EC] -rotate-[4deg] translate-x-2 translate-y-2.5 transition-transform duration-300 group-hover:translate-x-3 group-hover:translate-y-3.5" aria-hidden="true"></div>
                        <article class="issue-mag-cover relative aspect-[3/4] -rotate-2 overflow-hidden border border-[#E6E8EC] bg-[#101828] transition-all duration-300 group-hover:-translate-y-2 group-hover:-rotate-1">
                            <img class="absolute inset-0 w-full h-full object-cover" src="{{ $cov['image'] }}" alt="Vietnam travel magazine cover" loading="lazy">
                            <div class="issue-mag-cover-text absolute inset-0 flex flex-col justify-between p-6 md:p-8 text-white">
                                <p class="text-[10px] uppercase tracking-[0.22em] font-semibold text-white/80">{{ $cov['brand'] }}</p>
                                <div>
                                    <h3 class="home-serif text-[28px] sm:text-[32px] md:text-[36px] leading-[0.95] font-medium tracking-[-0.02em] mb-4 whitespace-pre-line">{{ $cov['title'] }}</h3>
                                    <p class="text-[11px] uppercase tracking-[0.2em] font-semibold text-[#7dd3fc] mb-5">{{ $cov['issue'] }}</p>
                                    <p class="text-[10px] uppercase tracking-[0.16em] text-white/65">{{ $cov['tags'] }}</p>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>

                <div class="home-reveal order-2">
                    <p class="text-[11px] uppercase tracking-[0.22em] font-semibold text-[#0368B4] mb-4">{{ $home['magazine']['eyebrow'] }}</p>
                    <h2 class="home-serif text-[40px] md:text-[52px] leading-[0.95] font-medium text-[#101828] tracking-[-0.03em] mb-3">{{ $home['magazine']['title'] }}</h2>
                    <p class="home-serif text-xl md:text-2xl text-[#667085] mb-6">{{ $home['magazine']['subtitle'] }}</p>
                    <p class="text-base leading-[1.8] text-[#667085] max-w-[52ch] mb-10">{{ $home['magazine']['desc'] }}</p>

                    <div class="border-t border-[#E6E8EC]">
                        @foreach ($home['magazine']['rows'] as $row)
                        <a href="{{ $row['url'] }}" class="group grid grid-cols-[1fr_auto] gap-4 items-start py-6 border-b border-[#E6E8EC] transition-colors hover:bg-[#F3F8FD] -mx-2 px-2">
                            <div>
                                <p class="text-[10px] uppercase tracking-[0.18em] font-semibold text-[#667085] mb-2">{{ $row['label'] }}</p>
                                <h4 class="home-serif text-2xl leading-tight font-medium text-[#101828] mb-2 group-hover:text-[#0368B4] transition-colors">{{ $row['title'] }}</h4>
                                <p class="text-sm leading-7 text-[#667085]">{{ $row['desc'] }}</p>
                            </div>
                            <span class="mt-1 text-lg text-[#101828] group-hover:text-[#0368B4] issue-mag-btn-arrow">→</span>
                        </a>
                        @endforeach
                    </div>

                    <div class="flex flex-col sm:flex-row sm:items-center gap-5 mt-10">
                        <a href="{{ route('issue.read') }}" class="inline-flex items-center justify-center bg-[#0368B4] text-white px-8 py-3.5 text-[11px] uppercase tracking-[0.18em] font-semibold rounded-[4px] hover:bg-[#025a9a] transition-colors">
                            Read Magazine
                        </a>
                        <a href="{{ route('issue') }}" class="group inline-flex items-center gap-2 text-[11px] uppercase tracking-[0.16em] font-semibold text-[#101828] hover:text-[#0368B4] transition-colors">
                            View Previous Issues
                            <span class="issue-mag-btn-arrow">→</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<script>
    (function() {
        var reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        var nodes = document.querySelectorAll('.home-reveal');
        if (reduced || !('IntersectionObserver' in window)) {
            nodes.forEach(function(el) {
                el.classList.add('is-visible');
            });
        } else {
            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (!entry.isIntersecting) return;
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                });
            }, {
                threshold: 0.08,
                rootMargin: '0px 0px -40px 0px'
            });
            nodes.forEach(function(el) {
                observer.observe(el);
            });
        }

        var stats = document.getElementById('campaign-stats');
        if (stats) {
            var items = Array.prototype.slice.call(stats.querySelectorAll('.image-card-stat'));
            var index = 0;
            var timer = null;

            function setActive(i) {
                items.forEach(function(el, idx) {
                    el.classList.toggle('is-active', idx === i);
                });
            }

            function startCycle() {
                if (reduced) {
                    setActive(0);
                    return;
                }
                clearInterval(timer);
                timer = setInterval(function() {
                    index = (index + 1) % items.length;
                    setActive(index);
                }, 2800);
            }

            function stopCycle() {
                clearInterval(timer);
                timer = null;
            }

            setActive(0);
            startCycle();
            stats.addEventListener('mouseenter', function() {
                stats.classList.add('is-hovering');
                stopCycle();
                items.forEach(function(el) {
                    el.classList.remove('is-active');
                });
            });
            stats.addEventListener('mouseleave', function() {
                stats.classList.remove('is-hovering');
                startCycle();
            });
            items.forEach(function(el, i) {
                el.addEventListener('mouseenter', function() {
                    index = i;
                });
            });
        }
    })();
</script>
@endpush