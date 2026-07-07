@extends('layouts.magazine')

@section('title', 'Khám phá — one2FLY!')
@section('meta_description', 'Khám phá thế giới qua dòng chảy hình ảnh — điểm đến, khoảnh khắc và trải nghiệm được chọn lọc bởi One2Fly.')

@section('content')
<div class="explore-feed-page relative overflow-hidden bg-[#FAFAF8] text-[#101828]">

    <svg class="explore-route absolute top-0 left-0 w-full h-[600px] pointer-events-none" viewBox="0 0 1440 600" fill="none" preserveAspectRatio="xMidYMid slice" aria-hidden="true">
        <path class="explore-route-path" d="M-60 480 C 280 360, 520 520, 820 400 S 1280 180, 1520 120" stroke="#0368B4" stroke-width="1" stroke-dasharray="5 9" opacity="0.18" />
        <g opacity="0.4" transform="translate(1180 140) rotate(12)">
            <path d="M0 0 L14 4 L0 8 L2.5 4 Z" fill="#0368B4" />
        </g>
    </svg>

    {{-- Hero --}}
    <section id="explore-hero" class="relative pt-[88px] border-b border-[#E6E8EC]">
        <div class="max-w-[1440px] mx-auto px-6 py-16 md:py-24 lg:py-28">
            <div class="explore-reveal max-w-3xl">
                <p class="text-[11px] uppercase tracking-[0.28em] text-[#0368B4] font-semibold mb-5">Khám phá thế giới</p>
                <h1 class="explore-serif text-[44px] sm:text-[56px] lg:text-[72px] leading-[0.98] font-medium tracking-[-0.02em] text-[#101828] mb-6">
                    Những nơi đáng để dừng lại
                </h1>
                <p class="text-[17px] leading-[1.8] text-[#667085] max-w-[50ch]">
                    Một dòng chảy hình ảnh từ các điểm đến, khoảnh khắc và trải nghiệm được chọn lọc bởi One2Fly.
                </p>
            </div>

            <nav class="explore-reveal flex flex-wrap gap-2 md:gap-3 mt-12 md:mt-14" aria-label="Lọc danh mục" id="explore-chips">
                @foreach ($filters as $filter)
                <button
                    type="button"
                    class="explore-chip {{ $loop->first ? 'is-active' : '' }}"
                    data-filter="{{ $filter['id'] }}">{{ $filter['label'] }}</button>
                @endforeach
            </nav>
        </div>
    </section>

    {{-- Floating explore bar --}}
    <div id="explore-bar" class="explore-bar sticky top-[88px] z-40 border-b border-[#E6E8EC] bg-[#FAFAF8]/95 backdrop-blur-[6px]">
        <div class="max-w-[1440px] mx-auto px-6 py-3 md:py-4">
            <div class="hidden md:flex items-center gap-4 lg:gap-6">
                <label class="sr-only" for="explore-search">Tìm điểm đến</label>
                <input type="search" id="explore-search" placeholder="Tìm điểm đến…" class="explore-bar-input flex-1 max-w-xs px-4 py-2 text-[14px] border border-[#E6E8EC] rounded-[4px] bg-white text-[#101828] placeholder:text-[#667085] focus:outline-none focus:border-[#0368B4]">
                <select class="explore-bar-select px-4 py-2 text-[12px] uppercase tracking-[0.12em] border border-[#E6E8EC] rounded-[4px] bg-white text-[#667085] focus:outline-none focus:border-[#0368B4]" aria-label="Khu vực">
                    <option>Khu vực</option>
                    <option>Châu Á</option>
                    <option>Châu Âu</option>
                    <option>Việt Nam</option>
                </select>
                <select class="explore-bar-select px-4 py-2 text-[12px] uppercase tracking-[0.12em] border border-[#E6E8EC] rounded-[4px] bg-white text-[#667085] focus:outline-none focus:border-[#0368B4]" aria-label="Cảm hứng">
                    <option>Cảm hứng</option>
                    <option>Chậm lại</option>
                    <option>Biển xanh</option>
                    <option>Thành phố cổ</option>
                </select>
                <select class="explore-bar-select px-4 py-2 text-[12px] uppercase tracking-[0.12em] border border-[#E6E8EC] rounded-[4px] bg-white text-[#667085] focus:outline-none focus:border-[#0368B4]" aria-label="Sắp xếp">
                    <option>Mới nhất</option>
                    <option>Được yêu thích</option>
                </select>
            </div>
            <button type="button" class="md:hidden w-full flex items-center justify-between px-4 py-2.5 text-[12px] uppercase tracking-[0.14em] font-semibold text-[#101828] border border-[#E6E8EC] rounded-[4px] bg-white" id="explore-filter-toggle" aria-expanded="false">
                Bộ lọc
                <span aria-hidden="true">▾</span>
            </button>
            <div id="explore-filter-mobile" class="md:hidden hidden mt-3 space-y-3 pb-2">
                <input type="search" placeholder="Tìm điểm đến…" class="w-full px-4 py-2 text-[14px] border border-[#E6E8EC] rounded-[4px] bg-white">
                <select class="w-full px-4 py-2 text-[12px] border border-[#E6E8EC] rounded-[4px] bg-white" aria-label="Khu vực">
                    <option>Khu vực</option>
                </select>
                <select class="w-full px-4 py-2 text-[12px] border border-[#E6E8EC] rounded-[4px] bg-white" aria-label="Sắp xếp">
                    <option>Mới nhất</option>
                </select>
            </div>
        </div>
    </div>

    {{-- Masonry feed --}}
    <section class="max-w-[1440px] mx-auto px-6 py-12 md:py-16">
        <div class="explore-masonry" id="explore-masonry">
            @foreach ($feed as $item)
            @if ($loop->index > 0 && $loop->index % 9 === 0)
            <article class="explore-masonry-featured explore-reveal mt-4" aria-label="Bộ ảnh nổi bật">
                <a href="{{ route('gallery.detail') }}" class="group block relative overflow-hidden rounded-[4px] min-h-[320px] md:min-h-[400px]">
                    <img src="{{ $featured['image'] }}" alt="{{ $featured['title'] }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-[1.03]" loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-8 md:p-12 text-white">
                        <p class="text-[10px] uppercase tracking-[0.22em] text-white/80 mb-3">{{ $featured['location'] }}</p>
                        <h2 class="explore-serif text-[32px] md:text-[48px] leading-[1.05] font-medium mb-4">{{ $featured['title'] }}</h2>
                        <p class="text-[16px] text-white/85 max-w-[42ch] mb-6">{{ $featured['subtitle'] }}</p>
                        <span class="inline-flex items-center gap-2 text-[11px] uppercase tracking-[0.18em] font-semibold border border-white/50 px-6 py-3 rounded-[4px] group-hover:bg-white group-hover:text-[#101828] transition-colors">
                            Xem bộ ảnh <span class="explore-arrow">→</span>
                        </span>
                    </div>
                </a>
            </article>
            @endif

            @if ($loop->index === 9)
            <div class="explore-masonry-break explore-reveal py-12 md:py-16 border-y border-[#E6E8EC] my-2 bg-white -mx-2 px-4 md:px-8 rounded-[4px]">
                <p class="text-[11px] uppercase tracking-[0.24em] text-[#0368B4] font-semibold mb-3">Cảm hứng</p>
                <h2 class="explore-serif text-[28px] md:text-[36px] font-medium text-[#101828] mb-8">Khám phá theo cảm hứng</h2>
                <div class="flex flex-wrap gap-3">
                    @foreach ($moods as $mood)
                    <button type="button" class="explore-mood group relative overflow-hidden rounded-[4px] border border-[#E6E8EC] px-5 py-3 md:px-7 md:py-4 text-left transition-colors hover:border-[#0368B4]">
                        <span class="explore-serif text-[18px] md:text-[22px] font-medium text-[#101828] group-hover:text-[#0368B4] transition-colors relative z-10">{{ $mood['label'] }}</span>
                        <img src="{{ $mood['image'] }}" alt="" class="explore-mood-thumb absolute inset-0 w-full h-full object-cover opacity-0 group-hover:opacity-25 transition-opacity duration-500" aria-hidden="true" loading="lazy">
                    </button>
                    @endforeach
                </div>
            </div>
            @endif

            <article
                class="explore-tile explore-reveal explore-tile--{{ $item['size'] }} group cursor-pointer"
                data-category="{{ $item['category'] }}"
                data-lightbox
                data-image="{{ $item['image'] }}"
                data-location="{{ $item['location'] }}"
                data-title="{{ $item['title'] }}"
                data-description="{{ $item['description'] }}"
                data-meta="{{ $item['meta'] }}">
                <div class="explore-tile-inner relative overflow-hidden rounded-[4px]">
                    <img
                        src="{{ $item['image'] }}"
                        alt="{{ $item['title'] }} — {{ $item['location'] }}"
                        class="explore-tile-img w-full object-cover"
                        loading="lazy">
                    @if ($item['coords'])
                    <span class="explore-coords absolute top-3 right-3 text-[9px] uppercase tracking-[0.12em] text-white/70 hidden md:block" aria-hidden="true">{{ $item['coords'] }}</span>
                    @endif
                    <div class="explore-tile-overlay absolute inset-0 flex flex-col justify-end p-5 md:p-6">
                        <p class="text-[10px] uppercase tracking-[0.18em] text-white/80 mb-1">{{ $item['location'] }}</p>
                        <h3 class="explore-tile-title explore-serif text-[22px] md:text-[26px] leading-tight font-medium text-white mb-2">{{ $item['title'] }}</h3>
                        <p class="text-[11px] uppercase tracking-[0.14em] text-white/70 mb-3">{{ $item['meta'] }}</p>
                        <span class="explore-tile-cta inline-flex items-center gap-1 text-[10px] uppercase tracking-[0.16em] font-semibold text-white opacity-0 group-hover:opacity-100 transition-all duration-300 translate-y-2 group-hover:translate-y-0">
                            Khám phá <span class="explore-arrow">→</span>
                        </span>
                    </div>
                </div>
            </article>
            @endforeach
        </div>

        <div class="explore-masonry hidden mt-4" id="explore-more" aria-hidden="true">
            @foreach (array_slice($feed, 0, 6) as $item)
            <article class="explore-tile explore-reveal explore-tile--{{ $item['size'] }} group cursor-pointer" data-category="{{ $item['category'] }}" data-lightbox data-image="{{ $item['image'] }}" data-location="{{ $item['location'] }}" data-title="{{ $item['title'] }}" data-description="{{ $item['description'] }}" data-meta="{{ $item['meta'] }}">
                <div class="explore-tile-inner relative overflow-hidden rounded-[4px]">
                    <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}" class="explore-tile-img w-full object-cover" loading="lazy">
                    <div class="explore-tile-overlay absolute inset-0 flex flex-col justify-end p-5 md:p-6">
                        <p class="text-[10px] uppercase tracking-[0.18em] text-white/80 mb-1">{{ $item['location'] }}</p>
                        <h3 class="explore-serif text-[22px] font-medium text-white mb-2">{{ $item['title'] }}</h3>
                        <p class="text-[11px] uppercase tracking-[0.14em] text-white/70">{{ $item['meta'] }}</p>
                    </div>
                </div>
            </article>
            @endforeach
        </div>
    </section>

    {{-- Load more --}}
    <section class="max-w-[1440px] mx-auto px-6 pb-24 md:pb-32 text-center explore-reveal">
        <button type="button" id="explore-load-more" class="inline-flex items-center gap-2 px-10 py-4 text-[11px] uppercase tracking-[0.2em] font-semibold text-[#0368B4] border border-[#0368B4] rounded-[4px] hover:bg-[#0368B4] hover:text-white transition-colors">
            Xem thêm điểm đến <span class="explore-arrow">→</span>
        </button>
        <p class="mt-6 text-[14px] text-[#667085]">Còn nhiều nơi đang chờ bạn khám phá.</p>
    </section>
</div>

{{-- Lightbox --}}
<div id="explore-lightbox" class="explore-lightbox fixed inset-0 z-[100] hidden items-center justify-center p-4 md:p-8" role="dialog" aria-modal="true" aria-labelledby="explore-lightbox-title" hidden>
    <div class="explore-lightbox-backdrop absolute inset-0 bg-[#101828]/90" data-close-lightbox></div>
    <div class="explore-lightbox-panel relative z-10 w-full max-w-5xl max-h-[90vh] overflow-y-auto bg-[#FAFAF8] rounded-[4px]">
        <button type="button" class="absolute top-4 right-4 z-20 w-10 h-10 flex items-center justify-center text-[#101828] border border-[#E6E8EC] bg-white rounded-[4px] hover:border-[#0368B4] transition-colors" data-close-lightbox aria-label="Đóng">✕</button>
        <img id="explore-lightbox-img" src="" alt="" class="w-full max-h-[60vh] object-cover">
        <div class="p-6 md:p-10">
            <p id="explore-lightbox-location" class="text-[11px] uppercase tracking-[0.2em] text-[#0368B4] font-semibold mb-2"></p>
            <h2 id="explore-lightbox-title" class="explore-serif text-[32px] md:text-[40px] font-medium text-[#101828] mb-4"></h2>
            <p id="explore-lightbox-meta" class="text-[11px] uppercase tracking-[0.14em] text-[#667085] mb-4"></p>
            <p id="explore-lightbox-desc" class="text-[16px] leading-[1.8] text-[#667085] mb-8 max-w-[60ch]"></p>
            <div class="border-t border-[#E6E8EC] pt-6">
                <p class="text-[10px] uppercase tracking-[0.18em] text-[#667085] mb-4">Cẩm nang liên quan</p>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('guide') }}" class="text-[12px] uppercase tracking-[0.14em] font-semibold text-[#0368B4] hover:underline underline-offset-4">Đọc cẩm nang →</a>
                    <a href="{{ route('destinations') }}" class="text-[12px] uppercase tracking-[0.14em] font-semibold text-[#101828] hover:text-[#0368B4] transition-colors">Xem điểm đến →</a>
                    <a href="{{ route('food') }}" class="text-[12px] uppercase tracking-[0.14em] font-semibold text-[#101828] hover:text-[#0368B4] transition-colors">Cẩm nang ẩm thực →</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    (function() {
        var reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        var reveals = document.querySelectorAll('.explore-reveal');
        if (reduced || !('IntersectionObserver' in window)) {
            reveals.forEach(function(el) {
                el.classList.add('is-visible');
            });
        } else {
            var obs = new IntersectionObserver(function(entries) {
                entries.forEach(function(e) {
                    if (!e.isIntersecting) return;
                    e.target.classList.add('is-visible');
                    obs.unobserve(e.target);
                });
            }, {
                threshold: 0.06,
                rootMargin: '0px 0px -32px 0px'
            });
            reveals.forEach(function(el) {
                obs.observe(el);
            });
        }

        document.querySelectorAll('.explore-chip').forEach(function(chip) {
            chip.addEventListener('click', function() {
                document.querySelectorAll('.explore-chip').forEach(function(c) {
                    c.classList.remove('is-active');
                });
                chip.classList.add('is-active');
                var filter = chip.getAttribute('data-filter');
                document.querySelectorAll('.explore-tile').forEach(function(tile) {
                    var cat = tile.getAttribute('data-category');
                    tile.classList.toggle('is-hidden', filter !== 'all' && cat !== filter);
                });
            });
        });

        var filterToggle = document.getElementById('explore-filter-toggle');
        var filterMobile = document.getElementById('explore-filter-mobile');
        if (filterToggle && filterMobile) {
            filterToggle.addEventListener('click', function() {
                var open = !filterMobile.classList.contains('hidden');
                filterMobile.classList.toggle('hidden', open);
                filterToggle.setAttribute('aria-expanded', open ? 'false' : 'true');
            });
        }

        var lightbox = document.getElementById('explore-lightbox');
        var lbImg = document.getElementById('explore-lightbox-img');
        var lbLoc = document.getElementById('explore-lightbox-location');
        var lbTitle = document.getElementById('explore-lightbox-title');
        var lbMeta = document.getElementById('explore-lightbox-meta');
        var lbDesc = document.getElementById('explore-lightbox-desc');

        function openLightbox(tile) {
            if (!lightbox) return;
            lbImg.src = tile.getAttribute('data-image');
            lbImg.alt = tile.getAttribute('data-title');
            lbLoc.textContent = tile.getAttribute('data-location');
            lbTitle.textContent = tile.getAttribute('data-title');
            lbMeta.textContent = tile.getAttribute('data-meta');
            lbDesc.textContent = tile.getAttribute('data-description');
            lightbox.hidden = false;
            lightbox.classList.remove('hidden');
            lightbox.classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        function closeLightbox() {
            if (!lightbox) return;
            lightbox.hidden = true;
            lightbox.classList.add('hidden');
            lightbox.classList.remove('flex');
            document.body.style.overflow = '';
        }

        document.querySelectorAll('[data-lightbox]').forEach(function(tile) {
            tile.addEventListener('click', function() {
                openLightbox(tile);
            });
        });
        document.querySelectorAll('[data-close-lightbox]').forEach(function(el) {
            el.addEventListener('click', closeLightbox);
        });
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeLightbox();
        });

        var loadMore = document.getElementById('explore-load-more');
        var moreBlock = document.getElementById('explore-more');
        if (loadMore && moreBlock) {
            loadMore.addEventListener('click', function() {
                moreBlock.classList.remove('hidden');
                moreBlock.removeAttribute('aria-hidden');
                var masonry = document.getElementById('explore-masonry');
                moreBlock.querySelectorAll('.explore-tile').forEach(function(tile) {
                    masonry.appendChild(tile);
                    tile.classList.add('is-visible');
                    tile.addEventListener('click', function() {
                        openLightbox(tile);
                    });
                });
                loadMore.disabled = true;
                loadMore.textContent = 'Đã hiển thị tất cả';
                loadMore.classList.add('opacity-50', 'cursor-not-allowed');
            });
        }
    })();
</script>
@endpush