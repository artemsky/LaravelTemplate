<?php
/**
 * Codebase - Global configuration file
 */
return [

    // **************************************************************************************************
    // GLOBAL META & OPEN GRAPH DATA
    // **************************************************************************************************

    // : The data is added in the <head> section of the page
    'version' => env('CODEBASE_VERSION', 'v2.2'),
    'author' => env('CODEBASE_AUTHOR', 'pixelcave'),
    'robots' => env('CODEBASE_ROBOTS', 'noindex, nofollow'),
    'title' => env('CODEBASE_TITLE', 'Bootstrap 4 Admin Template &amp, UI Framework'),
    'description' => env('CODEBASE_DESCRIPTION', 'Bootstrap 4 Admin Template &amp, created by ArtemSky'),

    // : The url of your site, used in Open Graph Meta Data (eg 'https://example.com')
    'og_url_site' => env('CODEBASE_OG_URL_SITE', ''),

    // : The url of your image/logo, used in Open Graph Meta Data (eg 'https://example.com/assets/img/your_logo.png')
    'og_url_image' => env('CODEBASE_OG_URL_IMAGE', ''),


    // **************************************************************************************************
    // GLOBAL GENERIC
    // **************************************************************************************************

    // '' : default color theme
    // 'elegance' : elegance color theme
    // 'pulse' : pulse color theme
    // 'flat' : flat color theme
    // 'corporate' : corporate color theme
    // 'earth' : earth color theme
    'theme' => env('CODEBASE_THEME', ''),

    // true : Remembers active color theme between pages
    // (when set through color theme helper Codebase() -> uiHandleTheme())
    // false : No cookies
    'cookies' => env('CODEBASE_COOKIES', false),

    // You will have to obtain a Google Maps API key to use Google Maps, for more info please have a look at
    // https://developers.google.com/maps/documentation/javascript/get-api-key#key
    'google_maps_api_key' => env('CODEBASE_GOOGLE_MAPS_API_KEY', ''),


    // **************************************************************************************************
    // GLOBAL INCLUDED VIEWS
    // **************************************************************************************************

    // : Useful for adding different sidebars/headers per page or per section
    'inc_side_overlay' => env('CODEBASE_INC_SIDE_OVERLAY', false),
    'inc_sidebar' => env('CODEBASE_INC_SIDEBAR', false),
    'inc_header' => env('CODEBASE_INC_HEADER', false),
    'inc_footer' => env('CODEBASE_INC_FOOTER', false),

    'inc_side_overlay_view' => 'admin.components.side_overlay',
    'inc_sidebar_view' => 'admin.components.sidebar.sidebar',
    'inc_header_view' => 'admin.components.header.header',
    'inc_footer_view' => 'admin.components.footer.footer',


    // **************************************************************************************************
    // GLOBAL SIDEBAR & SIDE OVERLAY
    // **************************************************************************************************

    // true : Left Sidebar and right Side Overlay
    // false : Right Sidebar and left Side Overlay
    'l_sidebar_left' => env('CODEBASE_L_SIDEBAR_LEFT', true),

    // true : Mini hoverable Sidebar (screen width > 991px)
    // false : Normal mode
    'l_sidebar_mini' => env('CODEBASE_L_SIDEBAR_MINI', false),

    // true : Visible Sidebar (screen width > 991px)
    // false : Hidden Sidebar (screen width > 991px)
    'l_sidebar_visible_desktop' => env('CODEBASE_L_SIDEBAR_VISIBLE_DESKTOP', true),

    // true : Visible Sidebar (screen width < 992px)
    // false : Hidden Sidebar (screen width < 992px)
    'l_sidebar_visible_mobile' => env('CODEBASE_L_SIDEBAR_VISIBLE_MOBILE', false),

    // true : Dark themed Sidebar
    // false : Light themed Sidebar
    'l_sidebar_inverse' => env('CODEBASE_L_SIDEBAR_INVERSE', false),

    // true : Hoverable Side Overlay (screen width > 991px)
    // false : Normal mode
    'l_side_overlay_hoverable' => env('CODEBASE_L_SIDE_OVERLAY_HOVERABLE', false),

    // true : Visible Side Overlay
    // false : Hidden Side Overlay
    'l_side_overlay_visible' => env('CODEBASE_L_SIDE_OVERLAY_VISIBLE', false),

    // true : Custom scrolling (screen width > 991px)
    // false : Native scrolling
    'l_side_scroll' => env('CODEBASE_L_SIDE_SCROLL', true),


    // **************************************************************************************************
    // GLOBAL HEADER
    // **************************************************************************************************

    // true : Fixed Header
    // false : Static Header
    'l_header_fixed' => env('CODEBASE_L_HEADER_FIXED', false),

    // '' : Classic Header style
    // 'modern' : Modern Header style
    // 'inverse' : Dark themed Header (works only with classic Header style)
    // 'glass' : Light themed Header with transparency by default (absolute position,
    //                                perfect for light images underneath - solid light background
    //                                on scroll if the Header is also set as fixed)
    // 'glass-inverse' : Dark themed Header with transparency by default (absolute position,
    //                                perfect for dark images underneath - solid dark background
    //                                on scroll if the Header is also set as fixed)
    'l_header_style' => env('CODEBASE_L_HEADER_STYLE', 'modern'),


    // **************************************************************************************************
    // GLOBAL MAIN CONTENT
    // **************************************************************************************************

    // '' : Full width Main Content
    // 'boxed' : Full width Main Content with a specific maximum width (screen width > 1200px)
    // 'narrow' : Full width Main Content with a percentage width (screen width > 1200px)
    'l_m_content' => env('CODEBASE_L_M_CONTENT', 'boxed'),
];



