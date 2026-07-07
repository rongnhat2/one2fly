<footer class="site-footer border-t border-[#EAEAEA] bg-[#111111] text-white py-16 md:py-20">
    <div class="max-w-[1200px] mx-auto px-6">
        <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-10 mb-14">
            <div>
                <img src="{{ asset('assets/logo.png') }}" class="h-8 w-auto brightness-0 invert mb-5" alt="one2FLY!">
                <p class="text-white/60 text-[15px] max-w-xs leading-relaxed">Điểm đến được tuyển chọn. Trải nghiệm chân thật. Du lịch thông minh hơn.</p>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-8 text-[12px]">
                <div>
                    <p class="uppercase tracking-[0.16em] text-white/40 mb-4">Khám phá</p>
                    <ul class="space-y-2 text-white/70">
                        <li><a href="{{ route('destinations') }}" class="site-footer-link">Điểm đến</a></li>
                        <li><a href="{{ route('gallery') }}" class="site-footer-link">Gallery</a></li>
                        <li><a href="{{ route('issue') }}" class="site-footer-link">Ấn phẩm</a></li>
                    </ul>
                </div>
                <div>
                    <p class="uppercase tracking-[0.16em] text-white/40 mb-4">Du lịch</p>
                    <ul class="space-y-2 text-white/70">
                        <li><a href="{{ route('guide') }}" class="site-footer-link">Cẩm nang</a></li>
                        <li><a href="{{ route('food') }}" class="site-footer-link">Ẩm thực</a></li>
                        <li><a href="{{ $footerTipsHref ?? route('guide') }}" class="site-footer-link">Mẹo hay</a></li>
                        <li><a href="{{ $footerCultureHref ?? route('explore') }}" class="site-footer-link">Văn hóa</a></li>
                    </ul>
                </div>
                <div>
                    <p class="uppercase tracking-[0.16em] text-white/40 mb-4">Công ty</p>
                    <ul class="space-y-2 text-white/70">
                        <li><a href="{{ route('about') }}" class="site-footer-link">Giới thiệu</a></li>
                        <li><a href="{{ route('issue') }}" class="site-footer-link">Ban biên tập</a></li>
                    </ul>
                </div>
                <div>
                    <p class="uppercase tracking-[0.16em] text-white/40 mb-4">Hỗ trợ</p>
                    <ul class="space-y-2 text-white/70">
                        <li><a href="{{ route('about') }}" class="site-footer-link">Liên hệ</a></li>
                        <li><a href="{{ route('home') }}#digital-magazine" class="site-footer-link">Bản tin</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 pt-8 border-t border-white/10 text-[11px] text-white/40">
            <div class="flex gap-5">
                <a href="#" class="site-footer-link site-footer-link--muted">Instagram</a>
                <a href="#" class="site-footer-link site-footer-link--muted">Facebook</a>
                <a href="#" class="site-footer-link site-footer-link--muted">YouTube</a>
            </div>
            <p>© {{ date('Y') }} one2FLY!. Bảo lưu mọi quyền.</p>
        </div>
    </div>
</footer>
