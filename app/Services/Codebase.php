<?php

namespace App\Services;

use Illuminate\Support\HtmlString;
use URL;

class Codebase {
    static public $nav_html = '';
    static public $page_classes = '';
    static public $main_nav = [];
    static public $main_nav_active = '';
    /**
     * Builds #page-container classes
     *
     * @return  HtmlString  Returns the classes if $print is set to false
     */
    static function page_classes() {
        // Build page classes
        if (config('codebase.cookies')) {
            Codebase::$page_classes .= ' enable-cookies';
        }

        // If sidebar is included
        if (config('codebase.inc_sidebar')) {
            if ( ! config('codebase.l_sidebar_left')) {
                Codebase::$page_classes .= ' sidebar-r';
            }

            if (config('codebase.l_sidebar_mini')) {
                Codebase::$page_classes .= ' sidebar-mini';
            }

            if (config('codebase.l_sidebar_visible_desktop')) {
                Codebase::$page_classes .= ' sidebar-o';
            }

            if (config('codebase.l_sidebar_visible_mobile')) {
                Codebase::$page_classes .= ' sidebar-o-xs';
            }

            if (config('codebase.l_sidebar_inverse')) {
                Codebase::$page_classes .= ' sidebar-inverse';
            }
        }

        // If side overlay is included
        if (config('codebase.inc_side_overlay')) {
            if (config('codebase.l_side_overlay_hoverable')) {
                Codebase::$page_classes .= ' side-overlay-hover';
            }

            if (config('codebase.l_side_overlay_visible')) {
                Codebase::$page_classes .= ' side-overlay-o';
            }
        }

        // if sidebar or side overlay is included
        if (config('codebase.inc_sidebar') || config('codebase.inc_side_overlay')) {
            if (config('codebase.l_side_scroll')) {
                Codebase::$page_classes .= ' side-scroll';
            }
        }

        // If header is included
        if (config('codebase.inc_header')) {
            if (config('codebase.l_header_fixed')) {
                Codebase::$page_classes .= ' page-header-fixed';
            }

            if (config('codebase.l_header_style') == 'modern') {
                Codebase::$page_classes .= ' page-header-modern';
            } else if (config('codebase.l_header_style') == 'inverse') {
                Codebase::$page_classes .= ' page-header-inverse';
            } else if (config('codebase.l_header_style') == 'glass') {
                Codebase::$page_classes .= ' page-header-glass';
            } else if (config('codebase.l_header_style') == 'glass-inverse') {
                Codebase::$page_classes .= ' page-header-glass page-header-inverse';
            }
        }

        // Main content classes
        if (config('codebase.l_m_content') == 'boxed') {
            Codebase::$page_classes .= ' main-content-boxed';
        } else if (config('codebase.l_m_content') == 'narrow') {
            Codebase::$page_classes .= ' main-content-narrow';
        }

        // Print or return page classes
        if (Codebase::$page_classes) {
            return new HtmlString(trim(Codebase::$page_classes));
        } else {
            return new HtmlString('');
        }
    }

    /**
     * Builds main navigation
     *
     * @param   boolean     $nav_header True if the menu is for the header (it will not return headings and icons)
     * @param   boolean     $nav_header_icons True to print icons in the header menu as well
     *
     * @return  string      Returns the navigation if $print is set to false
     */
    static public function build_nav($nav_header = false, $nav_header_icons = false) {
        // Clean navigation HTML
        Codebase::$nav_html = '';
        Codebase::$main_nav_active = URL::current();

        // Build navigation
        Codebase::build_nav_array(Codebase::$main_nav, $nav_header, $nav_header_icons);

        return new HtmlString(Codebase::$nav_html);
    }

    /**
     * Build navigation helper - Builds main navigation one level at a time
     *
     * @param   array      $nav_array A multi dimensional array with menu/sub menus links
     * @param   boolean     $nav_header True if the menu is for the header (it will not return headings and icons)
     * @param   boolean     $nav_header_icons True to print icons in the header menu
     */
    static private function build_nav_array($nav_array, $nav_header, $nav_header_icons) {
        foreach ($nav_array as $node) {
            // Get all vital link info
            $link_name      = isset($node['name']) ? $node['name'] : '';
            $link_icon      = isset($node['icon']) && ( ! $nav_header || ($nav_header && $nav_header_icons)) ? '<i class="' . $node['icon'] . '"></i>' : '';
            $link_url       = isset($node['url']) ? $node['url'] : '#';
            $link_sub       = isset($node['sub']) && is_array($node['sub']) ? true : false;
            $link_type      = isset($node['type']) ? isset($node['type']) : '';
            $sub_active     = false;
            $link_active    = $link_url == Codebase::$main_nav_active ? true : false;

            // If link type is a header and
            if ($link_type == 'heading') {
                if ( ! $nav_header) {
                    Codebase::$nav_html .= "<li class=\"nav-main-heading\">$link_name</li>\n";
                }
            } else {
                // If it is a submenu search for an active link in all sub links
                if ($link_sub) {
                    $sub_active = Codebase::build_nav_array_search($node['sub']) ? true : false;
                }

                // Set menu properties
                $li_toggle      = ' data-toggle="nav-submenu"';
                $li_prop        = $sub_active ? ' class="open"' : '';
                $link_prop      = $link_sub ? ' class="nav-submenu' . ($link_active ? ' active' : '') . '"' . $li_toggle : ($link_active ? ' class="active"' : '');

                // Add the link
                Codebase::$nav_html .= "<li$li_prop>\n";
                Codebase::$nav_html .= "<a$link_prop href=\"$link_url\">$link_icon$link_name</a>\n";

                // If it is a submenu, call the function again
                if ($link_sub) {
                    Codebase::$nav_html .= "<ul>\n";
                    Codebase::build_nav_array($node['sub'], $nav_header, $nav_header_icons);
                    Codebase::$nav_html .= "</ul>\n";
                }

                Codebase::$nav_html .= "</li>\n";
            }
        }
    }

    /**
     * Build navigation helper - Search navigation array for active menu links
     *
     * @param   array      $nav_array A multi dimensional array with menu/sub menus links
     *
     * @return  boolean     Returns true if an active link is found
     */
    static private function build_nav_array_search($nav_array) {
        foreach ($nav_array as $node) {
            if (isset($node['url']) && ($node['url'] == Codebase::$main_nav_active)) {
                return true;
            } else if (isset($node['sub']) && is_array($node['sub'])) {
                if (Codebase::build_nav_array_search($node['sub'])) {
                    return true;
                }
            }
        }
        return false;
    }
}
