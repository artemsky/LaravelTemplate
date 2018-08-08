<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    {{-- Font loader --}}
    {{--<script>--}}
        {{--if (localStorage.fontsLoaded) {--}}
            {{--window.document.documentElement.className += " fonts-loaded";--}}
        {{--}--}}
    {{--</script>--}}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name') )</title>
    <meta name="title" content="@yield('title', config('app.name') )">
    <meta name="description" content="@yield('description', config('app.name') )">

    {{-- Favicon --}}
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/client/apple-touch-icon.png?v=1">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/client/favicon-32x32.png?v=1">
    <link rel="icon" type="image/png" sizes="192x192" href="/favicon/client/android-chrome-192x192.png?v=1">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/client/favicon-16x16.png?v=1">
    <link rel="manifest" href="/favicon/client/manifest.json?v=1">
    <link rel="mask-icon" href="/favicon/client/safari-pinned-tab.svg?v=1" color="#1b1d1e">
    <link rel="shortcut icon" href="/favicon/client/favicon.ico?v=1">
    <meta name="msapplication-config" content="/favicon/client/browserconfig.xml?v=1">
    <meta name="theme-color" content="#1b1d1e">
    {{-- /Favicon --}}

    <link rel="preload" href="{{mixOptional('/assets/manifest.js', 'client')}}" as="script" crossorigin="anonymous">
    <link rel="preload" href="{{mixOptional('/assets/common.js', 'client')}}" as="script" crossorigin="anonymous">

    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!--[if lte IE 11]>
    <script src="//cdnjs.cloudflare.com/ajax/libs/dom4/2.0.0/dom4.js">/* DOM4 */</script>
    <![endif]-->

    {{-- Stylesheets/core --}}
    @stack('critical-css')

    {{-- Fonts preloader --}}
    {{--<link rel="preload" href="/fonts/*.woff2" as="font" type="font/woff2" crossorigin="anonymous">--}}

    {{-- Styleshets/custom --}}
    <link rel="stylesheet" href="{{mix('/assets/core.css', 'client')}}">
</head>
<body class="layout">
@include('client.components.header')
@yield('content')
@include('client.components.footer')
@stack('modals')
{{-- Deffered style load --}}
<noscript id="deferred-styles">
    @stack('styles')
</noscript>
<script>
    var loadDeferredStyles=function(){var e=document.getElementById("deferred-styles"),t=document.createElement("div");t.innerHTML=e.textContent,document.body.appendChild(t),e.parentElement.removeChild(e)},raf=requestAnimationFrame||mozRequestAnimationFrame||webkitRequestAnimationFrame||msRequestAnimationFrame;raf?raf(function(){window.setTimeout(loadDeferredStyles,0)}):window.addEventListener("load",loadDeferredStyles);
</script>
{{-- Scripts/core --}}
<script>
    window.app_data = {};
</script>
{{-- Scripts/core --}}
<script defer src="{{mixOptional('/assets/manifest.js', 'client')}}"></script>
<script defer src="{{mixOptional('/assets/common.js', 'client')}}"></script>
{{-- Scripts/custom --}}
@stack('scripts')
</body>
</html>
