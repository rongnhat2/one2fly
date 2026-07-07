@foreach ([
    ['tag' => 'Du lịch - Điểm đến', 'title' => 'Sa Pa khi sương mù chưa tan', 'date' => '18/06/2026', 'img' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?q=80&w=800&auto=format&fit=crop'],
    ['tag' => 'Quốc nội', 'title' => 'Hội An lúc bình minh', 'date' => '15/06/2026', 'img' => 'https://images.unsplash.com/photo-1528127269322-539801943592?q=80&w=800&auto=format&fit=crop'],
    ['tag' => 'Quốc tế', 'title' => 'Kyoto và nghệ thuật trà đạo', 'date' => '12/06/2026', 'img' => 'https://images.unsplash.com/photo-1493976040374-85c8e12f0c0e?q=80&w=800&auto=format&fit=crop'],
    ['tag' => 'Du lịch - Điểm đến', 'title' => 'Geneva — hồ nước và dãy Alps', 'date' => '08/06/2026', 'img' => 'https://images.unsplash.com/photo-1476514529935-07fa3c4a5c88?q=80&w=800&auto=format&fit=crop'],
    ['tag' => 'Quốc tế', 'title' => 'Route 66 — huyền thoại xuyên Mỹ', 'date' => '05/06/2026', 'img' => 'https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?q=80&w=800&auto=format&fit=crop'],
    ['tag' => 'Quốc nội', 'title' => 'Phú Quốc ngoài mùa du lịch', 'date' => '02/06/2026', 'img' => 'https://images.unsplash.com/photo-1552465011-b85e45754688?q=80&w=800&auto=format&fit=crop'],
    ['tag' => 'Du lịch - Điểm đến', 'title' => 'Santorini lúc hoàng hôn', 'date' => '28/05/2026', 'img' => 'https://images.unsplash.com/photo-1518548419970-58e3b4079ab2?q=80&w=800&auto=format&fit=crop'],
    ['tag' => 'Quốc nội', 'title' => 'Mù Cang Chải mùa lúa chín', 'date' => '24/05/2026', 'img' => 'https://images.unsplash.com/photo-1501785888041-af3ef285b470?q=80&w=800&auto=format&fit=crop'],
] as $article)
    <article class="bg-surface rounded-2xl overflow-hidden shadow-card border border-line">
        <img class="h-[165px] w-full object-cover" src="{{ $article['img'] }}" alt="">
        <div class="p-5">
            <p class="text-[12px] font-semibold tracking-[1.5px] uppercase text-brand mb-2">{{ $article['tag'] }}</p>
            <h2 class="text-lg font-semibold leading-snug line-clamp-2 text-dark">
                <a href="{{ route('destinations.detail') }}" class="hover:text-brand transition-colors">{{ $article['title'] }}</a>
            </h2>
            <p class="text-[12px] tracking-[2px] uppercase text-muted mt-4">{{ $article['date'] }}</p>
        </div>
    </article>
@endforeach
