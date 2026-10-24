<!doctype html>
<html lang="{{ $page['lang'] ?? 'fa' }}" dir="{{ ($page['lang'] ?? 'fa') === 'en' ? 'ltr' : 'rtl' }}" data-citizen-demo="{{ config('website.citizen_demo') ? 'true' : 'false' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'پرتال استانداری مازندران' }}</title>
    <meta name="description" content="{{ $description ?? 'درگاه الکترونیکی استانداری مازندران و خدمات مردمی' }}">
    <link rel="preload" as="font" type="font/woff2" href="/design/site/assets/fonts/Vazirmatn-VariableFont_wght.woff2" crossorigin="anonymous">
    @isset($page['css'])<link rel="stylesheet" href="{{ $page['css'] }}">@endisset
    @vite(['resources/css/app.css','resources/js/app.ts'])
    @stack('styles')
</head>
<body>
@yield('body')
@isset($page)<script id="portal-page" type="application/json">{!! \Illuminate\Support\Js::encode($page) !!}</script>@endisset
@stack('scripts')
</body>
</html>
