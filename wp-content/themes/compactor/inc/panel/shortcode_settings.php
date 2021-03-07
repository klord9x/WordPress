<?php

function shortcode_settings_init()
{
    add_theme_page('Shortcode Settings', 'Shortcode Settings', 'edit_theme_options', 'compactor-shortcode-settings', 'compactor_shortcode_settings');

}

add_action('admin_menu', 'shortcode_settings_init');


if (!function_exists('compactor_shortcode_settings')) {
    function compactor_shortcode_settings()
    {
        if (!empty($_POST)) {
            compactor_save_option('heading_style', sanitize_text_field($_POST['heading_style']));

            compactor_save_option('heading_a_top_d_space', sanitize_text_field($_POST['heading_a_top_d_space']));
            compactor_save_option('heading_a_top_t_space', sanitize_text_field($_POST['heading_a_top_t_space']));
            compactor_save_option('heading_a_top_m_space', sanitize_text_field($_POST['heading_a_top_m_space']));
            compactor_save_option('heading_a_bottom_d_space', sanitize_text_field($_POST['heading_a_bottom_d_space']));
            compactor_save_option('heading_a_bottom_t_space', sanitize_text_field($_POST['heading_a_bottom_t_space']));
            compactor_save_option('heading_a_bottom_m_space', sanitize_text_field($_POST['heading_a_bottom_m_space']));


            compactor_save_option('heading_a_layout', sanitize_text_field($_POST['heading_a_layout']));
            compactor_save_option('heading_a_alignment', sanitize_text_field($_POST['heading_a_alignment']));
            compactor_save_option('headings_a_separator', sanitize_text_field($_POST['headings_a_separator']));
            compactor_save_option('headings_a_separator_position', sanitize_text_field($_POST['headings_a_separator_position']));
            compactor_save_option('headings_a_separator_style', sanitize_text_field($_POST['headings_a_separator_style']));
            compactor_save_option('heading_a_separator_color', sanitize_text_field($_POST['heading_a_separator_color']));
            compactor_save_option('heading_a_separator_width', sanitize_text_field($_POST['heading_a_separator_width']));

            compactor_save_option('heading_a_title_font_family', sanitize_text_field($_POST['heading_a_title_font_family']));
            compactor_save_option('heading_a_title_font_style', sanitize_text_field($_POST['heading_a_title_font_style']));
            compactor_save_option('heading_a_title_font_weight', sanitize_text_field($_POST['heading_a_title_font_weight']));
            compactor_save_option('heading_a_title_font_size', sanitize_text_field($_POST['heading_a_title_font_size']));
            compactor_save_option('heading_a_title_font_color', sanitize_text_field($_POST['heading_a_title_font_color']));
            compactor_save_option('heading_a_title_text_transform', sanitize_text_field($_POST['heading_a_title_text_transform']));
            compactor_save_option('heading_a_title_line_height', sanitize_text_field($_POST['heading_a_title_line_height']));
            compactor_save_option('heading_a_title_letter_spacing', sanitize_text_field($_POST['heading_a_title_letter_spacing']));

            compactor_save_option('heading_a_subtitle_font_family', sanitize_text_field($_POST['heading_a_subtitle_font_family']));
            compactor_save_option('heading_a_subtitle_font_style', sanitize_text_field($_POST['heading_a_subtitle_font_style']));
            compactor_save_option('heading_a_subtitle_font_weight', sanitize_text_field($_POST['heading_a_subtitle_font_weight']));
            compactor_save_option('heading_a_subtitle_font_size', sanitize_text_field($_POST['heading_a_subtitle_font_size']));
            compactor_save_option('heading_a_subtitle_font_color', sanitize_text_field($_POST['heading_a_subtitle_font_color']));
            compactor_save_option('heading_a_subtitle_text_transform', sanitize_text_field($_POST['heading_a_subtitle_text_transform']));
            compactor_save_option('heading_a_subtitle_line_height', sanitize_text_field($_POST['heading_a_subtitle_line_height']));
            compactor_save_option('heading_a_subtitle_letter_spacing', sanitize_text_field($_POST['heading_a_subtitle_letter_spacing']));


            compactor_save_option('heading_b_top_d_space', sanitize_text_field($_POST['heading_b_top_d_space']));
            compactor_save_option('heading_b_top_t_space', sanitize_text_field($_POST['heading_b_top_t_space']));
            compactor_save_option('heading_b_top_m_space', sanitize_text_field($_POST['heading_b_top_m_space']));
            compactor_save_option('heading_b_bottom_d_space', sanitize_text_field($_POST['heading_b_bottom_d_space']));
            compactor_save_option('heading_b_bottom_t_space', sanitize_text_field($_POST['heading_b_bottom_t_space']));
            compactor_save_option('heading_b_bottom_m_space', sanitize_text_field($_POST['heading_b_bottom_m_space']));

            compactor_save_option('heading_b_layout', sanitize_text_field($_POST['heading_b_layout']));
            compactor_save_option('heading_b_alignment', sanitize_text_field($_POST['heading_b_alignment']));
            compactor_save_option('headings_b_separator', sanitize_text_field($_POST['headings_b_separator']));
            compactor_save_option('headings_b_separator_position', sanitize_text_field($_POST['headings_b_separator_position']));
            compactor_save_option('headings_b_separator_style', sanitize_text_field($_POST['headings_b_separator_style']));
            compactor_save_option('heading_b_separator_color', sanitize_text_field($_POST['heading_b_separator_color']));
            compactor_save_option('heading_b_separator_width', sanitize_text_field($_POST['heading_b_separator_width']));

            compactor_save_option('heading_b_title_font_family', sanitize_text_field($_POST['heading_b_title_font_family']));
            compactor_save_option('heading_b_title_font_style', sanitize_text_field($_POST['heading_b_title_font_style']));
            compactor_save_option('heading_b_title_font_weight', sanitize_text_field($_POST['heading_b_title_font_weight']));
            compactor_save_option('heading_b_title_font_size', sanitize_text_field($_POST['heading_b_title_font_size']));
            compactor_save_option('heading_b_title_font_color', sanitize_text_field($_POST['heading_b_title_font_color']));
            compactor_save_option('heading_b_title_text_transform', sanitize_text_field($_POST['heading_b_title_text_transform']));
            compactor_save_option('heading_b_title_line_height', sanitize_text_field($_POST['heading_b_title_line_height']));
            compactor_save_option('heading_b_title_letter_spacing', sanitize_text_field($_POST['heading_b_title_letter_spacing']));

            compactor_save_option('heading_b_subtitle_font_family', sanitize_text_field($_POST['heading_b_subtitle_font_family']));
            compactor_save_option('heading_b_subtitle_font_style', sanitize_text_field($_POST['heading_b_subtitle_font_style']));
            compactor_save_option('heading_b_subtitle_font_weight', sanitize_text_field($_POST['heading_b_subtitle_font_weight']));
            compactor_save_option('heading_b_subtitle_font_size', sanitize_text_field($_POST['heading_b_subtitle_font_size']));
            compactor_save_option('heading_b_subtitle_font_color', sanitize_text_field($_POST['heading_b_subtitle_font_color']));
            compactor_save_option('heading_b_subtitle_text_transform', sanitize_text_field($_POST['heading_b_subtitle_text_transform']));
            compactor_save_option('heading_b_subtitle_line_height', sanitize_text_field($_POST['heading_b_subtitle_line_height']));
            compactor_save_option('heading_b_subtitle_letter_spacing', sanitize_text_field($_POST['heading_b_subtitle_letter_spacing']));


            compactor_save_option('heading_c_top_d_space', sanitize_text_field($_POST['heading_c_top_d_space']));
            compactor_save_option('heading_c_top_t_space', sanitize_text_field($_POST['heading_c_top_t_space']));
            compactor_save_option('heading_c_top_m_space', sanitize_text_field($_POST['heading_c_top_m_space']));
            compactor_save_option('heading_c_bottom_d_space', sanitize_text_field($_POST['heading_c_bottom_d_space']));
            compactor_save_option('heading_c_bottom_t_space', sanitize_text_field($_POST['heading_c_bottom_t_space']));
            compactor_save_option('heading_c_bottom_m_space', sanitize_text_field($_POST['heading_c_bottom_m_space']));

            compactor_save_option('heading_c_layout', sanitize_text_field($_POST['heading_c_layout']));
            compactor_save_option('heading_c_alignment', sanitize_text_field($_POST['heading_c_alignment']));
            compactor_save_option('headings_c_separator', sanitize_text_field($_POST['headings_c_separator']));
            compactor_save_option('headings_c_separator_position', sanitize_text_field($_POST['headings_c_separator_position']));
            compactor_save_option('headings_c_separator_style', sanitize_text_field($_POST['headings_c_separator_style']));
            compactor_save_option('heading_c_separator_color', sanitize_text_field($_POST['heading_c_separator_color']));
            compactor_save_option('heading_c_separator_width', sanitize_text_field($_POST['heading_c_separator_width']));

            compactor_save_option('heading_c_title_font_family', sanitize_text_field($_POST['heading_c_title_font_family']));
            compactor_save_option('heading_c_title_font_style', sanitize_text_field($_POST['heading_c_title_font_style']));
            compactor_save_option('heading_c_title_font_weight', sanitize_text_field($_POST['heading_c_title_font_weight']));
            compactor_save_option('heading_c_title_font_size', sanitize_text_field($_POST['heading_c_title_font_size']));
            compactor_save_option('heading_c_title_font_color', sanitize_text_field($_POST['heading_c_title_font_color']));
            compactor_save_option('heading_c_title_text_transform', sanitize_text_field($_POST['heading_c_title_text_transform']));
            compactor_save_option('heading_c_title_line_height', sanitize_text_field($_POST['heading_c_title_line_height']));
            compactor_save_option('heading_c_title_letter_spacing', sanitize_text_field($_POST['heading_c_title_letter_spacing']));

            compactor_save_option('heading_c_subtitle_font_family', sanitize_text_field($_POST['heading_c_subtitle_font_family']));
            compactor_save_option('heading_c_subtitle_font_style', sanitize_text_field($_POST['heading_c_subtitle_font_style']));
            compactor_save_option('heading_c_subtitle_font_weight', sanitize_text_field($_POST['heading_c_subtitle_font_weight']));
            compactor_save_option('heading_c_subtitle_font_size', sanitize_text_field($_POST['heading_c_subtitle_font_size']));
            compactor_save_option('heading_c_subtitle_font_color', sanitize_text_field($_POST['heading_c_subtitle_font_color']));
            compactor_save_option('heading_c_subtitle_text_transform', sanitize_text_field($_POST['heading_c_subtitle_text_transform']));
            compactor_save_option('heading_c_subtitle_line_height', sanitize_text_field($_POST['heading_c_subtitle_line_height']));
            compactor_save_option('heading_c_subtitle_letter_spacing', sanitize_text_field($_POST['heading_c_subtitle_letter_spacing']));
        }


        ?>
        <?php if (!empty($_POST)): ?>
        <div id="message" class="updated fade">
            <p> <?php echo esc_html__('Configuration updated!!', 'compactor'); ?> </p>
        </div>
    <?php endif; ?>
        <div class="wd-cpanel" style="display: none;">
            <form id="wd-Panel" method="POST" action="">
                <div id="tabs" class="ui-tabs-vertical ui-helper-clearfix">
                    <ul>
                        <div class="panel-logo">
                            <h2>
                                <?php echo wp_get_theme()->get('Name') . esc_html__(' Heading Options', 'compactor'); ?>
                            </h2>
                            <?php echo " <span> " . wp_get_theme()->get('Version') . "</span>"; ?>
                        </div>
                        <li><a href="#tabs-5"><?php echo esc_html__('Heading Settings', 'compactor'); ?></a></li>
                    </ul>
                    <div id="tabs-5">
                        <table class="form-table">
                            <tbody>
                            <tr>
                                <td class="compactor_footer_columns">
                                    <div class="heading_parameter">
                                        <h2><?php echo esc_html__('Heading Parameter', 'compactor'); ?></h2>
                                        <label
                                            for="heading_style"><?php echo esc_html__('Heading Styles :', 'compactor'); ?></label>
                                        <select name="heading_style" class="wd_select2 heading_style">
                                            <option
                                                value="heading_style_1" <?php compactor_get_option('heading_style_1') ? print 'selected' : '' ?>><?php echo esc_html__('Styles 1', 'compactor'); ?></option>
                                            <option
                                                value="heading_style_2" <?php compactor_get_option('heading_style_2') ? print 'selected' : '' ?>><?php echo esc_html__('Styles 2', 'compactor'); ?></option>
                                            <option
                                                value="heading_style_3" <?php compactor_get_option('heading_style_3') ? print 'selected' : '' ?>><?php echo esc_html__('Styles 3', 'compactor'); ?></option>
                                        </select>
                                        <div class="tabset-1">
                                            <div class="heading-space">
                                                <div class="space">
                                                    <h4><?php echo esc_html__('Heading Top Space :', 'compactor'); ?></h4>
                                                    <div>
                        <span>
                          <label
                              for="heading_a_top_d_space"><?php echo esc_html__('Desktop Space :', 'compactor'); ?></label>
                          <input name="heading_a_top_d_space" type="text" placeholder="100"
                                 value="<?php echo compactor_get_option('heading_a_top_d_space') ?>">
                        </span>
                                                        <span>
                          <label
                              for="heading_a_top_t_space"><?php echo esc_html__('Tablet Space :', 'compactor'); ?></label>
                          <input name="heading_a_top_t_space" type="text" placeholder="70"
                                 value="<?php echo compactor_get_option('heading_a_top_t_space') ?>">
                        </span>
                                                        <span>
                          <label
                              for="heading_a_top_m_space"><?php echo esc_html__('Mobile Space :', 'compactor'); ?></label>
                          <input name="heading_a_top_m_space" type="text" placeholder="50"
                                 value="<?php echo compactor_get_option('heading_a_top_m_space') ?>">
                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="heading_style_1" class="tabset ">
                                                <!-- Tab 1 -->
                                                <input type="radio" name="tabset" id="tab1"
                                                       aria-controls="heading_general_style_1"
                                                       checked="checked">
                                                <label
                                                    for="tab1"><?php echo esc_html__('General', 'compactor'); ?></label>
                                                <!-- Tab 2 -->
                                                <input type="radio" name="tabset" id="tab2"
                                                       aria-controls="heading_title_style_1">
                                                <label
                                                    for="tab2"><?php echo esc_html__('Title Typography', 'compactor'); ?></label>
                                                <!-- Tab 3 -->
                                                <input type="radio" name="tabset" id="tab3"
                                                       aria-controls="heading_subtitle_style_1">
                                                <label
                                                    for="tab3"><?php echo esc_html__('SubTitle Typography', 'compactor'); ?></label>

                                                <div class="tab-panels">
                                                    <ul id="heading_general_style_1" class="tab-panel">
                                                        <h2><?php echo esc_html__('General', 'compactor'); ?></h2>
                                                        <li>
                                                            <label
                                                                for="heading_a_layout"><?php echo esc_html__('Heading Layout :', 'compactor'); ?></label>
                                                            <select name="heading_a_layout" class="wd_select2">
                                                                <option
                                                                    value="s-under-t" <?php if (compactor_get_option('heading_a_layout') == 's-under-t') {
                                                                    echo "selected='selected'";
                                                                } ?>><?php echo esc_html__('SubTitle under the title', 'compactor'); ?></option>
                                                                <option
                                                                    value="t-under-s" <?php if (compactor_get_option('heading_a_layout') == 't-under-s') {
                                                                    echo "selected='selected'";
                                                                } ?>><?php echo esc_html__('Title under the SubTitle', 'compactor'); ?></option>
                                                                <option
                                                                    value="s-behind-t" <?php if (compactor_get_option('heading_a_layout') == 's-behind-t') {
                                                                    echo "selected='selected'";
                                                                } ?>><?php echo esc_html__('SubTitle behind the title', 'compactor'); ?></option>
                                                                <option
                                                                    value="t-only" <?php if (compactor_get_option('heading_a_layout') == 't-only') {
                                                                    echo "selected='selected'";
                                                                } ?>><?php echo esc_html__('Title only', 'compactor'); ?></option>
                                                            </select>
                                                        </li>
                                                        <li>
                                                            <label
                                                                for="heading_a_alignment"><?php echo esc_html__('Heading alignment :', 'compactor'); ?></label>
                                                            <select name="heading_a_alignment" class="wd_select2">
                                                                <option
                                                                    value="center" <?php if (compactor_get_option('heading_a_alignment') == 'center') {
                                                                    echo "selected='selected'";
                                                                } ?>><?php echo esc_html__('Center', 'compactor'); ?></option>
                                                                <option
                                                                    value="left" <?php if (compactor_get_option('heading_a_alignment') == 'left') {
                                                                    echo "selected='selected'";
                                                                } ?>><?php echo esc_html__('Left', 'compactor'); ?></option>
                                                                <option
                                                                    value="right" <?php if (compactor_get_option('heading_a_alignment') == 'right') {
                                                                    echo "selected='selected'";
                                                                } ?>><?php echo esc_html__('Right', 'compactor'); ?></option>
                                                            </select>
                                                        </li>
                                                        <li>
                                                            <label
                                                                for="headings_a_separator"><?php echo esc_html__('Separator Type :', 'compactor'); ?></label>
                                                            <select name="headings_a_separator"
                                                                    class="wd_select2 separator_type">
                                                                <option
                                                                    value="none" <?php if (compactor_get_option('headings_a_separator') == 'none') {
                                                                    echo "selected='selected'";
                                                                } ?>><?php echo esc_html__('No Separator', 'compactor'); ?></option>
                                                                <option
                                                                    value="border" <?php if (compactor_get_option('headings_a_separator') == 'border') {
                                                                    echo "selected='selected'";
                                                                } ?>><?php echo esc_html__('Border', 'compactor'); ?></option>
                                                            </select>
                                                        </li>
                                                        <li>
                                                            <label for="headings_a_separator_position"
                                                                   class="display_none"><?php echo esc_html__('Separator Position :', 'compactor'); ?></label>
                                                            <select name="headings_a_separator_position"
                                                                    class="wd_select2 display_none">
                                                                <option
                                                                    value="center" <?php if (compactor_get_option('headings_a_separator_position') == 'center') {
                                                                    echo "selected='selected'";
                                                                } ?>><?php echo esc_html__('Center', 'compactor'); ?></option>
                                                                <option
                                                                    value="top" <?php if (compactor_get_option('headings_a_separator_position') == 'top') {
                                                                    echo "selected='selected'";
                                                                } ?>><?php echo esc_html__('Top', 'compactor'); ?></option>
                                                                <option
                                                                    value="bottom" <?php if (compactor_get_option('headings_a_separator_position') == 'bottom') {
                                                                    echo "selected='selected'";
                                                                } ?>><?php echo esc_html__('Bottom', 'compactor'); ?></option>
                                                            </select>
                                                        </li>
                                                        <li>
                                                            <label for="headings_a_separator_style"
                                                                   class="display_none"><?php echo esc_html__('Separator Style :', 'compactor'); ?></label>
                                                            <select name="headings_a_separator_style"
                                                                    class="wd_select2 display_none">
                                                                <option
                                                                    value="solid" <?php if (compactor_get_option('headings_a_separator_style') == 'solid') {
                                                                    echo "selected='selected'";
                                                                } ?>><?php echo esc_html__('Solid', 'compactor'); ?></option>
                                                                <option
                                                                    value="dashed" <?php if (compactor_get_option('headings_a_separator_style') == 'dashed') {
                                                                    echo "selected='selected'";
                                                                } ?>><?php echo esc_html__('Dashed', 'compactor'); ?></option>
                                                                <option
                                                                    value="dotted" <?php if (compactor_get_option('headings_a_separator_style') == 'dotted') {
                                                                    echo "selected='selected'";
                                                                } ?>><?php echo esc_html__('Dotted', 'compactor'); ?></option>
                                                            </select>
                                                        </li>
                                                        <li>
                                                            <label for="heading_a_separator_color"
                                                                   class="display_none"><?php echo esc_html__('Separator Color :', 'compactor'); ?></label>
                                                            <span class="display_none">
                              <input name="heading_a_separator_color" type="text"
                                     value="<?php echo compactor_get_option('heading_a_separator_color') ?>"
                                     class="wd-color-picker color-picker " data-alpha="true" data-default-color="#fff"
                                     data-picker="heading_a_separator_color_show">
                              </span>
                                                        </li>
                                                        <li>
                                                            <label for="heading_a_separator_width"
                                                                   class="display_none"><?php echo esc_html__('Separator Width:', 'compactor'); ?></label>
                                                            <input name="heading_a_separator_width" class="display_none"
                                                                   type="text"
                                                                   value="<?php echo compactor_get_option('heading_a_separator_width') ?>">
                                                        </li>
                                                    </ul>
                                                    <ul id="heading_title_style_1" class="tab-panel">
                                                        <h2><?php echo esc_html__('Title Typography', 'compactor'); ?></h2>
                                                        <li>
                                                            <?php
                                                            $compactor_fontArray = wd_Font_family();
                                                            ?>
                                                            <label
                                                                for="heading_a_title_font_family"><?php echo esc_html__('Title Font Family :', 'compactor'); ?></label>
                                                            <?php $font_family_value = compactor_get_option('heading_a_title_font_family'); ?>
                                                            <select name="heading_a_title_font_family"
                                                                    class="wd_select2">
                                                                <option
                                                                    value=""><?php echo esc_html__('Default', 'compactor'); ?></option>
                                                                <?php foreach ($compactor_fontArray as $key => $value) {
                                                                    ?>
                                                                    <option
                                                                        value="<?php echo esc_attr($key); ?>" <?php selected($key, $font_family_value, true) ?> ><?php echo esc_attr($value); ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </li>
                                                        <li>
                                                            <label
                                                                for="heading_a_title_font_style"><?php echo esc_html__('Title Font style :', 'compactor'); ?></label>
                                                            <select name="heading_a_title_font_style"
                                                                    class="wd_select2">
                                                                <option
                                                                    value=""><?php echo esc_html__('Default', 'compactor'); ?></option>
                                                                <?php
                                                                $font_style = wd_Font_Style($font_family_value);
                                                                $font_font_style = compactor_get_option("heading_a_title_font_style");
                                                                foreach ($font_style as $key => $value) {
                                                                    ?>
                                                                    <option
                                                                        value="<?php echo esc_attr($value); ?>" <?php selected($value, $font_font_style, true) ?>><?php echo esc_attr($key); ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </li>
                                                        <li>
                                                            <label
                                                                for="heading_a_title_font_weight"><?php echo esc_html__('Title Font Weight :', 'compactor'); ?></label>
                                                            <select name="heading_a_title_font_weight"
                                                                    class="wd_select2">
                                                                <option
                                                                    value=""><?php echo esc_html__('Default', 'compactor'); ?></option>
                                                                <?php
                                                                $font_weight_array = wd_font_weight($font_family_value);
                                                                $font_weight_value = compactor_get_option("heading_a_title_font_weight");
                                                                foreach ($font_weight_array as $weight) {
                                                                    ?>
                                                                    <option
                                                                        value="<?php echo esc_attr($weight); ?>" <?php selected($weight, $font_weight_value, true) ?>><?php echo esc_attr(wd_font_weight_name($weight)); ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </li>
                                                        <li>
                                                            <label
                                                                for="heading_a_title_font_size"><?php echo esc_html__('Title Font size :', 'compactor'); ?></label>
                                                            <input type="text" name="heading_a_title_font_size"
                                                                   value="<?php echo compactor_get_option('heading_a_title_font_size'); ?>">
                                                        </li>
                                                        <li>
                                                            <label
                                                                for="heading_a_title_font_color"><?php echo esc_html__('Title Color :', 'compactor'); ?></label>
                                                            <input name="heading_a_title_font_color" type="text"
                                                                   value="<?php echo compactor_get_option('heading_a_title_font_color') ?>"
                                                                   class="wd-color-picker color-picker"
                                                                   data-alpha="true" data-default-color="#fff"
                                                                   data-picker="heading_a_title_font_color_show">
                                                            <div
                                                                style="background-color:<?php echo esc_attr(compactor_get_option('heading_a_title_font_color')); ?>; display:inline-block; vertical-align: bottom;"
                                                                id="heading_a_title_font_color_show"></div>
                                                        </li>
                                                        <li>
                                                            <label
                                                                for="heading_a_title_text_transform"><?php echo esc_html__('Title Text Transform :', 'compactor'); ?></label>
                                                            <?php $a_text_transform = compactor_get_option('heading_a_title_text_transform') ?>
                                                            <select name="heading_a_title_text_transform"
                                                                    class="wd_select2">
                                                                <option
                                                                    value="" <?php selected($a_text_transform, "Default", true) ?>>
                                                                    <?php echo esc_html__('Default', 'compactor'); ?>
                                                                </option>
                                                                <option
                                                                    value="lowercase" <?php selected($a_text_transform, "lowercase", true) ?>><?php echo esc_html__('Lowercase', 'compactor'); ?></option>
                                                                <option
                                                                    value="uppercase" <?php selected($a_text_transform, "uppercase", true) ?>><?php echo esc_html__('Uppercase', 'compactor'); ?></option>
                                                                <option
                                                                    value="capitalize" <?php selected($a_text_transform, "capitalize", true) ?>><?php echo esc_html__('Capitalize', 'compactor'); ?></option>
                                                                <option
                                                                    value="inherit" <?php selected($a_text_transform, "inherit", true) ?>><?php echo esc_html__('Inherit', 'compactor'); ?></option>
                                                            </select>
                                                        </li>
                                                        <li>
                                                            <label
                                                                for="heading_a_title_line_height"><?php echo esc_html__('Title Line Height :', 'compactor'); ?></label>
                                                            <input type="text" name="heading_a_title_line_height"
                                                                   value="<?php echo compactor_get_option('heading_a_title_line_height'); ?>">
                                                        </li>
                                                        <li>
                                                            <label
                                                                for="heading_a_title_letter_spacing"><?php echo esc_html__('Title Letter Spacing :', 'compactor'); ?></label>
                                                            <input type="text" name="heading_a_title_letter_spacing"
                                                                   value="<?php echo compactor_get_option('heading_a_title_letter_spacing'); ?>">
                                                        </li>
                                                    </ul>
                                                    <ul id="heading_subtitle_style_1" class="tab-panel">
                                                        <h2><?php echo esc_html__('SubTitle Typography', 'compactor'); ?></h2>
                                                        <li>
                                                            <label
                                                                for="heading_a_subtitle_font_family"><?php echo esc_html__('Title Font Family :', 'compactor'); ?></label>
                                                            <?php $subtitle_font_family = compactor_get_option('heading_a_subtitle_font_family') ?>
                                                            <select name="heading_a_subtitle_font_family"
                                                                    class="wd_select2">
                                                                <option
                                                                    value=""><?php echo esc_html__('Default', 'compactor'); ?></option>
                                                                <?php foreach ($compactor_fontArray as $key => $value) {
                                                                    ?>
                                                                    <option
                                                                        value="<?php echo esc_attr($key); ?>" <?php selected($key, $subtitle_font_family, true) ?> ><?php echo esc_attr($value); ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </li>
                                                        <li>
                                                            <label
                                                                for="heading_a_subtitle_font_style"><?php echo esc_html__('Title Font style :', 'compactor'); ?></label>
                                                            <select name="heading_a_subtitle_font_style"
                                                                    class="wd_select2">
                                                                <option
                                                                    value=""><?php echo esc_html__('Default', 'compactor'); ?></option>
                                                                <?php
                                                                $subfont_style = wd_Font_Style($subtitle_font_family);
                                                                $subfont_font_style = compactor_get_option("heading_a_subtitle_font_style");
                                                                foreach ($subfont_style as $key => $value) {
                                                                    ?>
                                                                    <option
                                                                        value="<?php echo esc_attr($value); ?>" <?php selected($value, $subfont_font_style, true) ?>><?php echo esc_attr($key); ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </li>
                                                        <li>
                                                            <label
                                                                for="heading_a_subtitle_font_weight"><?php echo esc_html__('Title Font Weight :', 'compactor'); ?></label>
                                                            <select name="heading_a_subtitle_font_weight"
                                                                    class="wd_select2">
                                                                <option
                                                                    value=""><?php echo esc_html__('Default', 'compactor'); ?></option>
                                                                <?php
                                                                $subfont_weight_array = wd_font_weight($font_family_value);
                                                                $subfont_weight_value = compactor_get_option("heading_a_subtitle_font_weight");
                                                                foreach ($subfont_weight_array as $weight) {
                                                                    ?>
                                                                    <option
                                                                        value="<?php echo esc_attr($weight); ?>" <?php selected($weight, $subfont_weight_value, true) ?>><?php echo esc_attr(wd_font_weight_name($weight)); ?></option>
                                                                <?php }
                                                                ?>
                                                            </select>
                                                        </li>
                                                        <li>
                                                            <label
                                                                for="heading_a_subtitle_font_size"><?php echo esc_html__('Title Font size :', 'compactor'); ?></label>
                                                            <input type="text" name="heading_a_subtitle_font_size"
                                                                   value="<?php echo compactor_get_option('heading_a_subtitle_font_size'); ?>">
                                                        </li>
                                                        <li>
                                                            <?php $heading_a_subtitle_font_color = compactor_get_option('heading_a_subtitle_font_color'); ?>
                                                            <label
                                                                for="heading_a_subtitle_font_color"><?php echo esc_html__('Title Color :', 'compactor'); ?></label>
                                                            <input name="heading_a_subtitle_font_color" type="text"
                                                                   value="<?php echo compactor_get_option('heading_a_subtitle_font_color') ?>"
                                                                   class="wd-color-picker color-picker"
                                                                   data-alpha="true" data-default-color="#333"
                                                                   data-picker="heading_a_subtitle_font_color">
                                                            <div
                                                                style="background-color:<?php echo esc_attr($heading_a_subtitle_font_color); ?>; display:inline-block; vertical-align: bottom;"
                                                                id="heading_a_subtitle_font_color"></div>
                                                        </li>
                                                        <li>
                                                            <label
                                                                for="heading_a_subtitle_text_transform"><?php echo esc_html__('Title Text Transform :', 'compactor'); ?></label>
                                                            <?php $a_sub_text_transform = compactor_get_option("heading_a_subtitle_text_transform") ?>
                                                            <select name="heading_a_subtitle_text_transform"
                                                                    class="wd_select2">
                                                                <option
                                                                    value="" <?php selected($a_text_transform, "Default", true) ?>>
                                                                    <?php echo esc_html__('Default', 'compactor'); ?>
                                                                </option>
                                                                <option
                                                                    value="lowercase" <?php selected($a_sub_text_transform, "lowercase", true) ?>><?php echo esc_html__('Lowercase', 'compactor'); ?></option>
                                                                <option
                                                                    value="uppercase" <?php selected($a_sub_text_transform, "uppercase", true) ?>><?php echo esc_html__('Uppercase', 'compactor'); ?></option>
                                                                <option
                                                                    value="capitalize" <?php selected($a_sub_text_transform, "capitalize", true) ?>><?php echo esc_html__('Capitalize', 'compactor'); ?></option>
                                                                <option
                                                                    value="inherit" <?php selected($a_sub_text_transform, "inherit", true) ?>><?php echo esc_html__('Inherit', 'compactor'); ?></option>
                                                            </select>
                                                        </li>
                                                        <li>
                                                            <label
                                                                for="heading_a_subtitle_line_height"><?php echo esc_html__('Title Line Height :', 'compactor'); ?></label>
                                                            <input type="text" name="heading_a_subtitle_line_height"
                                                                   value="<?php echo compactor_get_option('heading_a_subtitle_line_height'); ?>">
                                                        </li>
                                                        <li>
                                                            <label
                                                                for="heading_a_subtitle_letter_spacing"><?php echo esc_html__('Title Letter Spacing :', 'compactor'); ?></label>
                                                            <input type="text" name="heading_a_subtitle_letter_spacing"
                                                                   value="<?php echo compactor_get_option('heading_a_subtitle_letter_spacing'); ?>">
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="heading-space">
                                                <div class="space">
                                                    <h4><?php echo esc_html__('Heading Bottom Space :', 'compactor'); ?></h4>
                                                    <div>
                        <span>
                          <label
                              for="heading_a_bottom_d_space"><?php echo esc_html__('Desktop Space :', 'compactor'); ?></label>
                          <input name="heading_a_bottom_d_space" type="text" placeholder="100"
                                 value="<?php echo compactor_get_option('heading_a_bottom_d_space') ?>">
                        </span>
                                                        <span>
                          <label
                              for="heading_a_bottom_t_space"><?php echo esc_html__('Tablet Space :', 'compactor'); ?></label>
                          <input name="heading_a_bottom_t_space" type="text" placeholder="70"
                                 value="<?php echo compactor_get_option('heading_a_bottom_t_space') ?>">
                        </span>
                                                        <span>
                          <label
                              for="heading_a_bottom_m_space"><?php echo esc_html__('Mobile Space :', 'compactor'); ?></label>
                          <input name="heading_a_bottom_m_space" type="text" placeholder="50"
                                 value="<?php echo compactor_get_option('heading_a_bottom_m_space') ?>">
                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tabset-2" style="display: none">
                                            <div class="heading-space">
                                                <div class="space">
                                                    <h2><?php echo esc_html__('Heading Top Space :', 'compactor'); ?></h2>
                                                    <div>
                        <span>
                          <label
                              for="heading_b_top_d_space"><?php echo esc_html__('Desktop Space :', 'compactor'); ?></label>
                          <input name="heading_b_top_d_space" type="text" placeholder="100"
                                 value="<?php echo compactor_get_option('heading_b_top_d_space') ?>">
                        </span>
                                                        <span>
                          <label
                              for="heading_b_top_t_space"><?php echo esc_html__('Tablet Space :', 'compactor'); ?></label>
                          <input name="heading_b_top_t_space" type="text" placeholder="70"
                                 value="<?php echo compactor_get_option('heading_b_top_t_space') ?>">
                        </span>
                                                        <span>
                          <label
                              for="heading_b_top_m_space"><?php echo esc_html__('Mobile Space :', 'compactor'); ?></label>
                          <input name="heading_b_top_m_space" type="text" placeholder="50"
                                 value="<?php echo compactor_get_option('heading_b_top_m_space') ?>">
                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="heading_style_2" class="tabset ">
                                                <!-- Tab 1 -->
                                                <input type="radio" name="tabset-2" id="tab4"
                                                       aria-controls="heading_general_style_2" checked>
                                                <label
                                                    for="tab4"><?php echo esc_html__('General', 'compactor'); ?></label>
                                                <!-- Tab 2 -->
                                                <input type="radio" name="tabset-2" id="tab5"
                                                       aria-controls="heading_title_style_2">
                                                <label
                                                    for="tab5"><?php echo esc_html__('Title Typography', 'compactor'); ?></label>
                                                <!-- Tab 3 -->
                                                <input type="radio" name="tabset-2" id="tab6"
                                                       aria-controls="heading_subtitle_style_2">
                                                <label
                                                    for="tab6"><?php echo esc_html__('SubTitle Typography', 'compactor'); ?></label>

                                                <div class="tab-panels">
                                                    <ul id="heading_general_style_2" class="tab-panel">
                                                        <h2><?php echo esc_html__('General', 'compactor'); ?></h2>
                                                        <li>
                                                            <label
                                                                for="heading_b_layout"><?php echo esc_html__('Heading Layout :', 'compactor'); ?></label>
                                                            <select name="heading_b_layout" class="wd_select2">
                                                                <option
                                                                    value="s-under-t" <?php if (compactor_get_option('heading_b_layout') == 's-under-t') {
                                                                    echo "selected='selected'";
                                                                } ?>><?php echo esc_html__('SubTitle under the title', 'compactor'); ?></option>
                                                                <option
                                                                    value="t-under-s" <?php if (compactor_get_option('heading_b_layout') == 't-under-s') {
                                                                    echo "selected='selected'";
                                                                } ?>><?php echo esc_html__('Title under the SubTitle', 'compactor'); ?></option>
                                                                <option
                                                                    value="s-behind-t" <?php if (compactor_get_option('heading_b_layout') == 's-behind-t') {
                                                                    echo "selected='selected'";
                                                                } ?>><?php echo esc_html__('SubTitle behind the title', 'compactor'); ?></option>
                                                                <option
                                                                    value="t-only" <?php if (compactor_get_option('heading_b_layout') == 't-only') {
                                                                    echo "selected='selected'";
                                                                } ?>><?php echo esc_html__('Title only', 'compactor'); ?></option>
                                                            </select>
                                                        </li>
                                                        <li>
                                                            <label
                                                                for="heading_b_alignment"><?php echo esc_html__('Heading alignment :', 'compactor'); ?></label>
                                                            <select name="heading_b_alignment" class="wd_select2">
                                                                <option
                                                                    value="center" <?php if (compactor_get_option('heading_b_alignment') == 'center') {
                                                                    echo "selected='selected'";
                                                                } ?>><?php echo esc_html__('Center', 'compactor'); ?></option>
                                                                <option
                                                                    value="left" <?php if (compactor_get_option('heading_b_alignment') == 'left') {
                                                                    echo "selected='selected'";
                                                                } ?>><?php echo esc_html__('Left', 'compactor'); ?></option>
                                                                <option
                                                                    value="right" <?php if (compactor_get_option('heading_b_alignment') == 'right') {
                                                                    echo "selected='selected'";
                                                                } ?>><?php echo esc_html__('Right', 'compactor'); ?></option>
                                                            </select>
                                                        </li>
                                                        <li>
                                                            <label
                                                                for="headings_b_separator"><?php echo esc_html__('Separator Type :', 'compactor'); ?></label>
                                                            <select name="headings_b_separator"
                                                                    class="wd_select2 separator_type">
                                                                <option
                                                                    value="none" <?php if (compactor_get_option('headings_b_separator') == 'none') {
                                                                    echo "selected='selected'";
                                                                } ?>><?php echo esc_html__('No Separator', 'compactor'); ?></option>
                                                                <option
                                                                    value="border" <?php if (compactor_get_option('headings_b_separator') == 'border') {
                                                                    echo "selected='selected'";
                                                                } ?>><?php echo esc_html__('Border', 'compactor'); ?></option>
                                                            </select>
                                                        </li>
                                                        <li>
                                                            <label for="headings_b_separator_position"
                                                                   class="display_none"><?php echo esc_html__('Separator Position :', 'compactor'); ?></label>
                                                            <select name="headings_b_separator_position"
                                                                    class="wd_select2 display_none">
                                                                <option
                                                                    value="center" <?php if (compactor_get_option('headings_b_separator_position') == 'center') {
                                                                    echo "selected='selected'";
                                                                } ?>><?php echo esc_html__('Center', 'compactor'); ?></option>
                                                                <option
                                                                    value="top" <?php if (compactor_get_option('headings_b_separator_position') == 'top') {
                                                                    echo "selected='selected'";
                                                                } ?>><?php echo esc_html__('Top', 'compactor'); ?></option>
                                                                <option
                                                                    value="bottom" <?php if (compactor_get_option('headings_b_separator_position') == 'bottom') {
                                                                    echo "selected='selected'";
                                                                } ?>><?php echo esc_html__('Bottom', 'compactor'); ?></option>
                                                            </select>
                                                        </li>
                                                        <li>
                                                            <label for="headings_b_separator_style"
                                                                   class="display_none"><?php echo esc_html__('Separator Style :', 'compactor'); ?></label>
                                                            <select name="headings_b_separator_style"
                                                                    class="wd_select2 display_none">
                                                                <option
                                                                    value="solid" <?php if (compactor_get_option('headings_b_separator_style') == 'solid') {
                                                                    echo "selected='selected'";
                                                                } ?>><?php echo esc_html__('Solid', 'compactor'); ?></option>
                                                                <option
                                                                    value="dashed" <?php if (compactor_get_option('headings_b_separator_style') == 'dashed') {
                                                                    echo "selected='selected'";
                                                                } ?>><?php echo esc_html__('Dashed', 'compactor'); ?></option>
                                                                <option
                                                                    value="dotted" <?php if (compactor_get_option('headings_b_separator_style') == 'dotted') {
                                                                    echo "selected='selected'";
                                                                } ?>><?php echo esc_html__('Dotted', 'compactor'); ?></option>
                                                            </select>
                                                        </li>
                                                        <li>
                                                            <label for="heading_b_separator_color"
                                                                   class="display_none"><?php echo esc_html__('Separator Color :', 'compactor'); ?></label>
                                                            <span class="display_none">
                                <input name="heading_b_separator_color" type="text"
                                       value="<?php echo compactor_get_option('heading_a_separator_color') ?>"
                                       class="wd-color-picker color-picker" data-alpha="true" data-default-color="#fff"
                                       data-picker="heading_b_separator_color_show">
                              </span>
                                                        </li>
                                                        <li>
                                                            <label for="heading_b_separator_width"
                                                                   class="display_none"><?php echo esc_html__('Separator Width:', 'compactor'); ?></label>
                                                            <input name="heading_b_separator_width" class="display_none"
                                                                   type="text"
                                                                   value="<?php echo compactor_get_option('heading_b_separator_width') ?>">
                                                        </li>
                                                    </ul>
                                                    <ul id="heading_title_style_2" class="tab-panel">
                                                        <h2><?php echo esc_html__('Title Typography', 'compactor'); ?></h2>
                                                        <li>
                                                            <?php
                                                            $compactor_fontArray = wd_Font_family();
                                                            ?>
                                                            <label
                                                                for="heading_b_title_font_family"><?php echo esc_html__('Title Font Family :', 'compactor'); ?></label>
                                                            <?php $font_family_value = compactor_get_option('heading_b_title_font_family'); ?>
                                                            <select name="heading_b_title_font_family"
                                                                    class="wd_select2">
                                                                <option
                                                                    value=""><?php echo esc_html__('Default', 'compactor'); ?></option>
                                                                <?php foreach ($compactor_fontArray as $key => $value) {
                                                                    ?>
                                                                    <option
                                                                        value="<?php echo esc_attr($key); ?>" <?php selected($key, $font_family_value, true) ?> ><?php echo esc_attr($value); ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </li>
                                                        <li>
                                                            <label
                                                                for="heading_b_title_font_style"><?php echo esc_html__('Title Font style :', 'compactor'); ?></label>
                                                            <select name="heading_b_title_font_style"
                                                                    class="wd_select2">
                                                                <option
                                                                    value=""><?php echo esc_html__('Default', 'compactor'); ?></option>
                                                                <?php
                                                                $font_style = wd_Font_Style($font_family_value);
                                                                $font_font_style = compactor_get_option("heading_b_title_font_style");
                                                                foreach ($font_style as $key => $value) {
                                                                    ?>
                                                                    <option
                                                                        value="<?php echo esc_attr($value); ?>" <?php selected($value, $font_font_style, true) ?>><?php echo esc_attr($key); ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </li>
                                                        <li>
                                                            <label
                                                                for="heading_b_title_font_weight"><?php echo esc_html__('Title Font Weight :', 'compactor'); ?></label>
                                                            <select name="heading_b_title_font_weight"
                                                                    class="wd_select2">
                                                                <option
                                                                    value=""><?php echo esc_html__('Default', 'compactor'); ?></option>
                                                                <?php
                                                                $font_weight_array = wd_font_weight($font_family_value);
                                                                $font_weight_value = compactor_get_option("heading_b_title_font_weight");
                                                                foreach ($font_weight_array as $weight) {
                                                                    ?>
                                                                    <option
                                                                        value="<?php echo esc_attr($weight); ?>" <?php selected($weight, $font_weight_value, true) ?>><?php echo esc_attr(wd_font_weight_name($weight)); ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </li>
                                                        <li>
                                                            <label
                                                                for="heading_b_title_font_size"><?php echo esc_html__('Title Font size :', 'compactor'); ?></label>
                                                            <input type="text" name="heading_b_title_font_size"
                                                                   value="<?php echo compactor_get_option('heading_b_title_font_size'); ?>">
                                                        </li>
                                                        <li>
                                                            <label
                                                                for="heading_b_title_font_color"><?php echo esc_html__('Title Color :', 'compactor'); ?></label>
                                                            <input name="heading_b_title_font_color" type="text"
                                                                   value="<?php echo compactor_get_option('heading_b_title_font_color') ?>"
                                                                   class="wd-color-picker color-picker"
                                                                   data-alpha="true" data-default-color="#fff"
                                                                   data-picker="heading_b_title_font_color_show">
                                                            <div
                                                                style="background-color:<?php echo esc_attr(compactor_get_option('heading_b_title_font_color')); ?>; display:inline-block; vertical-align: bottom;"
                                                                id="heading_b_title_font_color_show"></div>
                                                        </li>
                                                        <li>
                                                            <label
                                                                for="heading_b_title_text_transform"><?php echo esc_html__('Title Text Transform :', 'compactor'); ?></label>
                                                            <?php $b_text_transform = compactor_get_option('heading_b_title_text_transform') ?>
                                                            <select name="heading_b_title_text_transform"
                                                                    class="wd_select2">
                                                                <option
                                                                    value="" <?php selected($b_text_transform, "Default", true) ?>>
                                                                    <?php echo esc_html__('Default', 'compactor'); ?>
                                                                </option>
                                                                <option
                                                                    value="lowercase" <?php selected($b_text_transform, "lowercase", true) ?>><?php echo esc_html__('Lowercase', 'compactor'); ?></option>
                                                                <option
                                                                    value="uppercase" <?php selected($b_text_transform, "uppercase", true) ?>><?php echo esc_html__('Uppercase', 'compactor'); ?></option>
                                                                <option
                                                                    value="capitalize" <?php selected($b_text_transform, "capitalize", true) ?>><?php echo esc_html__('Capitalize', 'compactor'); ?></option>
                                                                <option
                                                                    value="inherit" <?php selected($b_text_transform, "inherit", true) ?>><?php echo esc_html__('Inherit', 'compactor'); ?></option>
                                                            </select>
                                                        </li>
                                                        <li>
                                                            <label
                                                                for="heading_b_title_line_height"><?php echo esc_html__('Title Line Height :', 'compactor'); ?></label>
                                                            <input type="text" name="heading_b_title_line_height"
                                                                   value="<?php echo compactor_get_option('heading_b_title_line_height'); ?>">
                                                        </li>
                                                        <li>
                                                            <label
                                                                for="heading_b_title_letter_spacing"><?php echo esc_html__('Title Letter Spacing :', 'compactor'); ?></label>
                                                            <input type="text" name="heading_b_title_letter_spacing"
                                                                   value="<?php echo compactor_get_option('heading_b_title_letter_spacing'); ?>">
                                                        </li>
                                                    </ul>
                                                    <ul id="heading_subtitle_style_2" class="tab-panel">
                                                        <h2><?php echo esc_html__('SubTitle Typography', 'compactor'); ?></h2>
                                                        <li>
                                                            <label
                                                                for="heading_b_subtitle_font_family"><?php echo esc_html__('Title Font Family :', 'compactor'); ?></label>
                                                            <?php $subtitle_font_family = compactor_get_option('heading_b_subtitle_font_family') ?>
                                                            <select name="heading_b_subtitle_font_family"
                                                                    class="wd_select2">
                                                                <option
                                                                    value=""><?php echo esc_html__('Default', 'compactor'); ?></option>
                                                                <?php foreach ($compactor_fontArray as $key => $value) {
                                                                    ?>
                                                                    <option
                                                                        value="<?php echo esc_attr($key); ?>" <?php selected($key, $subtitle_font_family, true) ?> ><?php echo esc_attr($value); ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </li>
                                                        <li>
                                                            <label
                                                                for="heading_b_subtitle_font_style"><?php echo esc_html__('Title Font style :', 'compactor'); ?></label>
                                                            <select name="heading_b_subtitle_font_style"
                                                                    class="wd_select2">
                                                                <option
                                                                    value=""><?php echo esc_html__('Default', 'compactor'); ?></option>
                                                                <?php
                                                                $subfont_style = wd_Font_Style($subtitle_font_family);
                                                                $subfont_font_style = compactor_get_option("heading_b_subtitle_font_style");
                                                                foreach ($subfont_style as $key => $value) {
                                                                    ?>
                                                                    <option
                                                                        value="<?php echo esc_attr($value); ?>" <?php selected($value, $subfont_font_style, true) ?>><?php echo esc_attr($key); ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </li>
                                                        <li>
                                                            <label
                                                                for="heading_b_subtitle_font_weight"><?php echo esc_html__('Title Font Weight :', 'compactor'); ?></label>
                                                            <select name="heading_b_subtitle_font_weight"
                                                                    class="wd_select2">
                                                                <option
                                                                    value=""><?php echo esc_html__('Default', 'compactor'); ?></option>
                                                                <?php
                                                                $subfont_weight_array = wd_font_weight($font_family_value);
                                                                $subfont_weight_value = compactor_get_option("heading_b_subtitle_font_weight");
                                                                foreach ($subfont_weight_array as $weight) {
                                                                    ?>
                                                                    <option
                                                                        value="<?php echo esc_attr($weight); ?>" <?php selected($weight, $subfont_weight_value, true) ?>><?php echo esc_attr(wd_font_weight_name($weight)); ?></option>
                                                                <?php }
                                                                ?>
                                                            </select>
                                                        </li>
                                                        <li>
                                                            <label
                                                                for="heading_b_subtitle_font_size"><?php echo esc_html__('Title Font size :', 'compactor'); ?></label>
                                                            <input type="text" name="heading_b_subtitle_font_size"
                                                                   value="<?php echo compactor_get_option('heading_b_subtitle_font_size'); ?>">
                                                        </li>
                                                        <li>
                                                            <?php $heading_b_subtitle_font_color = compactor_get_option('heading_b_subtitle_font_color'); ?>
                                                            <label
                                                                for="heading_b_subtitle_font_color"><?php echo esc_html__('Title Color :', 'compactor'); ?></label>
                                                            <input name="heading_b_subtitle_font_color" type="text"
                                                                   value="<?php echo compactor_get_option('heading_b_subtitle_font_color') ?>"
                                                                   class="wd-color-picker color-picker"
                                                                   data-alpha="true" data-default-color="#333"
                                                                   data-picker="heading_b_subtitle_font_color">
                                                            <div
                                                                style="background-color:<?php echo esc_attr($heading_b_subtitle_font_color); ?>; display:inline-block; vertical-align: bottom;"
                                                                id="heading_b_subtitle_font_color"></div>
                                                        </li>
                                                        <li>
                                                            <label
                                                                for="heading_b_subtitle_text_transform"><?php echo esc_html__('Title Text Transform :', 'compactor'); ?></label>
                                                            <?php $b_sub_text_transform = compactor_get_option("heading_b_subtitle_text_transform") ?>
                                                            <select name="heading_b_subtitle_text_transform"
                                                                    class="wd_select2">
                                                                <option
                                                                    value="" <?php selected($a_text_transform, "Default", true) ?>>
                                                                    <?php echo esc_html__('Default', 'compactor'); ?>
                                                                </option>
                                                                <option
                                                                    value="lowercase" <?php selected($b_sub_text_transform, "lowercase", true) ?>><?php echo esc_html__('Lowercase', 'compactor'); ?></option>
                                                                <option
                                                                    value="uppercase" <?php selected($b_sub_text_transform, "uppercase", true) ?>><?php echo esc_html__('Uppercase', 'compactor'); ?></option>
                                                                <option
                                                                    value="capitalize" <?php selected($b_sub_text_transform, "capitalize", true) ?>><?php echo esc_html__('Capitalize', 'compactor'); ?></option>
                                                                <option
                                                                    value="inherit" <?php selected($b_sub_text_transform, "inherit", true) ?>><?php echo esc_html__('Inherit', 'compactor'); ?></option>
                                                            </select>
                                                        </li>
                                                        <li>
                                                            <label
                                                                for="heading_b_subtitle_line_height"><?php echo esc_html__('Title Line Height :', 'compactor'); ?></label>
                                                            <input type="text" name="heading_b_subtitle_line_height"
                                                                   value="<?php echo compactor_get_option('heading_b_subtitle_line_height'); ?>">
                                                        </li>
                                                        <li>
                                                            <label
                                                                for="heading_b_subtitle_letter_spacing"><?php echo esc_html__('Title Letter Spacing :', 'compactor'); ?></label>
                                                            <input type="text" name="heading_b_subtitle_letter_spacing"
                                                                   value="<?php echo compactor_get_option('heading_b_subtitle_letter_spacing'); ?>">
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="heading-space">
                                                <div class="space">
                                                    <h2><?php echo esc_html__('Heading Bottom Space :', 'compactor'); ?></h2>
                                                    <div>
                        <span>
                          <label
                              for="heading_b_bottom_d_space"><?php echo esc_html__('Desktop Space :', 'compactor'); ?></label>
                          <input name="heading_b_bottom_d_space" type="text" placeholder="100"
                                 value="<?php echo compactor_get_option('heading_b_bottom_d_space') ?>">
                        </span>
                                                        <span>
                          <label
                              for="heading_b_bottom_t_space"><?php echo esc_html__('Tablet Space :', 'compactor'); ?></label>
                          <input name="heading_b_bottom_t_space" type="text" placeholder="70"
                                 value="<?php echo compactor_get_option('heading_b_bottom_t_space') ?>">
                        </span>
                                                        <span>
                          <label
                              for="heading_b_bottom_m_space"><?php echo esc_html__('Mobile Space :', 'compactor'); ?></label>
                          <input name="heading_b_bottom_m_space" type="text" placeholder="50"
                                 value="<?php echo compactor_get_option('heading_b_bottom_m_space') ?>">
                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tabset-3" style="display: none">
                                            <div class="heading-space">
                                                <div class="space">
                                                    <h2><?php echo esc_html__('Heading Top Space :', 'compactor'); ?></h2>
                                                    <div>
                        <span>
                          <label
                              for="heading_c_top_d_space"><?php echo esc_html__('Desktop Space :', 'compactor'); ?></label>
                          <input name="heading_c_top_d_space" type="text" placeholder="100"
                                 value="<?php echo compactor_get_option('heading_c_top_d_space') ?>">
                        </span>
                                                        <span>
                          <label
                              for="heading_c_top_t_space"><?php echo esc_html__('Tablet Space :', 'compactor'); ?></label>
                          <input name="heading_c_top_t_space" type="text" placeholder="70"
                                 value="<?php echo compactor_get_option('heading_c_top_t_space') ?>">
                        </span>
                                                        <span>
                          <label
                              for="heading_c_top_m_space"><?php echo esc_html__('Mobile Space :', 'compactor'); ?></label>
                          <input name="heading_c_top_m_space" type="text" placeholder="50"
                                 value="<?php echo compactor_get_option('heading_c_top_m_space') ?>">
                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="heading_style_3" class="tabset ">
                                                <!-- Tab 1 -->
                                                <input type="radio" name="tabset-3" id="tab7"
                                                       aria-controls="heading_general_style_3" checked>
                                                <label
                                                    for="tab7"><?php echo esc_html__('General', 'compactor'); ?></label>
                                                <!-- Tab 2 -->
                                                <input type="radio" name="tabset-3" id="tab8"
                                                       aria-controls="heading_title_style_3">
                                                <label
                                                    for="tab8"><?php echo esc_html__('Title Typography', 'compactor'); ?></label>
                                                <!-- Tab 3 -->
                                                <input type="radio" name="tabset-3" id="tab9"
                                                       aria-controls="heading_subtitle_style_3">
                                                <label
                                                    for="tab9"><?php echo esc_html__('SubTitle Typography', 'compactor'); ?></label>

                                                <div class="tab-panels">
                                                    <ul id="heading_general_style_3" class="tab-panel">
                                                        <h2><?php echo esc_html__('General', 'compactor'); ?></h2>
                                                        <li>
                                                            <label
                                                                for="heading_c_layout"><?php echo esc_html__('Heading Layout :', 'compactor'); ?></label>
                                                            <select name="heading_c_layout" class="wd_select2">
                                                                <option
                                                                    value="s-under-t" <?php if (compactor_get_option('heading_c_layout') == 's-under-t') {
                                                                    echo "selected='selected'";
                                                                } ?>><?php echo esc_html__('SubTitle under the title', 'compactor'); ?></option>
                                                                <option
                                                                    value="t-under-s" <?php if (compactor_get_option('heading_c_layout') == 't-under-s') {
                                                                    echo "selected='selected'";
                                                                } ?>><?php echo esc_html__('Title under the SubTitle', 'compactor'); ?></option>
                                                                <option
                                                                    value="s-behind-t" <?php if (compactor_get_option('heading_c_layout') == 's-behind-t') {
                                                                    echo "selected='selected'";
                                                                } ?>><?php echo esc_html__('SubTitle behind the title', 'compactor'); ?></option>
                                                                <option
                                                                    value="t-only" <?php if (compactor_get_option('heading_c_layout') == 't-only') {
                                                                    echo "selected='selected'";
                                                                } ?>><?php echo esc_html__('Title only', 'compactor'); ?></option>
                                                            </select>
                                                        </li>
                                                        <li>
                                                            <label
                                                                for="heading_c_alignment"><?php echo esc_html__('Heading alignment :', 'compactor'); ?></label>
                                                            <select name="heading_c_alignment" class="wd_select2">
                                                                <option
                                                                    value="center" <?php if (compactor_get_option('heading_c_alignment') == 'center') {
                                                                    echo "selected='selected'";
                                                                } ?>><?php echo esc_html__('Center', 'compactor'); ?></option>
                                                                <option
                                                                    value="left" <?php if (compactor_get_option('heading_c_alignment') == 'left') {
                                                                    echo "selected='selected'";
                                                                } ?>><?php echo esc_html__('Left', 'compactor'); ?></option>
                                                                <option
                                                                    value="right" <?php if (compactor_get_option('heading_c_alignment') == 'right') {
                                                                    echo "selected='selected'";
                                                                } ?>><?php echo esc_html__('Right', 'compactor'); ?></option>
                                                            </select>
                                                        </li>
                                                        <li>
                                                            <label
                                                                for="headings_c_separator"><?php echo esc_html__('Separator Type :', 'compactor'); ?></label>
                                                            <select name="headings_c_separator"
                                                                    class="wd_select2 separator_type">
                                                                <option
                                                                    value="none" <?php if (compactor_get_option('headings_c_separator') == 'none') {
                                                                    echo "selected='selected'";
                                                                } ?>><?php echo esc_html__('No Separator', 'compactor'); ?></option>
                                                                <option
                                                                    value="border" <?php if (compactor_get_option('headings_c_separator') == 'border') {
                                                                    echo "selected='selected'";
                                                                } ?>><?php echo esc_html__('Border', 'compactor'); ?></option>
                                                            </select>
                                                        </li>
                                                        <li>
                                                            <label for="headings_c_separator_position"
                                                                   class="display_none"><?php echo esc_html__('Separator Position :', 'compactor'); ?></label>
                                                            <select name="headings_c_separator_position"
                                                                    class="wd_select2 display_none">
                                                                <option
                                                                    value="center" <?php if (compactor_get_option('headings_c_separator_position') == 'center') {
                                                                    echo "selected='selected'";
                                                                } ?>><?php echo esc_html__('Center', 'compactor'); ?></option>
                                                                <option
                                                                    value="top" <?php if (compactor_get_option('headings_c_separator_position') == 'top') {
                                                                    echo "selected='selected'";
                                                                } ?>><?php echo esc_html__('Top', 'compactor'); ?></option>
                                                                <option
                                                                    value="bottom" <?php if (compactor_get_option('headings_c_separator_position') == 'bottom') {
                                                                    echo "selected='selected'";
                                                                } ?>><?php echo esc_html__('Bottom', 'compactor'); ?></option>
                                                            </select>
                                                        </li>
                                                        <li>
                                                            <label for="headings_c_separator_style"
                                                                   class="display_none"><?php echo esc_html__('Separator Style :', 'compactor'); ?></label>
                                                            <select name="headings_c_separator_style"
                                                                    class="wd_select2 display_none">
                                                                <option
                                                                    value="solid" <?php if (compactor_get_option('headings_c_separator_style') == 'solid') {
                                                                    echo "selected='selected'";
                                                                } ?>><?php echo esc_html__('Solid', 'compactor'); ?></option>
                                                                <option
                                                                    value="dashed" <?php if (compactor_get_option('headings_c_separator_style') == 'dashed') {
                                                                    echo "selected='selected'";
                                                                } ?>><?php echo esc_html__('Dashed', 'compactor'); ?></option>
                                                                <option
                                                                    value="dotted" <?php if (compactor_get_option('headings_c_separator_style') == 'dotted') {
                                                                    echo "selected='selected'";
                                                                } ?>><?php echo esc_html__('Dotted', 'compactor'); ?></option>
                                                            </select>
                                                        </li>
                                                        <li>
                                                            <label for="heading_c_separator_color"
                                                                   class="display_none"><?php echo esc_html__('Separator Color :', 'compactor'); ?></label>
                                                            <span class="display_none">
                              <input name="heading_c_separator_color" type="text"
                                     value="<?php echo compactor_get_option('heading_a_separator_color') ?>"
                                     class="wd-color-picker color-picker" data-alpha="true" data-default-color="#fff"
                                     data-picker="heading_c_separator_color_show">
                              </span>
                                                        </li>
                                                        <li>
                                                            <label for="heading_c_separator_width"
                                                                   class="display_none"><?php echo esc_html__('Separator Width:', 'compactor'); ?></label>
                                                            <input name="heading_c_separator_width" class="display_none"
                                                                   type="text"
                                                                   value="<?php echo compactor_get_option('heading_c_separator_width') ?>">
                                                        </li>
                                                    </ul>
                                                    <ul id="heading_title_style_3" class="tab-panel">
                                                        <h2><?php echo esc_html__('Title Typography', 'compactor'); ?></h2>
                                                        <h2><?php echo esc_html__('Title Typography', 'compactor'); ?></h2>
                                                        <li>
                                                            <?php
                                                            $compactor_fontArray = wd_Font_family();
                                                            ?>
                                                            <label
                                                                for="heading_c_title_font_family"><?php echo esc_html__('Title Font Family :', 'compactor'); ?></label>
                                                            <?php $font_family_value = compactor_get_option('heading_c_title_font_family'); ?>
                                                            <select name="heading_c_title_font_family"
                                                                    class="wd_select2">
                                                                <option
                                                                    value=""><?php echo esc_html__('Default', 'compactor'); ?></option>
                                                                <?php foreach ($compactor_fontArray as $key => $value) {
                                                                    ?>
                                                                    <option
                                                                        value="<?php echo esc_attr($key); ?>" <?php selected($key, $font_family_value, true) ?> ><?php echo esc_attr($value); ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </li>
                                                        <li>
                                                            <label
                                                                for="heading_c_title_font_style"><?php echo esc_html__('Title Font style :', 'compactor'); ?></label>
                                                            <select name="heading_c_title_font_style"
                                                                    class="wd_select2">
                                                                <option
                                                                    value=""><?php echo esc_html__('Default', 'compactor'); ?></option>
                                                                <?php
                                                                $font_style = wd_Font_Style($font_family_value);
                                                                $font_font_style = compactor_get_option("heading_c_title_font_style");
                                                                foreach ($font_style as $key => $value) {
                                                                    ?>
                                                                    <option
                                                                        value="<?php echo esc_attr($value); ?>" <?php selected($value, $font_font_style, true) ?>><?php echo esc_attr($key); ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </li>
                                                        <li>
                                                            <label
                                                                for="heading_c_title_font_weight"><?php echo esc_html__('Title Font Weight :', 'compactor'); ?></label>
                                                            <select name="heading_c_title_font_weight"
                                                                    class="wd_select2">
                                                                <option
                                                                    value=""><?php echo esc_html__('Default', 'compactor'); ?></option>
                                                                <?php
                                                                $font_weight_array = wd_font_weight($font_family_value);
                                                                $font_weight_value = compactor_get_option("heading_c_title_font_weight");
                                                                foreach ($font_weight_array as $weight) {
                                                                    ?>
                                                                    <option
                                                                        value="<?php echo esc_attr($weight); ?>" <?php selected($weight, $font_weight_value, true) ?>><?php echo esc_attr(wd_font_weight_name($weight)); ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </li>
                                                        <li>
                                                            <label
                                                                for="heading_c_title_font_size"><?php echo esc_html__('Title Font size :', 'compactor'); ?></label>
                                                            <input type="text" name="heading_c_title_font_size"
                                                                   value="<?php echo compactor_get_option('heading_c_title_font_size'); ?>">
                                                        </li>
                                                        <li>
                                                            <label
                                                                for="heading_c_title_font_color"><?php echo esc_html__('Title Color :', 'compactor'); ?></label>
                                                            <input name="heading_c_title_font_color" type="text"
                                                                   value="<?php echo compactor_get_option('heading_c_title_font_color') ?>"
                                                                   class="wd-color-picker color-picker"
                                                                   data-alpha="true" data-default-color="#fff"
                                                                   data-picker="heading_c_title_font_color_show">
                                                            <div
                                                                style="background-color:<?php echo esc_attr(compactor_get_option('heading_c_title_font_color')); ?>; display:inline-block; vertical-align: bottom;"
                                                                id="heading_c_title_font_color_show"></div>
                                                        </li>
                                                        <li>
                                                            <label
                                                                for="heading_c_title_text_transform"><?php echo esc_html__('Title Text Transform :', 'compactor'); ?></label>
                                                            <?php $c_text_transform = compactor_get_option('heading_c_title_text_transform') ?>
                                                            <select name="heading_c_title_text_transform"
                                                                    class="wd_select2">
                                                                <option
                                                                    value="" <?php selected($c_text_transform, "Default", true) ?>>
                                                                    <?php echo esc_html__('Default', 'compactor'); ?>
                                                                </option>
                                                                <option
                                                                    value="lowercase" <?php selected($c_text_transform, "lowercase", true) ?>><?php echo esc_html__('Lowercase', 'compactor'); ?></option>
                                                                <option
                                                                    value="uppercase" <?php selected($c_text_transform, "uppercase", true) ?>><?php echo esc_html__('Uppercase', 'compactor'); ?></option>
                                                                <option
                                                                    value="capitalize" <?php selected($c_text_transform, "capitalize", true) ?>><?php echo esc_html__('Capitalize', 'compactor'); ?></option>
                                                                <option
                                                                    value="inherit" <?php selected($c_text_transform, "inherit", true) ?>><?php echo esc_html__('Inherit', 'compactor'); ?></option>
                                                            </select>
                                                        </li>
                                                        <li>
                                                            <label
                                                                for="heading_c_title_line_height"><?php echo esc_html__('Title Line Height :', 'compactor'); ?></label>
                                                            <input type="text" name="heading_c_title_line_height"
                                                                   value="<?php echo compactor_get_option('heading_c_title_line_height'); ?>">
                                                        </li>
                                                        <li>
                                                            <label
                                                                for="heading_c_title_letter_spacing"><?php echo esc_html__('Title Letter Spacing :', 'compactor'); ?></label>
                                                            <input type="text" name="heading_c_title_letter_spacing"
                                                                   value="<?php echo compactor_get_option('heading_c_title_letter_spacing'); ?>">
                                                        </li>
                                                    </ul>
                                                    <ul id="heading_subtitle_style_3" class="tab-panel">
                                                        <h2><?php echo esc_html__('SubTitle Typography', 'compactor'); ?></h2>
                                                        <li>
                                                            <label
                                                                for="heading_c_subtitle_font_family"><?php echo esc_html__('Title Font Family :', 'compactor'); ?></label>
                                                            <?php $subtitle_font_family = compactor_get_option('heading_c_subtitle_font_family') ?>
                                                            <select name="heading_c_subtitle_font_family"
                                                                    class="wd_select2">
                                                                <option
                                                                    value=""><?php echo esc_html__('Default', 'compactor'); ?></option>
                                                                <?php foreach ($compactor_fontArray as $key => $value) {
                                                                    ?>
                                                                    <option
                                                                        value="<?php echo esc_attr($key); ?>" <?php selected($key, $subtitle_font_family, true) ?> ><?php echo esc_attr($value); ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </li>
                                                        <li>
                                                            <label
                                                                for="heading_c_subtitle_font_style"><?php echo esc_html__('Title Font style :', 'compactor'); ?></label>
                                                            <select name="heading_c_subtitle_font_style"
                                                                    class="wd_select2">
                                                                <option
                                                                    value=""><?php echo esc_html__('Default', 'compactor'); ?></option>
                                                                <?php
                                                                $subfont_style = wd_Font_Style($subtitle_font_family);
                                                                $subfont_font_style = compactor_get_option("heading_c_subtitle_font_style");
                                                                foreach ($subfont_style as $key => $value) {
                                                                    ?>
                                                                    <option
                                                                        value="<?php echo esc_attr($value); ?>" <?php selected($value, $subfont_font_style, true) ?>><?php echo esc_attr($key); ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </li>
                                                        <li>
                                                            <label
                                                                for="heading_c_subtitle_font_weight"><?php echo esc_html__('Title Font Weight :', 'compactor'); ?></label>
                                                            <select name="heading_c_subtitle_font_weight"
                                                                    class="wd_select2">
                                                                <option
                                                                    value=""><?php echo esc_html__('Default', 'compactor'); ?></option>
                                                                <?php
                                                                $subfont_weight_array = wd_font_weight($font_family_value);
                                                                $subfont_weight_value = compactor_get_option("heading_c_subtitle_font_weight");
                                                                foreach ($subfont_weight_array as $weight) {
                                                                    ?>
                                                                    <option
                                                                        value="<?php echo esc_attr($weight); ?>" <?php selected($weight, $subfont_weight_value, true) ?>><?php echo esc_attr(wd_font_weight_name($weight)); ?></option>
                                                                <?php }
                                                                ?>
                                                            </select>
                                                        </li>
                                                        <li>
                                                            <label
                                                                for="heading_c_subtitle_font_size"><?php echo esc_html__('Title Font size :', 'compactor'); ?></label>
                                                            <input type="text" name="heading_c_subtitle_font_size"
                                                                   value="<?php echo compactor_get_option('heading_c_subtitle_font_size'); ?>">
                                                        </li>
                                                        <li>
                                                            <?php $heading_c_subtitle_font_color = compactor_get_option('heading_c_subtitle_font_color'); ?>
                                                            <label
                                                                for="heading_c_subtitle_font_color"><?php echo esc_html__('Title Color :', 'compactor'); ?></label>
                                                            <input name="heading_c_subtitle_font_color" type="text"
                                                                   value="<?php echo compactor_get_option('heading_c_subtitle_font_color') ?>"
                                                                   class="wd-color-picker color-picker"
                                                                   data-alpha="true" data-default-color="#333"
                                                                   data-picker="heading_c_subtitle_font_color">
                                                            <div
                                                                style="background-color:<?php echo esc_attr($heading_c_subtitle_font_color); ?>; display:inline-block; vertical-align: bottom;"
                                                                id="heading_c_subtitle_font_color"></div>
                                                        </li>
                                                        <li>
                                                            <label
                                                                for="heading_c_subtitle_text_transform"><?php echo esc_html__('Title Text Transform :', 'compactor'); ?></label>
                                                            <?php $c_sub_text_transform = compactor_get_option("heading_c_subtitle_text_transform") ?>
                                                            <select name="heading_c_subtitle_text_transform"
                                                                    class="wd_select2">
                                                                <option
                                                                    value="" <?php selected($a_text_transform, "Default", true) ?>>
                                                                    <?php echo esc_html__('Default', 'compactor'); ?>
                                                                </option>
                                                                <option
                                                                    value="lowercase" <?php selected($c_sub_text_transform, "lowercase", true) ?>><?php echo esc_html__('Lowercase', 'compactor'); ?></option>
                                                                <option
                                                                    value="uppercase" <?php selected($c_sub_text_transform, "uppercase", true) ?>><?php echo esc_html__('Uppercase', 'compactor'); ?></option>
                                                                <option
                                                                    value="capitalize" <?php selected($c_sub_text_transform, "capitalize", true) ?>><?php echo esc_html__('Capitalize', 'compactor'); ?></option>
                                                                <option
                                                                    value="inherit" <?php selected($c_sub_text_transform, "inherit", true) ?>><?php echo esc_html__('Inherit', 'compactor'); ?></option>
                                                            </select>
                                                        </li>
                                                        <li>
                                                            <label
                                                                for="heading_c_subtitle_line_height"><?php echo esc_html__('Title Line Height :', 'compactor'); ?></label>
                                                            <input type="text" name="heading_c_subtitle_line_height"
                                                                   value="<?php echo compactor_get_option('heading_c_subtitle_line_height'); ?>">
                                                        </li>
                                                        <li>
                                                            <label
                                                                for="heading_c_subtitle_letter_spacing"><?php echo esc_html__('Title Letter Spacing :', 'compactor'); ?></label>
                                                            <input type="text" name="heading_c_subtitle_letter_spacing"
                                                                   value="<?php echo compactor_get_option('heading_c_subtitle_letter_spacing'); ?>">
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="heading-space">
                                                <div class="space">
                                                    <h2><?php echo esc_html__('Heading Bottom Space :', 'compactor'); ?></h2>
                                                    <div>
                        <span>
                          <label
                              for="heading_c_bottom_d_space"><?php echo esc_html__('Desktop Space :', 'compactor'); ?></label>
                          <input name="heading_c_bottom_d_space" type="text" placeholder="100"
                                 value="<?php echo compactor_get_option('heading_c_bottom_d_space') ?>">
                        </span>
                                                        <span>
                          <label
                              for="heading_c_bottom_t_space"><?php echo esc_html__('Tablet Space :', 'compactor'); ?></label>
                          <input name="heading_c_bottom_t_space" type="text" placeholder="70"
                                 value="<?php echo compactor_get_option('heading_c_bottom_t_space') ?>">
                        </span>
                                                        <span>
                          <label
                              for="heading_c_bottom_m_space"><?php echo esc_html__('Mobile Space :', 'compactor'); ?></label>
                          <input name="heading_c_bottom_m_space" type="text" placeholder="50"
                                 value="<?php echo compactor_get_option('heading_c_bottom_m_space') ?>">
                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="height columns wp-core-ui wd-validate">
                    <p>
                        <input class="button" value="<?php echo esc_html__('Update Options', 'compactor'); ?>" name=""
                               type="submit">
                    </p>
                </div>
            </form>
        </div>


        <?php
    }
}