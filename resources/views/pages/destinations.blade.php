@extends('layouts.magazine')

@section('title', $pageTitle ?? 'Hà Giang — Điểm đến · one2FLY!')
@section('meta_description', $pageDescription ?? 'Cẩm nang du lịch Hà Giang — one2FLY Magazine')

@push('head')
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;1,400&display=swap" rel="stylesheet">
@endpush

@section('content')
<section class="dest-cinema-hero relative overflow-hidden flex flex-col">
    <div class="absolute inset-0 overflow-hidden">
        <img
            class="dest-cinema-bg absolute inset-0 h-full w-full object-cover object-center"
            src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?q=80&w=3200&auto=format&fit=crop"
            alt="Đèo Hà Giang lúc bình minh">
    </div>
    <div class="dest-cinema-overlay absolute inset-0"></div>

    <div class="relative z-10 flex-1 flex items-end pt-[88px]">
        <div class="max-w-[1440px] mx-auto px-6 pb-28 md:pb-32 w-full">
            <div class="max-w-[760px] lg:text-left text-center mx-auto lg:mx-0">
                <p class="dest-cinema-label text-[12px] uppercase text-white/75 mb-5">Điểm đến</p>

                <h1 class="dest-cinema-title text-[36px] sm:text-[48px] lg:text-[72px] xl:text-[96px] leading-[0.95] font-medium tracking-[-0.02em] text-white mb-6">
                    HÀ GIANG
                </h1>

                <p class="dest-cinema-desc max-w-[650px] text-[17px] md:text-[18px] leading-[1.75] text-white/85 mx-auto lg:mx-0 mb-8">
                    Khám phá những cung đường đèo ngoạn mục, văn hóa bản địa chân thật
                    và cảnh sắc khó quên ở vùng biên cương phía Bắc Việt Nam.
                </p>

                <div class="dest-cinema-facts hidden sm:flex flex-wrap items-center justify-center lg:justify-start gap-x-4 gap-y-3 text-[12px] uppercase tracking-[0.14em] text-white/70 mb-10">
                    <span><span class="text-white/50">Mùa đẹp</span> <span class="text-white/90">Th9–11</span></span>
                    <span class="text-white/30">•</span>
                    <span><span class="text-white/50">Thời gian</span> <span class="text-white/90">3–5 ngày</span></span>
                    <span class="text-white/30">•</span>
                    <span><span class="text-white/50">Phong cách</span> <span class="text-white/90">Phiêu lưu</span></span>
                    <span class="text-white/30">•</span>
                    <span><span class="text-white/50">Ngân sách</span> <span class="text-white/90">$$</span></span>
                </div>
                <div class="dest-cinema-facts sm:hidden grid grid-cols-2 gap-4 text-[12px] uppercase tracking-[0.14em] text-white/70 mb-10 max-w-[320px] mx-auto lg:mx-0">
                    <span><span class="text-white/50 block">Mùa đẹp</span> <span class="text-white/90">Th9–11</span></span>
                    <span><span class="text-white/50 block">Thời gian</span> <span class="text-white/90">3–5 ngày</span></span>
                    <span><span class="text-white/50 block">Phong cách</span> <span class="text-white/90">Phiêu lưu</span></span>
                    <span><span class="text-white/50 block">Ngân sách</span> <span class="text-white/90">$$</span></span>
                </div>

                <div class="dest-cinema-cta flex flex-col sm:flex-row items-stretch sm:items-center justify-center lg:justify-start gap-4">
                    <a href="#dest-overview" class="inline-flex items-center justify-center gap-2 bg-[#00C1F4] text-white px-8 py-3.5 text-[11px] uppercase tracking-[0.18em] font-semibold transition-opacity hover:opacity-90">
                        Khám phá câu chuyện <span class="dest-detail-cta-arrow" aria-hidden="true">→</span>
                    </a>
                    <a href="#dest-itinerary" class="inline-flex items-center justify-center px-8 py-3.5 text-[11px] uppercase tracking-[0.18em] font-semibold text-white border border-white/45 hover:border-white transition-colors">
                        Xem cẩm nang
                    </a>
                </div>
            </div>
        </div>
    </div>

    <a href="#dest-overview" class="absolute bottom-8 left-1/2 -translate-x-1/2 z-20 flex flex-col items-center gap-3 text-[10px] uppercase tracking-[0.22em] text-white/55 hover:text-white/80 transition-colors">
        <span class="dest-cinema-scroll-line block h-10 w-px bg-white/70"></span>
        <span>Cuộn để khám phá</span>
    </a>

    <aside class="dest-cinema-glass absolute bottom-8 right-6 md:right-10 z-20 hidden md:flex flex-col gap-2 px-5 py-4 text-[11px] tracking-[0.06em] text-white/85 min-w-[180px]">
        <p class="text-white/95">📍 Việt Nam</p>
        <p>★★★★★ <span class="text-white/70">4.9</span></p>
        <p class="text-white/65">120 bài viết</p>
    </aside>
</section>

<div class="dest-detail">
    {{-- 2. Tổng quan điểm đến --}}
    <section id="dest-overview" class="py-20 md:py-28 border-b border-[#EAEAEA]">
        <div class="max-w-[1200px] mx-auto px-6 dest-detail-reveal">
            <div class="grid lg:grid-cols-[1.1fr_0.9fr] gap-12 lg:gap-16 items-start">
                <div>
                    <p class="text-[11px] uppercase tracking-[0.25em] text-[#00C1F4] mb-5">Mở đầu</p>
                    <h2 class="font-display text-4xl md:text-5xl lg:text-[56px] leading-[1.05] font-medium mb-8" style="font-family:'Playfair Display', 'Cormorant Garamond', serif">Nơi núi chạm tới trời</h2>
                    <div class="space-y-5 text-[17px] leading-[1.8] text-[#666666]">
                        <p>Hà Giang là Việt Nam ở trạng thái hoang sơ nhất — vùng đất của đá vôi, đèo quanh co và những nền văn hóa tồn tại qua nhiều thế kỷ dọc biên giới phía Bắc. Đây không phải nơi để đi vội; đây là nơi bạn lướt qua từng cua, từng dặm.</p>
                        <p>Từ đèo Mã Pí Lèng huyền thoại đến chợ phiên Đồng Văn yên ả, mỗi cây số lại mở ra một sắc xanh khác, một câu chuyện được kể bằng tiếng H'Mông, Tày hay Dao. Đây là hành trình biên cương đầy chất thơ.</p>
                        <p>Với du khách tò mò, Hà Giang mang đến điều hiếm có: sự chân thật không phô diễn, vẻ đẹp không đông đúc, và một chuyến đi đường bộ cảm giác ít như du lịch, nhiều như khám phá.</p>
                    </div>
                    <blockquote class="mt-12 pt-8 border-t border-[#EAEAEA] font-display text-2xl md:text-3xl leading-snug italic text-[#111111]" style="font-family:'Playfair Display', 'Cormorant Garamond', serif">
                        "Một chuyến đi Hà Giang giống như lật từng trang của cảnh sắc hoang dã nhất Việt Nam."
                    </blockquote>
                </div>
                <figure class="dest-detail-img-zoom lg:sticky lg:top-28">
                    <img class="w-full aspect-[3/4] object-cover" src="https://images.unsplash.com/photo-1512453979798-5ea266f8880c?q=80&w=800&auto=format&fit=crop" alt="Cao nguyên Hà Giang">
                    <figcaption class="mt-3 text-[11px] uppercase tracking-[0.16em] text-[#666666]">Vùng biên cương phía Bắc · Ảnh: Ban biên tập one2FLY</figcaption>
                </figure>
            </div>
        </div>
    </section>

    {{-- 3. Thông tin nhanh --}}
    <section id="dest-facts" class="py-16 md:py-20 border-b border-[#EAEAEA] bg-white">
        <div class="max-w-[1200px] mx-auto px-6 dest-detail-reveal">
            <p class="text-[11px] uppercase tracking-[0.25em] text-[#00C1F4] mb-4">Tóm tắt</p>
            <h2 class="font-display text-3xl md:text-4xl font-medium mb-12 text-[#111111]">Thông tin nhanh</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-px bg-[#EAEAEA] border border-[#EAEAEA]">
                @foreach ([
                ['icon' => '◷', 'label' => 'Mùa đẹp', 'value' => 'Tháng 9 – 11'],
                ['icon' => '↔', 'label' => 'Thời gian', 'value' => '3 – 5 ngày'],
                ['icon' => '◎', 'label' => 'Ngân sách', 'value' => '$$'],
                ['icon' => '☁', 'label' => 'Thời tiết', 'value' => 'Mát, sương mù'],
                ['icon' => '✦', 'label' => 'Ngôn ngữ', 'value' => 'Tiếng Việt + dân tộc'],
                ['icon' => '₫', 'label' => 'Tiền tệ', 'value' => 'Việt Nam Đồng'],
                ['icon' => '◇', 'label' => 'Phong cách', 'value' => 'Phiêu lưu'],
                ['icon' => '→', 'label' => 'Di chuyển', 'value' => 'Xe máy / ô tô'],
                ['icon' => '♡', 'label' => 'Phù hợp', 'value' => 'Người thích khám phá & nhiếp ảnh'],
                ] as $fact)
                <div class="bg-[#FAF9F6] px-6 py-8">
                    <p class="text-[#C89B3C] text-lg mb-3" aria-hidden="true">{{ $fact['icon'] }}</p>
                    <p class="text-[10px] uppercase tracking-[0.2em] text-[#666666] mb-2">{{ $fact['label'] }}</p>
                    <p class="text-[15px] text-[#111111] font-medium">{{ $fact['value'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 4. Thư viện ảnh --}}
    <section id="dest-gallery" class="py-16 md:py-24 border-b border-[#EAEAEA]">
        <div class="max-w-[1200px] mx-auto px-6 dest-detail-reveal">
            <p class="text-[11px] uppercase tracking-[0.25em] text-[#00C1F4] mb-4">Phóng sự ảnh</p>
            <h2 class="font-display text-3xl md:text-4xl font-medium mb-12 text-[#111111]">Thư viện ảnh</h2>
            <div class="dest-detail-gallery">
                @foreach ([
                ['h' => 'h-[420px]', 'src' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?q=80&w=1200&auto=format&fit=crop', 'cap' => 'Đèo Mã Pí Lèng lúc bình minh'],
                ['h' => 'h-[280px]', 'src' => 'https://images.unsplash.com/photo-1501785888041-af3ef285b470?q=80&w=800&auto=format&fit=crop', 'cap' => 'Ruộng bậc thang Hoàng Su Phì'],
                ['h' => 'h-[360px]', 'src' => 'https://images.unsplash.com/photo-1512453979798-5ea266f8880c?q=80&w=800&auto=format&fit=crop', 'cap' => 'Phố cổ Đồng Văn'],
                ['h' => 'h-[240px]', 'src' => 'https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?q=80&w=800&auto=format&fit=crop', 'cap' => 'Con đường mở ra phía Bắc'],
                ['h' => 'h-[380px]', 'src' => 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?q=80&w=900&auto=format&fit=crop', 'cap' => 'Chợ phiên buổi sáng'],
                ['h' => 'h-[300px]', 'src' => 'https://images.unsplash.com/photo-1528127269322-539801943592?q=80&w=800&auto=format&fit=crop', 'cap' => 'Sương mù thung lũng đá vôi'],
                ] as $photo)
                <figure class="dest-detail-gallery-item dest-detail-img-zoom">
                    <a href="{{ $photo['src'] }}" class="block" data-lightbox>
                        <img class="w-full {{ $photo['h'] }} object-cover" src="{{ $photo['src'] }}" alt="{{ $photo['cap'] }}">
                    </a>
                    <figcaption class="mt-2 text-[10px] uppercase tracking-[0.14em] text-[#666666]">{{ $photo['cap'] }}</figcaption>
                </figure>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 5. Trải nghiệm nổi bật --}}
    <section id="dest-experiences" class="py-16 md:py-24 border-b border-[#EAEAEA] bg-white">
        <div class="max-w-[1200px] mx-auto px-6 dest-detail-reveal">
            <p class="text-[11px] uppercase tracking-[0.25em] text-[#00C1F4] mb-4">Chương năm</p>
            <h2 class="font-display text-3xl md:text-4xl font-medium mb-12 text-[#111111]">Trải nghiệm nổi bật</h2>
            <div class="grid md:grid-cols-2 gap-10 md:gap-14">
                @foreach ([
                ['n' => '01', 'cat' => 'Phiêu lưu', 'title' => 'Chạy vòng Hà Giang Loop', 'text' => 'Bốn ngày qua đèo, homestay và cảnh sắc khiến bạn nghĩ lại về chuyến đi đường bộ.', 'img' => 'https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?q=80&w=900&auto=format&fit=crop'],
                ['n' => '02', 'cat' => 'Văn hóa', 'title' => 'Ghé chợ phiên địa phương', 'text' => 'Chợ Đồng Văn và Mèo Vạc rực rỡ sắc màu, thổ cẩm và nhịp sống cao nguyên.', 'img' => 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?q=80&w=900&auto=format&fit=crop'],
                ['n' => '03', 'cat' => 'Lưu trú', 'title' => 'Ở homestay trên núi', 'text' => 'Ngủ giữa mây, ăn cùng gia đình bản địa và thức dậy với view không thể mua bằng tiền.', 'img' => 'https://images.unsplash.com/photo-1512453979798-5ea266f8880c?q=80&w=800&auto=format&fit=crop'],
                ['n' => '04', 'cat' => 'Thiên nhiên', 'title' => 'Đón bình minh trên Mã Pí Lèng', 'text' => 'Đứng trên sông Nho Quế khi bình minh vẽ nên thung lũng vàng và bóng tối.', 'img' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?q=80&w=900&auto=format&fit=crop'],
                ['n' => '05', 'cat' => 'Ẩm thực', 'title' => 'Thử đặc sản địa phương', 'text' => 'Thắng cố, cháo ấu tẩu và thịt trâu hun khói — hương vị của độ cao và truyền thống.', 'img' => 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?q=80&w=900&auto=format&fit=crop'],
                ] as $exp)
                <article class="grid sm:grid-cols-[140px_1fr] gap-6 border-t border-[#EAEAEA] pt-8">
                    <div class="dest-detail-img-zoom">
                        <img class="w-full h-[140px] object-cover" src="{{ $exp['img'] }}" alt="{{ $exp['title'] }}">
                    </div>
                    <div>
                        <p class="text-[11px] uppercase tracking-[0.2em] text-[#C89B3C] mb-2">{{ $exp['n'] }} · {{ $exp['cat'] }}</p>
                        <h3 class="font-display text-2xl font-medium text-[#111111] mb-3">{{ $exp['title'] }}</h3>
                        <p class="text-[15px] leading-relaxed text-[#666666]">{{ $exp['text'] }}</p>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 6. Lịch trình gợi ý --}}
    <section id="dest-itinerary" class="py-16 md:py-24 border-b border-[#EAEAEA]">
        <div class="max-w-[900px] mx-auto px-6 dest-detail-reveal">
            <p class="text-[11px] uppercase tracking-[0.25em] text-[#00C1F4] mb-4">Cẩm nang</p>
            <h2 class="font-display text-3xl md:text-4xl font-medium mb-14 text-[#111111]">Lịch trình gợi ý</h2>
            <div class="dest-detail-timeline">
                @foreach ([
                ['day' => '01', 'title' => 'Hà Nội → Hà Giang', 'img' => 'https://images.unsplash.com/photo-1528127269322-539801943592?q=80&w=600&auto=format&fit=crop', 'slots' => ['Sáng: Khởi hành từ Hà Nội, cung đường phía Bắc', 'Chiều: Đến thành phố Hà Giang, thuê xe máy', 'Tối: Ăn tối địa phương, nghỉ sớm']],
                ['day' => '02', 'title' => 'Quản Bạ & Yên Minh', 'img' => 'https://images.unsplash.com/photo-1501785888041-af3ef285b470?q=80&w=600&auto=format&fit=crop', 'slots' => ['Sáng: Cổng trời Quản Bạ', 'Chiều: Rừng thông Yên Minh', 'Tối: Homestay tại Quản Bạ']],
                ['day' => '03', 'title' => 'Đồng Văn & Mã Pí Lèng', 'img' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?q=80&w=600&auto=format&fit=crop', 'slots' => ['Sáng: Phố cổ Đồng Văn', 'Chiều: Chạy đèo Mã Pí Lèng', 'Tối: Hoàng hôn trên sông Nho Quế']],
                ['day' => '04', 'title' => 'Mèo Vạc & về', 'img' => 'https://images.unsplash.com/photo-1512453979798-5ea266f8880c?q=80&w=800&auto=format&fit=crop', 'slots' => ['Sáng: Chợ phiên Mèo Vạc', 'Chiều: Bắt đầu vòng về', 'Tối: Trở lại thành phố Hà Giang']],
                ] as $day)
                <article class="dest-detail-timeline-day dest-detail-reveal">
                    <div class="flex flex-col sm:flex-row gap-6">
                        <img class="w-full sm:w-[160px] h-[120px] object-cover shrink-0" src="{{ $day['img'] }}" alt="Ngày {{ $day['day'] }}">
                        <div class="flex-1">
                            <p class="text-[10px] uppercase tracking-[0.22em] text-[#00C1F4] mb-1">Ngày {{ $day['day'] }}</p>
                            <h3 class="font-display text-2xl font-medium text-[#111111] mb-4">{{ $day['title'] }}</h3>
                            <ul class="space-y-2 text-[14px] text-[#666666]">
                                @foreach ($day['slots'] as $slot)
                                <li>{{ $slot }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 7. Ẩm thực & Văn hóa --}}
    <section id="dest-culture" class="py-16 md:py-24 border-b border-[#EAEAEA] bg-white">
        <div class="max-w-[1200px] mx-auto px-6 dest-detail-reveal">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center mb-16">
                <div class="dest-detail-img-zoom order-2 lg:order-1">
                    <img class="w-full aspect-[4/5] object-cover" src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?q=80&w=900&auto=format&fit=crop" alt="Ẩm thực Hà Giang">
                </div>
                <div class="order-1 lg:order-2">
                    <p class="text-[11px] uppercase tracking-[0.25em] text-[#00C1F4] mb-4">Ẩm thực & Văn hóa</p>
                    <h2 class="font-display text-3xl md:text-4xl font-medium mb-6 text-[#111111]">Hương vị cao nguyên</h2>
                    <p class="text-[16px] leading-[1.8] text-[#666666] mb-6">Ẩm thực Hà Giang gắn với địa hình — thịt hun khói, rau rừng và món ăn mang đậm truyền thống người H'Mông, Tày. Chợ phiên như những bảo tàng sống, nơi vải chàm và trang sức bạc kể câu chuyện cũ hơn mọi quyển cẩm nang.</p>
                    <p class="text-[14px] italic text-[#111111] border-l-2 border-[#C89B3C] pl-5">Ghi chú biên tập: Nên ghé chợ cuối tuần để cảm nhận văn hóa sống động nhất.</p>
                </div>
            </div>
            <div class="grid md:grid-cols-3 gap-8 border-t border-[#EAEAEA] pt-12">
                @foreach ([
                ['title' => 'Món địa phương', 'text' => 'Thắng cố, xôi ngũ sắc, cá suối nướng và rượu ngô quanh bếp lửa.'],
                ['title' => 'Chợ & Bản làng', 'text' => 'Đồng Văn, Lũng Cú và những thôn xa nơi người dân tộc giữ nghề thủ công truyền thống.'],
                ['title' => 'Lễ hội & Tập tục', 'text' => 'Chợ tình Khâu Vai, lễ Gau Tao và các lễ hội mùa gặt trên cao nguyên đá.'],
                ] as $block)
                <div>
                    <h3 class="font-display text-xl text-[#111111] mb-3">{{ $block['title'] }}</h3>
                    <p class="text-[15px] leading-relaxed text-[#666666]">{{ $block['text'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 8. Mẹo du lịch --}}
    <section id="dest-tips" class="py-16 md:py-20 border-b border-[#EAEAEA]">
        <div class="max-w-[1200px] mx-auto px-6 dest-detail-reveal">
            <p class="text-[11px] uppercase tracking-[0.25em] text-[#00C1F4] mb-4">Ghi chú thực tế</p>
            <h2 class="font-display text-3xl md:text-4xl font-medium mb-12 text-[#111111]">Mẹo du lịch</h2>
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-x-8 gap-y-10">
                @foreach ([
                ['title' => 'Di chuyển', 'text' => 'Xe máy phù hợp nhất cho vòng loop. Chỉ nên đi nếu có kinh nghiệm — đường dốc và quanh co.'],
                ['title' => 'SIM & Internet', 'text' => 'Mua SIM tại thành phố Hà Giang. Sóng yếu ở các thung lũng xa.'],
                ['title' => 'Tiền mặt', 'text' => 'Mang đủ tiền mặt. Có ATM ở thị trấn; homestay thường không nhận thẻ.'],
                ['title' => 'Hành lý', 'text' => 'Áo nhiều lớp, áo mưa, giày chắc, kem chống nắng và pin dự phòng.'],
                ['title' => 'An toàn', 'text' => 'Xem thời tiết trước khi qua đèo. Đi ban ngày. Đội mũ bảo hiểm chất lượng.'],
                ['title' => 'Ứng xử', 'text' => 'Hỏi trước khi chụp ảnh người dân. Mặc kín đáo khi vào bản làng.'],
                ['title' => 'Thời tiết', 'text' => 'Th9–11 trời trong. Mùa đông lạnh; mùa hè mưa nhiều.'],
                ['title' => 'Du lịch có trách nhiệm', 'text' => 'Ủng hộ homestay, mua thổ cẩm địa phương, không xả rác trên đường.'],
                ] as $tip)
                <div class="border-t border-[#EAEAEA] pt-5">
                    <p class="text-[#C89B3C] text-sm mb-2">—</p>
                    <h3 class="text-[13px] uppercase tracking-[0.14em] text-[#111111] font-semibold mb-2">{{ $tip['title'] }}</h3>
                    <p class="text-[14px] leading-relaxed text-[#666666]">{{ $tip['text'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 9. Bài liên quan + Ưu đãi --}}
    <section id="dest-related-stories" class="py-16 md:py-24 border-b border-[#EAEAEA] bg-white">
        <div class="max-w-[1200px] mx-auto px-6 dest-detail-reveal">
            <div class="grid lg:grid-cols-2 gap-16">
                <div>
                    <p class="text-[11px] uppercase tracking-[0.25em] text-[#00C1F4] mb-4">Từ tạp chí</p>
                    <h2 class="font-display text-3xl font-medium mb-10 text-[#111111]">Bài viết liên quan</h2>
                    <div class="space-y-8">
                        @foreach ([
                        ['title' => 'Những cung đường đẹp nhất miền Bắc Việt Nam', 'meta' => 'Phóng sự ảnh · 12 phút đọc'],
                        ['title' => 'Cẩm nang cuối tuần ở Đồng Văn', 'meta' => 'Cẩm nang · 8 phút đọc'],
                        ['title' => 'Ăn gì ở Hà Giang', 'meta' => 'Ẩm thực · 6 phút đọc'],
                        ] as $story)
                        <article class="group border-t border-[#EAEAEA] pt-6">
                            <h3 class="font-display text-xl text-[#111111] mb-2 group-hover:text-[#00C1F4] transition-colors duration-300">
                                <a href="{{ route('destinations.detail') }}">{{ $story['title'] }}</a>
                            </h3>
                            <p class="text-[11px] uppercase tracking-[0.14em] text-[#666666]">{{ $story['meta'] }}</p>
                        </article>
                        @endforeach
                    </div>
                </div>
                <div>
                    <p class="text-[11px] uppercase tracking-[0.25em] text-[#C89B3C] mb-4">Gợi ý chọn lọc</p>
                    <h2 class="font-display text-3xl font-medium mb-10 text-[#111111]">Ưu đãi đặc biệt</h2>
                    <div class="space-y-8">
                        @foreach ([
                        ['title' => 'Hành trình miền Bắc', 'text' => 'Tour 5 ngày qua Hà Giang và Cao Bằng với hướng dẫn viên địa phương.', 'img' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?q=80&w=600&auto=format&fit=crop'],
                        ['title' => 'Gói phiêu lưu Hà Giang', 'text' => 'Thuê xe máy, homestay và lên lộ trình trọn vẹn cho vòng loop.', 'img' => 'https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?q=80&w=600&auto=format&fit=crop'],
                        ['title' => 'Đưa đón Hà Nội – Hà Giang', 'text' => 'Xe riêng tiện nghi với các điểm dừng chân ngắm cảnh trên đường.', 'img' => 'https://images.unsplash.com/photo-1528127269322-539801943592?q=80&w=600&auto=format&fit=crop'],
                        ] as $offer)
                        <article class="grid grid-cols-[100px_1fr] gap-5 border-t border-[#EAEAEA] pt-6">
                            <div class="dest-detail-img-zoom">
                                <img class="w-full h-[80px] object-cover" src="{{ $offer['img'] }}" alt="">
                            </div>
                            <div>
                                <h3 class="font-display text-lg text-[#111111] mb-2">{{ $offer['title'] }}</h3>
                                <p class="text-[14px] text-[#666666] mb-3 leading-relaxed">{{ $offer['text'] }}</p>
                                <a href="{{ route('destinations.detail') }}" class="text-[10px] uppercase tracking-[0.18em] text-[#111111] hover:text-[#00C1F4] transition-colors duration-300">Tìm hiểu thêm <span class="dest-detail-cta-arrow">→</span></a>
                            </div>
                        </article>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 10. Điểm đến lân cận --}}
    <section id="dest-nearby" class="py-16 md:py-24">
        <div class="max-w-[1200px] mx-auto px-6 dest-detail-reveal">
            <p class="text-[11px] uppercase tracking-[0.25em] text-[#00C1F4] mb-4">Tiếp tục khám phá</p>
            <h2 class="font-display text-3xl md:text-4xl font-medium mb-10 text-[#111111]">Điểm đến lân cận</h2>
            <div class="dest-detail-nearby-track flex gap-5 overflow-x-auto pb-4 -mx-6 px-6 md:mx-0 md:px-0">
                @foreach ([
                ['name' => 'Sa Pa', 'img' => 'https://images.unsplash.com/photo-1512453979798-5ea266f8880c?q=80&w=800&auto=format&fit=crop'],
                ['name' => 'Cao Bằng', 'img' => 'https://images.unsplash.com/photo-1501785888041-af3ef285b470?q=80&w=800&auto=format&fit=crop'],
                ['name' => 'Ninh Bình', 'img' => 'https://images.unsplash.com/photo-1528127269322-539801943592?q=80&w=800&auto=format&fit=crop'],
                ['name' => 'Vịnh Hạ Long', 'img' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=800&auto=format&fit=crop'],
                ['name' => 'Hà Nội', 'img' => 'https://images.unsplash.com/photo-1493976040374-85c8e12f0c0e?q=80&w=800&auto=format&fit=crop'],
                ] as $near)
                <a href="{{ route('destinations') }}" class="group relative shrink-0 w-[260px] md:w-[300px] h-[380px] dest-detail-img-zoom block overflow-hidden">
                    <img class="absolute inset-0 w-full h-full object-cover" src="{{ $near['img'] }}" alt="{{ $near['name'] }}">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/10 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-6 flex items-end justify-between text-white">
                        <h3 class="font-display text-2xl font-medium text-white">{{ $near['name'] }}</h3>
                        <span class="dest-detail-cta-arrow text-lg opacity-70 group-hover:opacity-100">→</span>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<script>
    (function() {
        var nodes = document.querySelectorAll('.dest-detail-reveal');
        if (!nodes.length) return;
        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
            nodes.forEach(function(el) {
                el.classList.add('is-visible');
            });
            return;
        }
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
    })();
</script>
@endpush