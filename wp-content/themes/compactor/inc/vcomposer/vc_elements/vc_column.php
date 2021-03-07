<?php

/*============================= Columns  =====================================*/
vc_add_param("vc_column", array(
    "type" => "checkbox",
    "class" => "",
    "heading" => esc_html__("Equal Height Columns","compactor"),
    "param_name" => "equalizer_column",
    "value" => array("Create equal height content on your column ?" => "yes")
));
vc_add_param("vc_column_inner", array(
    "type" => "checkbox",
    "class" => "",
    "heading" => esc_html__("Equal Height Columns","compactor"),
    "param_name" => "equalizer_column_inner",
    "value" => array("Create equal height content on your column ?" => "yes")
));