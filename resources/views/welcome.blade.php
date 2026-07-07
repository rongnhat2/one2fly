<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>one2FLY! — Travel Magazine</title>
    <meta name="description" content="one2FLY! — Tạp chí du lịch số, điểm đến, ẩm thực, săn deal và cẩm nang du lịch thông minh." />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    @include('partials.magazine-tailwind')
    <link rel="stylesheet" href="{{ asset('assets/simple.css') }}">
</head>

<body class="font-sans antialiased bg-canvas text-muted has-fixed-header has-hero-header">
    @include('partials.magazine-header')

    <section class="hero min-h-[690px] md:min-h-[760px] text-white relative flex items-center">
        <div class="max-w-[1440px] mx-auto px-6 w-full pt-[88px]">
            <div class="max-w-[680px]">
                <p class="font-display italic text-2xl mb-5">Join me on my journey</p>
                <h1 class="font-display text-[72px] md:text-[112px] leading-[.92] font-medium tracking-[-.02em] mb-7">Experience<br>the World</h1>
                <p class="text-lg md:text-xl text-white/85 mb-10">Cẩm nang du lịch thông minh, điểm đến đẹp, deal tốt và những câu chuyện đáng đọc cho mỗi chuyến đi.</p>
                <div class="flex items-center gap-5">
                    <a href="#campaign" class="w-14 h-14 rounded-2xl bg-white text-dark flex items-center justify-center">▶</a>
                    <span class="text-sm font-medium">Xem chuyên mục nổi bật</span>
                </div>
            </div>
        </div>
    </section>

    <main>
        <section class="relative -mt-24 z-10 pb-8">
            <div class="max-w-[1440px] mx-auto px-6 grid md:grid-cols-3 gap-4">
                <article class="image-card relative h-[320px] rounded-2xl overflow-hidden border border-line bg-cover bg-center" style="background-image:url('https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?q=80&w=900&auto=format&fit=crop')">
                    <div class="image-card-caption">
                        <p class="image-card-label">Việt Nam</p>
                        <h3 class="image-card-title">Đà Lạt: góc nhỏ khiến bạn muốn quay lại</h3>
                    </div>
                </article>
                <article class="image-card relative h-[320px] rounded-2xl overflow-hidden border border-line bg-cover bg-center" style="background-image:url('https://images.unsplash.com/photo-1506744038136-46273834b3fb?q=80&w=900&auto=format&fit=crop')">
                    <div class="image-card-caption">
                        <p class="image-card-label">Miền núi</p>
                        <h3 class="image-card-title">Săn mây, ăn ngon và đi sao cho đáng</h3>
                    </div>
                </article>
                <article class="image-card relative h-[320px] rounded-2xl overflow-hidden border border-line bg-cover bg-center" style="background-image:url('https://images.unsplash.com/photo-1528127269322-539801943592?q=80&w=900&auto=format&fit=crop')">
                    <div class="image-card-caption">
                        <p class="image-card-label">Biển</p>
                        <h3 class="image-card-title">Quy Nhơn: lịch trình nhẹ mà rất đã</h3>
                    </div>
                </article>
            </div>
        </section>

        <!-- <section id="campaign" class="py-12">
            <div class="max-w-[960px] mx-auto px-5">
                <div class="rounded-2xl overflow-hidden bg-brand text-white shadow-soft grid md:grid-cols-[.9fr_1.1fr] items-center">
                    <div class="p-8 md:p-12">
                        <p class="text-xs uppercase tracking-[.22em] text-accent mb-4">Special Campaign</p>
                        <h2 class="font-display text-5xl md:text-6xl leading-[.95] font-medium mb-5">Du lịch<br>đừng để<br>bị chặt chém</h2>
                        <p class="text-white/80 leading-7 mb-7">Thông tin đúng, giá rõ ràng, kinh nghiệm thực tế để chuyến đi bớt mất tiền oan.</p>
                        <a href="#" class="inline-flex bg-gold text-ink px-6 py-3 rounded-full text-xs uppercase tracking-[.16em] font-bold">Khám phá ngay</a>
                    </div>
                    <img class="h-full min-h-[310px] w-full object-cover" src="https://images.unsplash.com/photo-1552733407-5d5c46c3bb3b?q=80&w=1200&auto=format&fit=crop" alt="Travel guide">
                </div>
            </div>
        </section> -->

        <section id="campaign-editorial" class="campaign-spotlight">
            <div class="max-w-[1440px] mx-auto px-6">
                <div class="campaign-spotlight-frame">
                    <div class="grid lg:grid-cols-[1.35fr_.65fr] gap-4 items-stretch">
                        <article class="image-card-feature relative min-h-[560px] rounded-2xl overflow-hidden bg-cover bg-center" style="background-image:url('https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?q=80&w=1800&auto=format&fit=crop')">
                            <div class="image-card-feature-body">
                                <div class="image-card-feature-panel">
                                    <p class="inline-flex items-center gap-2 text-[11px] uppercase tracking-[0.18em] font-semibold text-brand mb-4">
                                        <span class="w-6 h-[2px] bg-brand"></span>
                                        Chuyên mục quan trọng nhất
                                    </p>
                                    <h2 class="image-card-feature-headline">
                                        Du lịch đừng để bị <span class="text-accent">chặt chém</span>
                                    </h2>
                                    <p class="image-card-feature-lead">
                                        Cập nhật giá tham khảo, tình huống dễ bị hét giá, kinh nghiệm hỏi trước khi dùng dịch vụ và danh sách nơi nên chọn để chuyến đi vui hơn, tỉnh hơn.
                                    </p>
                                </div>
                                <div class="image-card-stats" id="campaign-stats">
                                    <div class="image-card-stat">
                                        <b>01</b>
                                        <span>Giá tham khảo</span>
                                    </div>
                                    <div class="image-card-stat">
                                        <b>02</b>
                                        <span>Taxi & di chuyển</span>
                                    </div>
                                    <div class="image-card-stat">
                                        <b>03</b>
                                        <span>Ăn uống đúng giá</span>
                                    </div>
                                    <div class="image-card-stat">
                                        <b>04</b>
                                        <span>Né mất tiền oan</span>
                                    </div>
                                </div>
                            </div>
                        </article>

                        <div id="daily" class="grid gap-4">
                            <article class="image-card relative min-h-[268px] rounded-2xl overflow-hidden bg-cover bg-center" style="background-image:url('https://images.unsplash.com/photo-1506744038136-46273834b3fb?q=80&w=900&auto=format&fit=crop')">
                                <div class="image-card-caption">
                                    <p class="image-card-label">Mục nhỏ mỗi ngày</p>
                                    <h3 class="image-card-title">Mỗi ngày một câu...<br>không ngu.</h3>
                                    <p class="image-card-desc">Một câu ngắn, dễ nhớ, đọc xong đi chơi khôn hơn một chút.</p>
                                </div>
                            </article>
                            <article class="image-card relative min-h-[268px] rounded-2xl overflow-hidden bg-cover bg-center" style="background-image:url('https://images.unsplash.com/photo-1528127269322-539801943592?q=80&w=900&auto=format&fit=crop')">
                                <div class="image-card-caption">
                                    <p class="image-card-label">Mục nhỏ mỗi ngày</p>
                                    <h3 class="image-card-title">Đọc tin rồi...<br>đừng tức.</h3>
                                    <p class="image-card-desc">Tin nóng, chuyện lạ, cảnh báo nhẹ nhàng. Vui thôi nhưng thông tin phải đúng.</p>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section id="offers-editorial" class="bg-white py-16 md:py-24 lg:py-28">
            <div class="max-w-[1440px] mx-auto px-6">
                <header class="mb-12 md:mb-16 lg:mb-20">
                    <p class="text-[11px] uppercase tracking-[0.2em] font-semibold text-muted mb-3">Ưu đãi đặc biệt</p>
                    <h2 class="font-display text-[2.5rem] md:text-[3.25rem] leading-[1.05] font-medium text-dark tracking-[-0.02em]">Khuyến mãi &amp; Mã giảm giá du lịch</h2>
                </header>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-[1fr_2fr_1fr] gap-10 lg:gap-12">
                    <aside class="order-2 lg:order-1 flex flex-col gap-12 lg:gap-14">

                        <article>
                            <a href="#" class="group block">
                                <div class="overflow-hidden rounded-xl mb-5">
                                    <img class="w-full aspect-[4/3] object-cover transition-transform duration-300 group-hover:scale-105" src="https://images.unsplash.com/photo-1502602898657-3e91760cbb34?q=80&w=900&auto=format&fit=crop" alt="Paris Weekend Fare" loading="lazy">
                                </div>
                                <p class="text-[11px] uppercase tracking-[0.18em] font-semibold text-muted mb-2">Giá tốt cuối tuần</p>
                                <h3 class="font-display text-[1.75rem] leading-tight font-medium text-dark mb-3 transition-colors duration-300 group-hover:text-brand">Vé cuối tuần Paris</h3>
                                <p class="text-[15px] leading-7 text-muted mb-4">Một kỳ nghỉ thành phố cao cấp với khách sạn được chọn lọc gần sông Seine.</p>
                                <span class="inline-flex items-center gap-2 text-[12px] uppercase tracking-[0.14em] font-semibold text-dark transition-all duration-300 group-hover:text-brand">
                                    Xem ưu đãi
                                    <span class="transition-transform duration-300 group-hover:translate-x-1">→</span>
                                </span>
                            </a>
                        </article>

                        <article>
                            <a href="#" class="group block">
                                <div class="overflow-hidden rounded-xl mb-5">
                                    <img class="w-full aspect-[4/3] object-cover transition-transform duration-300 group-hover:scale-105" src="https://images.unsplash.com/photo-1514282401047-d79a71a590e8?q=80&w=900&auto=format&fit=crop" alt="Maldives Resort Escape" loading="lazy">
                                </div>
                                <p class="text-[11px] uppercase tracking-[0.18em] font-semibold text-muted mb-2">Đảo nghỉ dưỡng</p>
                                <h3 class="font-display text-[1.75rem] leading-tight font-medium text-dark mb-3 transition-colors duration-300 group-hover:text-brand">Kỳ nghỉ Maldives Resort</h3>
                                <p class="text-[15px] leading-7 text-muted mb-4">Biệt thự trên mặt nước, đầm phá yên tĩnh và quyền lợi nghỉ dưỡng theo mùa.</p>
                                <span class="inline-flex items-center gap-2 text-[12px] uppercase tracking-[0.14em] font-semibold text-dark transition-all duration-300 group-hover:text-brand">
                                    Xem ưu đãi
                                    <span class="transition-transform duration-300 group-hover:translate-x-1">→</span>
                                </span>
                            </a>
                        </article>
                    </aside>

                    <div class="order-1 md:col-span-2 lg:col-span-1 lg:order-2">
                        <article class="mb-12 lg:mb-14">
                            <a href="#" class="group block">
                                <div class="overflow-hidden rounded-xl mb-8">
                                    <img class="w-full aspect-[16/10] md:aspect-[5/3] object-cover transition-transform duration-300 group-hover:scale-[1.03]" src="https://images.unsplash.com/photo-1537996194471-e657df975ab4?q=80&w=1400&auto=format&fit=crop" alt="Escape to Bali" loading="lazy">
                                </div>
                                <p class="text-[11px] uppercase tracking-[0.2em] font-semibold text-muted mb-4">Ưu đãi có thời hạn</p>
                                <h3 class="font-display text-[2.5rem] md:text-[3.5rem] lg:text-[3.75rem] leading-[1.02] font-medium text-dark tracking-[-0.03em] mb-5 transition-colors duration-300 group-hover:text-brand max-w-[18ch]">Trốn đến Bali với ưu đãi độc quyền từ One2Fly</h3>
                                <p class="text-base md:text-lg leading-8 text-muted max-w-[52ch] mb-8">Chuyến bay được chọn lọc, chỗ ở được tuyển chọn và ưu đãi theo mùa cho trải nghiệm sang trọng yên tĩnh.</p>
                                <span class="inline-flex items-center gap-2 text-[12px] uppercase tracking-[0.16em] font-semibold text-dark border-b border-[#111111] pb-1 transition-all duration-300 group-hover:text-brand group-hover:border-brand">
                                    Khám phá ưu đãi
                                    <span class="transition-transform duration-300 group-hover:translate-x-1">→</span>
                                </span>
                            </a>
                        </article>

                        <article class="border-t border-line pt-10">
                            <a href="#" class="group grid md:grid-cols-[1.1fr_.9fr] gap-6 md:gap-8 items-center">
                                <div>
                                    <p class="text-[11px] uppercase tracking-[0.18em] font-semibold text-muted mb-3">Lựa chọn của biên tập viên</p>
                                    <h4 class="font-display text-2xl md:text-3xl leading-tight font-medium text-dark mb-3 transition-colors duration-300 group-hover:text-brand">Sang trọng yên bình tại Ubud</h4>
                                    <p class="text-[15px] leading-7 text-muted">Lịch trình nhẹ nhàng hơn với spa, dạo bộ giữa ruộng bậc thang và xe đưa đón riêng.</p>
                                </div>
                                <div class="overflow-hidden rounded-xl">
                                    <img class="w-full aspect-[4/3] object-cover transition-transform duration-300 group-hover:scale-105" src="https://images.unsplash.com/photo-1555400038-63f5ba517a47?q=80&w=800&auto=format&fit=crop" alt="Ubud retreat" loading="lazy">
                                </div>
                            </a>
                        </article>
                    </div>

                    <aside class="order-3 lg:order-3">
                        <h3 class="font-display text-[2rem] leading-none font-medium text-dark mb-8 pb-4 border-b border-line">Ưu đãi nổi bật</h3>
                        <div class="flex flex-col">
                            <a href="#" class="group grid grid-cols-[1fr_72px] gap-5 items-start py-5 border-b border-line first:pt-0">
                                <div>
                                    <h4 class="font-display text-xl leading-tight font-medium text-dark mb-2 transition-colors duration-300 group-hover:text-brand">Kỳ nghỉ Seoul</h4>
                                    <p class="text-sm leading-6 text-muted">4 đêm, khu phố boutique, và chợ đêm sầm uất.</p>
                                </div>
                                <img class="w-[72px] h-[72px] rounded-xl object-cover" src="https://images.unsplash.com/photo-1517154427253-bbbef32ffc23?q=80&w=200&auto=format&fit=crop" alt="Seoul" loading="lazy">
                            </a>
                            <a href="#" class="group grid grid-cols-[1fr_72px] gap-5 items-start py-5 border-b border-line">
                                <div>
                                    <h4 class="font-display text-xl leading-tight font-medium text-dark mb-2 transition-colors duration-300 group-hover:text-brand">Ưu đãi chớp nhoáng Singapore</h4>
                                    <p class="text-sm leading-6 text-muted">Gói lưu trú ngắn ngày với view thành phố và phòng chờ sân bay.</p>
                                </div>
                                <img class="w-[72px] h-[72px] rounded-xl object-cover" src="https://images.unsplash.com/photo-1525625178307-bc290ff85a78?q=80&w=200&auto=format&fit=crop" alt="Singapore" loading="lazy">
                            </a>
                            <a href="#" class="group grid grid-cols-[1fr_72px] gap-5 items-start py-5 border-b border-line">
                                <div>
                                    <h4 class="font-display text-xl leading-tight font-medium text-dark mb-2 transition-colors duration-300 group-hover:text-brand">Gia đình khám phá Bangkok</h4>
                                    <p class="text-sm leading-6 text-muted">Nâng cấp phòng, tour phù hợp trẻ em và xe đưa đón sân bay tiện lợi.</p>
                                </div>
                                <img class="w-[72px] h-[72px] rounded-xl object-cover" src="https://images.unsplash.com/photo-1563492065-73a8964f1f67?q=80&w=200&auto=format&fit=crop" alt="Bangkok" loading="lazy">
                            </a>
                            <a href="#" class="group grid grid-cols-[1fr_72px] gap-5 items-start py-5 border-b border-line">
                                <div>
                                    <h4 class="font-display text-xl leading-tight font-medium text-dark mb-2 transition-colors duration-300 group-hover:text-brand">Dừng chân sang chảnh Dubai</h4>
                                    <p class="text-sm leading-6 text-muted">Giá tốt cho chuyển tiếp giữa các chặng bay dài.</p>
                                </div>
                                <img class="w-[72px] h-[72px] rounded-xl object-cover" src="https://images.unsplash.com/photo-1512453979798-5ea266f8880c?q=80&w=200&auto=format&fit=crop" alt="Dubai" loading="lazy">
                            </a>
                            <a href="#" class="group grid grid-cols-[1fr_72px] gap-5 items-start py-5 border-b border-line">
                                <div>
                                    <h4 class="font-display text-xl leading-tight font-medium text-dark mb-2 transition-colors duration-300 group-hover:text-brand">Viên ngọc ẩn Hà Nội</h4>
                                    <p class="text-sm leading-6 text-muted">Ở phố cổ, khám phá ẩm thực đường phố, tour riêng trong ngày.</p>
                                </div>
                                <img class="w-[72px] h-[72px] rounded-xl object-cover" src="https://images.unsplash.com/photo-1599700909050-350ade9a2073?q=80&w=200&auto=format&fit=crop" alt="Hanoi" loading="lazy">
                            </a>
                        </div>
                        <a href="#" class="group inline-flex items-center gap-2 mt-8 text-[12px] uppercase tracking-[0.16em] font-semibold text-dark transition-colors duration-300 hover:text-brand">
                            Xem tất cả ưu đãi
                            <span class="transition-transform duration-300 group-hover:translate-x-1">→</span>
                        </a>
                    </aside>
                </div>
            </div>
        </section>


        <section id="food-guide" class="py-16 md:py-20 bg-canvas">
            <div class="max-w-[1440px] mx-auto px-6">
                <div class="text-center mb-10">
                    <p class="text-[11px] uppercase tracking-[0.2em] font-semibold text-muted mb-2">Ẩm thực</p>
                    <h2 class="font-display text-4xl md:text-5xl font-medium text-ink title-mark">Ẩm thực 3 miền</h2>
                </div>
                <div class="grid lg:grid-cols-[1.05fr_.95fr] gap-5 items-stretch">
                    <article class="image-card relative min-h-[560px] md:min-h-[620px] rounded-2xl overflow-hidden shadow-card bg-cover bg-center" style="background-image:url('https://images.unsplash.com/photo-1504674900247-0877df9cc836?q=80&w=1800&auto=format&fit=crop')">
                        <div class="image-card-caption !pt-28 md:!pt-36">
                            <p class="image-card-label">Ẩm thực nổi bật</p>
                            <h2 class="font-display text-4xl md:text-5xl leading-[1.05] font-medium tracking-[-.03em] text-white [text-shadow:0_3px_22px_rgba(17,17,17,0.65)] max-w-[640px]">Ăn ngon, hỏi giá trước, khỏi quê sau.</h2>
                            <p class="image-card-desc text-base md:text-lg leading-8 max-w-[580px]">Một khối nội dung riêng cho các món nên thử, quán đáng ghé, mức giá tham khảo và vài dấu hiệu nên né khi ăn uống ở điểm du lịch.</p>
                        </div>
                    </article>

                    <div class="grid gap-4">
                        <article class="bg-white p-8 md:p-10 rounded-2xl border border-line">
                            <p class="text-[11px] uppercase tracking-[.22em] font-semibold text-muted mb-4">Ăn gì cho đáng?</p>
                            <h3 class="font-display text-3xl md:text-4xl leading-tight font-medium tracking-[-.03em] text-ink">Menu có giá, bụng mới yên.</h3>
                            <p class="text-muted leading-7 mt-4">Gợi ý cách xem menu, hỏi khẩu phần, kiểm tra phụ phí và giữ hóa đơn khi đi ăn ở khu du lịch.</p>
                        </article>

                        <div class="grid md:grid-cols-2 gap-4">
                            <article class="bg-white p-6 rounded-2xl border border-line">
                                <span class="inline-flex w-11 h-11 items-center justify-center rounded-full bg-brand/10 text-brand ring-1 ring-brand/20 font-display text-xl mb-5">01</span>
                                <h3 class="font-display text-2xl md:text-3xl font-medium leading-tight mb-3 text-ink">Món nên thử</h3>
                                <p class="text-muted leading-7">Danh sách món đặc sản theo vùng, đi kèm mức giá tham khảo để dễ chọn.</p>
                            </article>
                            <article class="bg-white p-6 rounded-2xl border border-line">
                                <span class="inline-flex w-11 h-11 items-center justify-center rounded-full bg-brand/10 text-brand ring-1 ring-brand/20 font-display text-xl mb-5">02</span>
                                <h3 class="font-display text-2xl md:text-3xl font-medium leading-tight mb-3 text-ink">Quán nên ghé</h3>
                                <p class="text-muted leading-7">Ưu tiên địa điểm rõ giá, đông khách thật, đánh giá ổn và phục vụ tử tế.</p>
                            </article>
                        </div>

                        <article class="bg-dark text-white p-8 md:p-10 rounded-2xl border border-line">
                            <p class="text-[11px] uppercase tracking-[.22em] font-semibold text-white/85 mb-4">Né mất tiền oan</p>
                            <h3 class="font-display text-3xl md:text-4xl leading-tight font-medium tracking-[-.03em] mb-4">Thấy “giá theo thời điểm” thì hỏi kỹ trước khi gọi.</h3>
                            <p class="text-white/80 leading-7">Khối này có thể dùng để đăng các cảnh báo nhẹ nhàng về hải sản, chợ đêm, quán gần điểm du lịch và những tình huống dễ bị tính thêm tiền.</p>
                        </article>
                    </div>
                </div>
            </div>
        </section>

        <section id="emagazine-feature" class="emagazine-spotlight py-16 md:py-24 lg:py-28">
            <div class="max-w-[1440px] mx-auto px-6">
                <header class="mb-10 md:mb-12">
                    <p class="text-[11px] uppercase tracking-[0.2em] font-semibold text-brand mb-3">Ấn phẩm số</p>
                    <h2 class="font-display text-[2.5rem] md:text-[3.25rem] leading-[1.05] font-medium text-dark tracking-[-0.02em]">E-Magazine</h2>
                </header>

                <div class="emagazine-spotlight-frame">
                    <div class="grid grid-cols-1 lg:grid-cols-[1.15fr_.85fr]">
                        <div class="emagazine-feature-visual relative min-h-[300px] sm:min-h-[380px] lg:min-h-[560px] overflow-hidden">
                            <img
                                class="absolute inset-0 w-full h-full object-cover"
                                src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=1800&auto=format&fit=crop"
                                alt="Nghe sóng biển kể chuyện quê hương"
                                width="900"
                                height="430"
                                loading="lazy">
                            <div class="absolute top-5 left-5 lg:top-8 lg:left-8">
                                <span class="inline-flex items-center gap-2 bg-white/95 border border-line text-dark text-[10px] uppercase tracking-[0.18em] font-semibold px-4 py-2 rounded-full">
                                    <span class="w-2 h-2 rounded-full bg-brand"></span>
                                    Cover Story
                                </span>
                            </div>
                        </div>

                        <div class="flex flex-col justify-center px-8 py-10 md:px-12 md:py-14 lg:px-14 lg:py-16 bg-white">
                            <p class="text-[11px] font-semibold uppercase tracking-[0.2em] text-brand mb-4">E-Magazine</p>
                            <h3 class="font-display text-[2rem] sm:text-[2.5rem] lg:text-[2.85rem] font-medium leading-[1.06] text-dark max-w-[16ch] m-0">
                                Nghe sóng biển kể chuyện quê hương
                            </h3>
                            <p class="text-[13px] font-medium uppercase tracking-[0.18em] text-muted mt-6 mb-4 m-0">
                                Đăng ngày 28/05/2026
                            </p>
                            <p class="text-base leading-8 text-muted max-w-[42ch] mb-8 m-0">
                                Một hành trình dọc bờ biển — câu chuyện, hình ảnh và nhịp sống địa phương được kể bằng ngôn ngữ tạp chí du lịch.
                            </p>
                            <a href="#" class="inline-flex items-center gap-2 self-start bg-brand text-dark text-[12px] font-semibold uppercase tracking-[0.14em] px-8 py-3.5 rounded-2xl no-underline transition-opacity duration-200 hover:opacity-90">
                                Xem chi tiết
                                <span aria-hidden="true">→</span>
                            </a>
                        </div>
                    </div>

                    <nav class="emagazine-spotlight-nav grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 border-t border-line bg-canvas" aria-label="Ấn phẩm E-Magazine khác">
                        <a href="#" class="group block p-6 md:p-7 no-underline text-inherit border-t border-line first:border-t-0 sm:border-t-0 sm:[&:nth-child(n+3)]:border-t sm:[&:nth-child(even):nth-child(n+3)]:border-t-0 lg:border-t-0 lg:border-l lg:first:border-l-0 transition-colors duration-200 hover:bg-white">
                            <p class="text-[10px] font-semibold uppercase tracking-[0.2em] text-brand mb-3 m-0">E-Magazine</p>
                            <h4 class="font-display text-xl leading-tight font-medium text-dark max-w-[22ch] m-0 transition-colors duration-200 group-hover:text-brand">Hải Sắc Thái Của Xứ Sở Du Mục</h4>
                        </a>
                        <a href="#" class="group block p-6 md:p-7 no-underline text-inherit border-t border-line first:border-t-0 sm:border-t-0 sm:[&:nth-child(n+3)]:border-t sm:[&:nth-child(even):nth-child(n+3)]:border-t-0 lg:border-t-0 lg:border-l lg:first:border-l-0 transition-colors duration-200 hover:bg-white">
                            <p class="text-[10px] font-semibold uppercase tracking-[0.2em] text-brand mb-3 m-0">E-Magazine</p>
                            <h4 class="font-display text-xl leading-tight font-medium text-dark max-w-[22ch] m-0 transition-colors duration-200 group-hover:text-brand">Âm Nhạc Cũng Cần Một Bầu Trời Xanh Để Cất Tiếng</h4>
                        </a>
                        <a href="#" class="group block p-6 md:p-7 no-underline text-inherit border-t border-line first:border-t-0 sm:border-t-0 sm:[&:nth-child(n+3)]:border-t sm:[&:nth-child(even):nth-child(n+3)]:border-t-0 lg:border-t-0 lg:border-l lg:first:border-l-0 transition-colors duration-200 hover:bg-white">
                            <p class="text-[10px] font-semibold uppercase tracking-[0.2em] text-brand mb-3 m-0">E-Magazine</p>
                            <h4 class="font-display text-xl leading-tight font-medium text-dark max-w-[22ch] m-0 transition-colors duration-200 group-hover:text-brand">Phi Mã An Nam – Đã Đến Lúc Khơi Dòng Viễn Phương</h4>
                        </a>
                        <a href="#" class="group block p-6 md:p-7 no-underline text-inherit border-t border-line first:border-t-0 sm:border-t-0 sm:[&:nth-child(n+3)]:border-t sm:[&:nth-child(even):nth-child(n+3)]:border-t-0 lg:border-t-0 lg:border-l lg:first:border-l-0 transition-colors duration-200 hover:bg-white">
                            <p class="text-[10px] font-semibold uppercase tracking-[0.2em] text-brand mb-3 m-0">E-Magazine</p>
                            <h4 class="font-display text-xl leading-tight font-medium text-dark max-w-[22ch] m-0 transition-colors duration-200 group-hover:text-brand">Ảnh Tết – Cuốn Phim Nhỏ Của Mỗi Ngôi Nhà</h4>
                        </a>
                        <a href="#" class="group block p-6 md:p-7 no-underline text-inherit border-t border-line first:border-t-0 sm:border-t-0 sm:[&:nth-child(n+3)]:border-t sm:[&:nth-child(even):nth-child(n+3)]:border-t-0 lg:border-t-0 lg:border-l lg:first:border-l-0 transition-colors duration-200 hover:bg-white">
                            <p class="text-[10px] font-semibold uppercase tracking-[0.2em] text-brand mb-3 m-0">E-Magazine</p>
                            <h4 class="font-display text-xl leading-tight font-medium text-dark max-w-[22ch] m-0 transition-colors duration-200 group-hover:text-brand">Nơi Khởi Nguồn Sắc Xuân Hà Nội</h4>
                        </a>
                    </nav>
                </div>
            </div>
        </section>

        <!-- <section id="deals" class="py-16">
            <div class="max-w-[1440px] mx-auto px-6">
                <div class="text-center mb-10">
                    <p class="text-[11px] uppercase tracking-[.22em] text-muted mb-2">Special Offers</p>
                    <h2 class="font-display text-4xl md:text-5xl font-medium title-mark">Travel Deals & Coupons</h2>
                </div>
                <div class="grid lg:grid-cols-[1fr_1fr_.9fr] gap-6 items-start">
                    <article class="image-card relative h-[430px] rounded-2xl overflow-hidden bg-cover bg-center" style="background-image:url('https://images.unsplash.com/photo-1506929562872-bb421503ef21?q=80&w=900&auto=format&fit=crop')"><span class="absolute top-5 right-5 z-20 bg-gold text-ink w-12 h-12 rounded-full flex items-center justify-center text-sm font-bold">-30%</span>
                        <div class="absolute bottom-0 p-6 text-white">
                            <p class="text-xs uppercase tracking-[.16em] text-accent mb-2">Săn deal</p>
                            <h3 class="font-display text-3xl leading-tight">Khách sạn biển đẹp, giá không đau ví</h3>
                        </div>
                    </article>
                    <article class="image-card relative h-[430px] rounded-2xl overflow-hidden bg-cover bg-center" style="background-image:url('https://images.unsplash.com/photo-1483347756197-71ef80e95f73?q=80&w=900&auto=format&fit=crop')"><span class="absolute top-5 right-5 z-20 bg-gold text-ink w-12 h-12 rounded-full flex items-center justify-center text-sm font-bold">Hot</span>
                        <div class="absolute bottom-0 p-6 text-white">
                            <p class="text-xs uppercase tracking-[.16em] text-accent mb-2">Săn deal mà shok</p>
                            <h3 class="font-display text-3xl leading-tight">Deal cuối tuần, thấy là phải lưu ngay</h3>
                        </div>
                    </article>
                    <div class="space-y-4">
                        <article class="glass rounded-2xl p-3 grid grid-cols-[120px_1fr] gap-4 items-center"><img class="h-24 w-full object-cover rounded-lg" src="https://images.unsplash.com/photo-1517824806704-9040b037703b?q=80&w=500&auto=format&fit=crop">
                            <div>
                                <p class="text-xs uppercase tracking-[.14em] text-brand">Đà Nẵng</p>
                                <h4 class="font-semibold leading-snug">Combo nghỉ dưỡng sát biển cho gia đình</h4>
                            </div>
                        </article>
                        <article class="glass rounded-2xl p-3 grid grid-cols-[120px_1fr] gap-4 items-center"><img class="h-24 w-full object-cover rounded-lg" src="https://images.unsplash.com/photo-1528181304800-259b08848526?q=80&w=500&auto=format&fit=crop">
                            <div>
                                <p class="text-xs uppercase tracking-[.14em] text-brand">Hà Nội</p>
                                <h4 class="font-semibold leading-snug">Vé tham quan và trải nghiệm cuối tuần</h4>
                            </div>
                        </article>
                        <article class="glass rounded-2xl p-3 grid grid-cols-[120px_1fr] gap-4 items-center"><img class="h-24 w-full object-cover rounded-lg" src="https://images.unsplash.com/photo-1483729558449-99ef09a8c325?q=80&w=500&auto=format&fit=crop">
                            <div>
                                <p class="text-xs uppercase tracking-[.14em] text-brand">Phú Quốc</p>
                                <h4 class="font-semibold leading-snug">Resort đẹp, giá tốt cho mùa hè</h4>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </section> -->

        <section id="afar-editorial" class="bg-white py-20 md:py-[120px]">
            <div class="max-w-[1440px] mx-auto px-6">
                <div class="grid grid-cols-1 lg:grid-cols-[7fr_3fr] gap-12 xl:gap-16">
                    <div class="min-w-0">
                        <div class="afar-collage afar-fade-in mb-12 md:mb-16" data-afar-reveal>
                            <div class="afar-collage__cell afar-collage__cell--wide">
                                <img src="https://images.unsplash.com/photo-1528127269322-539801943592?q=80&w=1400&auto=format&fit=crop" alt="Bờ biển Việt Nam" loading="lazy">
                            </div>
                            <div class="afar-collage__cell afar-collage__cell--portrait">
                                <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?q=80&w=900&auto=format&fit=crop" alt="Miền núi" loading="lazy">
                            </div>
                            <div class="afar-collage__cell afar-collage__cell--sq-a">
                                <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?q=80&w=600&auto=format&fit=crop" alt="Ẩm thực địa phương" loading="lazy">
                            </div>
                            <div class="afar-collage__cell afar-collage__cell--sq-b">
                                <img src="https://images.unsplash.com/photo-1559592413-7cec4d0cae2b?q=80&w=600&auto=format&fit=crop" alt="Làng chài" loading="lazy">
                            </div>
                            <div class="afar-collage__cell afar-collage__cell--tall">
                                <img src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?q=80&w=700&auto=format&fit=crop" alt="Đường ven biển" loading="lazy">
                            </div>
                        </div>

                        <article class="afar-fade-in mb-16 md:mb-20" data-afar-reveal>
                            <p class="text-[11px] uppercase tracking-[0.18em] font-semibold text-muted mb-5">Điểm đến nổi bật</p>
                            <h2 class="font-display text-[2.5rem] md:text-[3rem] leading-none font-medium text-dark tracking-[-0.02em] mb-6 max-w-[18ch]">
                                Khám phá những bờ biển ẩn mình của Việt Nam
                            </h2>
                            <p class="text-lg leading-8 text-muted max-w-[720px] mb-6">
                                Điểm đến được chọn lọc, trải nghiệm bản địa chân thực và cảm hứng du lịch được tuyển chọn khắp Việt Nam và hơn thế nữa.
                            </p>
                            <p class="text-[13px] italic text-muted/80">Bởi đội ngũ biên tập one2FLY</p>
                        </article>

                        <div class="grid md:grid-cols-3 gap-10 md:gap-8 afar-fade-in" data-afar-reveal>
                            <a href="#" class="afar-card group block no-underline text-inherit">
                                <div class="afar-card-img">
                                    <img src="https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?q=80&w=900&auto=format&fit=crop" alt="Mountain Adventures" loading="lazy">
                                </div>
                                <p class="text-[11px] uppercase tracking-[0.18em] font-semibold text-muted mb-2">Miền núi</p>
                                <h3 class="afar-card-title font-display text-2xl leading-tight font-medium text-dark mb-2">Mountain Adventures</h3>
                                <p class="text-[13px] italic text-muted/80">Minh Anh</p>
                            </a>
                            <a href="#" class="afar-card group block no-underline text-inherit">
                                <div class="afar-card-img">
                                    <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=900&auto=format&fit=crop" alt="Beach Escapes" loading="lazy">
                                </div>
                                <p class="text-[11px] uppercase tracking-[0.18em] font-semibold text-muted mb-2">Biển đảo</p>
                                <h3 class="afar-card-title font-display text-2xl leading-tight font-medium text-dark mb-2">Beach Escapes</h3>
                                <p class="text-[13px] italic text-muted/80">Lan Phương</p>
                            </a>
                            <a href="#" class="afar-card group block no-underline text-inherit">
                                <div class="afar-card-img">
                                    <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?q=80&w=900&auto=format&fit=crop" alt="Culinary Journeys" loading="lazy">
                                </div>
                                <p class="text-[11px] uppercase tracking-[0.18em] font-semibold text-muted mb-2">Ẩm thực</p>
                                <h3 class="afar-card-title font-display text-2xl leading-tight font-medium text-dark mb-2">Culinary Journeys</h3>
                                <p class="text-[13px] italic text-muted/80">Quốc Huy</p>
                            </a>
                        </div>
                    </div>

                    <aside class="lg:pt-2 afar-fade-in" data-afar-reveal>
                        <h3 class="font-display text-[2rem] md:text-[2.35rem] leading-none font-medium uppercase tracking-[0.06em] text-dark mb-10">
                            Travel Tips<br>+ News
                        </h3>

                        <nav class="mb-10" aria-label="Travel tips and news">
                            <a href="#" class="afar-sidebar-link"><span>Mẹo du lịch thông minh trước mỗi chuyến đi</span><em>→</em></a>
                            <a href="#" class="afar-sidebar-link"><span>Cập nhật visa và thủ tục nhập cảnh mới nhất</span><em>→</em></a>
                            <a href="#" class="afar-sidebar-link"><span>Tin tức hàng không và lịch bay mùa cao điểm</span><em>→</em></a>
                            <a href="#" class="afar-sidebar-link"><span>Cẩm nang điểm đến theo từng vùng miền</span><em>→</em></a>
                            <a href="#" class="afar-sidebar-link"><span>Gợi ý theo mùa: đi đâu, khi nào là đẹp nhất</span><em>→</em></a>
                            <a href="#" class="afar-sidebar-link"><span>Lưu ý an toàn khi du lịch tự túc</span><em>→</em></a>
                        </nav>

                        <a href="#" class="afar-btn-outline mb-12">
                            View More
                            <span class="afar-btn-arrow">→</span>
                        </a>

                        <div class="border border-line rounded-2xl p-8 bg-canvas">
                            <p class="text-[11px] uppercase tracking-[0.18em] font-semibold text-muted mb-3">Newsletter</p>
                            <h4 class="font-display text-2xl leading-tight font-medium text-dark mb-3">Nhận bản tin du lịch mỗi tuần</h4>
                            <p class="text-sm leading-7 text-muted mb-6">Câu chuyện, điểm đến và kinh nghiệm thực tế — không spam, chỉ nội dung đáng đọc.</p>
                            <form class="flex flex-col gap-3" action="#" method="post">
                                <input type="email" placeholder="Email của bạn" class="w-full border border-line bg-white px-4 py-3 text-sm outline-none focus:border-brand transition-colors duration-300 rounded-xl">
                                <button type="submit" class="w-full inline-flex items-center justify-center bg-brand text-dark px-4 py-3 text-[11px] uppercase tracking-[0.16em] font-semibold rounded-2xl border-0 cursor-pointer transition-opacity hover:opacity-90">Đăng ký</button>
                            </form>
                        </div>
                    </aside>
                </div>
            </div>
        </section>

        <!-- <section id="destinations" class="py-20 bg-white">
            <div class="max-w-[1440px] mx-auto px-6">
                <div class="text-center mb-10">
                    <p class="text-[11px] uppercase tracking-[.22em] text-muted mb-2">Explore Vietnam</p>
                    <h2 class="font-display text-4xl md:text-5xl font-medium title-mark">Điểm đến</h2>
                </div>
                <div class="grid md:grid-cols-3 gap-5">
                    <article class="image-card relative h-[250px] rounded-2xl overflow-hidden bg-cover bg-center" style="background-image:url('https://images.unsplash.com/photo-1528127269322-539801943592?q=80&w=700&auto=format&fit=crop')">
                        <div class="absolute bottom-0 p-6 text-white">
                            <h3 class="font-display text-3xl font-medium">Biển</h3>
                            <p class="text-white/75">Nắng, gió và lịch trình chill.</p>
                        </div>
                    </article>
                    <article class="image-card relative h-[250px] rounded-2xl overflow-hidden bg-cover bg-center" style="background-image:url('https://images.unsplash.com/photo-1506744038136-46273834b3fb?q=80&w=700&auto=format&fit=crop')">
                        <div class="absolute bottom-0 p-6 text-white">
                            <h3 class="font-display text-3xl font-medium">Miền núi</h3>
                            <p class="text-white/75">Săn mây, trekking, bản làng.</p>
                        </div>
                    </article>
                    <article class="image-card relative h-[250px] rounded-2xl overflow-hidden bg-cover bg-center" style="background-image:url('https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?q=80&w=700&auto=format&fit=crop')">
                        <div class="absolute bottom-0 p-6 text-white">
                            <h3 class="font-display text-3xl font-medium">Đồng bằng</h3>
                            <p class="text-white/75">Sông nước và văn hóa bản địa.</p>
                        </div>
                    </article>
                </div>
            </div>
        </section> -->

        <section id="stories-moodboard" class="bg-canvas py-20 md:py-28">
            <div class="max-w-[1440px] mx-auto px-6">
                <header class="text-center mb-12 md:mb-16">
                    <p class="text-[11px] uppercase tracking-[0.2em] font-semibold text-muted mb-2">Most Popular Posts</p>
                    <h2 class="font-display text-4xl md:text-5xl font-medium text-ink title-mark">The Latest Inspiring Stories</h2>
                </header>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 md:gap-6">
                    <a href="#" class="group flex flex-col min-h-[500px] bg-white border border-line rounded-2xl overflow-hidden shadow-card transition-all duration-300 hover:-translate-y-1">
                        <div class="h-[70%] min-h-[300px] overflow-hidden">
                            <img
                                class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-[1.04]"
                                src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?q=80&w=900&auto=format&fit=crop"
                                alt="Việt Nam hidden gems"
                                loading="lazy">
                        </div>
                        <div class="flex-1 p-5 md:p-6">
                            <p class="text-[10px] uppercase tracking-[0.18em] font-semibold text-muted mb-2">Hidden Gems</p>
                            <h3 class="font-display text-3xl leading-none font-medium text-ink mb-3 transition-colors duration-300 group-hover:text-brand">
                                Những góc nhỏ ở Việt Nam ít người biết
                            </h3>
                            <p class="text-xs leading-relaxed text-muted">Làng chài, đèo nhỏ và những buổi sáng không cần lịch trình.</p>
                        </div>
                    </a>

                    <article class="group flex flex-col items-center justify-center min-h-[500px] bg-white border border-line rounded-2xl p-8 md:p-10 text-center shadow-card transition-all duration-300 hover:-translate-y-1">
                        <span class="font-display text-base tracking-[0.12em] uppercase text-dark mb-10">one2FLY</span>
                        <blockquote class="font-display text-2xl md:text-[1.75rem] leading-tight font-medium text-ink max-w-[24ch] m-0">
                            “Đi xa không phải để trốn đi — mà để quay lại với phiên bản tốt hơn của mình.”
                        </blockquote>
                        <cite class="mt-10 text-xs not-italic text-muted">— Cộng đồng độc giả one2FLY</cite>
                    </article>

                    <a href="#" class="group relative block min-h-[500px] overflow-hidden rounded-2xl border border-line shadow-card transition-all duration-300 hover:-translate-y-1">
                        <img
                            class="absolute inset-0 w-full h-full object-cover grayscale transition-transform duration-300 group-hover:scale-[1.04]"
                            src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=900&auto=format&fit=crop"
                            alt="Beach escape"
                            loading="lazy">
                        <span class="absolute top-4 left-4 z-10 text-[10px] uppercase tracking-[0.18em] font-semibold text-white/90">one2FLY</span>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/25 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-5 z-10">
                            <p class="text-[10px] uppercase tracking-[0.18em] font-semibold text-brand mb-2">Beach Escape</p>
                            <p class="text-sm leading-relaxed text-white/90">Bình minh ở Phú Quốc — khi biển còn thuộc về người đi sớm.</p>
                        </div>
                    </a>

                    <a href="#" class="group grid grid-cols-1 sm:grid-cols-[1.15fr_.85fr] min-h-[500px] bg-white border border-line rounded-2xl overflow-hidden shadow-card transition-all duration-300 hover:-translate-y-1">
                        <div class="min-h-[220px] sm:min-h-full overflow-hidden">
                            <img
                                class="w-full h-full min-h-[220px] sm:min-h-full object-cover transition-transform duration-300 group-hover:scale-[1.04]"
                                src="https://images.unsplash.com/photo-1496747611176-843222e1e57c?q=80&w=700&auto=format&fit=crop"
                                alt="Destination interview"
                                loading="lazy">
                        </div>
                        <div class="flex flex-col justify-between p-5 md:p-6 border-t sm:border-t-0 sm:border-l border-line bg-canvas">
                            <p class="text-[10px] uppercase tracking-[0.18em] font-semibold text-muted">Interview</p>
                            <h3 class="font-display text-2xl leading-none font-medium text-ink my-4 transition-colors duration-300 group-hover:text-brand">
                                “Tôi đi để nghe một thành phố kể chuyện”
                            </h3>
                            <p class="text-xs leading-relaxed text-muted">Phỏng vấn ngắn với nhà sáng tạo du lịch về Hội An và nhịp sống chậm.</p>
                        </div>
                    </a>

                    <a href="#" class="group relative block min-h-[500px] bg-white border border-line rounded-2xl overflow-hidden shadow-card p-6 md:p-7 transition-all duration-300 hover:-translate-y-1">
                        <p class="text-[10px] uppercase tracking-[0.18em] font-semibold text-muted mb-3">Boutique Hotels</p>
                        <h3 class="font-display text-4xl leading-[0.95] font-medium text-ink max-w-[12ch] relative z-10 transition-colors duration-300 group-hover:text-brand">
                            Nghỉ nhỏ mà đủ sang
                        </h3>
                        <p class="text-xs leading-relaxed text-muted max-w-[20ch] mt-4 relative z-10">Homestay và khách sạn boutique được chọn theo cảm giác, không theo sao.</p>
                        <div class="absolute bottom-0 right-0 w-[58%] max-w-[280px] overflow-hidden border-t border-l border-line">
                            <img
                                class="w-full aspect-[4/3] object-cover transition-transform duration-300 group-hover:scale-[1.04]"
                                src="https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=700&auto=format&fit=crop"
                                alt="Boutique hotel"
                                loading="lazy">
                        </div>
                    </a>

                    <article class="group relative min-h-[500px] bg-white border border-line rounded-2xl shadow-card p-6 md:p-7 transition-all duration-300 hover:-translate-y-1 overflow-hidden">
                        <p class="absolute right-3 top-1/2 -translate-y-1/2 [writing-mode:vertical-rl] rotate-180 text-[10px] uppercase tracking-[0.2em] font-semibold text-muted/40 select-none">
                            Culture Guide
                        </p>
                        <div class="pr-8">
                            <p class="text-[10px] uppercase tracking-[0.18em] font-semibold text-muted mb-5">Local Food Stories</p>
                            <ul class="space-y-4 mb-8">
                                <li>
                                    <a href="#" class="block text-sm leading-snug text-ink transition-colors duration-300 hover:text-brand">Phở Hà Nội: ăn sớm, ăn đúng chỗ</a>
                                </li>
                                <li>
                                    <a href="#" class="block text-sm leading-snug text-ink transition-colors duration-300 hover:text-brand">Cà phê Sài Gòn và những quán cũ</a>
                                </li>
                                <li>
                                    <a href="#" class="block text-sm leading-snug text-ink transition-colors duration-300 hover:text-brand">Chợ đêm Huế: mua gì, tránh gì</a>
                                </li>
                            </ul>
                        </div>
                        <div class="overflow-hidden border border-line">
                            <img
                                class="w-full h-36 object-cover transition-transform duration-300 group-hover:scale-[1.04]"
                                src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?q=80&w=800&auto=format&fit=crop"
                                alt="Local food"
                                loading="lazy">
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <!-- <section id="stories" class="py-20 bg-white">
            <div class="max-w-[1440px] mx-auto px-6">
                <div class="text-center mb-10">
                    <p class="text-[11px] uppercase tracking-[.22em] text-muted mb-2">Most Popular Posts</p>
                    <h2 class="font-display text-4xl md:text-5xl font-medium title-mark">The Latest Inspiring Stories</h2>
                </div>
                <div class="grid lg:grid-cols-[1.05fr_.95fr] gap-7">
                    <article class="image-card relative min-h-[560px] rounded-2xl overflow-hidden bg-cover bg-center" style="background-image:url('https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?q=80&w=1200&auto=format&fit=crop')">
                        <div class="absolute bottom-0 p-8 text-white">
                            <p class="text-xs uppercase tracking-[.16em] text-accent mb-3">Editor's Choice</p>
                            <h3 class="font-display text-5xl leading-none font-medium mb-4">Đi biển như người Cali</h3>
                            <p class="text-white/75 max-w-[520px]">Biển là nơi chữa lành, tìm lại năng lượng và sống trọn từng phút giây tự do.</p>
                        </div>
                    </article>
                    <div class="space-y-4">
                        <article class="bg-canvas rounded-2xl p-4 grid grid-cols-[160px_1fr] gap-5 items-center"><img class="h-32 w-full object-cover rounded-lg" src="https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?q=80&w=500&auto=format&fit=crop">
                            <div>
                                <p class="text-xs uppercase tracking-[.14em] text-brand">Điểm đến</p>
                                <h4 class="font-display text-2xl font-medium leading-tight">Quy Nhơn 3N2Đ: lịch trình chuẩn không cần chỉnh</h4>
                            </div>
                        </article>
                        <article class="bg-canvas rounded-2xl p-4 grid grid-cols-[160px_1fr] gap-5 items-center"><img class="h-32 w-full object-cover rounded-lg" src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=500&auto=format&fit=crop">
                            <div>
                                <p class="text-xs uppercase tracking-[.14em] text-brand">Đọc tin rồi...</p>
                                <h4 class="font-display text-2xl font-medium leading-tight">Đừng tức: chuyện giá cả mùa cao điểm</h4>
                            </div>
                        </article>
                        <article class="bg-canvas rounded-2xl p-4 grid grid-cols-[160px_1fr] gap-5 items-center"><img class="h-32 w-full object-cover rounded-lg" src="https://images.unsplash.com/photo-1496747611176-843222e1e57c?q=80&w=500&auto=format&fit=crop">
                            <div>
                                <p class="text-xs uppercase tracking-[.14em] text-brand">Thời trang</p>
                                <h4 class="font-display text-2xl font-medium leading-tight">Đi chơi mặc gì cho đẹp mà vẫn gọn?</h4>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </section> -->

        <section id="digital-magazine" class="bg-canvas py-20 md:py-28">
            <div class="max-w-7xl mx-auto px-6">
                <div class="grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">
                    <div class="magazine-stack group flex justify-center lg:justify-end order-1">
                        <div class="relative w-full max-w-[300px] sm:max-w-[340px] md:max-w-[380px]">
                            <div class="absolute inset-0 aspect-[3/4] bg-surface border border-line -rotate-[7deg] translate-x-4 translate-y-5 transition-transform duration-300 group-hover:translate-x-5 group-hover:translate-y-6 group-hover:-rotate-[5deg]" aria-hidden="true"></div>
                            <div class="absolute inset-0 aspect-[3/4] bg-canvas border border-line -rotate-[4deg] translate-x-2 translate-y-2.5 transition-transform duration-300 group-hover:translate-x-3 group-hover:translate-y-3.5 group-hover:-rotate-[2deg]" aria-hidden="true"></div>
                            <article class="relative aspect-[3/4] -rotate-2 overflow-hidden border border-line bg-dark shadow-card transition-all duration-300 group-hover:-translate-y-2 group-hover:-rotate-1">
                                <img
                                    class="absolute inset-0 w-full h-full object-cover"
                                    src="https://images.unsplash.com/photo-1528127269322-539801943592?q=80&w=900&auto=format&fit=crop"
                                    alt="Vietnam travel magazine cover"
                                    loading="lazy">
                                <div class="absolute inset-0 bg-gradient-to-t from-dark/92 via-dark/35 to-dark/10"></div>
                                <div class="relative z-10 flex h-full flex-col justify-between p-6 md:p-8 text-white">
                                    <p class="text-[10px] uppercase tracking-[0.22em] font-semibold text-white/80">one2FLY Magazine</p>
                                    <div>
                                        <h3 class="font-display text-[2rem] sm:text-[2.35rem] md:text-[2.6rem] leading-[0.95] font-medium tracking-[-0.02em] mb-4">
                                            Vietnam,<br>Beautifully Curated
                                        </h3>
                                        <p class="text-[11px] uppercase tracking-[0.2em] font-semibold text-brand mb-5">Issue 01 / 2026</p>
                                        <p class="text-[10px] uppercase tracking-[0.16em] text-white/65">Destinations • Food • Culture • Smart Travel</p>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>

                    <div class="order-2">
                        <p class="text-[11px] uppercase tracking-[0.22em] font-semibold text-brand mb-4">Ấn phẩm số mới</p>
                        <h2 class="font-display text-[2.75rem] md:text-[3.5rem] leading-[0.95] font-medium text-dark tracking-[-0.03em] mb-3">
                            Digital Magazine
                        </h2>
                        <p class="font-display text-xl md:text-2xl text-muted mb-6">one2FLY Magazine</p>
                        <p class="text-base leading-8 text-muted max-w-[52ch] mb-10">
                            one2FLY Magazine — tuyển chọn điểm đến, trải nghiệm, ẩm thực và cẩm nang du lịch thông minh.
                        </p>

                        <div class="border-t border-line">
                            <a href="#" class="group grid grid-cols-[1fr_auto] gap-4 items-start py-6 border-b border-line no-underline text-inherit transition-colors duration-300">
                                <div>
                                    <p class="text-[10px] uppercase tracking-[0.18em] font-semibold text-muted mb-2">Điểm đến nổi bật</p>
                                    <h4 class="font-display text-2xl leading-tight font-medium text-dark mb-2 transition-colors duration-300 group-hover:text-brand">
                                        Những vùng đất đáng khám phá trong mùa này
                                    </h4>
                                    <p class="text-sm leading-7 text-muted">Tuyển chọn theo mùa, khí hậu và nhịp sống địa phương.</p>
                                </div>
                                <span class="mt-1 text-lg text-dark transition-all duration-300 group-hover:text-brand group-hover:translate-x-1">→</span>
                            </a>
                            <a href="#" class="group grid grid-cols-[1fr_auto] gap-4 items-start py-6 border-b border-line no-underline text-inherit transition-colors duration-300">
                                <div>
                                    <p class="text-[10px] uppercase tracking-[0.18em] font-semibold text-muted mb-2">Trải nghiệm bản địa</p>
                                    <h4 class="font-display text-2xl leading-tight font-medium text-dark mb-2 transition-colors duration-300 group-hover:text-brand">
                                        Câu chuyện văn hóa, con người và hành trình
                                    </h4>
                                    <p class="text-sm leading-7 text-muted">Gặp gỡ, lắng nghe và đi sâu hơn một điểm đến quen thuộc.</p>
                                </div>
                                <span class="mt-1 text-lg text-dark transition-all duration-300 group-hover:text-brand group-hover:translate-x-1">→</span>
                            </a>
                            <a href="#" class="group grid grid-cols-[1fr_auto] gap-4 items-start py-6 border-b border-line no-underline text-inherit transition-colors duration-300">
                                <div>
                                    <p class="text-[10px] uppercase tracking-[0.18em] font-semibold text-muted mb-2">Cẩm nang thông minh</p>
                                    <h4 class="font-display text-2xl leading-tight font-medium text-dark mb-2 transition-colors duration-300 group-hover:text-brand">
                                        Mẹo bay, lịch trình, visa và chi phí du lịch
                                    </h4>
                                    <p class="text-sm leading-7 text-muted">Thông tin thực tế, gọn gàng — đủ để lên kế hoạch tự tin.</p>
                                </div>
                                <span class="mt-1 text-lg text-dark transition-all duration-300 group-hover:text-brand group-hover:translate-x-1">→</span>
                            </a>
                        </div>

                        <div class="flex flex-col sm:flex-row sm:items-center gap-5 mt-10">
                            <a href="#" class="inline-flex items-center justify-center bg-brand text-dark px-8 py-3.5 text-[11px] uppercase tracking-[0.18em] font-semibold rounded-2xl transition-opacity duration-300 hover:opacity-90">
                                Read Magazine
                            </a>
                            <a href="#" class="group inline-flex items-center gap-2 text-[11px] uppercase tracking-[0.16em] font-semibold text-dark transition-colors duration-300 hover:text-brand">
                                View Previous Issues
                                <span class="transition-transform duration-300 group-hover:translate-x-1">→</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- <section id="magazine" class="py-20">
            <div class="max-w-[1440px] mx-auto px-6">
                <div class="max-w-[960px] mx-auto text-center">
                    <div class="bg-white rounded-2xl shadow-soft p-8 md:p-12 grid md:grid-cols-[.9fr_1.1fr] gap-8 items-center text-left">
                        <div>
                            <p class="text-xs uppercase tracking-[.2em] text-brand mb-4">Digital Magazine</p>
                            <h2 class="font-display text-5xl font-medium mb-5">Ấn phẩm số mới</h2>
                            <p class="text-muted leading-7 mb-7">one2FLY Magazine — tuyển chọn điểm đến, trải nghiệm, ẩm thực và cẩm nang du lịch thông minh.</p>
                            <div class="flex gap-3"><a href="issue-read.html" class="bg-gold text-ink px-6 py-3 rounded-full text-xs uppercase tracking-[.16em] font-bold">Đọc online</a><a href="issue-detail.html" class="border border-slate-300 px-6 py-3 rounded-full text-xs uppercase tracking-[.16em] font-bold">Chi tiết ấn phẩm</a></div>
                        </div>
                        <div class="rounded-2xl overflow-hidden h-[300px] bg-cover bg-center shadow-card rotate-1" style="background-image:url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=900&auto=format&fit=crop')"></div>
                    </div>
                </div>
            </div>
        </section> -->
    </main>

    <footer class="bg-dark text-white py-14">
        <div class="max-w-[1440px] mx-auto px-6 text-center">
            <img src="../assets/logo.png" class="h-10 mx-auto mb-6 brightness-0 invert" alt="one2FLY!">
            <p class="text-white/70 mb-6">Tạp chí du lịch số — vui vẻ, dễ đọc, đúng và đủ thông tin.</p>
            <div class="flex justify-center gap-5 text-sm text-white/70 mb-8"><a href="destinations.html" class="hover:text-brand transition-colors">Điểm đến</a><a href="gallery.html" class="hover:text-brand transition-colors">Gallery</a><a href="issue.html" class="hover:text-brand transition-colors">Ấn phẩm</a><a href="about.html" class="hover:text-brand transition-colors">Giới thiệu</a></div>
            <div class="max-w-[520px] mx-auto flex gap-2"><input class="flex-1 border border-white/20 bg-white/10 text-white placeholder:text-white/50 rounded-2xl px-5 py-3 outline-none focus:border-brand" placeholder="Nhập email của bạn"><button class="bg-brand text-dark px-6 py-3 rounded-2xl text-xs uppercase tracking-[.16em] font-semibold">Đăng ký</button></div>
            <p class="text-xs text-white/50 mt-10">© 2026 one2FLY!. All rights reserved.</p>
        </div>
    </footer>

    <script>
        (function() {
            var stats = document.getElementById('campaign-stats');
            if (!stats) return;

            var items = Array.prototype.slice.call(stats.querySelectorAll('.image-card-stat'));
            var index = 0;
            var timer = null;
            var reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

            function setActive(i) {
                items.forEach(function(el, idx) {
                    el.classList.toggle('is-active', idx === i);
                });
            }

            function startCycle() {
                if (reducedMotion) {
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
        })();

        (function() {
            var nodes = document.querySelectorAll('[data-afar-reveal]');
            if (!nodes.length) return;

            if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
                nodes.forEach(function(el) {
                    el.classList.add('is-visible');
                });
                return;
            }

            var observer = new IntersectionObserver(
                function(entries) {
                    entries.forEach(function(entry) {
                        if (!entry.isIntersecting) return;
                        entry.target.classList.add('is-visible');
                        observer.unobserve(entry.target);
                    });
                }, {
                    threshold: 0.12,
                    rootMargin: '0px 0px -40px 0px'
                }
            );

            nodes.forEach(function(el) {
                observer.observe(el);
            });
        })();
    </script>
    <script src="{{ asset('assets/site-header.js') }}"></script>
</body>

</html>