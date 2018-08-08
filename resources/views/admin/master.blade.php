<!doctype html>
<!--[if lte IE 9]>     <html lang="{{ app()->getLocale() }}" class="no-focus lt-ie10 lt-ie10-msg"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="{{ app()->getLocale() }}" class="no-focus"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <title>@yield('title', config('codebase.title') )</title>

    <meta name="description" content="@yield('description', config('codebase.description') )">
    <meta name="author" content="{{ config('codebase.author') }}">
    <meta name="robots" content="{{ config('codebase.robots') }}">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="@yield('title', config('codebase.title') )">
    <meta property="og:site_name" content="@yield('title', config('codebase.title') )">
    <meta property="og:description" content="@yield('description', config('codebase.description') )">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ config('codebase.og_url_site') }}">
    <meta property="og:image" content="{{ config('codebase.og_url_image') }}">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    {{-- Favicon --}}
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/admin/apple-touch-icon.png?v=2">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/admin/favicon-32x32.png?v=2">
    <link rel="icon" type="image/png" sizes="192x192" href="/favicon/admin/android-chrome-192x192.png?v=2">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/admin/favicon-16x16.png?v=2">
    <link rel="manifest" href="/favicon/admin/manifest.json?v=2">
    <link rel="mask-icon" color="#1b1d1" href="/favicon/admin/safari-pinned-tab.svg?v=2">
    <link rel="shortcut icon" href="/favicon/admin/favicon.ico?v=2">
    <meta name="msapplication-config" content="/favicon/admin/browserconfig.xml?v=2">
    <meta name="theme-color" content="#1b1d1e">
    {{-- /Favicon --}}
    <!-- END Icons -->

    <link rel="preload" href="{{mixOptional('/assets/manifest.js', 'admin')}}" as="script" crossorigin="anonymous">
    <link rel="preload" href="{{mixOptional('/assets/common.js', 'admin')}}" as="script" crossorigin="anonymous">

    <!-- Stylesheets -->
    <!-- Codebase framework -->
    <link rel="stylesheet" id="css-main" href="{{mix('/assets/core.css', 'admin')}}">
    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/flat.min.css"> -->
    @if(config('codebase.theme'))
        <link rel="stylesheet" id="css-theme" href="{{mix('/assets/pages/themes/'.config('codebase.theme').'css', 'admin')}}">
    @endif
    @stack('styles')
    <!-- END Stylesheets -->
</head>
<body>
<!-- Page Container -->
<div id="page-container" class="{{Codebase::page_classes()}}">
    @if(config('codebase.inc_side_overlay'))
        @include(config('codebase.inc_side_overlay_view'))
    @endif
    @if(config('codebase.inc_sidebar'))
        @include(config('codebase.inc_sidebar_view'))
    @endif
    @if(config('codebase.inc_header'))
        @include(config('codebase.inc_header_view'))
    @endif
    <!-- Main Container -->
    <main id="main-container">
        @yield('content')
    </main>
    <!-- END Main Container -->
    @if(config('codebase.inc_footer'))
        @include(config('codebase.inc_footer_view'))
    @endif
</div>
@stack('modals')
<!-- END Page Container -->
<!-- Codebase Core JS -->
<script src="{{mixOptional('/assets/manifest.js', 'admin')}}"></script>
<script src="{{mixOptional('/assets/common.js', 'admin')}}"></script>
@stack('scripts')
</body>
</html>
