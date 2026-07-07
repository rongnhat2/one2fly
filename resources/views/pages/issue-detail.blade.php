@extends('layouts.magazine')

@section('title', 'Nº ' . $issue['num'] . ' — ' . $issue['title'] . ' · one2FLY!')
@section('meta_description', $issue['intro'])

@push('head')
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;1,400&family=Playfair+Display:ital,wght@0,400;0,500;1,400&display=swap" rel="stylesheet">
@endpush

@section('content')
    <div class="issue-edition relative overflow-hidden bg-[#FAFAF8] text-[#101828]">

        {{-- Section 1: Magazine Cover Hero --}}
        <section class="relative pt-[88px]">
            <svg class="issue-edition-route absolute inset-0 w-full h-full pointer-events-none" viewBox="0 0 1440 900" fill="none" preserveAspectRatio="xMidYMid slice" aria-hidden="true">
                <path class="issue-mag-route-path" d="M-60 700 C 260 560, 420 760, 690 620 S 1120 300, 1520 180" stroke="#0368B4" stroke-width="1.25" stroke-dasharray="7 9" opacity="0.22"/>
                <path class="issue-mag-route-path issue-mag-route-path--slow" d="M-40 240 C 300 320, 620 160, 940 260 S 1320 420, 1560 340" stroke="#0368B4" stroke-width="1" stroke-dasharray="4 10" opacity="0.12"/>
                <g opacity="0.45" transform="translate(1120 250) rotate(24)">
                    <path d="M0 0 L18 6 L0 12 L4 6 Z" fill="#0368B4"/>
                </g>
            </svg>

            <div class="relative z-10 max-w-[1280px] mx-auto px-6 py-16 md:py-24 lg:py-28">
                <div class="grid lg:grid-cols-[1.05fr_0.95fr] gap-14 lg:gap-20 items-center">
                    <div class="issue-mag-reveal">
                        <p class="text-[10px] uppercase tracking-[0.28em] text-[#667085] font-semibold mb-6">ONE2FLY MAGAZINE</p>
                        <p class="issue-mag-serif text-[72px] sm:text-[88px] lg:text-[108px] leading-[0.9] font-medium tracking-[-0.03em] text-[#101828] mb-4">
                            Nº {{ $issue['num'] }}
                        </p>
                        <h1 class="issue-mag-serif text-[36px] sm:text-[44px] lg:text-[52px] leading-[1.08] font-medium text-[#101828] mb-6 max-w-[18ch]">
                            {{ $issue['title'] }}
                        </h1>
                        <p class="text-[16px] md:text-[17px] leading-[1.85] text-[#667085] max-w-[48ch] mb-10">
                            {{ $issue['intro'] }}
                        </p>

                        <div class="flex flex-wrap items-center gap-x-5 gap-y-2 text-[10px] uppercase tracking-[0.18em] text-[#667085] mb-10">
                            <span>{{ $issue['season'] }}</span>
                            <span class="text-[#E6E8EC]">|</span>
                            <span>{{ $issue['pages'] }} Pages</span>
                            <span class="text-[#E6E8EC]">|</span>
                            <span>{{ $issue['stories'] }} Stories</span>
                            <span class="text-[#E6E8EC]">|</span>
                            <span>{{ $issue['type'] }}</span>
                        </div>

                        <div class="flex flex-wrap gap-3">
                            <a href="{{ route('issue.read') }}" class="inline-flex items-center justify-center bg-[#0368B4] text-white px-7 py-3 rounded-[4px] text-[11px] uppercase tracking-[0.16em] font-semibold hover:bg-[#025a9a] transition-colors">
                                Read Online
                            </a>
                            <button type="button" class="inline-flex items-center justify-center border border-[#E6E8EC] bg-transparent text-[#101828] px-7 py-3 rounded-[4px] text-[11px] uppercase tracking-[0.16em] font-semibold hover:border-[#0368B4] hover:text-[#0368B4] transition-colors">
                                Download PDF
                            </button>
                        </div>

                        <p class="mt-10 text-[9px] uppercase tracking-[0.2em] text-[#667085]/70">{{ $issue['coords'] }}</p>
                    </div>

                    <div class="issue-mag-reveal flex justify-center lg:justify-end">
                        <div class="issue-mag-cover-float relative">
                            <div class="issue-mag-cover block w-[260px] sm:w-[300px] lg:w-[340px]" data-parallax>
                                <img
                                    src="{{ $issue['cover'] }}"
                                    alt="Bìa số {{ $issue['num'] }} — {{ $issue['title'] }}"
                                    class="w-full aspect-[3/4] object-cover"
                                    width="340" height="453" loading="eager"
                                >
                                <span class="issue-mag-cover-text absolute inset-0 flex flex-col justify-between p-6">
                                    <span class="block text-[10px] uppercase tracking-[0.24em] text-white/90 font-semibold">one2FLY Magazine</span>
                                    <span>
                                        <span class="block text-[11px] uppercase tracking-[0.18em] text-white/80 mb-2">Nº {{ $issue['num'] }} · {{ $issue['season'] }}</span>
                                        <span class="issue-mag-serif block text-[24px] leading-[1.15] font-medium text-white">{{ $issue['title'] }}</span>
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Section 2: Editor's Note --}}
        <section class="py-20 md:py-28 border-t border-[#E6E8EC]">
            <div class="max-w-[1280px] mx-auto px-6">
                <div class="issue-mag-reveal max-w-[720px] mx-auto text-center">
                    <p class="text-[11px] uppercase tracking-[0.24em] text-[#0368B4] font-semibold mb-8">Editor's Note</p>
                    <blockquote class="issue-mag-serif text-[28px] sm:text-[34px] md:text-[40px] leading-[1.25] font-medium italic text-[#101828] mb-12">
                        "{{ $issue['editor_quote'] }}"
                    </blockquote>
                    <div class="space-y-5 text-[16px] md:text-[17px] leading-[1.9] text-[#667085] text-left md:text-center">
                        @foreach ($issue['editor_note'] as $para)
                            <p>{{ $para }}</p>
                        @endforeach
                    </div>
                    <div class="mt-14 pt-8 border-t border-[#E6E8EC] inline-block w-full max-w-[320px]">
                        <p class="issue-edition-signature text-[28px] text-[#101828] mb-2">Editor-in-Chief</p>
                        <p class="text-[11px] uppercase tracking-[0.2em] text-[#667085]">One2Fly Magazine</p>
                    </div>
                </div>
            </div>
        </section>

        {{-- Section 3: Issue Theme --}}
        <section class="py-20 md:py-28 border-t border-[#E6E8EC] bg-white">
            <div class="max-w-[1280px] mx-auto px-6">
                <p class="issue-mag-reveal text-[11px] uppercase tracking-[0.24em] text-[#667085] font-semibold mb-12 text-center">Chủ đề của số báo</p>
                <div class="issue-mag-reveal grid lg:grid-cols-2 gap-12 lg:gap-20 items-start mb-14">
                    <h2 class="issue-mag-serif text-[40px] sm:text-[48px] lg:text-[56px] leading-[1.08] font-medium text-[#101828]">
                        "{{ $issue['title'] }}"
                    </h2>
                    <p class="text-[16px] md:text-[17px] leading-[1.85] text-[#667085]">
                        {{ $issue['theme_desc'] }}
                    </p>
                </div>
                <div class="issue-mag-reveal flex flex-wrap justify-center gap-3">
                    @foreach ($issue['keywords'] as $keyword)
                        <span class="issue-edition-keyword">{{ $keyword }}</span>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Section 4: Table of Contents --}}
        <section class="py-20 md:py-28 border-t border-[#E6E8EC]">
            <div class="max-w-[1280px] mx-auto px-6">
                <div class="issue-mag-reveal mb-12 md:mb-16">
                    <p class="text-[11px] uppercase tracking-[0.24em] text-[#0368B4] font-semibold mb-3">Table of Contents</p>
                    <h2 class="issue-mag-serif text-[32px] md:text-[40px] font-medium text-[#101828]">Mục lục</h2>
                </div>

                <div class="issue-mag-reveal border-t border-[#E6E8EC]">
                    @foreach ($issue['contents'] as $item)
                        <a href="{{ route('issue.read') }}" class="issue-edition-toc-row group grid grid-cols-[auto_1fr_auto] md:grid-cols-[56px_120px_1fr_auto_auto_auto] gap-x-4 md:gap-x-8 gap-y-2 items-baseline py-6 md:py-7 border-b border-[#E6E8EC] transition-colors">
                            <span class="text-[13px] uppercase tracking-[0.14em] text-[#667085] font-medium">{{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                            <span class="text-[10px] uppercase tracking-[0.2em] text-[#0368B4] font-semibold">{{ $item['cat'] }}</span>
                            <div class="col-span-3 md:col-span-1 md:col-start-3">
                                <h3 class="issue-edition-toc-title text-[18px] md:text-[20px] font-medium text-[#101828] mb-1 transition-colors">{{ $item['title'] }}</h3>
                                <p class="text-[14px] leading-[1.65] text-[#667085] max-w-[56ch]">{{ $item['desc'] }}</p>
                            </div>
                            <span class="hidden md:block text-[12px] text-[#667085] whitespace-nowrap">{{ $item['time'] }}</span>
                            <span class="hidden md:block text-[11px] uppercase tracking-[0.14em] text-[#667085] whitespace-nowrap">Page {{ $item['page'] }}</span>
                            <span class="issue-edition-toc-arrow justify-self-end text-[#101828] transition-transform" aria-hidden="true">→</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Section 5: Editor's Pick --}}
        <section class="py-16 md:py-24 border-t border-[#E6E8EC] bg-white">
            <div class="max-w-[1280px] mx-auto px-6">
                <p class="issue-mag-reveal text-[11px] uppercase tracking-[0.24em] text-[#667085] font-semibold mb-10">Editor's Pick</p>
                <article class="issue-mag-reveal grid lg:grid-cols-[3fr_2fr] gap-10 lg:gap-16 items-center">
                    <div class="overflow-hidden rounded-[4px]">
                        <img
                            src="{{ $issue['pick']['image'] }}"
                            alt="{{ $issue['pick']['title'] }}"
                            class="w-full aspect-[4/3] lg:aspect-[5/4] object-cover"
                            loading="lazy"
                        >
                    </div>
                    <div>
                        <p class="text-[10px] uppercase tracking-[0.22em] text-[#0368B4] font-semibold mb-4">{{ $issue['pick']['cat'] }}</p>
                        <h2 class="issue-mag-serif text-[32px] md:text-[40px] leading-[1.12] font-medium text-[#101828] mb-6">
                            {{ $issue['pick']['title'] }}
                        </h2>
                        <p class="text-[16px] md:text-[17px] leading-[1.85] text-[#667085] mb-8">
                            {{ $issue['pick']['excerpt'] }}
                        </p>
                        <a href="{{ $issue['pick']['url'] }}" class="inline-flex items-center gap-2 text-[11px] uppercase tracking-[0.16em] font-semibold text-[#101828] border-b border-[#101828] pb-1 hover:text-[#0368B4] hover:border-[#0368B4] transition-colors">
                            Read Story
                            <span class="issue-mag-btn-arrow">→</span>
                        </a>
                    </div>
                </article>
            </div>
        </section>

        {{-- Section 6: Photo Essay --}}
        <section class="py-16 md:py-24 border-t border-[#E6E8EC] overflow-hidden">
            <div class="max-w-[1280px] mx-auto px-6 mb-10 issue-mag-reveal">
                <p class="text-[11px] uppercase tracking-[0.24em] text-[#667085] font-semibold mb-3">Photo Essay</p>
                <h2 class="issue-mag-serif text-[28px] md:text-[36px] font-medium text-[#101828]">Khoảnh khắc dọc đường</h2>
            </div>
            <div class="issue-mag-reveal issue-edition-gallery-scroll px-6 pb-2">
                <div class="issue-edition-gallery-track flex gap-5 md:gap-6 w-max">
                    @foreach ($issue['photos'] as $photo)
                        <figure @class([
                            'issue-edition-gallery-item shrink-0',
                            'issue-edition-gallery-item--tall' => $photo['tall'],
                        ])>
                            <img src="{{ $photo['src'] }}" alt="{{ $photo['cap'] }}" class="w-full h-full object-cover rounded-[4px]" loading="lazy">
                            <figcaption class="mt-2 text-[10px] uppercase tracking-[0.16em] text-[#667085]">{{ $photo['cap'] }}</figcaption>
                        </figure>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Section 7: Contributors --}}
        <section class="py-20 md:py-28 border-t border-[#E6E8EC] bg-white">
            <div class="max-w-[1280px] mx-auto px-6">
                <p class="issue-mag-reveal text-[11px] uppercase tracking-[0.24em] text-[#667085] font-semibold mb-10">Contributors</p>
                <div class="issue-mag-reveal divide-y divide-[#E6E8EC] border-t border-[#E6E8EC]">
                    @foreach ($issue['contributors'] as $contributor)
                        <div class="grid sm:grid-cols-[180px_1fr] gap-4 sm:gap-12 py-6 md:py-7">
                            <p class="text-[11px] uppercase tracking-[0.2em] text-[#667085] font-semibold">{{ $contributor['role'] }}</p>
                            <p class="text-[16px] md:text-[17px] text-[#101828]">{{ $contributor['names'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Section 8: Behind The Issue --}}
        <section class="py-20 md:py-28 border-t border-[#E6E8EC]">
            <div class="max-w-[1280px] mx-auto px-6">
                <div class="issue-mag-reveal text-center mb-14">
                    <p class="text-[11px] uppercase tracking-[0.24em] text-[#667085] font-semibold mb-3">Behind The Issue</p>
                    <h2 class="issue-mag-serif text-[28px] md:text-[36px] font-medium text-[#101828]">Cách số báo này được tạo ra</h2>
                </div>
                <div class="issue-mag-reveal issue-edition-timeline flex flex-col items-center">
                    @foreach ($issue['timeline'] as $step)
                        <div class="issue-edition-timeline-step text-center">
                            <span class="block text-[13px] uppercase tracking-[0.18em] text-[#101828] font-medium">{{ $step }}</span>
                        </div>
                        @unless ($loop->last)
                            <span class="issue-edition-timeline-arrow text-[#667085]/50" aria-hidden="true">↓</span>
                        @endunless
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Section 9: Related Issues --}}
        <section class="py-16 md:py-24 border-t border-[#E6E8EC] bg-white overflow-hidden">
            <div class="max-w-[1280px] mx-auto px-6 mb-10 issue-mag-reveal">
                <h2 class="issue-mag-serif text-[28px] md:text-[36px] font-medium text-[#101828]">Các số báo khác</h2>
            </div>
            <div class="issue-mag-reveal issue-edition-carousel px-6 pb-4">
                <div class="issue-edition-carousel-track flex gap-8 md:gap-10 w-max">
                    @foreach ($relatedIssues as $rel)
                        <a href="{{ route('issue.detail') }}" class="issue-edition-carousel-item group block w-[200px] sm:w-[220px] shrink-0">
                            <div class="issue-edition-carousel-cover mb-4">
                                <img
                                    src="{{ $rel['image'] }}"
                                    alt="Bìa số {{ $rel['num'] }} — {{ $rel['title'] }}"
                                    class="w-full aspect-[3/4] object-cover rounded-[4px]"
                                    loading="lazy"
                                >
                            </div>
                            <p class="text-[10px] uppercase tracking-[0.2em] text-[#667085] mb-1">Nº {{ $rel['num'] }}</p>
                            <p class="text-[10px] uppercase tracking-[0.16em] text-[#0368B4] font-semibold mb-2">{{ $rel['season'] }}</p>
                            <p class="issue-mag-serif text-[18px] leading-[1.2] font-medium text-[#101828] group-hover:text-[#0368B4] transition-colors">{{ $rel['title'] }}</p>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Section 10: Closing CTA --}}
        <section class="py-24 md:py-32 border-t border-[#E6E8EC]">
            <div class="max-w-[1280px] mx-auto px-6">
                <div class="issue-mag-reveal max-w-[640px] mx-auto text-center">
                    <blockquote class="issue-mag-serif text-[28px] sm:text-[34px] md:text-[40px] leading-[1.25] font-medium italic text-[#101828] mb-12">
                        "Hành trình tiếp theo luôn bắt đầu từ một trang mới."
                    </blockquote>

                    <div class="flex flex-wrap justify-center gap-3 mb-16">
                        <a href="{{ route('issue.read') }}" class="inline-flex items-center justify-center bg-[#0368B4] text-white px-7 py-3 rounded-[4px] text-[11px] uppercase tracking-[0.16em] font-semibold hover:bg-[#025a9a] transition-colors">
                            Explore Magazine
                        </a>
                        <a href="{{ route('issue') }}" class="inline-flex items-center justify-center border border-[#E6E8EC] text-[#101828] px-7 py-3 rounded-[4px] text-[11px] uppercase tracking-[0.16em] font-semibold hover:border-[#0368B4] hover:text-[#0368B4] transition-colors">
                            Browse All Issues
                        </a>
                    </div>

                    <div class="pt-10 border-t border-[#E6E8EC]">
                        <p class="text-[11px] uppercase tracking-[0.2em] text-[#667085] font-semibold mb-5">Newsletter</p>
                        <form class="flex flex-col sm:flex-row gap-3 max-w-[440px] mx-auto" action="#" method="post" onsubmit="return false;">
                            <label for="issue-newsletter-email" class="sr-only">Email</label>
                            <input
                                id="issue-newsletter-email"
                                type="email"
                                name="email"
                                placeholder="Email"
                                class="flex-1 min-w-0 px-4 py-3 rounded-[4px] border border-[#E6E8EC] bg-white text-[#101828] text-[15px] placeholder:text-[#667085] focus:outline-none focus:border-[#0368B4] transition-colors"
                            >
                            <button type="submit" class="shrink-0 bg-[#101828] text-white px-7 py-3 rounded-[4px] text-[11px] uppercase tracking-[0.16em] font-semibold hover:bg-[#0368B4] transition-colors">
                                Subscribe
                            </button>
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

    var nodes = document.querySelectorAll('.issue-mag-reveal');
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

    if (!reduced) {
        var covers = document.querySelectorAll('[data-parallax]');
        var ticking = false;

        function parallax() {
            var vh = window.innerHeight;
            covers.forEach(function (el) {
                var rect = el.getBoundingClientRect();
                if (rect.bottom < 0 || rect.top > vh) return;
                var progress = (rect.top + rect.height / 2 - vh / 2) / vh;
                el.style.setProperty('--issue-parallax', (progress * -18).toFixed(1) + 'px');
            });
            ticking = false;
        }

        window.addEventListener('scroll', function () {
            if (!ticking) {
                ticking = true;
                requestAnimationFrame(parallax);
            }
        }, { passive: true });
        parallax();
    }
})();
</script>
@endpush
