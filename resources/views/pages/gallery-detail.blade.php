@extends('layouts.magazine')

@section('title', 'Ruộng bậc thang — one2FLY!')
@section('meta_description', 'Photo essay Mù Cang Chải')

@section('content')
    @include('partials.page-hero', $hero)

    <section class="py-10 space-y-6">
        @foreach ([
            ['width' => '1440px', 'src' => 'https://images.unsplash.com/photo-1501785888041-af3ef285b470?q=80&w=1400&auto=format&fit=crop', 'shadow' => true],
            ['width' => '900px', 'src' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?q=80&w=1200&auto=format&fit=crop', 'shadow' => false],
            ['width' => '1440px', 'src' => 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?q=80&w=1400&auto=format&fit=crop', 'shadow' => false],
        ] as $image)
            <img @class([
                'mx-auto px-6 w-[calc(100%-3rem)] rounded-2xl border border-line',
                'shadow-card' => $image['shadow'],
            ]) style="max-width: {{ $image['width'] }}" src="{{ $image['src'] }}" alt="">
        @endforeach
        <div class="text-center py-8">
            <a href="{{ route('gallery') }}" class="text-brand font-semibold uppercase tracking-[.16em] text-sm hover:text-brandHover transition-colors">← Quay lại Gallery</a>
        </div>
    </section>
@endsection
