<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'one2FLY!')</title>
    @hasSection('meta_description')
        <meta name="description" content="@yield('meta_description')" />
    @endif

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    @include('partials.magazine-tailwind')
    @stack('head')
    <link rel="stylesheet" href="{{ asset('assets/index.css') }}">
</head>

<body @class([
    'font-sans antialiased bg-canvas text-muted min-h-screen flex flex-col has-fixed-header',
    'has-hero-header' => $heroHeader ?? true,
])>
    @unless($hideHeader ?? false)
        @include('partials.magazine-header')
    @endunless

    <main class="flex-1">
        @yield('content')
    </main>

    @unless($hideFooter ?? false)
        @include('partials.magazine-footer')
    @endunless

    @stack('scripts')
    <script src="{{ asset('assets/site-header.js') }}"></script>
</body>

</html>
