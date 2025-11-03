<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    {{-- الهيدر --}}
    @include('partials.header')

    {{-- المحتوى الرئيسي --}}
    <main>
        @yield('content')
    </main>

    {{-- الفوتر --}}
    @include('partials.footer')

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
