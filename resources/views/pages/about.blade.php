@extends('layouts.magazine')

@section('title', 'Giới thiệu — one2FLY!')
@section('meta_description', 'Về One2Fly — tạp chí du lịch số, cẩm nang, ấn phẩm và câu chuyện hành trình được tuyển chọn.')

@section('content')
    <div class="about-brand relative overflow-hidden bg-[#FAFAF8] text-[#101828]">

        <svg class="about-route absolute top-0 right-0 w-[70%] h-[700px] pointer-events-none" viewBox="0 0 900 700" fill="none" preserveAspectRatio="xMaxYMid slice" aria-hidden="true">
            <path class="about-route-path" d="M40 580 C 200 420, 380 620, 560 480 S 820 200, 880 80" stroke="#0368B4" stroke-width="1" stroke-dasharray="5 9" opacity="0.2"/>
        </svg>

        {{-- 1. Hero — Brand Manifesto --}}
        <section class="relative pt-[88px] border-b border-[#E6E8EC]">
            <div class="max-w-[1280px] mx-auto px-6 py-20 md:py-28 lg:py-32">
                <div class="grid lg:grid-cols-2 gap-14 lg:gap-20 items-center">
                    <div class="about-reveal">
                        <p class="text-[11px] uppercase tracking-[0.28em] text-[#0368B4] font-semibold mb-6">Về one2FLY</p>
                        <h1 class="about-serif text-[36px] sm:text-[48px] lg:text-[60px] xl:text-[68px] leading-[1.02] font-medium tracking-[-0.02em] text-[#101828] mb-8">
                            Chúng tôi kể những hành trình bằng hình ảnh, câu chữ và cảm xúc.
                        </h1>
                        <p class="text-[17px] leading-[1.8] text-[#667085] max-w-[48ch]">
                            One2Fly là không gian dành cho những người yêu dịch chuyển — nơi các điểm đến,
                            cẩm nang, ấn phẩm và câu chuyện du lịch được tuyển chọn như một cuốn tạp chí sống.
                        </p>
                    </div>

                    <div class="about-reveal relative">
                        <figure class="relative overflow-hidden rounded-[4px]" data-about-parallax>
                            <img
                                src="https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?q=80&w=1400&auto=format&fit=crop"
                                alt="Hành trình trên đường núi"
                                class="w-full aspect-[4/5] object-cover"
                                width="640" height="800" loading="eager"
                            >
                            <span class="absolute top-4 right-4 text-[9px] uppercase tracking-[0.14em] text-white/75 hidden sm:block" aria-hidden="true">46.2044° N, 6.1432° E</span>
                        </figure>
                    </div>
                </div>
            </div>
        </section>

        {{-- 2. Manifesto --}}
        <section class="py-20 md:py-28 border-b border-[#E6E8EC]">
            <div class="max-w-[1280px] mx-auto px-6">
                <blockquote class="about-reveal about-serif text-center text-[28px] sm:text-[36px] md:text-[44px] leading-[1.2] font-medium text-[#101828] max-w-[22ch] mx-auto mb-16 md:mb-20 italic">
                    "Không chỉ là đi đâu, mà là cách một nơi ở lại trong ký ức."
                </blockquote>

                <div class="about-reveal grid md:grid-cols-3 gap-10 md:gap-0 md:divide-x md:divide-[#E6E8EC] border-t border-b border-[#E6E8EC] py-12 md:py-14">
                    @foreach ([
                        ['title' => 'Tuyển chọn', 'text' => 'Mỗi điểm đến, bài viết và bức ảnh đều qua tay biên tập — không thả trôi theo xu hướng.'],
                        ['title' => 'Chậm rãi', 'text' => 'Chúng tôi tin vào nhịp đi chậm: quan sát, ghi chép và để một nơi kể chuyện theo cách riêng.'],
                        ['title' => 'Có chiều sâu', 'text' => 'Du lịch không chỉ là checklist. Là văn hóa, con người và những chi tiết nhỏ đáng nhớ.'],
                    ] as $pillar)
                        <div class="md:px-8 lg:px-12 {{ $loop->first ? 'md:pl-0' : '' }} {{ $loop->last ? 'md:pr-0' : '' }}">
                            <h2 class="about-serif text-[26px] md:text-[30px] font-medium text-[#101828] mb-4">{{ $pillar['title'] }}</h2>
                            <p class="text-[15px] leading-[1.8] text-[#667085]">{{ $pillar['text'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- 3. What We Do --}}
        <section class="py-20 md:py-28 border-b border-[#E6E8EC]">
            <div class="max-w-[1280px] mx-auto px-6">
                <header class="about-reveal mb-12 md:mb-16">
                    <p class="text-[11px] uppercase tracking-[0.24em] text-[#0368B4] font-semibold mb-3">Dịch vụ biên tập</p>
                    <h2 class="about-serif text-[36px] md:text-[48px] leading-[1.05] font-medium text-[#101828]">One2Fly làm gì?</h2>
                </header>

                <div class="about-reveal border-t border-[#E6E8EC]">
                    @foreach ([
                        ['num' => '01', 'title' => 'Magazine', 'desc' => 'Ấn phẩm điện tử theo mùa — những câu chuyện dài, hình ảnh lớn và gu biên tập rõ ràng.', 'url' => route('issue')],
                        ['num' => '02', 'title' => 'Cẩm nang', 'desc' => 'Gợi ý điểm đến, lịch trình, văn hóa, ẩm thực — biên soạn như sổ tay du lịch thực dụng.', 'url' => route('guide')],
                        ['num' => '03', 'title' => 'Khám phá', 'desc' => 'Dòng chảy hình ảnh từ khắp thế giới — khoảnh khắc, địa điểm và cảm hứng trực quan.', 'url' => route('explore')],
                        ['num' => '04', 'title' => 'Câu chuyện', 'desc' => 'Những góc nhìn cá nhân về hành trình — không PR, không vội, có cảm xúc.', 'url' => route('destinations.detail')],
                    ] as $row)
                        <a href="{{ $row['url'] }}" class="about-row group flex flex-col sm:flex-row sm:items-center gap-4 sm:gap-8 py-8 md:py-10 border-b border-[#E6E8EC] px-2 -mx-2 transition-colors duration-300 hover:bg-[#F3F8FD]">
                            <span class="text-[11px] uppercase tracking-[0.2em] text-[#0368B4] font-semibold w-10 shrink-0">{{ $row['num'] }}</span>
                            <div class="flex-1 min-w-0">
                                <h3 class="about-serif text-[24px] md:text-[28px] font-medium text-[#101828] mb-2 group-hover:text-[#0368B4] transition-colors">{{ $row['title'] }}</h3>
                                <p class="text-[15px] leading-[1.75] text-[#667085] max-w-[52ch]">{{ $row['desc'] }}</p>
                            </div>
                            <span class="about-arrow text-xl text-[#667085] group-hover:text-[#0368B4] shrink-0">→</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- 4. Editorial Identity --}}
        <section class="py-20 md:py-28 border-b border-[#E6E8EC] bg-white">
            <div class="max-w-[1280px] mx-auto px-6">
                <div class="about-reveal grid lg:grid-cols-2 gap-12 lg:gap-20 items-start">
                    <figure class="relative overflow-hidden rounded-[4px] order-2 lg:order-1" data-about-parallax>
                        <img
                            src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?q=80&w=900&auto=format&fit=crop"
                            alt="Cảnh quan núi non"
                            class="w-full aspect-[3/4] object-cover"
                            width="560" height="747" loading="lazy"
                        >
                    </figure>
                    <div class="order-1 lg:order-2 lg:pt-8">
                        <p class="text-[11px] uppercase tracking-[0.24em] text-[#0368B4] font-semibold mb-4">Editorial DNA</p>
                        <div class="w-10 h-px bg-[#0368B4] mb-8" aria-hidden="true"></div>
                        <h2 class="about-serif text-[32px] md:text-[40px] leading-[1.1] font-medium text-[#101828] mb-8">
                            Tinh thần của một tạp chí du lịch hiện đại
                        </h2>
                        <div class="space-y-5 text-[16px] leading-[1.85] text-[#667085]">
                            <p>Chúng tôi bắt đầu từ hình ảnh — một khung cửa sổ, một con phố, một bữa ăn — rồi mới đến lời văn. Storytelling image-first là DNA của One2Fly.</p>
                            <p>Quiet luxury không có nghĩa là xa xỉ. Là không ồn ào, không vội, không biến du lịch thành cuộc đua check-in.</p>
                            <p>Điểm đến được tuyển chọn vì có câu chuyện: văn hóa bản địa, kiến trúc, ẩm thực và những khoảnh khắc khó quên — không phải vì trending.</p>
                            <p>Hành trình có ý nghĩa khi bạn đủ thời gian để cảm nhận. One2Fly ủng hộ đi chậm và đi sâu.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- 5. Values --}}
        <section class="py-20 md:py-28 border-b border-[#E6E8EC]">
            <div class="max-w-[1280px] mx-auto px-6">
                <header class="about-reveal mb-12 md:mb-16">
                    <h2 class="about-serif text-[36px] md:text-[48px] leading-[1.05] font-medium text-[#101828]">Những điều chúng tôi theo đuổi</h2>
                </header>

                <div class="about-reveal border-t border-[#E6E8EC]">
                    @foreach ([
                        'Hình ảnh có cảm xúc',
                        'Nội dung được biên tập kỹ',
                        'Trải nghiệm đọc tối giản',
                        'Cảm hứng du lịch thực tế',
                        'Tôn trọng văn hóa địa phương',
                    ] as $value)
                        <div class="flex items-baseline gap-6 md:gap-10 py-7 md:py-9 border-b border-[#E6E8EC] group hover:pl-2 transition-all duration-300">
                            <span class="text-[12px] uppercase tracking-[0.2em] text-[#0368B4] font-semibold shrink-0">{{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}.</span>
                            <p class="about-serif text-[24px] md:text-[32px] lg:text-[36px] font-medium text-[#101828] group-hover:text-[#0368B4] transition-colors duration-300">{{ $value }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- 6. Numbers --}}
        <section class="py-20 md:py-24 border-b border-[#E6E8EC] bg-white">
            <div class="max-w-[1280px] mx-auto px-6">
                <div class="about-reveal grid grid-cols-2 lg:grid-cols-4 gap-10 lg:gap-8">
                    @foreach ([
                        ['num' => '40+', 'label' => 'số báo'],
                        ['num' => '100+', 'label' => 'cẩm nang'],
                        ['num' => '30+', 'label' => 'điểm đến'],
                        ['num' => '1', 'label' => 'tinh thần: đi chậm và sâu'],
                    ] as $stat)
                        <div class="{{ $loop->last ? 'col-span-2 lg:col-span-1' : '' }}">
                            <p class="about-serif text-[48px] md:text-[56px] lg:text-[64px] leading-none font-medium text-[#101828] mb-3">{{ $stat['num'] }}</p>
                            <p class="text-[13px] uppercase tracking-[0.16em] text-[#667085]">{{ $stat['label'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- 7. Visual Story band --}}
        <section class="relative about-reveal overflow-hidden min-h-[360px] md:min-h-[480px] flex items-center">
            <img
                src="https://images.unsplash.com/photo-1436491865332-7a61a109cc05?q=80&w=2000&auto=format&fit=crop"
                alt=""
                class="absolute inset-0 w-full h-full object-cover"
                loading="lazy"
                aria-hidden="true"
            >
            <div class="absolute inset-0 bg-[#101828]/45"></div>
            <div class="relative z-10 max-w-[1280px] mx-auto px-6 py-20 md:py-28 text-center">
                <p class="about-serif text-[26px] sm:text-[32px] md:text-[40px] leading-[1.35] font-medium text-white max-w-[28ch] mx-auto">
                    Từ một khung cửa sổ máy bay đến một con phố nhỏ xa lạ — mỗi khoảnh khắc đều có thể trở thành một câu chuyện.
                </p>
            </div>
        </section>

        {{-- 8. Closing CTA --}}
        <section class="py-24 md:py-32">
            <div class="max-w-[1280px] mx-auto px-6 text-center about-reveal">
                <h2 class="about-serif text-[32px] md:text-[44px] leading-[1.2] font-medium text-[#101828] mb-10">
                    Bắt đầu hành trình cùng One2Fly.
                </h2>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mb-14">
                    <a href="{{ route('issue') }}" class="about-btn inline-flex items-center gap-2 bg-[#0368B4] text-white px-8 py-3.5 text-[11px] uppercase tracking-[0.18em] font-semibold rounded-[4px] hover:opacity-90 transition-opacity">
                        Đọc số báo mới nhất <span class="about-arrow">→</span>
                    </a>
                    <a href="{{ route('destinations') }}" class="about-btn inline-flex items-center gap-2 px-8 py-3.5 text-[11px] uppercase tracking-[0.18em] font-semibold text-[#101828] border border-[#E6E8EC] rounded-[4px] hover:border-[#0368B4] transition-colors">
                        Khám phá điểm đến <span class="about-arrow">→</span>
                    </a>
                </div>

                <form class="max-w-md mx-auto flex flex-col sm:flex-row gap-3 border-t border-[#E6E8EC] pt-12" action="#" method="post">
                    @csrf
                    <label class="sr-only" for="about-newsletter">Email</label>
                    <input
                        type="email"
                        id="about-newsletter"
                        name="email"
                        placeholder="Email của bạn"
                        class="flex-1 px-5 py-3.5 text-[15px] text-[#101828] bg-white border border-[#E6E8EC] rounded-[4px] placeholder:text-[#667085] focus:outline-none focus:border-[#0368B4]"
                    >
                    <button type="submit" class="about-btn px-8 py-3.5 text-[11px] uppercase tracking-[0.16em] font-semibold bg-[#101828] text-white rounded-[4px] hover:bg-[#0368B4] transition-colors whitespace-nowrap">
                        Theo dõi
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
    var nodes = document.querySelectorAll('.about-reveal');

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
        var els = document.querySelectorAll('[data-about-parallax]');
        var ticking = false;
        function parallax() {
            var vh = window.innerHeight;
            els.forEach(function (el) {
                var rect = el.getBoundingClientRect();
                if (rect.bottom < 0 || rect.top > vh) return;
                var p = (rect.top + rect.height / 2 - vh / 2) / vh;
                el.style.setProperty('--about-parallax', (p * -14).toFixed(1) + 'px');
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
