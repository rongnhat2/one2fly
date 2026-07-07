@extends('layouts.magazine')

@section('title', '404 — one2FLY!')
@section('meta_description', 'Trang không tồn tại')

@section('content')
    @include('partials.page-hero', $hero)

    <section class="py-16 text-center">
        <div class="max-w-[1440px] mx-auto px-6 flex flex-wrap justify-center gap-4">
            <a href="{{ route('home') }}" class="bg-brand text-white px-6 py-3 rounded-2xl text-xs uppercase tracking-[.16em] font-semibold hover:bg-brandHover transition-colors">Về trang chủ</a>
            <a href="{{ route('destinations') }}" class="border border-line px-6 py-3 rounded-2xl text-xs uppercase tracking-[.16em] font-semibold text-dark hover:border-brand transition-colors">Điểm đến</a>
        </div>
    </section>
@endsection
