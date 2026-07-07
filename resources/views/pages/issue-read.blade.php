@extends('layouts.magazine')

@section('title', 'Đọc online — ' . $reader['title'] . ' · one2FLY!')
@section('meta_description', $reader['desc'])

@push('head')
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600&family=Playfair+Display:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/vendor/real3d-flipbook-lite/css/flipbook.min.css') }}">
@endpush

@section('content')
    <div class="issue-reader min-h-screen bg-[#FAFAF8] text-[#101828] flex flex-col" id="issue-reader">

        {{-- 1. Reader Header --}}
        <header class="issue-reader-header sticky top-0 z-50 bg-[#FAFAF8] border-b border-[#E6E8EC]">
            <div class="issue-reader-header-inner max-w-[1280px] mx-auto px-4 sm:px-6 h-14 sm:h-16 flex items-center gap-3 sm:gap-4">
                <div class="issue-reader-header-left flex items-center gap-3 sm:gap-4 min-w-0 shrink-0 sm:max-w-[240px]">
                    <a href="{{ route('issue.detail') }}" class="issue-reader-btn issue-reader-btn--ghost text-[11px] uppercase tracking-[0.14em] font-semibold text-[#667085] hover:text-[#0368B4] whitespace-nowrap hidden sm:inline-flex">
                        ← Quay lại số báo
                    </a>
                    <a href="{{ route('issue.detail') }}" class="issue-reader-btn issue-reader-btn--ghost sm:hidden p-2" aria-label="Quay lại số báo">←</a>
                    <span class="text-[10px] uppercase tracking-[0.16em] text-[#667085] font-semibold hidden md:inline whitespace-nowrap">{{ $reader['label'] }}</span>
                </div>

                <div class="issue-reader-header-center flex-1 min-w-0 text-center">
                    <h1 class="issue-reader-serif text-[15px] sm:text-[17px] md:text-[20px] font-medium text-[#101828] truncate">{{ $reader['title'] }}</h1>
                    <p class="text-[10px] uppercase tracking-[0.14em] text-[#667085] md:hidden">{{ $reader['label'] }}</p>
                </div>

                <div class="issue-reader-header-right flex items-center gap-1 sm:gap-2 shrink-0">
                    <a href="{{ $reader['pdf'] }}" download class="issue-reader-btn hidden sm:inline-flex" title="Download PDF">
                        <span class="hidden lg:inline">Download PDF</span>
                        <span class="lg:hidden">PDF</span>
                    </a>
                    <button type="button" id="btn-share" class="issue-reader-btn hidden md:inline-flex" title="Share">Share</button>
                    <button type="button" id="btn-fullscreen" class="issue-reader-btn" title="Fullscreen" aria-label="Fullscreen">
                        <span class="hidden sm:inline">Fullscreen</span>
                        <span class="sm:hidden">⛶</span>
                    </button>
                    <button type="button" id="btn-info-toggle" class="issue-reader-btn sm:hidden" aria-label="Thông tin số báo" aria-expanded="false">ℹ</button>
                </div>
            </div>
            <div class="issue-reader-progress-track h-[2px] bg-[#E6E8EC]" aria-hidden="true">
                <div id="reader-progress-bar" class="issue-reader-progress-bar h-full bg-[#0368B4] w-0 transition-[width] duration-300 ease-out"></div>
            </div>
        </header>

        <div class="issue-reader-layout flex flex-1 relative overflow-hidden">

            {{-- 4. Table of Contents Panel --}}
            <aside id="reader-toc" class="issue-reader-toc" aria-label="Mục lục" aria-hidden="true">
                <div class="issue-reader-toc-header flex items-center justify-between px-5 py-4 border-b border-[#E6E8EC]">
                    <h2 class="issue-reader-serif text-[20px] font-medium text-[#101828]">Mục lục</h2>
                    <button type="button" id="btn-toc-close" class="issue-reader-btn issue-reader-btn--ghost p-2" aria-label="Đóng mục lục">✕</button>
                </div>
                <nav class="issue-reader-toc-list">
                    @foreach ($reader['contents'] as $chapter)
                        <button
                            type="button"
                            class="issue-reader-toc-item"
                            data-goto-page="{{ $chapter['page'] }}"
                        >
                            <span class="text-[11px] uppercase tracking-[0.14em] text-[#667085] font-medium w-8 shrink-0">{{ $chapter['num'] }}</span>
                            <span class="flex-1 min-w-0 text-left">
                                <span class="block text-[10px] uppercase tracking-[0.16em] text-[#0368B4] font-semibold mb-0.5">{{ $chapter['cat'] }}</span>
                                <span class="block text-[14px] text-[#101828] leading-snug">{{ $chapter['title'] }}</span>
                            </span>
                            <span class="text-[11px] uppercase tracking-[0.12em] text-[#667085] shrink-0">p.{{ $chapter['page'] }}</span>
                        </button>
                    @endforeach
                </nav>
            </aside>
            <div id="reader-toc-backdrop" class="issue-reader-backdrop" aria-hidden="true"></div>

            {{-- Reading stage --}}
            <div class="issue-reader-main flex-1 flex flex-col min-w-0">
                <div class="issue-reader-stage-wrap relative flex-1 px-4 sm:px-6 py-6 sm:py-10 md:py-12">
                    {{-- Decorative route --}}
                    <svg class="issue-reader-route absolute inset-0 w-full h-full pointer-events-none hidden md:block" viewBox="0 0 1200 800" fill="none" preserveAspectRatio="xMidYMid slice" aria-hidden="true">
                        <path d="M-40 620 C 200 480, 400 680, 620 520 S 980 280, 1240 180" stroke="#0368B4" stroke-width="1" stroke-dasharray="6 10" opacity="0.12"/>
                        <path d="M80 200 C 320 300, 500 140, 760 240 S 1080 400, 1160 320" stroke="#0368B4" stroke-width="1" stroke-dasharray="4 12" opacity="0.08"/>
                    </svg>
                    <p class="issue-reader-coords absolute top-6 right-6 text-[9px] uppercase tracking-[0.18em] text-[#667085]/50 hidden lg:block pointer-events-none" aria-hidden="true">{{ $reader['coords'] }}</p>

                    {{-- 7. Issue Info Panel --}}
                    <details class="issue-reader-info hidden sm:block absolute top-6 left-6 z-20 max-w-[280px]" id="reader-info-desktop">
                        <summary class="issue-reader-info-toggle text-[10px] uppercase tracking-[0.16em] font-semibold text-[#667085] cursor-pointer hover:text-[#0368B4] select-none">
                            Thông tin số báo
                        </summary>
                        <div class="issue-reader-info-body mt-3 p-4 border border-[#E6E8EC] rounded-[4px] bg-white">
                            <p class="text-[10px] uppercase tracking-[0.16em] text-[#0368B4] font-semibold mb-1">{{ $reader['label'] }}</p>
                            <h2 class="issue-reader-serif text-[18px] font-medium text-[#101828] mb-2">{{ $reader['title'] }}</h2>
                            <p class="text-[12px] text-[#667085] mb-3">{{ $reader['pages'] }} trang</p>
                            <p class="text-[13px] leading-[1.65] text-[#667085] mb-4">{{ $reader['desc'] }}</p>
                            <div class="flex flex-col gap-2">
                                <a href="{{ $reader['pdf'] }}" download class="issue-reader-btn issue-reader-btn--primary w-full justify-center text-[10px]">Download PDF</a>
                                <a href="{{ route('issue.detail') }}" class="issue-reader-btn w-full justify-center text-[10px]">View Issue Detail</a>
                            </div>
                        </div>
                    </details>

                    {{-- Mobile info sheet --}}
                    <div id="reader-info-mobile" class="issue-reader-info-sheet" aria-hidden="true">
                        <div class="p-5 border-b border-[#E6E8EC] flex items-center justify-between">
                            <h2 class="issue-reader-serif text-[20px] font-medium">Thông tin số báo</h2>
                            <button type="button" id="btn-info-close" class="issue-reader-btn issue-reader-btn--ghost p-2" aria-label="Đóng">✕</button>
                        </div>
                        <div class="p-5">
                            <p class="text-[10px] uppercase tracking-[0.16em] text-[#0368B4] font-semibold mb-1">{{ $reader['label'] }}</p>
                            <h3 class="issue-reader-serif text-[22px] font-medium mb-2">{{ $reader['title'] }}</h3>
                            <p class="text-[12px] text-[#667085] mb-3">{{ $reader['pages'] }} trang</p>
                            <p class="text-[13px] leading-[1.65] text-[#667085] mb-5">{{ $reader['desc'] }}</p>
                            <div class="flex flex-col gap-2">
                                <a href="{{ $reader['pdf'] }}" download class="issue-reader-btn issue-reader-btn--primary w-full justify-center">Download PDF</a>
                                <a href="{{ route('issue.detail') }}" class="issue-reader-btn w-full justify-center">View Issue Detail</a>
                            </div>
                        </div>
                    </div>

                    {{-- Loading --}}
                    <div id="reader-loading" class="issue-reader-overlay">
                        <div class="text-center">
                            <div class="issue-reader-spinner mx-auto mb-4" aria-hidden="true"></div>
                            <p class="text-[14px] text-[#667085]">Đang mở số báo…</p>
                        </div>
                    </div>

                    {{-- Error --}}
                    <div id="reader-error" class="issue-reader-overlay hidden">
                        <div class="text-center max-w-[320px] px-6">
                            <p class="issue-reader-serif text-[22px] font-medium text-[#101828] mb-2">Không thể tải số báo</p>
                            <p class="text-[14px] text-[#667085] mb-6">Vui lòng kiểm tra kết nối hoặc thử lại sau.</p>
                            <button type="button" id="btn-retry" class="issue-reader-btn issue-reader-btn--primary">Thử lại</button>
                        </div>
                    </div>

                    {{-- Empty --}}
                    <div id="reader-empty" class="issue-reader-overlay hidden">
                        <div class="text-center max-w-[360px] px-6">
                            <p class="issue-reader-serif text-[22px] font-medium text-[#101828] mb-2">Số báo này chưa có nội dung đọc trực tuyến</p>
                            <a href="{{ route('issue.detail') }}" class="issue-reader-btn issue-reader-btn--primary mt-4">Xem chi tiết số báo</a>
                        </div>
                    </div>

                    {{-- 2. Flipbook stage (core — unchanged structure) --}}
                    <div
                        id="reader-stage"
                        class="reader-stage issue-reader-stage relative z-10 max-w-[1100px] mx-auto"
                        data-flipbook-root="{{ asset('assets/vendor/real3d-flipbook-lite/') }}"
                        data-pdf-url="{{ $reader['pdf'] }}"
                        data-total-pages="{{ $reader['pages'] }}"
                    >
                        <div id="flipbook-container"></div>
                        <button type="button" id="side-prev" class="reader-side reader-side--prev issue-reader-side hidden md:flex" disabled aria-label="Trang trước">
                            <svg width="40" height="40" viewBox="0 0 48 48" fill="none" aria-hidden="true"><circle cx="24" cy="24" r="23" stroke="#0368B4" stroke-width="1.25"/><path d="M27 16l-8 8 8 8" stroke="#0368B4" stroke-width="1.25" stroke-linecap="round"/></svg>
                        </button>
                        <button type="button" id="side-next" class="reader-side reader-side--next issue-reader-side hidden md:flex" disabled aria-label="Trang sau">
                            <svg width="40" height="40" viewBox="0 0 48 48" fill="none" aria-hidden="true"><circle cx="24" cy="24" r="23" stroke="#0368B4" stroke-width="1.25"/><path d="M21 16l8 8-8 8" stroke="#0368B4" stroke-width="1.25" stroke-linecap="round"/></svg>
                        </button>

                        {{-- 3. Reader Toolbar (existing nav IDs preserved) --}}
                        <div id="reader-nav" class="issue-reader-toolbar">
                            <button type="button" id="btn-first" class="reader-nav-btn issue-reader-nav-btn hidden lg:grid" aria-label="Trang đầu" title="Trang đầu">⏮</button>
                            <button type="button" id="btn-prev" class="reader-nav-btn issue-reader-nav-btn" disabled aria-label="Trước">◀</button>
                            <span id="page-indicator" class="issue-reader-page-label text-[12px] uppercase tracking-[0.12em] font-semibold text-[#667085] whitespace-nowrap min-w-[100px] text-center">Đang tải…</span>
                            <input id="page-input" type="text" value="1" disabled aria-label="Số trang" class="issue-reader-page-input hidden sm:block">
                            <button type="button" id="btn-goto" class="issue-reader-nav-btn issue-reader-nav-btn--goto hidden sm:grid" disabled aria-label="Đi tới trang">GO</button>
                            <button type="button" id="btn-next" class="reader-nav-btn issue-reader-nav-btn" disabled aria-label="Sau">▶</button>
                            <button type="button" id="btn-last" class="reader-nav-btn issue-reader-nav-btn hidden lg:grid" aria-label="Cuối" title="Cuối">⏭</button>
                            <span class="issue-reader-toolbar-divider hidden sm:block" aria-hidden="true"></span>
                            <button type="button" id="btn-zoom-out" class="reader-nav-btn issue-reader-nav-btn hidden sm:grid" aria-label="Thu nhỏ" title="Thu nhỏ">−</button>
                            <button type="button" id="btn-zoom-in" class="reader-nav-btn issue-reader-nav-btn hidden sm:grid" aria-label="Phóng to" title="Phóng to">+</button>
                            <button type="button" id="btn-toc-toggle" class="issue-reader-nav-btn issue-reader-nav-btn--chrome hidden sm:grid" aria-label="Mục lục" title="Mục lục">☰</button>
                            <button type="button" id="btn-thumbs-toggle" class="issue-reader-nav-btn issue-reader-nav-btn--chrome hidden md:grid" aria-label="Thumbnail" title="Thumbnail">▦</button>
                            <button type="button" id="btn-fullscreen-toolbar" class="issue-reader-nav-btn issue-reader-nav-btn--chrome hidden sm:grid" aria-label="Fullscreen" title="Fullscreen">⛶</button>
                        </div>
                    </div>

                    <p class="relative z-10 text-center text-[10px] uppercase tracking-[0.14em] text-[#667085] mt-4 hidden sm:block">← → lật trang · Home / End</p>
                </div>

                {{-- 5. Thumbnail Strip --}}
                <div id="reader-thumbs" class="issue-reader-thumbs" aria-label="Xem trước trang" aria-hidden="true">
                    <div id="reader-thumbs-track" class="issue-reader-thumbs-track"></div>
                </div>
            </div>
        </div>

        {{-- Mobile fixed toolbar (mirrors core nav via click delegation) --}}
        <div id="reader-mobile-bar" class="issue-reader-mobile-bar sm:hidden">
            <button type="button" data-trigger="btn-toc-toggle" class="issue-reader-mobile-btn" aria-label="Mục lục">☰</button>
            <button type="button" data-trigger="btn-prev" class="issue-reader-mobile-btn" aria-label="Trước">◀</button>
            <span id="page-indicator-mobile" class="issue-reader-mobile-page text-[11px] uppercase tracking-[0.1em] font-semibold text-[#667085]">…</span>
            <button type="button" data-trigger="btn-next" class="issue-reader-mobile-btn" aria-label="Sau">▶</button>
            <button type="button" data-trigger="btn-fullscreen" class="issue-reader-mobile-btn" aria-label="Fullscreen">⛶</button>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/vendor/real3d-flipbook-lite/js/flipbook.min.js') }}"></script>
    <script src="{{ asset('assets/issue-read.js') }}"></script>
    <script src="{{ asset('assets/issue-read-chrome.js') }}"></script>
@endpush
