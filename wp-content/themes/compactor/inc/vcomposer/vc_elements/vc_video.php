<?php

/*============================= Video =====================================*/
if (function_exists('vc_remove_param')) {
    vc_remove_param('vc_video', 'link');
    vc_remove_param('vc_tour', 'title');
    vc_remove_param('vc_single_image', 'onclick');
}

vc_add_param('vc_video', array(
        'type' => 'dropdown',
        'class' => '',
        'heading' => esc_html__('Video mode...', 'compactor'),
        'param_name' => 'video_module_mode',
        'value' => array(
            esc_html__('Simple video', 'compactor') => 'simple',
            esc_html__('Full screen video', 'compactor') => 'full_screen'
        ),
    )
);
vc_add_param('vc_video', array(
        'type' => 'textfield',
        'heading' => esc_html__('Video link', 'compactor'),
        'param_name' => 'link',
        'admin_label' => true,
        'description' => sprintf(esc_html__('Link to the video. More about supported formats at %s.', 'compactor'), '<a href="http://codex.wordpress.org/Embeds#Okay.2C_So_What_Sites_Can_I_Embed_From.3F" target="_blank">WordPress codex page</a>'),
        'dependency' => array('element' => 'video_module_mode', 'value' => array('simple')),
    )
);
vc_add_param('vc_video', array(
        'type' => 'attach_image',
        'class' => '',
        'heading' => esc_html__('Thumbnail Image', 'compactor'),
        'param_name' => 'video_thumb_image',
        'value' => '',
        'description' => esc_html__('Upload or select video thumbnail image from media gallery.', 'compactor'),
    )
);
vc_add_param('vc_video', array(
        'type' => 'textfield',
        'class' => '',
        'heading' => esc_html__('Thumbnail Image resize', 'compactor'),
        'param_name' => 'video_thumb_image_size',
        'value' => '800x530',
        'description' => esc_html__('select video thumbnail image size.', 'compactor'),
    )
);
vc_add_param('vc_video', array(
        'type' => 'dropdown',
        'class' => '',
        'heading' => esc_html__('Video source', 'compactor'),
        'param_name' => 'video_source',
        'value' => array(
            esc_html__('Youtube', 'compactor') => 'youtube',
            esc_html__('Vimeo', 'compactor') => 'vimeo'
        ),
        'dependency' => array('element' => 'video_module_mode', 'value' => array('full_screen')),
    )
);
vc_add_param('vc_video', array(
        'type' => 'textfield',
        'heading' => esc_html__('Video ID', 'compactor'),
        'param_name' => 'video_id',
        'admin_label' => true,
        'dependency' => array('element' => 'video_module_mode', 'value' => array('full_screen')),
    )
);
vc_add_param('vc_video', array(
        'type' => 'dropdown',
        'class' => '',
        'heading' => esc_html__('Label Alignment', 'compactor'),
        'param_name' => 'module_alignment',
        "value" => array(
            esc_html__('Left', 'compactor') => "text-left",
            esc_html__('Center', 'compactor') => "text-center",
            esc_html__('Right', 'compactor') => "text-right"
        ),
        'dependency' => array('element' => 'video_module_mode', 'value' => array('full_screen')),
    )
);
vc_add_param('vc_video', array(
        'type' => 'dropdown',
        'class' => '',
        'heading' => esc_html__('Modal Size (width)', 'compactor'),
        'param_name' => 'modal_size',
        "value" => array(
            esc_html__('Medium (60%)', 'compactor') => "medium",
            esc_html__('Small (40%)', 'compactor') => "small",
            esc_html__('Tiny (30%)', 'compactor') => "tiny",
            esc_html__('Large (70%)', 'compactor') => "large",
            esc_html__('XLarge (95%)', 'compactor') => "xlarge",
            esc_html__('Full (100%)', 'compactor') => "full"
        ),
        'dependency' => array('element' => 'video_module_mode', 'value' => array('full_screen')),
    )
);
vc_add_param('vc_video', array(
        'type' => 'colorpicker',
        'class' => '',
        'heading' => esc_html__('Icon color', 'compactor'),
        'param_name' => 'icon_color',
        'dependency' => array('element' => 'video_module_mode', 'value' => array('full_screen')),
    )
);
vc_add_param('vc_video', array(
        'type' => 'colorpicker',
        'heading' => esc_html__('Label background', 'compactor'),
        'param_name' => 'label_background',
        'dependency' => array('element' => 'video_module_mode', 'value' => array('full_screen')),
    )
);