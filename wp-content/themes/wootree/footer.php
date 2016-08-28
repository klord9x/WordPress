<div id="footer">
    <div id="tmfooterlinks">
        <div>
            <ul>
                <li><img src="<?php echo get_template_directory_uri().'/images/7x7.png'; ?>" width="15" height="15"> <a href="#">DỊCH VỤ KHÁCH HÀNG</a></li>
                <li><img src="<?php echo get_template_directory_uri().'/images/7x7.png'; ?>" width="15" height="15"> <a href="#">LIÊN HỆ ĐẶT HÀNG</a></li>
                <li><img src="<?php echo get_template_directory_uri().'/images/7x7.png'; ?>" width="15" height="15"> <a href="#">DỊCH VỤ VẬN CHUYỂN</a></li>
            </ul>
        </div>
        <div>
            <ul>
                <li><img src="<?php echo get_template_directory_uri().'/images/7x7.png'; ?>" width="15" height="15"> <a href="#">EMAIL THÔNG BÁO</a></li>
                <li><img src="<?php echo get_template_directory_uri().'/images/7x7.png'; ?>" width="15" height="15"> <a href="#">CÂU HỎI THƯỜNG GẶP</a></li>
                <li><img src="<?php echo get_template_directory_uri().'/images/7x7.png'; ?>" width="15" height="15"> <a href="#">TUYỂN DỤNG</a></li>
            </ul>
        </div>
        <div>
            <ul>
                <li><img src="<?php echo get_template_directory_uri().'/images/7x7.png'; ?>" width="15" height="15"> <a href="#">KÊNH PHÂN PHỐI</a></li>
                <li><img src="<?php echo get_template_directory_uri().'/images/7x7.png'; ?>" width="15" height="15"> <a href="#">QUÀ TẶNG</a></li>
                <li><img src="<?php echo get_template_directory_uri().'/images/7x7.png'; ?>" width="15" height="15"> <a href="#">ĐIỀU KHOẢN QUY ĐỊNH</a></li>
            </ul>
        </div>
        <div>
            <ul>
                <li><img src="<?php echo get_template_directory_uri().'/images/fb.png'; ?>" width="15" height="15"> <a href="https://www.facebook.com/chococo.com.vn" target="_blank">FACEBOOK</a></li>
            </ul>
        </div>
        <p>Thiết kế <a href="#">NP2H</a></p>
    </div>
</div>
</div>
<!-- end columns -->
</div>
<!-- wrapper4 -->
</div>
<!-- wrapper3 -->
</div>
<!-- wrapper2 -->
</div>
<!-- wrapper1 -->
<?php wp_footer(); ?>
<!-- Script for slider -->
<script type="text/javascript">
jQuery(document).ready(function($) {
    // Code that uses jQuery's $ can follow here.
    $('#slider').nivoSlider({
        effect: 'fade', //Specify sets like: 'fold,fade,sliceDown'
        slices: 9,
        animSpeed: 500, //Slide transition speed
        pauseTime: 5000,
        startSlide: 0, //Set starting Slide (0 index)
        directionNav: false, //Next & Prev
        directionNavHide: false, //Only show on hover
        controlNav: true, //1,2,3...
        controlNavThumbs: false, //Use thumbnails for Control Nav
        controlNavThumbsFromRel: false, //Use image rel for thumbs
        controlNavThumbsSearch: '.jpg', //Replace this with...
        controlNavThumbsReplace: '_thumb.jpg', //...this in thumb Image src
        keyboardNav: true, //Use left & right arrows
        pauseOnHover: true, //Stop animation while hovering
        manualAdvance: false, //Force manual transitions
        captionOpacity: 0.8, //Universal caption opacity
        beforeChange: function() {},
        afterChange: function() {},
        slideshowEnd: function() {} //Triggers after all slides have been shown
    });
});
</script>
</body>

</html>
