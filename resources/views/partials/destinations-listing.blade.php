<section class="py-12">
    <div class="max-w-[1440px] mx-auto px-6 grid md:grid-cols-[2.1fr_1fr] gap-9 items-start mb-12">
        <img class="w-full h-[420px] object-cover rounded-2xl shadow-card border border-line" src="{{ $featuredImage ?? 'https://images.unsplash.com/photo-1485846234645-a62644f84728?q=80&w=1200&auto=format&fit=crop' }}" alt="">
        <p class="text-muted leading-7">{{ $featuredText ?? 'Từ phim tài liệu đến triển lãm đương đại, Los Angeles là nơi ký ức được tái hiện qua ánh sáng và bóng tối.' }}</p>
    </div>
    <div class="max-w-[1440px] mx-auto px-6">
        <div class="text-center mb-10">
            <h2 class="font-display text-4xl font-medium title-mark text-dark">Bài viết mới</h2>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
            @include('partials.destination-articles')
        </div>
    </div>
</section>
