<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
include_once(get_template_directory() . '/inc/panel/fonts.php');
include_once(get_template_directory() . '/inc/panel/Wd_Customizer.php');

class PanelClass extends Wd_Customizer
{
    var $pageTitle;
    var $menuTitle;
    var $capability;
    var $menuSlug;
    var $sectionName = array();
    var $sectionParams = array();

    public function __construct($pageTitle, $menuTitle, $capability, $menuSlug)
    {
        $this->pageTitle = $pageTitle;
        $this->menuSlug = $menuSlug;
        $this->capability = $capability;
        $this->menuTitle = $menuTitle;
        // initialization
        $this->init();
    }

    public function init()
    {
        add_action('admin_menu', array($this, 'setup_panel_page'));
        add_action('admin_enqueue_scripts', array($this, 'panel_script_enqueue'));
        add_action('customize_register', array($this, 'panel_to_customizer'));
    }

    public function panel_script_enqueue()
    {
        if (is_admin()) {
            wp_register_script('wd-panel-script', get_template_directory_uri() . '/inc/js/script.js', array(
                'jquery',
                'jquery-ui-core',
                'jquery-ui-widget',
                'jquery-ui-mouse',
                'jquery-ui-tabs',
                'jquery-ui-droppable',
                'jquery-ui-sortable'
            ), false, false);
            wp_enqueue_script('wd-panel-script');
            wp_enqueue_media();
            wp_enqueue_style('wp-color-picker');
            wp_enqueue_script('wp-color-picker');
            wp_enqueue_script('wp-color-picker-alpha', get_template_directory_uri() . "/inc/js/wp-color-picker-alpha.js", array('wp-color-picker'), false, true);
            wp_enqueue_script('comdegex-js-panel', get_template_directory_uri() . "/inc/js/panel_script.js", array('jquery'));
            wp_localize_script('comdegex-js-panel', 'myAjax', array('ajaxurl' => admin_url('admin-ajax.php')));
            wp_enqueue_script('wp-color-picker-alpha', get_template_directory_uri() . "/inc/js/wp-color-picker-alpha.js", array(), true);
            wp_enqueue_style('fontawesome', get_template_directory_uri() . "/inc/css/font-awesome.min.css");
            wp_enqueue_style('select2', get_template_directory_uri() . '/inc/css/select2.min.css');
            wp_register_style('wd-style', get_template_directory_uri() . '/inc/css/style.css', array(), '20120208', false);
            wp_enqueue_script('select2', get_template_directory_uri() . '/inc/js/select2.min.js', array('jquery'));
            wp_enqueue_style('wd-style');
        }
    }

    public function setup_panel_page()
    {
        add_theme_page($this->pageTitle, $this->menuTitle, $this->capability, $this->menuSlug, array($this, 'panel_page'));
    }

    public function panel_page()
    {
        $this->panel_add_section();
    }

    public function setSection($sectionTitle, $group = array())
    {
        array_push($this->sectionName, array(
            "sectionName" => $sectionTitle,
            "sectionGroup" => $group
        ));
        return $this->sectionName;
    }

    public function setSectionParas($label, $id, $type, $defaultValue, $parentSection, $group, $description)
    {
        array_push($this->sectionParams, array(
            "label" => $label,
            "id" => $id,
            "type" => $type,
            "defaultValue" => $defaultValue,
            "group" => $group,
            "parent" => str_replace(" ", "", $parentSection),
            "description" => $description,
        ));
        return $this->sectionParams;
    }

    public function panel_to_customizer($wp_customize)
    {
        $this->Customizer_registration($this->sectionName, $this->sectionParams, $wp_customize);
    }

    private function panel_save_option($options)
    {
        $option_value = "";
        foreach ($options as $option => $value) {
            if (is_array($value)) {
                foreach ($value as $suboption) {
                    $option_value .= $suboption . " ";
                }
                compactor_save_option($option, htmlentities(stripslashes(($option_value))));
                $option_value = "";
            } else {
                compactor_save_option($option, htmlentities(stripslashes(($value))));
            }
        }
    }

    public function option_value($id, $defaultValue)
    {
        if (compactor_get_option($id) !== "" && compactor_get_option($id) != null) {
            return compactor_get_option($id);
        }
        return $defaultValue;
    }

    public function initialization($sections)
    {
        foreach ($sections as $section) {
            $this->setSection($section['name'], $section['items']);
            if (is_array($section['fields'])) {
                foreach ($section['fields'] as $field) {
                    $this->setSectionParas($field['label'], $field['id'], $field['type'], $field['defaultValue'], $field['parentSection'], $field['group'], $field['description']);
                }
            }
        }
    }

    private function input_dropdown($label, $id, $defaultValue = null, $description = null)
    {
        ?>
        <li>
            <div class="title-option">
                <label><?php echo esc_html($label) ?></label>
                <p><?php echo esc_html($description) ?></p>
            </div>
            <div class="value-option">
                <select name="<?php echo esc_attr($id); ?>" class="wd_select2">
                    <?php
                    foreach ($defaultValue as $item => $val) {
                        ?>
                        <option
                            value="<?php echo esc_attr($val) ?>" <?php selected($val, $this->option_value($id, ""), true); ?>><?php echo esc_html($item) ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
        </li>
        <?php
    }

    private function input_checkbox($label, $id, $defaultValue = null, $description = null)
    { ?>
        <li class="wd_checkbox">
            <div class="title-option">
                <label><?php echo esc_html($label) ?></label>
                <p><?php echo esc_html($description) ?></p>
            </div>
            <div class="value-option">
                <input type='hidden' value='off' name="<?php echo esc_attr($id); ?>">
                <input type="checkbox" <?php $this->option_value($id, $defaultValue) == "on" ? print "checked" : "" ?>
                       name="<?php echo esc_attr($id); ?>" value="on" id="<?php echo esc_attr($id); ?>"
                       class="cmn-toggle cmn-toggle-round"/>
                <label for="<?php echo esc_attr($id); ?>"></label>

            </div>
        </li>
        <?php
    }

    private function input_color($label, $id, $defaultValue = null, $description = null)
    { ?>
        <li>
            <div class="title-option">
                <label><?php echo esc_html($label) ?></label>
                <p><?php echo esc_html($description) ?></p>
            </div>
            <div class="value-option">
                <input name="<?php echo esc_attr($id); ?>" type="text"
                       value="<?php echo esc_attr($this->option_value($id, $defaultValue)) ?>"
                       class="wd-color-picker color-picker" data-alpha="true"
                       data-default-color="<?php echo esc_attr($defaultValue); ?>">
            </div>
        </li>
        <?php
    }

    private function input_radio($label, $id, $defaultValue = null, $description = null)
    {

    }

    private function input_font($label, $id, $defaultValue = null, $description = null)
    {
        ?>
        <li class="font">
            <div>
                <h4><?php echo esc_html__("Font Family: ", 'compactor'); ?></h4>
                <?php $font_family_value = compactor_get_option($id . "_font_family"); ?>

                <select name="<?php echo esc_attr($id); ?>_font_family" class="font_family wd_select2">
                    <?php foreach ($defaultValue as $item) { ?>
                        <option
                            value="<?php echo esc_attr($item["name"]) ?>" <?php selected($item["name"], $font_family_value, true); ?>><?php echo esc_attr($item["name"]) ?></option>
                    <?php } ?>
                </select>
            </div>
            <div>
                <h4><?php echo esc_html__("Font Style: ", 'compactor'); ?></h4>
                <select class="font_style wd_select2" name="<?php echo esc_attr($id); ?>_font_style"> <?php
                    $font_style = wd_Font_Style($font_family_value);
                    $font_font_style = compactor_get_option($id . "_font_style");

                    foreach ($font_style as $key => $value) { ?>
                        <option
                            value="<?php echo esc_attr($value); ?>" <?php selected($value, $font_font_style, true) ?>><?php echo esc_attr($key); ?></option>
                    <?php } ?>
                </select>
            </div>
            <div>
                <h4><?php echo esc_html__("Font Weight: ", 'compactor'); ?></h4>
                <select class="font_weight wd_select2" name="<?php echo esc_attr($id); ?>_font_weight"> <?php
                    $font_weight_array = wd_font_weight($font_family_value);
                    $font_weight_value = compactor_get_option($id . "_font_weight");
                    foreach ($font_weight_array as $weight) { ?>
                        <option
                            value="<?php echo esc_attr($weight); ?>" <?php selected($weight, $font_weight_value, true) ?>><?php echo esc_attr(wd_font_weight_name($weight)); ?></option>
                    <?php } ?>
                </select>
            </div>
            <div>
                <h4><?php echo esc_html__("Font weights to load: ", 'compactor'); ?></h4>
                <select class="font_weight_list wd_select2" name="<?php echo esc_attr($id); ?>_font_to_load[]"
                        multiple> <?php
                    $font_weights = compactor_get_option($id . "_font_to_load");
                    $font_weight_value_arry = explode(' ', $font_weights);
                    foreach ($font_weight_array as $weight) { ?>
                        <option
                            value="<?php echo esc_attr($weight); ?>" <?php in_array($weight, $font_weight_value_arry) ? print "selected" : "" ?>><?php echo wd_font_weight_name($weight); ?></option>
                    <?php } ?>
                </select>
            </div>
            <?php
            if ($id !== 'head') {
                ?>
                <div>
                    <h4><?php echo esc_html__("Font Size: ", 'compactor'); ?></h4>
                    <?php $font_size_value = compactor_get_option($id . "_font_size"); ?>
                    <input class="font_size" type="text" name="<?php echo esc_attr($id); ?>_font_size"
                           value="<?php echo esc_attr($font_size_value) ?>">
                </div>
                <?php
            }
            ?>
            <div>
                <h4><?php echo esc_html__("Lettre Spacing: ", 'compactor'); ?></h4>
                <?php $letter_spacing_value = compactor_get_option($id . "_letter_spacing"); ?>
                <input class="letter_spacing" type="text" name="<?php echo esc_attr($id); ?>_letter_spacing"
                       value="<?php echo esc_attr($letter_spacing_value) ?>">
            </div>
            <div>
                <h4><?php echo esc_html__("Font subsets: ", 'compactor'); ?></h4> <?php
                $font_subset = wd_Font_subsets($font_family_value);
                $font_subsets_value = compactor_get_option($id . "_font_subsets"); ?>
                <select class="font_subsets wd_select2" name="<?php echo esc_attr($id); ?>_font_subsets">
                    <?php foreach ($font_subset as $key => $value) { ?>
                        <option
                            value="<?php echo esc_attr($value); ?>" <?php selected($value, $font_subsets_value, true) ?>><?php echo esc_attr($key); ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="font-preview">
                <h4><?php echo esc_html__("Preview: ", 'compactor'); ?></h4>
                <p class="preview_result heading_fonts"
                   style="<?php if(isset($font_size_value))      echo "font-size: $font_size_value;";
                                if(isset($letter_spacing_value)) echo "letter-spacing: $letter_spacing_value;";
                                if(isset($font_family_value))    echo "font-family: $font_family_value;";
                                if(isset($font_weight_value))    echo "font-weight: $font_weight_value;";
                                if(isset($font_font_style))      echo "font-style: $font_font_style;"; ?>">
                    Sphinx of black quartz, judge my vow<br> Sphinx of black quartz, judge my vow<br> Sphinx of black
                    quartz,
                    judge my vow<br>
                </p>
            </div>
        </li>
        <?php
    }

    private function input_social_media($label, $id, $description)
    {
        ?>
        <li>
            <label><?php echo esc_html($label) ?></label>
            <p><?php echo esc_html($description) ?></p>
            <div class="socialmedia_wrapper">
                <div>
                    <a href="javascript:void(0);" class="add_button" title="<?php echo esc_attr__('Add field','compactor') ?>">
                        <button type="button"
                                class="button"><?php echo esc_html__('Add Social Media', 'compactor'); ?></button>
                    </a>
                </div>
                <?php
                $socialmedia_arry = explode(' ', compactor_get_option('socialmedia_name'));
                $socialmediaicon_arry = explode(' ', compactor_get_option('social_icon'));
                if (!empty($socialmedia_arry)) {
                    ?>
                    <p class="social_label"><?php echo esc_html__('Media Icon', 'compactor'); ?></p>
                    <p class="social_label"><?php echo esc_html__('Media Link', 'compactor'); ?></p>
                    <?php
                    $i = 0;
                    foreach ($socialmedia_arry as $media) {
                        if (!empty($media) || $media != "") {
                            ?>
                            <div class="social_media">
                                <select name="social_icon[icon<?php echo esc_attr($i); ?>]" class="wd_select2">
                                    <option value="-1"
                                            disabled><?php echo esc_html__('Select social media icon', 'compactor'); ?></option>
                                    <option
                                        value="fa-facebook-f" <?php selected($socialmediaicon_arry[$i], 'fa-facebook-f', true) ?> >
                                        &#xf09a; Facebook
                                    </option>
                                    <option
                                        value="fa-flickr" <?php selected($socialmediaicon_arry[$i], 'fa-flickr', true) ?> >
                                        &#xf16e;
                                        Flickr
                                    </option>
                                    <option
                                        value="fa-google-plus-g" <?php selected($socialmediaicon_arry[$i], 'fa-google-plus-g', true) ?> >
                                        &#xf0d5; Google-plus
                                    </option>
                                    <option
                                        value="fa-instagram" <?php selected($socialmediaicon_arry[$i], 'fa-instagram', true) ?>>
                                        &#xf16d; Instagram
                                    </option>
                                    <option
                                        value="fa-linkedin-in" <?php selected($socialmediaicon_arry[$i], 'fa-linkedin-in', true) ?>>
                                        &#xf0e1; Linkedin
                                    </option>
                                    <option
                                        value="fa-twitter" <?php selected($socialmediaicon_arry[$i], 'fa-twitter', true) ?>>
                                        &#xf099;
                                        twitter
                                    </option>
                                    <option
                                        value="fa-vimeo-v" <?php selected($socialmediaicon_arry[$i], 'fa-vimeo-v', true) ?>>
                                        &#xf27d;
                                        Vimeo
                                    </option>
                                    <option
                                        value="fa-whatsapp" <?php selected($socialmediaicon_arry[$i], 'fa-whatsapp', true) ?>>
                                        &#xf232; Whatsapp
                                    </option>
                                    <option
                                        value="fa-youtube" <?php selected($socialmediaicon_arry[$i], 'fa-youtube', true) ?>>
                                        &#xf167;
                                        Youtube
                                    </option>
                                </select>
                                <input type="text" name="socialmedia_name[media<?php echo esc_attr($i); ?>]"
                                       placeholder="<?php echo esc_attr__('Your social media link', 'compactor'); ?>"
                                       value="<?php echo esc_attr($media) ?>"/>
                                <a href="javascript:void(0);" class="remove_button" title="<?php echo esc_attr__('Remove field','compactor') ?>">
                                    <button type="button"
                                            class="button bg_delete_button"> <?php echo esc_html__('delete', 'compactor') ?></button>
                                </a>
                            </div>
                            <?php
                        }
                        $i++;
                    }
                }
                ?>
            </div>
        </li>
        <?php
    }

    private function input_image_upload($label, $id, $defaultValue = null, $description = null)
    {
        ?>
        <li class="imgset">
            <div class="title-option">
                <label><?php echo esc_html($label) ?></label>
                <p><?php echo esc_html($description) ?></p>
            </div>
            <div class="value-option">
                <input type="text" name="<?php echo esc_attr($id); ?>"
                       value="<?php echo esc_attr($this->option_value($id, $defaultValue)) ?>"
                       class="compactor_home_input img_input_field"
                       data-bgimage="compactor_home-<?php echo esc_attr($id); ?>">
                <input class="button add_image" name="bg_home_page" id="wd_bg_home_page" value="Upload">
                <input type="button" value="Delete" class="button remove_image bg_delete_button"
                       data-bgimage="compactor_home-<?php echo esc_attr($id); ?>">
                <img src="" style="max-height: 70px;" class="compactor_home_image">
            </div>
        </li>
        <?php
    }

    private function input_grid($label, $id, $defaultValue = null, $description = null)
    {
        ?>
        <li class="admiral_footer_columns">
            <div class="title-option">
                <label><?php echo esc_html($label) ?></label>
                <p><?php echo esc_html($description) ?></p>
            </div>
            <div class="value-option">
                <input id="compactor_footer1" type="radio" name="<?php echo esc_attr($id); ?>"
                       value="one_columns" <?php $this->option_value($id, $defaultValue) == "one_columns" ? print "checked" : "" ?> >
                <label for="compactor_footer1"
                       class="admiral_footer1 <?php $this->option_value($id, $defaultValue) == "one_columns" ? print "label_selected" : "" ?>"></label>
                <input id="compactor_footer2" type="radio" name="<?php echo esc_attr($id); ?>"
                       value="tow_a_columns" <?php $this->option_value($id, $defaultValue) == "tow_a_columns" ? print "checked" : "" ?> >
                <label for="compactor_footer2"
                       class="admiral_footer2 <?php $this->option_value($id, $defaultValue) == "tow_a_columns" ? print "label_selected" : "" ?>"></label>
                <input id="compactor_footer3" type="radio" name="<?php echo esc_attr($id); ?>"
                       value="tow_b_columns" <?php $this->option_value($id, $defaultValue) == "tow_b_columns" ? print "checked" : "" ?> >
                <label for="compactor_footer3"
                       class="admiral_footer3 <?php $this->option_value($id, $defaultValue) == "tow_b_columns" ? print "label_selected" : "" ?>"></label>
                <input id="compactor_footer4" type="radio" name="<?php echo esc_attr($id); ?>"
                       value="tow_c_columns" <?php $this->option_value($id, $defaultValue) == "tow_c_columns" ? print "checked" : "" ?> >
                <label for="compactor_footer4"
                       class="admiral_footer4 <?php $this->option_value($id, $defaultValue) == "tow_c_columns" ? print "label_selected" : "" ?>"></label>
                <input id="compactor_footer5" type="radio" name="<?php echo esc_attr($id); ?>"
                       value="three_columns" <?php $this->option_value($id, $defaultValue) == "three_columns" ? print "checked" : "" ?> >
                <label for="compactor_footer5"
                       class="admiral_footer5 <?php $this->option_value($id, $defaultValue) == "three_columns" ? print "label_selected" : "" ?>"></label>
                <input id="compactor_footer6" type="radio" name="<?php echo esc_attr($id); ?>"
                       value="four_columns" <?php $this->option_value($id, $defaultValue) == "four_columns" ? print "checked" : "" ?> >
                <label for="compactor_footer6"
                       class="admiral_footer6 <?php $this->option_value($id, $defaultValue) == "four_columns" ? print "label_selected" : "" ?>  "></label>
            </div>
        </li>
        <?php
    }

    private function input_textarea($label, $id, $defaultValue = null, $description = null)
    {
        ?>
        <li>
            <div class="title-option">
                <label><?php echo esc_html($label) ?></label>
                <p><?php echo esc_html($description) ?></p>
            </div>
            <div class="value-option">
      <textarea
          name="<?php echo esc_attr($id) ?>"><?php echo esc_html($this->option_value($id, $defaultValue)) ?></textarea>
            </div>
        </li>
        <?php
    }

    private function input_text($label, $id, $defaultValue = null, $description = null)
    {
        ?>
        <li>
            <div class="title-option">
                <label><?php echo esc_html($label) ?></label>
                <p><?php echo esc_html($description) ?></p>
            </div>
            <div class="value-option">
                <input type="text" class="text_field" name="<?php echo esc_attr($id) ?>"
                       value="<?php echo esc_attr($this->option_value($id, $defaultValue)) ?>">
            </div>
        </li>
        <?php
    }

    private function parameter_type($label, $id, $type, $defaultValue = null, $description = null)
    {
        switch ($type) {
            case "text";
                $this->input_text($label, $id, $defaultValue, $description);
                break;
            case "textarea";
                $this->input_textarea($label, $id, $defaultValue, $description);
                break;
            case "dropdown";
                $this->input_dropdown($label, $id, $defaultValue, $description);
                break;
            case "checkbox";
                $this->input_checkbox($label, $id, $defaultValue, $description);
                break;
            case "imgupload";
                $this->input_image_upload($label, $id, $defaultValue, $description);
                break;
            case "color";
                $this->input_color($label, $id, $defaultValue, $description);
                break;
            case "font";
                $this->input_font($label, $id, $defaultValue, $description);
                break;
            case "socialmedia";
                $this->input_social_media($label, $id, $description);
                break;
            case "radio";
                $this->input_radio($label, $id, $defaultValue, $description);
                break;
            case "grid";
                $this->input_grid($label, $id, $defaultValue, $description);
                break;
        }
    }

    public function panel_add_section()
    {
        ?>
        <?php if (isset($_POST)) { ?>
        <div id="message" class="updated fade">
            <p> <?php echo esc_html__('Configuration updated!!', 'compactor'); ?> </p>
        </div>
        <?php
        $this->panel_save_option($_POST);
    }
        ?>
        <div class="wd-cpanel">
            <form id="wd-Panel" method="POST" action="">
                <div id="tabs" class="ui-tabs-vertical ui-helper-clearfix">
                    <ul>
                        <div class="panel-logo">
                            <h2>
                                <?php echo wp_get_theme()->get('Name') . esc_html__(' Theme Options', 'compactor'); ?>
                            </h2>
                            <?php echo " <span> " . wp_get_theme()->get('Version') . "</span>"; ?>
                        </div>
                        <?php foreach ($this->sectionName as $item) { ?>
                            <li><a
                                    href="#<?php echo str_replace(" ", "", $item["sectionName"]) ?>"><?php echo esc_html($item["sectionName"]) ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                    <?php
                    foreach ($this->sectionName as $item) {
                        ?>
                        <div id="<?php echo str_replace(" ", "", $item["sectionName"]) ?>">
                            <table class="form-table">
                                <tbody>
                                <tr>
                                    <td>
                                        <div class='groups_tabs'>
                                            <ul class="g_tab">
                                                <?php
                                                foreach ($item["sectionGroup"] as $group) {
                                                    ?>
                                                    <li data-tab="<?php echo str_replace(" ", "", $group) ?>_tab"
                                                        class="<?php if (array_search($group, $item["sectionGroup"]) == 0) {
                                                            echo 'current';
                                                        } ?>"><?php echo "<h3>$group</h3>" ?></li>
                                                    <?php
                                                }
                                                ?>
                                            </ul>
                                            <?php
                                            foreach ($item["sectionGroup"] as $group) {
                                                ?>
                                                <div id="<?php echo str_replace(" ", "", $group) ?>_tab"
                                                     class="tab-content <?php if (array_search($group, $item["sectionGroup"]) == 0) {
                                                         echo 'current';
                                                     } ?>">
                                                    <?php
                                                    echo "<ul class='assets_options'>";
                                                    foreach ($this->sectionParams as $items) {
                                                        if ($items["group"] == $group) {
                                                            $this->parameter_type($items["label"], $items["id"], $items["type"], $items["defaultValue"], $items["description"]);
                                                        }
                                                    }
                                                    echo "</ul>";
                                                    ?>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="height columns wp-core-ui wd-validate">
                    <button type="button" name="reset"
                            class="button panel-reset"> <?php echo esc_html__('Reset Options', 'compactor'); ?> </button>
                    <button type="submit" name="search" value="Update Options"
                            class="button success button-primary"><?php echo esc_html__('Update Options', 'compactor'); ?></button>
                </div>
                <div class="height columns wp-core-ui wd-validate down">
                    <button type="button" name="reset"
                            class="button panel-reset"><?php echo esc_html__('Reset Options', 'compactor'); ?></button>
                    <button type="submit" name="search" value="Update Options"
                            class="button success button-primary"><?php echo esc_html__('Update Options', 'compactor'); ?></button>
                </div>
            </form>
        </div>
        <?php
    }
}

include_once(get_template_directory() . '/inc/panel/options.php');

$panel = new PanelClass('compactor Theme Options', 'Compactor Theme Options', 'edit_theme_options', 'compactor_Theme_Options');
$panel->initialization($theme_options);
