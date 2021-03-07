

<div class="pricing-table  <?php echo ' ' . $featured .' ' . $animation_classes .' ' . $style; echo esc_attr( $css_class ) ?>"
     style="<?php $text_color !== '' ? print 'color : '.$text_color.';' : print ''; ?>"  <?php echo esc_attr($data_animated); ?>>
    <div class="__pricing-table-header">
        <div class="__pricing-table-header-left">
            <h3><?php echo $title; ?></h3>
            <span><?php echo $lines_min; ?> lines min</span>
        </div>
        <div class="__pricing-table-header-right">
            <div class="price">
                <span class="currency"><?php echo $currency ; ?></span>
                <span class="price-value"> <?php echo $price; ?></span>
                <span class="value"> <?php echo $sub_price; ?></span>
            </div>
            <span>/<?php echo $per_value; ?></span>
        </div>
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
        <ul class="package-list">
            <?php
            if(count($plan_options) != 0) {
                foreach ($plan_options as $plan_option) { ?>
                    <li class="<?php echo $plan_option['has_value'];?>"><?php  if(isset($plan_option['plan_option'])) echo $plan_option['plan_option']; ?></li>
                <?php } } ?>
        </ul>
    </div>
    <?php if($button_link['title'] != '') {            ?>
        <div class="readmore-button">
            <a href="<?php echo $button_link['url'] ?>" <?php if($style_btn_text != '' or $style_btn_bg!= '') echo 'style='.$style_btn_bg.$style_btn_text  ?>><?php echo $button_link['title']; ?></a>
        </div>
    <?php } ?>
</div>