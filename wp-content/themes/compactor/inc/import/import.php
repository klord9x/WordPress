<?php

function import_init()
{
    if (class_exists('WebdeviaMainPlugin')) {
        add_theme_page('Import Demo Content', 'Import Demo Content', 'edit_theme_options', 'compactor-demo-content', 'compactor_import_demo');
    }
}

add_action('admin_menu', 'import_init');

if (!function_exists('compactor_import_demo')) {
    function compactor_import_demo()
    {

        wp_enqueue_script('consilting-js-import', get_template_directory_uri() . "/inc/js/import_js.js", array('jquery'));
        ?>
        <div id="tabs-6">
            <div id="wd-metaboxes-general" class="wrap wd-page wd-page-info"
                 style="padding: 20px;background-color: #FFF;">
                <div class="notice-warning settings-error notice is-dismissible">
                    <h4><strong><?php echo esc_html__('IMPORTANT INSTRUCTIONS','compactor') ?></strong></h4>
                    <p><?php echo esc_html__('Depending of your server\'s settings, you may need to increase the limits. Please do the following
                        steps
                        before install the demo:','compactor') ?></p>
                    <ol>
                        <li><?php echo esc_html__('install','compactor') ?> <strong><?php echo esc_html__('PHP Settings','compactor') ?></strong> <?php echo esc_html__('plugin','compactor') ?></li>
                        <li><?php echo esc_html__('Go to','compactor') ?> <strong><?php echo esc_html__('Tools -> PHP Settings','compactor') ?></strong></li>

                        <li><?php echo esc_html__('Add this limits:','compactor') ?>
                            <ul>
                                <li><?php echo esc_html__('max_execution_time = 2000','compactor') ?></li>
                                <li><?php echo esc_html__('memory_limit = 512M','compactor') ?></li>
                                <li><?php echo esc_html__('post_max_siz = 256M','compactor') ?></li>
                                <li><?php echo esc_html__('upload_max_filesize = 256M','compactor') ?></li>
                            </ul>
                        </li>
                        <li><?php echo esc_html__('Hit Save Settings','compactor') ?></li>
                    </ol>

                </div>
                <table class="form-table">
                    <tbody>
                    <tr>
                        <td style="display: none;"></td>
                        <td class="import-demo-screenshot" style="padding-left: 250px;">
                            <em class="wd-field-description"><?php echo esc_html__('Select demo to import', 'compactor'); ?>
                                : </em>
                            <select name="Demo_selector" id="Demo_selector" class="form-control wd-form-element">
                                <option value="demo-1"><?php echo esc_html__('Main Demo', 'compactor'); ?></option>
                                <option value="demo-2"><?php echo esc_html__('Demo-2', 'compactor'); ?></option>
                                <option value="demo-3"><?php echo esc_html__('Demo-3', 'compactor'); ?></option>
                            </select><br>
                            <label class="demo-1 demos_label" for="demo-1"></label>
                            <label class="demo-2 demos_label" for="demo-2" style="display: none"></label>
                            <label class="demo-3 demos_label" for="demo-3" style="display: none"></label>
                        </td>
                    </tr>
                    <tr>
                        <td style="display:none;"></td>
                        <td style="padding-left: 250px;">
                            <em class="wd-field-description"><?php echo esc_html__('Import Type', 'compactor'); ?>
                                : </em>
                            <select name="import_option" id="import_option" class="form-control wd-form-element">
                                <option value=""><?php echo esc_html__('Please Select', 'compactor'); ?></option>
                                <option value="complete_content"><?php echo esc_html__('All', 'compactor'); ?></option>
                                <option value="content"><?php echo esc_html__('Content', 'compactor'); ?></option>
                                <option value="widgets"><?php echo esc_html__('Widgets', 'compactor'); ?></option>
                                <option value="options"><?php echo esc_html__('Options', 'compactor'); ?></option>
                                <option value="menus"><?php echo esc_html__('Menus', 'compactor'); ?></option>
                            </select>
                        </td>
                    </tr>
                    <tr id="tr_import_attachments" style="display:none;">
                        <td style="display: none;"></td>
                        <td style="padding-left: 250px;">
                            <p><?php echo esc_html__('Do you want to import media files?', 'compactor'); ?></p>
                            <input type="checkbox" value="1" class="wd-form-element" name="import_attachments"
                                   id="import_attachments"/>
                        </td>
                    </tr>
                    <tr id="tr_delete_menus" style="display:none;">
                        <td style="display: none;"></td>
                        <td style="padding-left: 250px;">
                            <p><?php echo esc_html__('Do you want to delete all existing menus?', 'compactor'); ?></p>
                            <input type="checkbox" value="1" class="wd-form-element" name="delete_menus"
                                   id="delete_menus"/>
                        </td>
                    </tr>
                    <tr>
                        <td style="display: none;"></td>
                        <td style="padding-left: 250px;">
                            <input type="submit" class="button button-primary"
                                   value="<?php echo esc_html__('Import', 'compactor'); ?>"
                                   name="import" id="import_demo_data"/>
                            <img id="loading_gif"
                                 src="<?php echo get_template_directory_uri() . '/images/loading_import.gif'; ?>"
                                 style="margin-left:20px; display:none"/>
                            <img id="OK_result"
                                 src="<?php echo get_template_directory_uri() . '/images/OK_result.png'; ?>"
                                 style="margin-left:20px; display:none"/>
                            <img id="NOK_result"
                                 src="<?php echo get_template_directory_uri() . '/images/NOK_result.png'; ?>"
                                 style="margin-left:20px; display:none"/>
                        </td>
                    </tr>
                    <tr>
                        <td style="display: none;"></td>
                        <td style="padding-left: 250px;">
                            <span><?php esc_html__('The import process may take some time. Please be patient.', 'compactor') ?> </span><br/>
                            <div class="import_load">
                                <div class="wd-progress-bar-wrapper html5-progress-bar">
                                    <div class="progress-bar-wrapper">
                                        <progress id="progressbar" value="0" max="100"></progress>
                                    </div>
                                    <div class="progress-value">0%</div>
                                    <div class="progress-bar-message"></div>
                                    <div class="error-message" style="color:#990000; font-weight:bold;"></div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="display: none;"></td>
                        <td style="text-align: center;">
                            <div class="alert alert-warning">
                                <strong><?php esc_html__('Important notes:', 'compactor') ?></strong>
                                <ul>
                                    <li><?php esc_html__('Please note that import process will take time needed to download all attachments from demo web site.', 'compactor'); ?></li>
                                    <li> <?php esc_html__('If you plan to use shop, please install <b>WooCommerce</b> before you run import.', 'compactor') ?></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>
        <?php
    }
}