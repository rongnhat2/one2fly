@extends('layouts.magazine')

@section('title', 'Gallery — one2FLY!')
@section('meta_description', 'Phóng sự ảnh')

@section('content')
    @include('partials.page-hero', $hero)

    <section class="py-12">
        <div class="max-w-[1440px] mx-auto px-6">
            <a href="{{ route('gallery.detail') }}" class="image-card relative block h-[360px] rounded-2xl overflow-hidden mb-8 bg-cover bg-center border border-line" style="background-image:url('https://images.unsplash.com/photo-1501785888041-af3ef285b470?q=80&w=1200&auto=format&fit=crop')">
                <div class="absolute bottom-0 p-8 text-white">
                    <p class="text-xs uppercase tracking-[.16em] text-accent mb-2">Featured</p>
                    <h2 class="font-display text-4xl font-medium">Ruộng bậc thang Mù Cang Chải mùa nước đổ</h2>
                </div>
            </a>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ([
                    'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?q=80&w=600&auto=format&fit=crop',
                    'https://images.unsplash.com/photo-1528127269322-539801943592?q=80&w=600&auto=format&fit=crop',
                    'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?q=80&w=600&auto=format&fit=crop',
                    'https://images.unsplash.com/photo-1493976040374-85c8e12f0c0e?q=80&w=600&auto=format&fit=crop',
                    'https://images.unsplash.com/photo-1476514529935-07fa3c4a5c88?q=80&w=600&auto=format&fit=crop',
                    'https://images.unsplash.com/photo-1552465011-b85e45754688?q=80&w=600&auto=format&fit=crop',
                ] as $image)
                    <a href="{{ route('gallery.detail') }}" class="block">
                        <img class="rounded-2xl h-56 w-full object-cover border border-line hover:opacity-90 transition-opacity" src="{{ $image }}" alt="">
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endsection
