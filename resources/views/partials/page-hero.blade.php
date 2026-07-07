<section @class([
    'page-hero text-white',
    'page-hero--compact' => $compact ?? false,
    'py-10' => $compact ?? false,
    'py-16 md:py-20' => ! ($compact ?? false),
])>
    <div class="max-w-[1440px] mx-auto px-6">
        @isset($breadcrumb)
            <nav class="text-xs uppercase tracking-[.16em] text-white/70 mb-4 flex flex-wrap gap-2">
                @foreach ($breadcrumb as $item)
                    @if (! $loop->first)
                        <span>/</span>
                    @endif
                    @if (! empty($item['url']))
                        <a href="{{ $item['url'] }}" class="hover:text-accent transition-colors">{{ $item['label'] }}</a>
                    @else
                        <span>{{ $item['label'] }}</span>
                    @endif
                @endforeach
            </nav>
        @endisset
        @if (! empty($eyebrow))
            <p @class([
                'text-xs uppercase tracking-[.22em] text-accent',
                'mb-2' => $compact ?? false,
                'mb-3' => ! ($compact ?? false),
            ])>{{ $eyebrow }}</p>
        @endif
        <div @class(['flex flex-wrap items-end justify-between gap-4' => ! empty($meta) || ! empty($metaId)])>
            <div>
                <h1 @class([
                    'font-display font-medium leading-tight',
                    'text-4xl md:text-5xl' => $compact ?? false,
                    'text-5xl md:text-6xl' => ! ($compact ?? false),
                ])>{{ $title }}</h1>
                @if (! empty($subtitle))
                    <p class="text-white/80 text-lg max-w-2xl mt-4">{{ $subtitle }}</p>
                @endif
            </div>
            @if (! empty($metaId))
                <p id="{{ $metaId }}" class="text-xs uppercase tracking-[.16em] text-white/80">{{ $metaText ?? 'Đang tải…' }}</p>
            @elseif (! empty($meta))
                <p class="text-xs uppercase tracking-[.16em] text-white/80">{{ $meta }}</p>
            @endif
        </div>
    </div>
</section>
