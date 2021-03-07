jQuery(document).ready(function ($) {
  "use strict";
  var myOptions = {
    hide: true,
    mode: 'rgba',
    palettes: ['#FDB900', '#313131', '#44464A', '#888888', '#F7F7F7', '#000000']
  };
  $('.color-picker').wpColorPicker(myOptions);

  //---------------images upload script-----------
  if (typeof wp !== "undefined" && wp.media && wp.media.editor) {
    jQuery('.add_image').on("click", function (e) {
      //wp.media.editor.send.attachment = function (props, attachment) {
      e.preventDefault();
      var fromParent = $(this).closest('.imgset');
      var button = $(this, fromParent);
      var url = button.prev();
      wp.media.editor.send.attachment = function (props, attachment) {
        url.val(attachment.url);
      };
      wp.media.editor.open(this);
      return false;
    })
  }

  $('.remove_image').on("click", function () {
    $(this).parent().parent().find('.img_input_field').val('');
  });

  $('.cmn-toggle').on("click", function () {
    var parent = $(this).closest(".wd_checkbox");
    if ($(this).attr('checked')) {
      $(this).val('on');
    }
    else {
      $(this).val('off');
    }
    $('.hidden_check', parent).val($(this).val())
  });

//-------------------------------------


  $('.option-item.big.tile select').on("change", function () {
    var optionSelected = $(this).find("option:selected");
    var valueSelected = optionSelected.val();

    if (valueSelected == 'big-custom_text') {
      $(this).parent().find('textarea').show();
    } else {
      $(this).parent().find('textarea').hide();
    }
  });
  /**--------logo --------*/
  $('.chekbox_logo').on("change", function () {
    if ($(this).attr("checked")) {

      $('.path_logo').fadeIn();
      return;
    }
    $('.path_logo').fadeOut();
  });
  /**--------social icon --------*/
  $('.checkbox_social').on("change", function () {
    if ($(this).attr("checked")) {

      $('.social_link').fadeIn();
      return;
    }
    $('.social_link').fadeOut();
  });
//---------tabs


  $("#tabs").tabs(); //initialize tabs

  $(function () {

    $("#tabs").tabs({

      activate: function (event, ui) {

        var scrollTop = $(window).scrollTop(); // save current scroll position

        window.location.hash = ui.newPanel.attr('id'); // add hash to url

        $(window).scrollTop(scrollTop); // keep scroll at current position
      }

    });

  });

  $('.wd_select2').select2();

  $('ul.g_tab li').on('click',function(){
    var tab_id = $(this).attr('data-tab');
    var fromParent = $(this).closest('.groups_tabs');
    $('ul.g_tab li', fromParent).removeClass('current');
    $('.tab-content', fromParent).removeClass('current');
    $(this).addClass('current');
    $("#"+tab_id, fromParent).addClass('current');
  })

  $('.panel-reset').on('click',function(){
    var answer = confirm('Are you sure you want to reset options?');
    if (answer) {
      $.ajax({
        type : "post",
        dataType : "json",
        url : myAjax.ajaxurl,
        data : {
          action: "compactor_reset_panel_options",
        },
        success: function(data) {
          window.location.reload();
        }
      })
    }

  })

})
;