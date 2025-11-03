<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Website')</title>

    {{-- استدعاء ملفات CSS --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    {{-- الهيدر --}}
    @include('partials.header')
    @include('partials.Navbar')

    {{-- المحتوى --}}
    <main>
        @include('partials.carousel')
        @include('partials.about')
        @include('partials.features')
        @include('partials.product')
        @include('partials.firm-visit')
        @include('partials.testimonial')
        @include('partials.blog')
        @yield('content')
    </main>

    {{-- الفوتر --}}
    @include('partials.footer')

    {{-- استدعاء ملفات JS --}}
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>