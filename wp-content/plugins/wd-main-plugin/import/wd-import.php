<?php
if (!function_exists ('add_action')) {
  header('Status: 403 Forbidden');
  header('HTTP/1.1 403 Forbidden');
  exit();
}


/**
 * Register styles and scripts
 */

function compactor_admin_scripts_init() {

  wp_register_script('bootstrap.min', get_template_directory_uri().'/js/bootstrap.min.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-widget', 'jquery-ui-mouse', 'jquery-ui-tabs', 'jquery-ui-droppable', 'jquery-ui-sortable' ) , false , false );

}
add_action('admin_init', 'compactor_admin_scripts_init');


class compactor_Import {

  public $message = "";
  public $attachments = false;


  function init_compactor_import() {
    if(isset($_REQUEST['import_option'])) {
      $import_option = $_REQUEST['import_option'];
      if($import_option == 'content'){
      }elseif($import_option == 'custom_sidebars') {
        $this->import_custom_sidebars('custom_sidebars.txt');
      } elseif($import_option == 'widgets') {
        $this->import_widgets('widgets.txt');
      } elseif($import_option == 'options'){
        $this->import_options('options.txt');
      }elseif($import_option == 'menus'){
        $this->import_menus('menus.txt');
      }elseif($import_option == 'settingpages'){
        $this->import_settings_pages('settingpages.txt');
      }elseif($import_option == 'complete_content'){
        $this->import_options('options.txt');
        $this->import_widgets('widgets.txt');
        $this->import_menus('menus.txt');
        $this->import_settings_pages('settingpages.txt');
        $this->message = esc_html__("Content imported successfully", "webdevia");
      }
    }
  }

  public function compactor_import_content($file){
    ob_start();
    if (!class_exists('WP_Importer')) {
      $class_wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';
      require_once($class_wp_importer);
    }
    if (!class_exists('WP_Import')) {
      require_once(plugin_dir_path( __FILE__ ) . '/class.wordpress-importer.php');
    }
    $compactor_import = new WP_Import();
    set_time_limit(0);
    $path = plugin_dir_path( __FILE__ ) . '/files/' . $file;
    if(!file_exists($path)) {
      echo 'error';
      wp_send_json_error(esc_html__("Content file not found", "webdevia"));
    }

    print $path;
    $compactor_import->fetch_attachments = $this->attachments;
    $returned_value = $compactor_import->import($path);
    if(is_wp_error($returned_value)){
      $this->message = esc_html__("An Error Occurred During Import", "webdevia");
      echo 'error';
      wp_send_json_error(esc_html__("An Error Occurred During Content Import", "webdevia"));
    }
    else {
      $this->message = esc_html__("Content imported successfully", "webdevia");
    }
    ob_get_clean();
  }

  public function compactor_available_widgets() {

    global $wp_registered_widget_controls;

    $widget_controls = $wp_registered_widget_controls;

    $available_widgets = array();

    foreach ( $widget_controls as $widget ) {

      if ( ! empty( $widget['id_base'] ) && ! isset( $available_widgets[$widget['id_base']] ) ) { // no dupes

        $available_widgets[$widget['id_base']]['id_base'] = $widget['id_base'];
        $available_widgets[$widget['id_base']]['name'] = $widget['name'];

      }

    }

    return apply_filters( 'wie_available_widgets', $available_widgets );

  }

  public function import_widgets($file){

    if(!file_exists(dirname(__FILE__) . $file)) {
      echo 'error';
      wp_send_json_error(esc_html__("Widgets file not found", "webdevia"));
    } else {
      $myfile = fopen( dirname(__FILE__) . $file, "r" ) or die( "Unable to open file!" );
      $data = fread( $myfile, filesize( dirname(__FILE__) . $file ) );
      fclose( $myfile );
    }

    /*
    $data = file_get_contents( "./demo-files/widgets.txt", FILE_USE_INCLUDE_PATH );
    $data = json_decode( $data );

    // Delete import file
    unlink( $file );*/

    $data = json_decode( $data );



    global $wp_registered_sidebars;

    // Have valid data?
    // If no data or could not decode
    if ( empty( $data ) || ! is_object( $data ) ) {
      echo 'error';
      wp_send_json_error(esc_html__( "Widgets import data file could not be read or is empty.", 'webdevia' ));
      wp_die(
        __( 'Import data could not be read. Please try a different file.', 'webdevia' ),
        '',
        array( 'back_link' => true )
      );
    }

    // Hook before import
    do_action( 'wie_before_import' );
    $data = apply_filters( 'import_widgets', $data );

    // Get all available widgets site supports
    $available_widgets = $this->compactor_available_widgets();

    // Get all existing widget instances
    $widget_instances = array();
    foreach ( $available_widgets as $widget_data ) {
      $widget_instances[$widget_data['id_base']] = get_option( 'widget_' . $widget_data['id_base'] );
    }

    // Begin results
    $results = array();

    // Loop import data's sidebars
    foreach ( $data as $sidebar_id => $widgets ) {

      // Skip inactive widgets
      // (should not be in export file)
      if ( 'wp_inactive_widgets' == $sidebar_id ) {
        continue;
      }

      // Check if sidebar is available on this site
      // Otherwise add widgets to inactive, and say so
      if ( isset( $wp_registered_sidebars[$sidebar_id] ) ) {
        $sidebar_available = true;
        $use_sidebar_id = $sidebar_id;
        $sidebar_message_type = 'success';
        $sidebar_message = '';
      } else {
        $sidebar_available = false;
        $use_sidebar_id = 'wp_inactive_widgets'; // add to inactive if sidebar does not exist in theme
        $sidebar_message_type = 'error';
        $sidebar_message = __( 'Sidebar does not exist in theme (using Inactive)', 'widget-importer-exporter' );
      }

      // Result for sidebar
      $results[$sidebar_id]['name'] = ! empty( $wp_registered_sidebars[$sidebar_id]['name'] ) ? $wp_registered_sidebars[$sidebar_id]['name'] : $sidebar_id; // sidebar name if theme supports it; otherwise ID
      $results[$sidebar_id]['message_type'] = $sidebar_message_type;
      $results[$sidebar_id]['message'] = $sidebar_message;
      $results[$sidebar_id]['widgets'] = array();

      // Loop widgets
      foreach ( $widgets as $widget_instance_id => $widget ) {

        echo $sidebar_id .' - '. $widget_instance_id;

        $fail = false;

        // Get id_base (remove -# from end) and instance ID number
        $id_base = preg_replace( '/-[0-9]+$/', '', $widget_instance_id );
        $instance_id_number = str_replace( $id_base . '-', '', $widget_instance_id );

        // Does site support this widget?
        if ( ! $fail && ! isset( $available_widgets[$id_base] ) ) {
          $fail = true;
          $widget_message_type = 'error';
          $widget_message = __( 'Site does not support widget', 'widget-importer-exporter' ); // explain why widget not imported
        }

        // Filter to modify settings object before conversion to array and import
        // Leave this filter here for backwards compatibility with manipulating objects (before conversion to array below)
        // Ideally the newer wie_widget_settings_array below will be used instead of this
        $widget = apply_filters( 'wie_widget_settings', $widget ); // object

        // Convert multidimensional objects to multidimensional arrays
        // Some plugins like Jetpack Widget Visibility store settings as multidimensional arrays
        // Without this, they are imported as objects and cause fatal error on Widgets page
        // If this creates problems for plugins that do actually intend settings in objects then may need to consider other approach: https://wordpress.org/support/topic/problem-with-array-of-arrays
        // It is probably much more likely that arrays are used than objects, however
        $widget = json_decode( json_encode( $widget ), true );

        // Filter to modify settings array
        // This is preferred over the older wie_widget_settings filter above
        // Do before identical check because changes may make it identical to end result (such as URL replacements)
        $widget = apply_filters( 'wie_widget_settings_array', $widget );

        // Does widget with identical settings already exist in same sidebar?
        if ( ! $fail && isset( $widget_instances[$id_base] ) ) {

          // Get existing widgets in this sidebar
          $sidebars_widgets = get_option( 'sidebars_widgets' );
          $sidebar_widgets = isset( $sidebars_widgets[$use_sidebar_id] ) ? $sidebars_widgets[$use_sidebar_id] : array(); // check Inactive if that's where will go

          // Loop widgets with ID base
          $single_widget_instances = ! empty( $widget_instances[$id_base] ) ? $widget_instances[$id_base] : array();
          foreach ( $single_widget_instances as $check_id => $check_widget ) {

            // Is widget in same sidebar and has identical settings?
            if ( in_array( "$id_base-$check_id", $sidebar_widgets ) && (array) $widget == $check_widget ) {

              $fail = true;
              $widget_message_type = 'warning';
              $widget_message = __( 'Widget already exists', 'widget-importer-exporter' ); // explain why widget not imported

              break;

            }

          }

        }

        // No failure
        if ( ! $fail ) {

          // Add widget instance
          $single_widget_instances = get_option( 'widget_' . $id_base ); // all instances for that widget ID base, get fresh every time
          $single_widget_instances = ! empty( $single_widget_instances ) ? $single_widget_instances : array( '_multiwidget' => 1 ); // start fresh if have to
          $single_widget_instances[] = $widget; // add it

          // Get the key it was given
          end( $single_widget_instances );
          $new_instance_id_number = key( $single_widget_instances );

          // If key is 0, make it 1
          // When 0, an issue can occur where adding a widget causes data from other widget to load, and the widget doesn't stick (reload wipes it)
          if ( '0' === strval( $new_instance_id_number ) ) {
            $new_instance_id_number = 1;
            $single_widget_instances[$new_instance_id_number] = $single_widget_instances[0];
            unset( $single_widget_instances[0] );
          }

          // Move _multiwidget to end of array for uniformity
          if ( isset( $single_widget_instances['_multiwidget'] ) ) {
            $multiwidget = $single_widget_instances['_multiwidget'];
            unset( $single_widget_instances['_multiwidget'] );
            $single_widget_instances['_multiwidget'] = $multiwidget;
          }

          // Update option with new widget
          update_option( 'widget_' . $id_base, $single_widget_instances );

          // Assign widget instance to sidebar
          $sidebars_widgets = get_option( 'sidebars_widgets' ); // which sidebars have which widgets, get fresh every time
          $new_instance_id = $id_base . '-' . $new_instance_id_number; // use ID number from new widget instance
          $sidebars_widgets[$use_sidebar_id][] = $new_instance_id; // add new instance to sidebar
          update_option( 'sidebars_widgets', $sidebars_widgets ); // save the amended data

          // Success message
          if ( $sidebar_available ) {
            $widget_message_type = 'success';
            $widget_message = __( 'Imported', 'widget-importer-exporter' );
          } else {
            $widget_message_type = 'warning';
            $widget_message = __( 'Imported to Inactive', 'widget-importer-exporter' );
          }

        }

        // Result for widget instance
        $results[$sidebar_id]['widgets'][$widget_instance_id]['name'] = isset( $available_widgets[$id_base]['name'] ) ? $available_widgets[$id_base]['name'] : $id_base; // widget name or ID if name not available (not supported by site)
        $results[$sidebar_id]['widgets'][$widget_instance_id]['title'] = ! empty( $widget['title'] ) ? $widget['title'] : __( 'No Title', 'widget-importer-exporter' ); // show "No Title" if widget instance is untitled
        $results[$sidebar_id]['widgets'][$widget_instance_id]['message_type'] = $widget_message_type;
        $results[$sidebar_id]['widgets'][$widget_instance_id]['message'] = $widget_message;

      }

    }
  }


  public function import_options($file){
    $options = $this->file_options($file,'Options');
    update_option( 'wd_options_array', $options);
    $this->message = esc_html__("Options imported successfully", "webdevia");
  }

  public function import_menus($file){
    global $wpdb;
    $compactor_terms_table = $wpdb->prefix . "terms";
    $compactor_terms_table = esc_sql( $compactor_terms_table );
    $this->menus_data = $this->file_options($file,'Menus');

    $locations = get_theme_mod('nav_menu_locations');
    $menuname = 'primary-menu';
    $menu_exists = wp_get_nav_menu_object( $menuname );
    $menu_id = $menu_exists->term_id;
    $locations['primary'] = $menu_id;

    set_theme_mod( 'nav_menu_locations', $locations );



  }
  public function import_settings_pages($file){
    $pages = $this->file_options($file,'Settings');

    foreach($pages as $compactor_page_option => $compactor_page_id){
      update_option( $compactor_page_option, $compactor_page_id);
    }

    $demo = 'demo-1';
    if (!empty($_POST['example']))
      $demo = $_POST['example'];

    switch($demo){
      case 'demo-1': $page = 'Home';
        break;
      case 'demo-2': $page = 'Home 2';
        break;
      case 'demo-3': $page = 'Home 3';
        break;
      default : $page = 'Home';
        break;
    }
    $home_page = get_option("page_on_front");
    if(!$home_page || !is_page($home_page)) {
      $home = get_page_by_title($page, OBJECT, 'page');
      update_option('page_on_front',$home->ID);
    }
    $blog_page = get_option("page_for_posts");
    if(!$blog_page || !is_page($blog_page)) {
      $blog = get_page_by_title('Blog');
      update_option('page_for_posts',$blog->ID);
    }
    $home_page = get_option('page_on_front');
    $value = get_post_meta($home_page, '_custom_options', true);
    $value_array = explode('|', $value);
    if(!empty($value_array) && count($value_array) != 0) {
      foreach ($value_array as $arrayer) {
        $contenter = explode('::',$arrayer);
        if(!empty($contenter) && count($contenter) != 0) {
          compactor_save_option($contenter[0], $contenter[1]);
        }
      }
    }
    delete_post_meta($home_page, '_custom_options');
  }
  public function file_options($file,$text){
    $file_content = "";
    $file_for_import = plugin_dir_path( __FILE__ ) . '/files/' . $file;
    if ( file_exists($file_for_import) ) {
      $file_content = $this->compactor_file_contents($file_for_import);
    } else {
      $this->message = esc_html__("File doesn't exist", "webdevia");
      echo 'error';
      wp_send_json_error(esc_html__($text." file doesn't exist", "webdevia"));
    }
    if ($file_content) {
      $unserialized_content = unserialize($file_content);
      $json_array = json_decode($file_content);
      /*print_r($json_array);*/
      if (is_array($unserialized_content)) {
        if($text=='Options'){
          echo 'error';
          wp_send_json_error('Unserialized');
        }

      }
      // print_r($json_array);
      return $unserialized_content;
    }  else{
      echo 'error';
      wp_send_json_error(esc_html__( $text." import data file could not be read or is empty.", 'webdevia' ));
    }
    /*return false;*/
  }

  function compactor_file_contents( $path ) {
    $compactor_content = '';
    if ( function_exists('realpath') )
      $filepath = realpath($path);
    if ( !$filepath || !@is_file($filepath) ) {
      echo 'error';
      wp_send_json_error(esc_html__("File doesn't exist or not valid", "webdevia"));
      return '';
    }
    if( ini_get('allow_url_fopen') ) {
      $compactor_file_method = 'fopen';
    } else {
      $compactor_file_method = 'file_get_contents';
    }
    if ( $compactor_file_method == 'fopen' ) {
      $compactor_handle = fopen( $filepath, 'rb' );

      if( $compactor_handle !== false ) {
        while (!feof($compactor_handle)) {
          $compactor_content .= fread($compactor_handle, 8192);
        }
        fclose( $compactor_handle );
      }
      return $compactor_content;
    } else {
      return file_get_contents($filepath);
    }
  }
}
global $my_compactor_Import;
$my_compactor_Import = new compactor_Import();



if(!function_exists('compactor_dataImport'))
{
  function compactor_dataImport()
  {
    global $my_compactor_Import;

    if ($_POST['import_attachments'] == 1)
      $my_compactor_Import->attachments = true;
    else
      $my_compactor_Import->attachments = false;

    $folder = "main/";

    $my_compactor_Import->compactor_import_content($folder.$_POST['xml']);

    die();
  }

  add_action('wp_ajax_compactor_dataImport', 'compactor_dataImport');
}


if(!function_exists('compactor_menuImport'))
{
  function compactor_menuImport()
  {
    global $my_compactor_Import;

    if ($_POST['delete_menus'] == 1){
      delete_nav_menus();
    }

    if ($_POST['import_attachments'] == 1)
      $my_compactor_Import->attachments = true;
    else
      $my_compactor_Import->attachments = false;

    $folder = "files/";
    if (!empty($_POST['example']))
      $folder = $_POST['example']."/";

    $my_compactor_Import->compactor_import_content($folder.'menus.xml');


    $locations = get_theme_mod('nav_menu_locations');
    $menuname = 'primary-menu';
    $menu_exists = wp_get_nav_menu_object( $menuname );
    $menu_id = $menu_exists->term_id;
    $locations['primary'] = $menu_id;

    set_theme_mod( 'nav_menu_locations', $locations );
    die();
  }

  add_action('wp_ajax_compactor_menuImport', 'compactor_menuImport');
}

if(!function_exists('compactor_widgetsImport'))
{
  function compactor_widgetsImport()
  {
    global $my_compactor_Import;

    $folder = "/files/main/";

    $my_compactor_Import->import_widgets($folder.'widgets.txt');

    die();
  }

  add_action('wp_ajax_compactor_widgetsImport', 'compactor_widgetsImport');
}

if(!function_exists('compactor_optionsImport'))
{
  function compactor_optionsImport()
  {
    global $my_compactor_Import;

    $folder = "/files/";
    if (!empty($_POST['example']))
      $folder = $_POST['example']."/";

    $my_compactor_Import->import_options($folder.'options.txt');

    die();
  }

  add_action('wp_ajax_compactor_optionsImport', 'compactor_optionsImport');
}

if(!function_exists('compactor_otherImport'))
{
  function compactor_otherImport()
  {
    global $my_compactor_Import;

    if (!empty($_POST['example']))
      $folder = $_POST['example']."/";

    $my_compactor_Import->import_settings_pages($folder.'settingpages.txt');

    die();
  }

  add_action('wp_ajax_compactor_otherImport', 'compactor_otherImport');
}

if (!function_exists('compactor_import_options')) {
  function compactor_import_options()
  {

	  $file = 'a:72:{s:13:"primary_color";s:7:"#fdb900";s:15:"secondary_color";s:7:"#412AAB";s:12:"accent_color";s:7:"#f92245";s:10:"text_color";s:7:"#44464a";s:20:"secondary_text_color";s:7:"#A6AAB7";s:17:"header_text_color";s:7:"#040e56";s:13:"body_bg_color";s:4:"#fff";s:15:"header_bg_color";s:7:"#ffffff";s:14:"nav_text_color";s:7:"#040e56";s:19:"sticky_nav_bg_color";s:7:"#ffffff";s:21:"sticky_nav_text_color";s:7:"#040e56";s:27:"hover_sticky_nav_text_color";s:7:"#fdb900";s:20:"hover_nav_text_color";s:7:"#FDB900";s:15:"footer_bg_color";s:7:"#020625";s:17:"footer_text_color";s:24:"rgba(255, 255, 255, 0.7)";s:18:"copyright_bg_color";s:7:"#030A20";s:20:"copyright_text_color";s:4:"#fff";s:20:"show_top_social_bare";s:3:"off";s:20:"show_language_widget";s:2:"on";s:18:"language_area_html";s:0:"";s:20:"404_background_image";s:0:"";s:17:"products_per_page";s:1:"9";s:14:"product_column";s:1:"4";s:9:"footer_bg";s:0:"";s:14:"copyright_text";s:43:"&copy; 2020 Compactor All rights reserved. ";s:12:"powered_text";s:0:"";s:13:"footer_column";s:13:"three_columns";s:10:"menu_style";s:9:"corporate";s:16:"body_font_family";s:9:"Open Sans";s:15:"body_font_style";s:6:"normal";s:14:"body_font_size";s:0:"";s:16:"body_font_weight";s:3:"400";s:19:"body_letter_spacing";s:0:"";s:17:"body_font_subsets";s:9:"latin-ext";s:17:"body_font_to_load";s:20:"300 400 600 700 800 ";s:16:"head_font_family";s:6:"Roboto";s:15:"head_font_style";s:6:"normal";s:16:"head_font_weight";s:3:"700";s:17:"head_font_subsets";s:5:"latin";s:19:"head_letter_spacing";s:0:"";s:17:"head_font_to_load";s:24:"100 300 400 500 700 900 ";s:15:"nav_font_family";s:11:"Nunito Sans";s:14:"nav_font_style";s:6:"normal";s:15:"nav_font_weight";s:3:"700";s:13:"nav_font_size";s:4:"16px";s:16:"nav_font_subsets";s:5:"latin";s:18:"nav_letter_spacing";s:0:"";s:16:"nav_font_to_load";s:16:"300 400 600 700 ";s:18:"wd_theme_custom_js";s:0:"";s:12:"boxed_layout";s:3:"off";s:18:"menu_mobile_layout";s:2:"on";s:22:"header_contain_to_grid";s:2:"on";s:17:"stick_menu_to_top";s:2:"on";s:22:"page_loading_animation";s:3:"off";s:13:"show_the_logo";s:2:"on";s:18:"show_website_title";s:3:"off";s:13:"action_button";s:357:"&lt;div class=&quot;wd-btn-wrap text-left &quot;&gt;
    &lt;a href=&quot;http://themes.webdevia.com/compactor-asphal-paving-road-construction-wordpress-theme/contact-us-2/&quot; class=&quot;wd-btn btn-solid btn-color-1 hover-color-2 btn-small &quot; style=&quot;
  margin-bottom: 6px;
  margin-top: -10px;
&quot;&gt;Contact Us&lt;/a&gt;
  &lt;/div&gt;";s:21:"body_background_image";s:0:"";s:12:"bg_home_page";s:6:"Upload";s:9:"logo_link";s:125:"http://themes.webdevia.com/compactor-asphal-paving-road-construction-wordpress-theme/wp-content/uploads/2019/11/Logo@2x-1.png";s:11:"logo_height";s:2:"40";s:12:"logo_padding";s:0:"";s:14:"google_key_map";s:39:"AIzaSyCuddKL1Z2WR8og1v2UZpdI7raxkmVJPaI";s:13:"title_page_bg";s:34:"Default Title Bar background image";s:13:"find_out_more";s:20:"Find out more Button";s:17:"head_info_address";s:27:"125 Golden St, New York, NY";s:14:"head_info_time";s:16:"hi@compactor.com";s:15:"head_info_phone";s:11:"548-661-322";s:15:"pagination_type";s:3:"off";s:12:"related_post";s:9:"corporate";s:13:"footer_bg_img";s:1:"_";s:6:"search";s:14:"Update Options";}';
	  $options_array = array();

    $options_array = unserialize($file);
    update_option("compactor_options_array",$options_array);

  }
  add_action('wp_ajax_compactor_import_options', 'compactor_import_options');
}

function delete_nav_menus(){
  $menus_list=get_terms( 'nav_menu', array( 'hide_empty' => false ) );
  foreach($menus_list as $menu){
    wp_delete_nav_menu($menu->term_id);
  }
}