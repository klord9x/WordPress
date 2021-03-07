<?php

/*____________________________________________  Animations ______________________________________*/
global $vc_add_css_animation;
global $icons;
global $wd_fonts_array;
$fontsSeraliazed = 'a:324:{i:0;s:7:"Default";i:1;s:4:"Abel";i:2;s:13:"Abril Fatface";i:3;s:8:"Aclonica";i:4;s:5:"Actor";i:5;s:7:"Adamina";i:6;s:15:"Aguafina Script";i:7;s:6:"Aladin";i:8;s:7:"Aldrich";i:9;s:5:"Alice";i:10;s:13:"Alike Angular";i:11;s:5:"Alike";i:12;s:5:"Allan";i:13;s:15:"Allerta Stencil";i:14;s:7:"Allerta";i:15;s:8:"Amaranth";i:16;s:9:"Amatic SC";i:17;s:6:"Andada";i:18;s:6:"Andika";i:19;s:24:"Annie Use Your Telescope";i:20;s:13:"Anonymous Pro";i:21;s:5:"Antic";i:22;s:5:"Anton";i:23;s:6:"Arapey";i:24;s:19:"Architects Daughter";i:25;s:5:"Arimo";i:26;s:8:"Artifika";i:27;s:4:"Arvo";i:28;s:5:"Asset";i:29;s:7:"Astloch";i:30;s:10:"Atomic Age";i:31;s:6:"Aubrey";i:32;s:7:"Bangers";i:33;s:7:"Bentham";i:34;s:5:"Bevan";i:35;s:11:"Bigshot One";i:36;s:6:"Bitter";i:37;s:13:"Black Ops One";i:38;s:13:"Bowlby One SC";i:39;s:10:"Bowlby One";i:40;s:7:"Brawler";i:41;s:14:"Bubblegum Sans";i:42;s:4:"Buda";i:43;s:15:"Butcherman Caps";i:44;s:15:"Cabin Condensed";i:45;s:12:"Cabin Sketch";i:46;s:5:"Cabin";i:47;s:10:"Cagliostro";i:48;s:14:"Calligraffitti";i:49;s:6:"Candal";i:50;s:9:"Cantarell";i:51;s:5:"Cardo";i:52;s:5:"Carme";i:53;s:10:"Carter One";i:54;s:6:"Caudex";i:55;s:18:"Cedarville Cursive";i:56;s:10:"Changa One";i:57;s:17:"Cherry Cream Soda";i:58;s:5:"Chewy";i:59;s:6:"Chicle";i:60;s:5:"Chivo";i:61;s:12:"Coda Caption";i:62;s:4:"Coda";i:63;s:9:"Comfortaa";i:64;s:11:"Coming Soon";i:65;s:12:"Contrail One";i:66;s:11:"Convergence";i:67;s:6:"Cookie";i:68;s:5:"Copse";i:69;s:6:"Corben";i:70;s:7:"Cousine";i:71;s:8:"Coustard";i:72;s:21:"Covered By Your Grace";i:73;s:12:"Crafty Girls";i:74;s:14:"Creepster Caps";i:75;s:12:"Crimson Text";i:76;s:7:"Crushed";i:77;s:6:"Cuprum";i:78;s:6:"Damion";i:79;s:14:"Dancing Script";i:80;s:20:"Dawning of a New Day";i:81;s:8:"Days One";i:82;s:17:"Delius Swash Caps";i:83;s:14:"Delius Unicase";i:84;s:6:"Delius";i:85;s:10:"Devonshire";i:86;s:13:"Didact Gothic";i:87;s:5:"Dorsa";i:88;s:11:"Dr Sugiyama";i:89;s:15:"Droid Sans Mono";i:90;s:10:"Droid Sans";i:91;s:11:"Droid Serif";i:92;s:11:"EB Garamond";i:93;s:10:"Eater Caps";i:94;s:13:"Expletus Sans";i:95;s:12:"Fanwood Text";i:96;s:8:"Federant";i:97;s:6:"Federo";i:98;s:9:"Fjord One";i:99;s:10:"Fondamento";i:100;s:16:"Fontdiner Swanky";i:101;s:5:"Forum";i:102;s:12:"Francois One";i:103;s:13:"Gentium Basic";i:104;s:18:"Gentium Book Basic";i:105;s:3:"Geo";i:106;s:12:"Geostar Fill";i:107;s:7:"Geostar";i:108;s:14:"Give You Glory";i:109;s:17:"Gloria Hallelujah";i:110;s:10:"Goblin One";i:111;s:10:"Gochi Hand";i:112;s:21:"Goudy Bookletter 1911";i:113;s:12:"Gravitas One";i:114;s:6:"Gruppo";i:115;s:15:"Hammersmith One";i:116;s:20:"Herr Von Muellerhoff";i:117;s:15:"Holtwood One SC";i:118;s:14:"Homemade Apple";i:119;s:18:"IM Fell DW Pica SC";i:120;s:15:"IM Fell DW Pica";i:121;s:22:"IM Fell Double Pica SC";i:122;s:19:"IM Fell Double Pica";i:123;s:18:"IM Fell English SC";i:124;s:15:"IM Fell English";i:125;s:23:"IM Fell French Canon SC";i:126;s:20:"IM Fell French Canon";i:127;s:23:"IM Fell Great Primer SC";i:128;s:20:"IM Fell Great Primer";i:129;s:7:"Iceland";i:130;s:11:"Inconsolata";i:131;s:12:"Indie Flower";i:132;s:12:"Irish Grover";i:133;s:9:"Istok Web";i:134;s:10:"Jockey One";i:135;s:12:"Josefin Sans";i:136;s:12:"Josefin Slab";i:137;s:6:"Judson";i:138;s:5:"Julee";i:139;s:4:"Jura";i:140;s:17:"Just Another Hand";i:141;s:23:"Just Me Again Down Here";i:142;s:7:"Kameron";i:143;s:10:"Kelly Slab";i:144;s:5:"Kenia";i:145;s:7:"Knewave";i:146;s:6:"Kranky";i:147;s:5:"Kreon";i:148;s:6:"Kristi";i:149;s:15:"La Belle Aurore";i:150;s:8:"Lancelot";i:151;s:4:"Lato";i:152;s:13:"League Script";i:153;s:12:"Leckerli One";i:154;s:6:"Lekton";i:155;s:5:"Lemon";i:156;s:9:"Limelight";i:157;s:11:"Linden Hill";i:158;s:11:"Lobster Two";i:159;s:7:"Lobster";i:160;s:4:"Lora";i:161;s:21:"Love Ya Like A Sister";i:162;s:17:"Loved by the King";i:163;s:12:"Luckiest Guy";i:164;s:13:"Maiden Orange";i:165;s:4:"Mako";i:166;s:12:"Marck Script";i:167;s:6:"Marvel";i:168;s:7:"Mate SC";i:169;s:4:"Mate";i:170;s:9:"Maven Pro";i:171;s:6:"Meddon";i:172;s:13:"MedievalSharp";i:173;s:6:"Megrim";i:174;s:12:"Merienda One";i:175;s:12:"Merriweather";i:176;s:11:"Metrophobic";i:177;s:8:"Michroma";i:178;s:16:"Miltonian Tattoo";i:179;s:9:"Miltonian";i:180;s:14:"Miss Fajardose";i:181;s:20:"Miss Saint Delafield";i:182;s:14:"Modern Antiqua";i:183;s:7:"Molengo";i:184;s:8:"Monofett";i:185;s:7:"Monoton";i:186;s:20:"Monsieur La Doulaise";i:187;s:6:"Montez";i:188;s:22:"Mountains of Christmas";i:189;s:10:"Mr Bedford";i:190;s:8:"Mr Dafoe";i:191;s:14:"Mr De Haviland";i:192;s:13:"Mrs Sheppards";i:193;s:4:"Muli";i:194;s:6:"Neucha";i:195;s:6:"Neuton";i:196;s:10:"News Cycle";i:197;s:7:"Niconne";i:198;s:9:"Nixie One";i:199;s:6:"Nobile";i:200;s:12:"Nosifer Caps";i:201;s:20:"Nothing You Could Do";i:202;s:8:"Nova Cut";i:203;s:9:"Nova Flat";i:204;s:9:"Nova Mono";i:205;s:9:"Nova Oval";i:206;s:10:"Nova Round";i:207;s:11:"Nova Script";i:208;s:9:"Nova Slim";i:209;s:11:"Nova Square";i:210;s:6:"Numans";i:211;s:6:"Nunito";i:212;s:15:"Old Standard TT";i:213;s:19:"Open Sans Condensed";i:214;s:9:"Open Sans";i:215;s:8:"Orbitron";i:216;s:6:"Oswald";i:217;s:16:"Over the Rainbow";i:218;s:3:"Ovo";i:219;s:15:"PT Sans Caption";i:220;s:14:"PT Sans Narrow";i:221;s:7:"PT Sans";i:222;s:16:"PT Serif Caption";i:223;s:8:"PT Serif";i:224;s:8:"Pacifico";i:225;s:11:"Passero One";i:226;s:12:"Patrick Hand";i:227;s:11:"Paytone One";i:228;s:16:"Permanent Marker";i:229;s:7:"Petrona";i:230;s:11:"Philosopher";i:231;s:6:"Piedra";i:232;s:13:"Pinyon Script";i:233;s:4:"Play";i:234;s:16:"Playfair Display";i:235;s:7:"Podkova";i:236;s:10:"Poller One";i:237;s:4:"Poly";i:238;s:8:"Pompiere";i:239;s:5:"Prata";i:240;s:8:"Prociono";i:241;s:7:"Puritan";i:242;s:17:"Quattrocento Sans";i:243;s:12:"Quattrocento";i:244;s:9:"Questrial";i:245;s:9:"Quicksand";i:246;s:6:"Radley";i:247;s:7:"Raleway";i:248;s:12:"Rammetto One";i:249;s:6:"Rancho";i:250;s:9:"Rationale";i:251;s:9:"Redressed";i:252;s:13:"Reenie Beanie";i:253;s:13:"Ribeye Marrow";i:254;s:6:"Ribeye";i:255;s:9:"Righteous";i:256;s:9:"Rochester";i:257;s:9:"Rock Salt";i:258;s:7:"Rokkitt";i:259;s:7:"Rosario";i:260;s:14:"Ruslan Display";i:261;s:5:"Salsa";i:262;s:8:"Sancreek";i:263;s:11:"Sansita One";i:264;s:7:"Satisfy";i:265;s:10:"Schoolbell";i:266;s:18:"Shadows Into Light";i:267;s:6:"Shanti";i:268;s:11:"Short Stack";i:269;s:10:"Sigmar One";i:270;s:16:"Signika Negative";i:271;s:7:"Signika";i:272;s:8:"Six Caps";i:273;s:7:"Slackey";i:274;s:6:"Smokum";i:275;s:6:"Smythe";i:276;s:7:"Sniglet";i:277;s:7:"Snippet";i:278;s:16:"Sorts Mill Goudy";i:279;s:13:"Special Elite";i:280;s:9:"Spinnaker";i:281;s:6:"Spirax";i:282;s:15:"Stardos Stencil";i:283;s:19:"Sue Ellen Francisco";i:284;s:9:"Sunshiney";i:285;s:16:"Supermercado One";i:286;s:18:"Swanky and Moo Moo";i:287;s:9:"Syncopate";i:288;s:9:"Tangerine";i:289;s:10:"Tenor Sans";i:290;s:14:"Terminal Dosis";i:291;s:18:"The Girl Next Door";i:292;s:6:"Tienne";i:293;s:5:"Tinos";i:294;s:10:"Tulpen One";i:295;s:16:"Ubuntu Condensed";i:296;s:11:"Ubuntu Mono";i:297;s:6:"Ubuntu";i:298;s:5:"Ultra";i:299;s:14:"UnifrakturCook";i:300;s:18:"UnifrakturMaguntia";i:301;s:7:"Unkempt";i:302;s:6:"Unlock";i:303;s:4:"Unna";i:304;s:5:"VT323";i:305;s:12:"Varela Round";i:306;s:6:"Varela";i:307;s:11:"Vast Shadow";i:308;s:5:"Vibur";i:309;s:8:"Vidaloka";i:310;s:7:"Volkhov";i:311;s:8:"Vollkorn";i:312;s:8:"Voltaire";i:313;s:23:"Waiting for the Sunrise";i:314;s:8:"Wallpoet";i:315;s:15:"Walter Turncoat";i:316;s:8:"Wire One";i:317;s:17:"Yanone Kaffeesatz";i:318;s:10:"Yellowtail";i:319;s:10:"Yeseva One";i:320;s:6:"Zeyada";i:321;s:10:"Montserrat";i:322;s:7:"Poppins";i:323;s:6:"Martel";}';
$wd_fonts_array = unserialize($fontsSeraliazed);

vc_remove_element('vc_empty_space');

$vc_add_css_animation = array(
    'type' => 'dropdown',
    'heading' => esc_html__('CSS Animation', 'compactor'),
    'param_name' => 'css_animation',
    'admin_label' => true,
    'value' => array(
        esc_html__('No', 'compactor') => '',
        esc_html__('Bounce In', 'compactor') => 'bounceIn',
        esc_html__('Bounce In Down', 'compactor') => 'bounceInDown',
        esc_html__('Bounce In Left', 'compactor') => 'bounceInLeft',
        esc_html__('Bounce In Right', 'compactor') => 'bounceInRight',
        esc_html__('Bounce In Up', 'compactor') => 'bounceInUp',
        esc_html__('Fade In', 'compactor') => 'fadeIn',
        esc_html__('Fade In Down', 'compactor') => 'fadeInDown',
        esc_html__('Fade In Down Big', 'compactor') => 'fadeInDownBig',
        esc_html__('Fade In Left', 'compactor') => 'fadeInLeft',
        esc_html__('Fade In Left Big', 'compactor') => 'fadeInLeftBig',
        esc_html__('Fade In Right', 'compactor') => 'fadeInRight',
        esc_html__('Fade In Right Big', 'compactor') => 'fadeInRightBig',
        esc_html__('Fade In Up', 'compactor') => 'fadeInUp',
        esc_html__('Fade In Up Big', 'compactor') => 'fadeInUpBig',
        esc_html__('Flip', 'compactor') => 'flip',
        esc_html__('Flip In X', 'compactor') => 'flipInX',
        esc_html__('Flip In Y', 'compactor') => 'flipInY',
        esc_html__('Flip Out X', 'compactor') => 'flipOutX',
        esc_html__('Flip Out Y', 'compactor') => 'flipOutY',
        esc_html__('Light Speed In', 'compactor') => 'lightSpeedIn',
        esc_html__('Light Speed Out', 'compactor') => 'lightSpeedOut',
        esc_html__('Rotate In', 'compactor') => 'rotateIn',
        esc_html__('Rotate In Down Left', 'compactor') => 'rotateInDownLeft',
        esc_html__('Rotate In Down Right', 'compactor') => 'rotateInDownRight',
        esc_html__('Rotate In Up Left', 'compactor') => 'rotateInUpLeft',
        esc_html__('Rotate In Up Right', 'compactor') => 'rotateInUpRight',
        esc_html__('Slide In Up', 'compactor') => 'slideInUp',
        esc_html__('Slide In Down', 'compactor') => 'slideInDown',
        esc_html__('Slide In Left', 'compactor') => 'slideInLeft',
        esc_html__('Slide In Right', 'compactor') => 'slideInRight',
        esc_html__('Zoom In ', 'compactor') => 'zoomIn',
        esc_html__('Zoom In Down', 'compactor') => 'zoomInDown',
        esc_html__('Zoom In Left', 'compactor') => 'zoomInLeft',
        esc_html__('Zoom In Right', 'compactor') => 'zoomInRight',
        esc_html__('Zoom In Up', 'compactor') => 'zoomInUp',
        esc_html__('Roll In', 'compactor') => 'rollIn',
    ),
    'description' => esc_html__('Select type of animation for element to be animated when it "enters" the browsers viewport (Note: works only in modern browsers).', 'compactor')
);


get_template_part('inc/vcomposer/vc_elements/wd_headings');
get_template_part('inc/vcomposer/vc_elements/wd_empty_spaces');
get_template_part('inc/vcomposer/vc_elements/wd_text_icon');
get_template_part('inc/vcomposer/vc_elements/wd_pricing_table');
get_template_part('inc/vcomposer/vc_elements/vc_tabs');
get_template_part('inc/vcomposer/vc_elements/vc_row');
get_template_part('inc/vcomposer/vc_elements/vc_column');
get_template_part('inc/vcomposer/vc_elements/wd_clients');
get_template_part('inc/vcomposer/vc_elements/wd_blog');
get_template_part('inc/vcomposer/vc_elements/wd_vc_portfolio');
get_template_part('inc/vcomposer/vc_elements/wd_progress_bars');
get_template_part('inc/vcomposer/vc_elements/wd_count_up');
get_template_part('inc/vcomposer/vc_elements/wd_team');
get_template_part('inc/vcomposer/vc_elements/wd_testimonial');
get_template_part('inc/vcomposer/vc_elements/wd-maps');
get_template_part('inc/vcomposer/vc_elements/wd-models');
get_template_part('inc/vcomposer/vc_elements/wd-button');
get_template_part('inc/vcomposer/vc_elements/wd_svg-code');
get_template_part('inc/vcomposer/vc_elements/vc_video');
get_template_part('inc/vcomposer/vc_elements/wd_advanced_search');
get_template_part('inc/vcomposer/vc_elements/wd-banner');
get_template_part('inc/vcomposer/vc_elements/wd-case-studies');
get_template_part('inc/vcomposer/vc_elements/pricingtable');


// This function provides a functionality of adding content elements into element
class WPBakeryShortCode_SC_Slide extends WPBakeryShortCodesContainer
{
}


function compactor_editor_border_radius_options_data()
{
    $options = array(
        '' => __('None', 'compactor'),
        '1px' => '1px',
        '2px' => '2px',
        '3px' => '3px',
        '4px' => '4px',
        '5px' => '5px',
        '10px' => '10px',
        '15px' => '15px',
        '20px' => '20px',
        '25px' => '25px',
        '30px' => '30px',
        '32px' => '32px',
        '35px' => '35px',
    );
    return $options;
}

add_filter('vc_css_editor_border_radius_options_data', 'compactor_editor_border_radius_options_data');


function wdevia_vc_add_animation_param($shortcode = "vc_row")
{


    vc_add_params($shortcode, array(    //Animation Options

        array(
            'type' => 'checkbox',
            'param_name' => 'use_mask',
            'heading' => esc_html__('Enabled mask?', 'compactor'),
            'description' => esc_html__('Check to enable mask on title to use it in animation', 'compactor'),
            'dependency' => array(
                'element' => 'enable_content_animation',
                'value' => 'yes',
            ),
            'group' => esc_html__('Animation', 'compactor'),
        ),
        array(
            'type' => 'textfield',
            'param_name' => 'duration',
            'heading' => esc_html__('Duration', 'compactor'),
            'description' => esc_html__('Add duration of the animation in milliseconds', 'compactor'),
            'dependency' => array(
                'element' => 'enable_content_animation',
                'value' => 'yes',
            ),
            'edit_field_class' => 'vc_col-sm-4 vc_column-with-padding',
            'group' => esc_html__('Animation', 'compactor'),
        ),
        array(
            'type' => 'textfield',
            'param_name' => 'start_delay',
            'heading' => esc_html__('Start Delay', 'compactor'),
            'description' => esc_html__('Add start delay of the animation in milliseconds', 'compactor'),
            'dependency' => array(
                'element' => 'enable_content_animation',
                'value' => 'yes',
            ),
            'edit_field_class' => 'vc_col-sm-4',
            'group' => esc_html__('Animation', 'compactor'),
        ),
        array(
            'type' => 'textfield',
            'param_name' => 'delay',
            'heading' => esc_html__('Delay', 'compactor'),
            'description' => esc_html__('Add delay of the animation between of the animated elements in milliseconds', 'compactor'),
            'dependency' => array(
                'element' => 'enable_content_animation',
                'value' => 'yes',
            ),
            'edit_field_class' => 'vc_col-sm-4',
            'group' => esc_html__('Animation', 'compactor'),
        ),
        array(
            'type' => 'dropdown',
            'param_name' => 'easing',
            'heading' => esc_html__('Easing', 'compactor'),
            'description' => esc_html__('Select an easing type', 'compactor'),
            'value' => array(
                "Power 0 - easeNone" => "Power0.easeNone",
                "Power 1 - easeIn" => "Power1.easeIn",
                "Power 1 - easeInOut" => "Power1.easeInOut",
                "Power 1 - easeOut" => "Power1.easeOut",
                "Power 2 - easeIn" => "Power3.easeIn",
                "Power 2 - easeInOut" => "Power3.easeInOut",
                "Power 2 - easeOut" => "Power3.easeOut",
                "Power 3 - easeIn" => "Power4.easeIn",
                "Power 3 - easeInOut" => "Power4.easeInOut",
                "Power 3 - easeOut" => "Power4.easeOut",
                "Back - easeIn" => "Back.easeOut.config(1.7)",
                "Back - easeInOut" => "Back.easeOut.config(1.7)",
                "Back - easeOut" => "Back.easeOut.config(1.7)",
                "Elastic - easeIn" => "Elastic.easeOut.config(1,0.5)",
                "Elastic - easeInOut" => "Elastic.easeOut.config(1,0.5)",
                "Elastic - easeOut" => " Elastic.easeOut.config(1,0.5)",
                "Bounce - easeIn" => "Bounce.easeOut",
                "Bounce - easeInOut" => "Bounce.easeOut",
                "Bounce - easeOut" => "Bounce.easeOut",
                "SlowMo - ease" => "Back.ease.config(0.7,0.7,false)",
            ),
            'std' => 'easeOutQuint',
            'dependency' => array(
                'element' => 'enable_content_animation',
                'value' => 'yes',
            ),
            'edit_field_class' => 'vc_col-sm-6',
            'group' => esc_html__('Animation', 'compactor'),
        ),
        array(
            'type' => 'subheading',
            'param_name' => 'ca_init_values',
            'heading' => esc_html__('Animate From', 'compactor'),
            'group' => esc_html__('Animation', 'compactor'),
            'dependency' => array(
                'element' => 'enable_content_animation',
                'value' => 'yes',
            ),
        ),
        array(
            'type' => 'textfield',
            'param_name' => 'ca_init_translate_x',
            'heading' => esc_html__('Translate X', 'compactor'),
            'description' => esc_html__('Select translate on X axe', 'compactor'),
            'group' => esc_html__('Animation', 'compactor'),
            'edit_field_class' => 'vc_col-sm-4',
            'dependency' => array(
                'element' => 'enable_content_animation',
                'value' => 'yes',
            ),

        ),
        array(
            'type' => 'textfield',
            'param_name' => 'ca_init_translate_y',
            'heading' => esc_html__('Translate Y', 'compactor'),
            'description' => esc_html__('Select translate on Y axe', 'compactor'),
            'group' => esc_html__('Animation', 'compactor'),
            'edit_field_class' => 'vc_col-sm-4',
            'dependency' => array(
                'element' => 'enable_content_animation',
                'value' => 'yes',
            ),
        ),
        array(
            'type' => 'textfield',
            'param_name' => 'ca_init_translate_z',
            'heading' => esc_html__('Translate Z', 'compactor'),
            'description' => esc_html__('Select translate on Z axe', 'compactor'),
            'group' => esc_html__('Animation', 'compactor'),
            'edit_field_class' => 'vc_col-sm-4',
            'dependency' => array(
                'element' => 'enable_content_animation',
                'value' => 'yes',
            ),

        ),
        array(
            'type' => 'textfield',
            'param_name' => 'ca_init_scale_x',
            'heading' => esc_html__('Scale X', 'compactor'),
            'description' => esc_html__('Select Scale X', 'compactor'),
            'group' => esc_html__('Animation', 'compactor'),
            'edit_field_class' => 'vc_col-sm-4',
            'dependency' => array(
                'element' => 'enable_content_animation',
                'value' => 'yes',
            ),

        ),
        array(
            'type' => 'textfield',
            'param_name' => 'ca_init_scale_y',
            'heading' => esc_html__('Scale Y', 'compactor'),
            'description' => esc_html__('Select Scale Y', 'compactor'),
            'group' => esc_html__('Animation', 'compactor'),
            'dependency' => array(
                'element' => 'enable_content_animation',
                'value' => 'yes',
            ),
            'edit_field_class' => 'vc_col-sm-4',
        ),
        array(
            'type' => 'textfield',
            'param_name' => 'ca_init_scale_z',
            'heading' => esc_html__('Scale Z', 'compactor'),
            'description' => esc_html__('Select Scale Z', 'compactor'),
            'group' => esc_html__('Animation', 'compactor'),
            'dependency' => array(
                'element' => 'enable_content_animation',
                'value' => 'yes',
            ),
            'edit_field_class' => 'vc_col-sm-4',
        ),
        array(
            'type' => 'textfield',
            'param_name' => 'ca_init_rotate_x',
            'heading' => esc_html__('Rotate X', 'compactor'),
            'description' => esc_html__('Select rotate degree on X axe', 'compactor'),
            'group' => esc_html__('Animation', 'compactor'),
            'edit_field_class' => 'vc_col-sm-4',
            'dependency' => array(
                'element' => 'enable_content_animation',
                'value' => 'yes',
            ),

        ),
        array(
            'type' => 'textfield',
            'param_name' => 'ca_init_rotate_y',
            'heading' => esc_html__('Rotate Y', 'compactor'),
            'description' => esc_html__('Select rotate degree on Y axe', 'compactor'),
            'group' => esc_html__('Animation', 'compactor'),
            'edit_field_class' => 'vc_col-sm-4',
            'dependency' => array(
                'element' => 'enable_content_animation',
                'value' => 'yes',
            ),

        ),
        array(
            'type' => 'textfield',
            'param_name' => 'ca_init_rotate_z',
            'heading' => esc_html__('Rotate Z', 'compactor'),
            'description' => esc_html__('Select rotate degree on Z axe', 'compactor'),
            'group' => esc_html__('Animation', 'compactor'),
            'edit_field_class' => 'vc_col-sm-4',
            'dependency' => array(
                'element' => 'enable_content_animation',
                'value' => 'yes',
            ),

        ),
        array(
            'type' => 'textfield',
            'param_name' => 'ca_init_opacity',
            'heading' => esc_html__('Opacity', 'compactor'),
            'description' => esc_html__('Set opacity', 'compactor'),
            'group' => esc_html__('Animation', 'compactor'),
            'dependency' => array(
                'element' => 'enable_content_animation',
                'value' => 'yes',
            ),

        ),

        //Animation Values
        array(
            'type' => 'subheading',
            'param_name' => 'ca_animations_values',
            'heading' => esc_html__('Animate To', 'compactor'),
            'group' => esc_html__('Animation', 'compactor'),
            'dependency' => array(
                'element' => 'enable_content_animation',
                'value' => 'yes',
            ),
        ),
        array(
            'type' => 'textfield',
            'param_name' => 'ca_an_translate_x',
            'heading' => esc_html__('Translate X', 'compactor'),
            'description' => esc_html__('Select translate on X axe', 'compactor'),
            'min' => -500,
            'max' => 500,
            'step' => 1,
            'group' => esc_html__('Animation', 'compactor'),
            'dependency' => array(
                'element' => 'enable_content_animation',
                'value' => 'yes',
            ),
            'edit_field_class' => 'vc_col-sm-4',
        ),
        array(
            'type' => 'textfield',
            'param_name' => 'ca_an_translate_y',
            'heading' => esc_html__('Translate Y', 'compactor'),
            'description' => esc_html__('Select translate on Y axe', 'compactor'),
            'group' => esc_html__('Animation', 'compactor'),
            'dependency' => array(
                'element' => 'enable_content_animation',
                'value' => 'yes',
            ),
            'edit_field_class' => 'vc_col-sm-4',
        ),
        array(
            'type' => 'textfield',
            'param_name' => 'ca_an_translate_z',
            'heading' => esc_html__('Translate Z', 'compactor'),
            'description' => esc_html__('Select translate on Z axe', 'compactor'),
            'group' => esc_html__('Animation', 'compactor'),
            'dependency' => array(
                'element' => 'enable_content_animation',
                'value' => 'yes',
            ),
            'edit_field_class' => 'vc_col-sm-4',
        ),
        array(
            'type' => 'textfield',
            'param_name' => 'ca_an_scale_x',
            'heading' => esc_html__('Scale X', 'compactor'),
            'description' => esc_html__('Select Scale X', 'compactor'),
            'group' => esc_html__('Animation', 'compactor'),
            'dependency' => array(
                'element' => 'enable_content_animation',
                'value' => 'yes',
            ),
            'edit_field_class' => 'vc_col-sm-4',

        ),
        array(
            'type' => 'textfield',
            'param_name' => 'ca_an_scale_y',
            'heading' => esc_html__('Scale Y', 'compactor'),
            'description' => esc_html__('Select Scale Y', 'compactor'),
            'group' => esc_html__('Animation', 'compactor'),
            'dependency' => array(
                'element' => 'enable_content_animation',
                'value' => 'yes',
            ),
            'edit_field_class' => 'vc_col-sm-4',
        ),
        array(
            'type' => 'textfield',
            'param_name' => 'ca_an_scale_z',
            'heading' => esc_html__('Scale Z', 'compactor'),
            'description' => esc_html__('Select Scale Z', 'compactor'),
            'group' => esc_html__('Animation', 'compactor'),
            'dependency' => array(
                'element' => 'enable_content_animation',
                'value' => 'yes',
            ),
            'edit_field_class' => 'vc_col-sm-4',
        ),
        array(
            'type' => 'textfield',
            'param_name' => 'ca_an_rotate_x',
            'heading' => esc_html__('Rotate X', 'compactor'),
            'description' => esc_html__('Select rotate degree on X axe', 'compactor'),
            'group' => esc_html__('Animation', 'compactor'),
            'dependency' => array(
                'element' => 'enable_content_animation',
                'value' => 'yes',
            ),
            'edit_field_class' => 'vc_col-sm-4',
        ),
        array(
            'type' => 'textfield',
            'param_name' => 'ca_an_rotate_y',
            'heading' => esc_html__('Rotate Y', 'compactor'),
            'description' => esc_html__('Select rotate degree on Y axe', 'compactor'),
            'group' => esc_html__('Animation', 'compactor'),
            'dependency' => array(
                'element' => 'enable_content_animation',
                'value' => 'yes',
            ),
            'edit_field_class' => 'vc_col-sm-4',
        ),
        array(
            'type' => 'textfield',
            'param_name' => 'ca_an_rotate_z',
            'heading' => esc_html__('Rotate Z', 'compactor'),
            'description' => esc_html__('Select rotate degree on Z axe', 'compactor'),
            'group' => esc_html__('Animation', 'compactor'),
            'dependency' => array(
                'element' => 'enable_content_animation',
                'value' => 'yes',
            ),
            'edit_field_class' => 'vc_col-sm-4',
        ),
        array(
            'type' => 'textfield',
            'param_name' => 'ca_an_opacity',
            'heading' => esc_html__('Opacity', 'compactor'),
            'description' => esc_html__('Set opacity', 'compactor'),
            'group' => esc_html__('Animation', 'compactor'),
            'dependency' => array(
                'element' => 'enable_content_animation',
                'value' => 'yes',
            ),
        ),
    ));
}

function wdevia_get_animation_options($atts)
{

    extract($atts);

    $opts = $init_values = $animations_values = $arr = array();

    $opts['triggerHandler'] = 'inview';
    $opts['animationTarget'] = '.wpb_column';

    $opts['duration'] = !empty($duration) ? $duration : 700;

    $opts['delay'] = !empty($delay) ? $delay : 100;


    //Init values
    if (!empty($ca_init_translate_x)) {
        $init_values['x'] = ( int )$ca_init_translate_x;
    }
    if (!empty($ca_init_translate_y)) {
        $init_values['y'] = ( int )$ca_init_translate_y;
    }
    if (!empty($ca_init_translate_z)) {
        $init_values['z'] = ( int )$ca_init_translate_z;
    }

    if (isset($ca_init_scale_x) && !empty($ca_init_scale_x) && '1' !== $ca_init_scale_x) {
        $init_values['scaleX'] = ( float )$ca_init_scale_x;
    }
    if (isset($ca_init_scale_y) && !empty($ca_init_scale_y) && '1' !== $ca_init_scale_y) {
        $init_values['scaleY'] = ( float )$ca_init_scale_y;
    }
    if (isset($ca_init_scale_z) && !empty($ca_init_scale_z) && '1' !== $ca_init_scale_z) {
        $init_values['scaleZ'] = ( float )$ca_init_scale_z;
    }

    if (!empty($ca_init_rotate_x)) {
        $init_values['rotateX'] = ( int )$ca_init_rotate_x;
    }
    if (!empty($ca_init_rotate_y)) {
        $init_values['rotateY'] = ( int )$ca_init_rotate_y;
    }
    if (!empty($ca_init_rotate_z)) {
        $init_values['rotateZ'] = ( int )$ca_init_rotate_z;
    }

    if (isset($ca_init_opacity) && '1' !== $ca_init_opacity) {
        $init_values['opacity'] = ( float )$ca_init_opacity;
    }


    //Animation values
    if (!empty($ca_init_translate_x)) {
        $animations_values['x'] = ( int )$ca_an_translate_x;
    }
    if (!empty($ca_init_translate_y)) {
        $animations_values['y'] = ( int )$ca_an_translate_y;
    }
    if (!empty($ca_init_translate_z)) {
        $animations_values['z'] = ( int )$ca_an_translate_z;
    }

    if (isset($ca_an_scale_x) && !empty($ca_init_scale_x) && '1' !== $ca_init_scale_x) {
        $animations_values['scaleX'] = ( float )$ca_an_scale_x;
    }
    if (isset($ca_an_scale_y) && !empty($ca_init_scale_y) && '1' !== $ca_init_scale_y) {
        $animations_values['scaleY'] = ( float )$ca_an_scale_y;
    }
    if (isset($ca_an_scale_z) && !empty($ca_init_scale_z) && '1' !== $ca_init_scale_z) {
        $animations_values['scaleZ'] = ( float )$ca_an_scale_z;
    }

    if (!empty($ca_init_rotate_x)) {
        $animations_values['rotateX'] = ( int )$ca_an_rotate_x;
    }
    if (!empty($ca_init_rotate_y)) {
        $animations_values['rotateY'] = ( int )$ca_an_rotate_y;
    }
    if (!empty($ca_init_rotate_z)) {
        $animations_values['rotateZ'] = ( int )$ca_an_rotate_z;
    }

    if (isset($ca_an_opacity) && '1' !== $ca_init_opacity) {
        $animations_values['opacity'] = ( float )$ca_an_opacity;
    }


    if (isset($start_delay)) {
        $animations_values['delay'] = ( float )$start_delay;
    }
    if (isset($easing)) {
        $animations_values['ease'] = $easing;
    }

    $opts['initValues'] = !empty($init_values) ? $init_values : array();
    $opts['animations'] = !empty($animations_values) ? $animations_values : array();


    return $opts;
}