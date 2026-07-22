@extends('layouts.admin')

@section('title', $pageTitle . ' · Admin · one2FLY!')
@section('meta_description', $pageDescription)

@section('content')
    <div class="admin-page-header">
        <div class="min-w-0">
            <div class="admin-breadcrumb">
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                <span>/</span>
                <span>{{ $pageTitle }}</span>
            </div>
            <h1 class="admin-page-title">{{ $pageTitle }}</h1>
            <p class="admin-page-desc">{{ $pageDescription }}</p>
        </div>
        <div class="shrink-0">
            <button type="button" class="admin-primary-btn">＋ {{ $pageActionLabel }}</button>
        </div>
    </div>

    <div
        id="admin-screen-root"
        data-page-key="{{ $pageKey }}"
        data-page-title="{{ $pageTitle }}"
        data-page-action-label="{{ $pageActionLabel }}"
        class="space-y-6"
    ></div>
@endsection

@push('scripts')
    <script src="{{ asset('js/' . $pageKey . '.js') }}"></script>
@endpush
