<?php


class compactor_base_class
{

    private static $instance;
    public $helpers;
    public $customizer;
    public $activation;
    public $integrations;
    public $widgets;
    public $template;
    public $page_settings;
    public $widgetized_pages;

    public static function instance()
    {
        if (!isset(self::$instance) && !(self::$instance instanceof compactor_base_class)) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    public function __construct()
    {
        $this->default_parameters();
        $this->setup();
    }

    // Integration getter helper
    public function get($integration)
    {
        return $this->integrations->get($integration);
    }


    private function setup()
    {
        add_action('after_setup_theme', array($this, 'setup_theme'));
    }

    public function setup_theme()
    {
        load_theme_textdomain('compactor', get_template_directory() . '/languages');

        add_theme_support('custom-background', apply_filters('compactor_custom_background_args', array('default-color' => 'ffffff',
            'default-image' => '',)));

    }

    public function default_parameters()
    {


        // Colors
        define('WD_PRIMARY_COLOR', '#FFDD01');
        define('WD_SECONDARY_COLOR', '#412AAB');
        define('WD_ACCENT_COLOR', '#F92245');
        define('WD_TEXT_COLOR', '#585B68');
        define('WD_SECONDARY_TEXT_COLOR', '#A6AAB7');
        define('WD_HEADER_COLOR', '#040E56');
        define('WD_BODY_BG_COLOR', '#fff');

        // Layout
        define('WD_BOXED_LAYOUT', "off");
        define('WD_MENU_MOBILE_LAYOUT', "on");
        define('WD_HEADER_CONTAIN_TO_GRID', "on");
        define('WD_STICK_MENU_TO_TOP', "on");
        define('WD_PAGE_LOADING_ANIMATION', "off");
        define('WD_SHOW_THE_LOGO', "off");
        define('WD_SHOW_WEBSITE_TITLE', "on");
        define('SHOW_TOP_SOCIAL_BARE', "off");
        define('SHOW_SEARCH_ICON', "off");

        define('SHOW_LANGUAGE_WIDGET', "on");
        define('LANGUAGE_AREA_HTML', "");


        // Topbar Colors
        define('WD_HEADER_BG_COLOR', '#FFF');
        define('WD_NAV_TEXT_COLOR', '#040E56');
        define('WD_STICKY_NAV_BG_COLOR', '#FFF');
        define('WD_STICKY_NAV_TEXT_COLOR', '#040E56');
        define('WD_HOVER_STICKY_NAV_TEXT_COLOR', '#FDB900');
        define('WD_HOVER_NAV_TEXT_COLOR', '#FDB900');


        // Footer Colors
        define('WD_FOOTER_BG_COLOR', '#020625');
        define('WD_FOOTER_BACKGROUND_IMAGE', '');
        define('WD_FOOTER_TEXT_COLOR', 'rgba(255, 255, 255, 0.7)');
        define('WD_COPYRIGHT_BG', '#020625');
        define('WD_COPYRIGHT_TEXT_COLOR', 'rgba(255, 255, 255, 0.6)');


        define('WD_LOGO_HEIGHT', '40');

        define('WD_BODY_FONT_FAMILY', "Open Sans");
        define('WD_BODY_FONT_FAMILY_FALLBACK', "sans-serif");
        define('WD_BODY_FONT_WEIGHT', 400);

        define('WD_HEAD_FONT_FAMILY', "Khula");
        define('WD_HEAD_FONT_FAMILY_FALLBACK', "'Khula', Roboto sans-serif");

        define('WD_NAV_FONT_FAMILY', "Open Sans");
        define('WD_NAV_FONT_FAMILY_FALLBACK', "'Open Sans', sans-serif");


        //Blog settings
        define('SHOW_NEXT_PREVIOUS_POSTS', "on");
        define('SHOW_RELATED_POSTS', "off");

    }

    /**
     *
     * // initialize options
     */

    public static function initialize_options()
    {
        if (!get_option("compactor_options_array")) {
            $options_array = get_option("compactor_options_array");
            $options_array = array(
                "primary_color" => WD_PRIMARY_COLOR,
                "secondary_color" => WD_SECONDARY_COLOR,
                "accent_color" => WD_ACCENT_COLOR,
                "text_color" => WD_TEXT_COLOR,
                "secondary_text_color" => WD_SECONDARY_TEXT_COLOR,
                "header_text_color" => WD_HEADER_COLOR,
                "body_bg_color" => WD_BODY_BG_COLOR,
                "header_bg_color" => WD_HEADER_BG_COLOR,
                "nav_text_color" => WD_NAV_TEXT_COLOR,
                "sticky_nav_bg_color" => WD_STICKY_NAV_BG_COLOR,
                "sticky_nav_text_color" => WD_STICKY_NAV_TEXT_COLOR,
                "hover_sticky_nav_text_color" => WD_HOVER_STICKY_NAV_TEXT_COLOR,
                "hover_nav_text_color" => WD_HOVER_NAV_TEXT_COLOR,
                "footer_bg_color" => WD_FOOTER_BG_COLOR,
                "footer_text_color" => WD_FOOTER_TEXT_COLOR,
                "copyright_bg_color" => WD_COPYRIGHT_BG,
                "copyright_text_color" => WD_COPYRIGHT_TEXT_COLOR,


                "show_top_social_bare"  => SHOW_TOP_SOCIAL_BARE,
                "show_search_icon"      => SHOW_SEARCH_ICON,
                "show_language_widget"  => SHOW_LANGUAGE_WIDGET,
                "language_area_html"    => LANGUAGE_AREA_HTML,


                "404_background_image" => "",
                "products_per_page" => "9",
                "product_column" => "4",
                "footer_bg" => "",
                "copyright_text" => "",
                "powered_text" => "",
                "footer_column" => "four_columns",
                "menu_style" => "corporate",

                "body_font_family" => WD_BODY_FONT_FAMILY,
                "body_font_style" => "normal",
                "body_font_size" => "",
                "body_font_weight" => WD_BODY_FONT_WEIGHT,
                "body_letter_spacing" => "",
                "body_font_subsets" => "",
                "body_font_to_load" => "300 400 500 600 700 800",

                "head_font_family" => WD_HEAD_FONT_FAMILY,
                "head_font_style" => "normal",
                "head_font_weight" => "700",
                "head_font_subsets" => "latin",
                "head_letter_spacing" => "",
                "head_font_to_load" => "100 300 400 500 600 700 900",

                "nav_font_family" => WD_NAV_FONT_FAMILY,
                "nav_font_style" => "normal",
                "nav_font_weight" => "700",
                "nav_font_size" => "",
                "nav_font_subsets" => "latin",
                "nav_letter_spacing" => "",
                "nav_font_to_load" => "300 400 500 600 700",

                "wd_theme_custom_js" => "",

                "boxed_layout" => WD_BOXED_LAYOUT,
                "menu_mobile_layout" => WD_MENU_MOBILE_LAYOUT,
                "header_contain_to_grid" => WD_HEADER_CONTAIN_TO_GRID,
                "stick_menu_to_top" => WD_STICK_MENU_TO_TOP,
                "page_loading_animation" => WD_PAGE_LOADING_ANIMATION,
                "show_the_logo" => WD_SHOW_THE_LOGO,
                "show_website_title" => WD_SHOW_WEBSITE_TITLE,

                "action_button" => "",
                "body_background_image" => "",
                "bg_home_page" => "Upload",
                "logo_link" => get_template_directory_uri() . "/images/logo.png",
                "logo_height" => WD_LOGO_HEIGHT,
                "logo_padding" => "",
                "google_key_map" => "AIzaSyCuddKL1Z2WR8og1v2UZpdI7raxkmVJPaI",
                "title_page_bg" => "",

                // Blog settings
                "show_next_previous_posts" => SHOW_NEXT_PREVIOUS_POSTS,
                "show_related_posts" => SHOW_RELATED_POSTS,
            );
            update_option("compactor_options_array", $options_array);
        }
    }

}