jQuery(document).ready(function ($) {
	"use strict";

	// COUNT UP
	$('.wd-count-up__counter').counterUp({
		delay: 10,
		time: 1000
	});


	// Parallax
	var $window = jQuery(window);

	jQuery('.parallax').each(function () {
		var $scroll = $(this);

		jQuery(window).on("scroll", function () {
			var yPos = -($window.scrollTop() / $scroll.data('speed'));
			var coords = '50% ' + yPos + 'px';
			$scroll.css({backgroundPosition: coords});
		});
	});



  function formatProduct(product) {
    var img =  "";
    var markup = "";
    if (!product.image) {
    } else {
      img = '<img src="' + product.image + '" class="img-flag" style=" max-width: 30px; "/>';
    }
    markup = '<span>' + img + ' ' + product.text + '</span>';
    return markup;
  }

  var ajaxurl = urltheme.template_url;
  $('#product_name').select2({
    placeholder: 'What are you looking for?',
    allowClear: true,
    closeOnSelect: false,
    minimumInputLength: 2,
    width: 'resolve',
    escapeMarkup: function (markup) {
      return markup;
    }, // let our custom formatter work
    templateResult: formatProduct,
    templateSelection: formatProduct,
    tags: true, // Dynamic option creation
    createTag: function (params) {
      var term = $.trim(params.term);

      if (term === '') {
        return null;
      }

      return {
        id: term,
        text: term,
        newTag: true // add additional parameters
      }
    },
    ajax: {
      url: ajaxurl, // AJAX URL is predefined in WordPress admin
      dataType: 'json',
      delay: 100, // delay in ms while typing when to perform a AJAX search
      data: function (params) {
        return {
          q: params.term, // search query
          term: $("#term").value, // search query
          action: 'wdgetproduct' // AJAX action for admin-ajax.php
        };
      },
      processResults: function (data) {
        var options = [];
        if (data) {
          // data is the array of arrays, and each of them contains ID and the Label of the option
          $.each(data, function (index, text) { // do not forget that "index" is just auto incremented value
            options.push({image: text[2], id: text[1], text: text[1]});
          });
        }
        return {
          results: options
        };
      },
      cache: true
    },
  });
  $('#product_name').on("select2-close", function () {
    console.log("close");
  });
});



