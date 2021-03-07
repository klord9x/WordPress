
<div class="pricing-table  <?php echo ' ' . $featured .' ' . $animation_classes .' ' . $style; echo esc_attr( $css_class ) ?>" style="<?php $text_color !== '' ? print 'color : '.$text_color.';' : print ''; ?>"  <?php echo esc_attr($data_animated); ?>>
<?php if($product_icon !='') { ?>
    <div class="__pricing-table-image">
        <?php
        $img = wpb_getImageBySize( array( 'attach_id' => $product_icon, 'thumb_size' => 'compactor_pricingtable') );
        $img_path=$img['p_img_large'][0]; ?>
        <img <?php if(!empty($image_width)){ ?>style="max-height: <?php echo $image_width ?>" <?php } ?> src="<?php echo $img_path  ?>" alt='icon' />
    </div>
    <?php } ?>
    <div class="__pricing-table-header">
            <h3><?php echo $title; ?></h3>
            <span><?php echo $lines_min; ?> lines min</span>

    </div>
    <div class="__pricing-table-sub-body" style="<?php $text_color !== '' ? print 'border-color:  '.$text_color.';border-color: '.$text_color.';' : print ''; ?>">
        <ul>
            <?php
            if(count($sub_options) != 0) {
                foreach ($sub_options as $sub_option) { ?>
                    <li><?php echo $sub_option['sub_option']; ?></li>
                <?php } } ?>
        </ul>
    </div>
    <div class="__pricing-table-body">
        <div class="__pricing-table-header-right">
            <div class="price">
                <span class="currency"><?php echo $currency ; ?></span>
                <span class="price-value"> <?php echo $price; ?></span>
                <span class="value"> <?php echo $sub_price; ?></span>
            </div>
            <span>/<?php echo $per_value; ?></span>
        </div>
    </div>
    <?php if($button_link['title'] != '') {            ?>
        <div class="readmore-button">
            <a href="<?php echo $button_link['url'] ?>" <?php if($style_btn_text != '' or $style_btn_bg!= '') echo 'style='.$style_btn_bg.$style_btn_text  ?>><?php echo $button_link['title']; ?></a>
        </div>
    <?php } ?>
</div>