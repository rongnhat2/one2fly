@extends('layouts.magazine')

@section('title', 'Ấn phẩm — one2FLY!')
@section('meta_description', 'Các số báo điện tử — đọc trực tuyến hoặc tải PDF')

@push('head')
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;1,400&display=swap" rel="stylesheet">
@endpush

@section('content')
    <div class="issue-mag relative overflow-hidden">

        {{-- Nền trang trí: chấm lưới + vạch la bàn --}}
        <div class="issue-mag-dots absolute inset-0 pointer-events-none" aria-hidden="true"></div>

        {{-- 1. Hero --}}
        <section class="relative pt-[88px]">
            <svg class="issue-mag-route absolute inset-0 w-full h-full pointer-events-none" viewBox="0 0 1440 900" fill="none" preserveAspectRatio="xMidYMid slice" aria-hidden="true">
                <path class="issue-mag-route-path" d="M-60 700 C 260 560, 420 760, 690 620 S 1120 300, 1520 180" stroke="#0368B4" stroke-width="1.25" stroke-dasharray="7 9" opacity="0.28"/>
                <path class="issue-mag-route-path issue-mag-route-path--slow" d="M-40 240 C 300 320, 620 160, 940 260 S 1320 420, 1560 340" stroke="#0368B4" stroke-width="1" stroke-dasharray="4 10" opacity="0.16"/>
                <g opacity="0.5" transform="translate(1120 250) rotate(24)">
                    <path d="M0 0 L18 6 L0 12 L4 6 Z" fill="#0368B4"/>
                </g>
            </svg>

            <div class="relative z-10 max-w-[1320px] mx-auto px-6 py-20 md:py-28 lg:py-32">
                <div class="grid lg:grid-cols-[1.05fr_0.95fr] gap-14 lg:gap-20 items-center">
                    <div class="issue-mag-reveal">
                        <p class="text-[11px] uppercase tracking-[0.28em] text-[#0368B4] font-semibold mb-6">Ấn bản điện tử</p>
                        <h1 class="issue-mag-serif text-[56px] sm:text-[72px] lg:text-[96px] leading-[0.95] font-medium tracking-[-0.02em] text-[#111111] mb-8">
                            Các số báo
                        </h1>
                        <p class="text-[17px] leading-[1.8] text-[#666666] max-w-[46ch]">
                            Mỗi số báo là một chuyến đi được đóng gói cẩn thận — điểm đến, ẩm thực,
                            con người và những ghi chép dọc đường. Đọc trực tuyến hoặc tải PDF,
                            như lật giở một cuốn tạp chí in trên bàn cà phê.
                        </p>
                        <div class="mt-10 flex items-center gap-6 text-[10px] uppercase tracking-[0.2em] text-[#999999]">
                            <span>{{ count($issues) }} số đã phát hành</span>
                            <span class="inline-block w-10 h-px bg-[#ECECEC]"></span>
                            <span>2024 — 2026</span>
                        </div>
                    </div>

                    <div class="issue-mag-reveal flex justify-center lg:justify-end">
                        <div class="issue-mag-cover-float relative">
                            <a href="{{ route('issue.detail') }}" class="issue-mag-cover block w-[260px] sm:w-[320px]" data-parallax>
                                <img
                                    src="{{ $featured['image'] }}"
                                    alt="Bìa số {{ $featured['num'] }} — {{ $featured['title'] }}"
                                    class="w-full aspect-[3/4] object-cover"
                                    width="320" height="427" loading="eager"
                                >
                                <span class="issue-mag-cover-text absolute inset-0 flex flex-col justify-between p-6">
                                    <span class="block text-[10px] uppercase tracking-[0.24em] text-white/90 font-semibold">one2FLY Magazine</span>
                                    <span>
                                        <span class="block text-[11px] uppercase tracking-[0.18em] text-white/80 mb-2">Nº {{ $featured['num'] }} · {{ $featured['season'] }}</span>
                                        <span class="issue-mag-serif block text-[26px] leading-[1.15] font-medium text-white">{{ $featured['title'] }}</span>
                                    </span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- 2. Dòng thời gian các số báo --}}
        <div class="relative z-10">
            @foreach ($issues as $issue)
                @php $even = $loop->index % 2 === 1; @endphp

                {{-- Trang trí biên tập giữa các số --}}
                <div class="max-w-[1320px] mx-auto px-6" aria-hidden="true">
                    <div class="flex items-center gap-6 text-[10px] uppercase tracking-[0.22em] text-[#B5B5B5]">
                        <span class="flex-1 h-px bg-[#ECECEC]"></span>
                        @if ($loop->index % 3 === 0)
                            <span>Nº {{ $issue['num'] }}</span>
                        @elseif ($loop->index % 3 === 1)
                            <span>{{ 8 + $loop->index }}°{{ 10 + $loop->index * 7 }}′ N — {{ 102 + $loop->index }}°{{ 20 + $loop->index * 5 }}′ E</span>
                        @else
                            <span class="issue-mag-serif italic normal-case tracking-normal text-[13px] text-[#999999]">"Đi để thấy mình nhỏ lại, và thế giới rộng ra."</span>
                        @endif
                        <span class="flex-1 h-px bg-[#ECECEC]"></span>
                        <span class="hidden md:inline">Tr. {{ str_pad((string) ($loop->iteration * 12), 2, '0', STR_PAD_LEFT) }}</span>
                    </div>
                </div>

                <section class="issue-mag-spread relative">
                    <div class="max-w-[1320px] mx-auto px-6 min-h-[82vh] flex items-center py-16 md:py-20">
                        <article class="issue-mag-row group grid lg:grid-cols-2 gap-12 lg:gap-24 items-center w-full">
                            {{-- Bìa tạp chí --}}
                            <div @class([
                                'issue-mag-reveal flex justify-center',
                                'lg:order-2 lg:justify-start' => $even,
                                'lg:justify-end' => ! $even,
                            ])>
                                <a href="{{ route('issue.detail') }}" class="issue-mag-cover block w-[240px] sm:w-[300px] lg:w-[340px]" data-parallax>
                                    <img
                                        src="{{ $issue['image'] }}"
                                        alt="Bìa số {{ $issue['num'] }} — {{ $issue['title'] }}"
                                        class="w-full aspect-[3/4] object-cover"
                                        width="340" height="453" loading="lazy"
                                    >
                                    <span class="issue-mag-cover-text absolute inset-0 flex flex-col justify-between p-6">
                                        <span class="block text-[10px] uppercase tracking-[0.24em] text-white/90 font-semibold">one2FLY Magazine</span>
                                        <span>
                                            <span class="block text-[11px] uppercase tracking-[0.18em] text-white/80 mb-2">Nº {{ $issue['num'] }} · {{ $issue['season'] }}</span>
                                            <span class="issue-mag-serif block text-[24px] leading-[1.15] font-medium text-white">{{ $issue['title'] }}</span>
                                        </span>
                                    </span>
                                </a>
                            </div>

                            {{-- Nội dung --}}
                            <div @class([
                                'issue-mag-reveal text-center lg:text-left',
                                'lg:order-1 lg:text-right' => $even,
                            ])>
                                <p class="text-[11px] uppercase tracking-[0.24em] text-[#0368B4] font-semibold mb-5">
                                    Nº {{ $issue['num'] }} • {{ $issue['season'] }}
                                </p>
                                <h2 class="issue-mag-serif issue-mag-row-title text-[34px] sm:text-[44px] lg:text-[52px] leading-[1.05] font-medium text-[#111111] mb-6">
                                    {{ $issue['title'] }}
                                </h2>
                                <p @class([
                                    'text-[16px] leading-[1.8] text-[#666666] max-w-[44ch] mb-9 mx-auto lg:mx-0',
                                    'lg:ml-auto' => $even,
                                ])>
                                    {{ $issue['description'] }}
                                </p>
                                <div @class([
                                    'flex flex-col sm:flex-row items-center gap-4',
                                    'justify-center lg:justify-end' => $even,
                                    'justify-center lg:justify-start' => ! $even,
                                ])>
                                    <a href="{{ route('issue.read') }}" class="issue-mag-btn inline-flex items-center justify-center gap-2 bg-[#0368B4] text-white px-8 py-3.5 text-[11px] uppercase tracking-[0.18em] font-semibold rounded-[4px]">
                                        Đọc online <span class="issue-mag-btn-arrow" aria-hidden="true">→</span>
                                    </a>
                                    <a href="{{ route('issue.detail') }}" class="issue-mag-btn inline-flex items-center justify-center gap-2 px-8 py-3.5 text-[11px] uppercase tracking-[0.18em] font-semibold text-[#111111] border border-[#ECECEC] rounded-[4px] hover:border-[#0368B4] transition-colors">
                                        Tải PDF <span class="issue-mag-btn-arrow" aria-hidden="true">↓</span>
                                    </a>
                                </div>
                            </div>
                        </article>
                    </div>
                </section>
            @endforeach
        </div>

        {{-- 3. Kết trang biên tập --}}
        <section class="relative z-10 border-t border-[#ECECEC]">
            <div class="max-w-[1320px] mx-auto px-6 py-24 md:py-32 text-center issue-mag-reveal">
                <p class="text-[10px] uppercase tracking-[0.24em] text-[#B5B5B5] mb-8" aria-hidden="true">✈ — · — · — ✈</p>
                <p class="issue-mag-serif text-[28px] md:text-[40px] leading-[1.25] font-medium text-[#111111] max-w-[26ch] mx-auto mb-10 italic">
                    "Còn nhiều hành trình đang chờ được kể."
                </p>
                <a href="{{ route('issue') }}" class="issue-mag-btn inline-flex items-center gap-2 px-10 py-4 text-[11px] uppercase tracking-[0.2em] font-semibold text-[#0368B4] border border-[#0368B4] rounded-[4px] hover:bg-[#0368B4] hover:text-white transition-colors">
                    Xem thêm các số báo <span class="issue-mag-btn-arrow" aria-hidden="true">→</span>
                </a>
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
        }, { threshold: 0.1, rootMargin: '0px 0px -48px 0px' });
        nodes.forEach(function (el) { observer.observe(el); });
    }

    // Parallax nhẹ cho bìa tạp chí khi cuộn
    if (!reduced) {
        var covers = document.querySelectorAll('[data-parallax]');
        var ticking = false;

        function parallax() {
            var vh = window.innerHeight;
            covers.forEach(function (el) {
                var rect = el.getBoundingClientRect();
                if (rect.bottom < 0 || rect.top > vh) return;
                var progress = (rect.top + rect.height / 2 - vh / 2) / vh;
                el.style.setProperty('--issue-parallax', (progress * -22).toFixed(1) + 'px');
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
