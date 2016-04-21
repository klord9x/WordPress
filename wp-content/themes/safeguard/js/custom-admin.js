jQuery(function($){
	"use strict";
	// post type toogle
	var postType = $('#post-formats-select').find('input:checked').val();
	if( postType == 0 ){
		$('#post_format .rwmb-meta-box .rwmb-field').not(':eq(0)').hide();
	}
	else{
		$('#post_format .rwmb-meta-box .rwmb-field').hide();
		$( 'label[for*="' + postType + '"]' ).closest('.rwmb-field').siblings('.rwmb-field').hide();
		$( 'label[for*="' + postType + '"]' ).closest('.rwmb-field').fadeIn();
	}
	$('#post-formats-select').find('input').change( function() {

		var postType = $(this).val();
		
		if ( postType == 0 ) {
			$('#post_format .rwmb-meta-box .rwmb-field').not(':eq(0)').hide();
			$('#post_format .rwmb-meta-box .rwmb-field').eq(0).show();
		}
		else{
			$( 'label[for*="' + postType + '"]' ).closest('.rwmb-field').siblings('.rwmb-field').hide();
			$( 'label[for*="' + postType + '"]' ).closest('.rwmb-field').fadeIn();
		}

	});

});