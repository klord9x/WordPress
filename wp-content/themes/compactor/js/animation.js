jQuery(document).ready(function ($) {
	"use strict";

	var wd_obj = {
		body: $('body'),
		another: 'woof'
	};

	//   Smooth page transition
	if (wd_obj.body.hasClass("wd_page_transitions")) {
		var ctrlKey = false;
		$(document).on('keyup keydown', function (e) {
			ctrlKey = e.ctrlKey;
		});
		var i = $(".landing");
		i.on("click", function (e) {
			// control-click
			if (ctrlKey) {
				return
			} else {
				var a = $(this);
				if (a.attr("href").split("#")[0] !== window.location.href.split("#")[0] && a.attr("href").charAt(0) !== "#") {
					e.preventDefault()
					$('body').css('overflow-y', 'auto');
					$('.page-loading').fadeIn(800, "easeInOutCirc");
					TweenMax.to($('.page-loading .double-bounce1'),.3,{scale: 1});
					TweenMax.to($('.page-loading .double-bounce1'),.3,{
						animationName: 'sk-bounce',
						animationDuration: '2s',
						animationIterationCount: 'infinite',
						animationTimingFunction: 'ease-in-out',
					});
					$('#spaces-main').fadeOut(800, "easeInOutCirc", function () {
						window.location = a.attr("href")
					})
				}
			}
		})
	}

	// Remove page loading animation
	setTimeout(function(){
		TweenMax.to($('.page-loading .double-bounce1'),.3,{animation:'none',scale: 30});
		$('.page-loading').fadeOut(800, "easeInOutCirc");

		$('body').css('overflow-y', 'auto');

		TweenMax.from($('#page-title'),1,{ top:-200, opacity:0.5, scale: 3, transform:'rotate3d(1, 0, 0, 45deg)', ease:Power2.easeOut, delay:.2});
	}, 1700);


	//======================= SVG animation ==========================
	jQuery('.text-icon').on("hover",
		function () {
			TweenMax.to(this,.3,{overflow: 'hidden'});
			TweenMax.to($(this).find('svg'),.3,{overflow: 'visible'});
			TweenMax.to($(this).find('svg circle'),.3,{scale:4, opacity: .08, transformOrigin:"0% 0%"});
		}, function() {
			TweenMax.to($(this).find('svg circle'),.3,{scale:1, opacity: 1});
		}
	);



	//======================= hide & show Header on scroll =========================

	function compactor_hasScrolled() {
		"use strict";
		var l = jQuery(window).scrollTop();
		if(Math.abs(lastScrollTop - l) <= scrollAmount){
			return;
		}
		if(l > lastScrollTop && l > navbarHeight){
			jQuery(".slideUp").css({top: -150})
			jQuery(".slideUp").css({opacity: 0})
			///jQuery(".slideUp").css({top: -jQuery(window).outerHeight()})
		}else {
			if(l + jQuery(window).height() < jQuery(document).height()){
				jQuery(".slideUp").css({top: 0})
				jQuery(".slideUp").css({opacity: 1})
			}
		}
		lastScrollTop = l
	}

	var jQuerywindow = jQuery(window),
		didScroll, lastScrollTop = 0, scrollAmount = 10,
		navbarHeight = jQuery(".slideUp").outerHeight();
	jQuery(window).scroll(function (l) {
		didScroll = !0
	}), setInterval(function () {
		didScroll && (compactor_hasScrolled(), didScroll = !1)
	}, 100);

});