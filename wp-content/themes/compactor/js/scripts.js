jQuery(document).ready(function ($) {
  "use strict";
  setTimeout(function () {

    $(document).foundation();


    var wd_obj = {
      body: $('body'),
      another: 'woof'
    };

    $('.menu-toggle').on("click", function(){
      $("#mobile-menu").toggleClass("is-open");
    });



    ///////////////////////  isMobile //////////////////////
    var isMobile = {
      Android: function () {
        return navigator.userAgent.match(/Android/i);
      },
      BlackBerry: function () {
        return navigator.userAgent.match(/BlackBerry/i);
      },
      iOS: function () {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
      },
      Opera: function () {
        return navigator.userAgent.match(/Opera Mini/i);
      },
      Windows: function () {
        return navigator.userAgent.match(/IEMobile/i);
      },
      any: function () {
        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
      }
    };

    ///////////////////////  Button box-shadow opacity //////////////////////
    $(".btn-shadow").each(function () {
      // get the rgbA color
      var box_shadow_color = $(this).css('background-color').replace(')', ', 0.5)').replace('rgb', 'rgba');
      $(this).css('box-shadow', "0 2px 26px " + box_shadow_color);
    });


    var element1 = $('.vc_tta-panels .wd-tta-section');
    var element2 = $('.circle-container');
    if (element1.length && element2.length) {

      $(".vc_tta-panels").children().each(function () {
        $(".circle-container").append('<li><span></span></li>')
      });


      var count = parseInt($(".circle-container li").length);
      var circle_size = $(".circle-container").css("width").replace("px", "");
      circle_size = parseInt(circle_size) / 2 - 3;
      var angle = (360 / count);
      var rot = -90;
      $(".circle-container").children().each(function () {
        $(this).css({"transform": "rotate( " + rot + "deg) translate(" + circle_size + "px)"});
        rot = rot + angle;
      });
      var stroke_init = 100 / count;
      $('.circular-chart .circle').attr('stroke-dasharray', '' + stroke_init + ', 100')
      // exists.


      // Observes Class changes to the Accordion items
      var MutationObserver = window.MutationObserver || window.WebKitMutationObserver || window.MozMutationObserver;

      var observer = new MutationObserver(function (mutations) {
        mutations.forEach(function (mutation) {
          if (mutation.target.getAttribute(mutation.attributeName) !== "wd-tta-section vc_tta-panel" && mutation.target.getAttribute(mutation.attributeName) !== "wd-tta-section vc_tta-panel vc_animating") {
            var index = $(mutation.target).index();
            $(".circle-container").children().each(function () {
              if ($(this).index() <= index + 1) {
                $(this).addClass('circle-active');
              } else {
                $(this).removeClass('circle-active');
              }
            });
            $(".single-chart-img").children().each(function () {
              if ($(this).index() == index) {
                $(this).addClass('active');
              } else {
                $(this).removeClass('active');
              }
            });
            var stroke_init = 100 / count;
            $(".circle-container").children().each(function () {
              if ($(this).index() <= index) {
                if (parseInt($(this).index()) !== 0) {
                  var stroke = 100 / count * parseInt($(this).index()) + stroke_init;
                  $('.circular-chart .circle').attr('stroke-dasharray', '' + stroke + ', 100')
                } else {
                  $('.circular-chart .circle').attr('stroke-dasharray', '' + stroke_init + ', 100')
                }
              }
            });
          }
        });
      })

      var observerConfig = {attributes: true, attributeFilter: ['class']}

      const tableRows = document.querySelectorAll(".vc_tta-panels .wd-tta-section")

      for (var i = 0; i < tableRows.length; i++) {
        observer.observe(tableRows[i], observerConfig);
      }

      $('.vc_tta-panels .wd-tta-section').on('click', function () {
        var index = $(this).index();
        $(".circle-container").children().each(function () {
          if ($(this).index() <= index + 1) {
            $(this).addClass('circle-active');
          } else {
            $(this).removeClass('circle-active');
          }
        });
        $(".single-chart-img").children().each(function () {
          if ($(this).index() == index) {
            $(this).addClass('active');
          } else {
            $(this).removeClass('active');
          }
        });
        var stroke_init = 100 / count;
        $(".circle-container").children().each(function () {
          if ($(this).index() <= index) {
            if (parseInt($(this).index()) !== 0) {
              var stroke = 100 / count * parseInt($(this).index()) + stroke_init;
              $('.circular-chart .circle').attr('stroke-dasharray', '' + stroke + ', 100')
            } else {
              $('.circular-chart .circle').attr('stroke-dasharray', '' + stroke_init + ', 100')
            }
          }
        });
      });

      $(".vc_tta-panels .wd-tta-section").children().each(function () {
        var index = $(".vc_tta-panels .vc_active").index();
        $(".circle-img").eq(index).addClass('active');
        if ($(this).index() <= index) {
          $(".circle-img").eq(index).addClass('active');
        } else {
          $(".circle-img").eq(index).removeClass('active');
        }
      });
    }

    /**
     ///////////////////////  Parallax background text //////////////////////
     */

    function compactorParallax() {
      var n = $(window).scrollTop()
        , t = $(window).width();
      t >= 980 ? $(".has-parallax").each(function () {
        var t = ($(this).offset().top - n) * .25 + "px";
        $(this).css({
          transform: "translate(0," + t + ")"
        })
      }) : $(".has-parallax").each(function () {
        $(this).css({
          transform: "translate(0px,0px)"
        })
      });
    }

    $(window).on("scroll", function () {
      compactorParallax();
    });
    $(window).on("resize", function () {
      compactorParallax()
    });


    /**
     * //////////////////////  Toggle list/grid WooCommerce products //////////////////////
     */

    $('#show_grid').on('click', function (e) {
      $(this).addClass('active');
      $('#show_list').removeClass('active');

      $('ul.products').fadeOut(200, function () {
        $(this).addClass('grid').removeClass('list').fadeIn(200);
      });
      return false;
    });
    $('#show_list').on('click', function (e) {
      $(this).addClass('active');
      $('#show_grid').removeClass('active');

      $('ul.products').fadeOut(200, function () {
        $(this).removeClass('grid').addClass('list').fadeIn(200);
      });
      return false;
    });


    /**
     * WooCommerce Product Category Accordion jQuery Menu
     */

    if ($('ul.product-categories').length > 0) {

      var pC = $('.product-categories li.cat-parent'),
        fpC = $('.product-categories li.cat-parent:first-child'), // Start this one open
        cC = $('.product-categories li.current-cat'),
        cCp = $('.product-categories li.current-cat-parent');

      pC.parent('ul').addClass('has-toggle');
      pC.children('ul').hide();

      if (pC.hasClass("current-cat-parent")) {
        cCp.addClass('open');
        cCp.children('ul').show();
      } else if (pC.hasClass("current-cat")) {
        cC.addClass('open');
        cC.children('ul').show();
      } else {
        fpC.addClass('open');
        fpC.children('ul').show();
      }

      $('.has-toggle .cat-parent a').on('mouseover', function () {
        var $t = $(this);
        if ($t.parent().hasClass("open")) {
          $t.parent().removeClass('open');
          $t.parent().children('ul').slideUp();
        } else {
          $t.parent().parent().find('ul.children').slideUp();
          $t.parent().parent().find('li.cat-parent').removeClass('open');

          $t.parent().addClass('open');
          $t.parent().children('ul').slideDown();
        }

      });


      // Link the count number
      $('.count').css('cursor', 'pointer');
      $('.count').on('click', function (event) {
        $(this).prev('a')[0].click();
      });

    }


    if (!isMobile.any()) {

      /**------------- Background Parallax Text ----------------------*/
      window.onscroll = function () {
        TweenLite.set($('.bg-parallax-text div:first-child'), {
          y: -(window.pageYOffset / 2)
        });
        TweenLite.set($('.bg-parallax-text div:last-child'), {
          y: -(window.pageYOffset / 3)
        });
      };


    } else {
      $("div").removeClass('wpb_animate_when_almost_visible');
    }


    $(".image").on('click', function (e) {
      var url_image = '.' + $(this).data('url');
      $('.wd-all-image > div').addClass('wd-hide');
      $(url_image).removeClass('wd-hide');
      $(".image").removeClass('active');
      $(this).addClass('active');
    });


    /*************************** Lists ****************************************/
    var classList;
    var sectionclass;
    $(".list-icon li").each(function (index) {
      classList = $(this).parent().attr('class').split(/\s+/);
      var iconclass = classList[1].replace('list-', '');

      $(this).prepend('<i class="fa ' + iconclass + '"></i>');
    });


    /* World Map Triggers to Popup */

    var offices_location = jQuery('.offices-locations'),
      offices_list = jQuery('.offices-list'),
      office_location_point = offices_location.children('.office-location-point'),
      offices_list_name = offices_list.find('.location-name'),
      clicked;

    office_location_point.each(function (index, el) {
      var $el = jQuery(el);
      $el.css({
        top: parseInt($el.attr('data-positiontop')),
        left: parseInt($el.attr('data-positionleft'))
      })
        .on('mouseover', function () {
          offices_list.find("[data-location='" + $el.attr('data-location') + "']").addClass('selected');
        })
        .on('mouseout', function () {
          offices_list_name.removeClass('selected');
        });
      ;
    });

    offices_list_name.on('mouseover', function () {
      offices_location.find("[data-location='" + jQuery(this).attr('data-location') + "']").addClass('selected');
    })
      .on('mouseout', function () {
        office_location_point.removeClass('selected');
      });


    //////////////////  Spacer //

    if ($('.wd_empty_space').length) {

      $('.wd_empty_space').each(function (i, obj) {
        wd_empty_space_padding(this);
      });


      window.addEventListener('resize', function () {
        $('.wd_empty_space').each(function (i, obj) {
          wd_empty_space_padding(this);
        });
      }, true);
    }


    function wd_empty_space_padding(el) {
      var $mobile_height = $(el).data("heightmobile"),
        $tablet_height = $(el).data("heighttablet"),
        $desktop_height = $(el).data("heightdesktop");

      if (Modernizr.mq("(max-width: 40em)")) {
        $(el).css("height", $mobile_height);
      } else if (Modernizr.mq("(min-width: 40.063em) and (max-width: 64em)")) {
        $(el).css("height", $tablet_height);
      } else if (Modernizr.mq("(min-width: 64.063em)")) {
        $(el).css("height", $desktop_height);
      }
    }

    //////////////// Delimiter /////
    if ($('.row-delimiter').length) {

      $('.row-delimiter').each(function (i, obj) {
        wd_delimiter_transform(this);
      });

      window.addEventListener('resize', function () {
        $('.row-delimiter').each(function (i, obj) {
          wd_delimiter_transform(this);
        });
      }, true);
    }

    function wd_delimiter_transform(el) {
      var left = '920';
      if ($(el).hasClass('vertical_line_bottom_left')) {
        left = parseInt($(el).parent().css('width')) / 2;
      } else if ($(el).hasClass('vertical_line_bottom_right')) {
        left = parseInt($(el).parent().css('width')) + parseInt($(el).parent().css('left'));
      } else {
        left = parseInt($(el).parent().css('left')) * -1;
      }

      $(el).css('transform', 'translateY(100%) translateX(' + left + 'px)');
    }


//___________ Portfolio Grid Isotope


    window.onload = function () {

      if ($('.wd-portfolio-grid').length) {
        $('.wd-portfolio-grid').each(function (i, obj) {
          portfolio_grid_setting(this);
        });
      }

      function portfolio_grid_setting(el) {
        var $admiral_portfolio_grid = $(el).isotope({
          itemSelector: '.wd-portfolio-grid-item',
          layoutMode: 'fitRows'
        })

        $('.filters').on('click', 'a', function (e) {
          e.preventDefault();
          var filterValue = $(this).attr('data-filter');
          $(".filters a").removeClass('current');
          $(this).addClass('current');
          $admiral_portfolio_grid.isotope({filter: filterValue});
        });
      }


      if ($('.wd-portfolio-masonry').length) {
        $('.wd-portfolio-masonry').each(function (i, obj) {
          portfolio_masonry_setting(this);
        });
      }

      function portfolio_masonry_setting(el) {

        var $admiral_portfolio_masonry = $(el).isotope({
          itemSelector: '.wd-portfolio-masonry-item'
        })

        $('.filters').on('click', 'a', function (e) {
          e.preventDefault();
          var filterValue = $(this).attr('data-filter');
          $(".filters a").removeClass('current');
          $(this).addClass('current');
          $admiral_portfolio_masonry.isotope({filter: filterValue});
        });
      }


      if ($('.wd-portfolio-masonry-free-style.style-1').length) {
        $('.wd-portfolio-masonry-free-style.style-1').each(function (i, obj) {
          portfolio_masonry_free_style_1_setting(this);
        });
      }

      function portfolio_masonry_free_style_1_setting(el) {

        var $admiral_portfolio_masonry = $(el).isotope({
          itemSelector: '.wd-portfolio-masonry-item'
        })

        $('.filters').on('click', 'a', function (e) {
          e.preventDefault();
          var filterValue = $(this).attr('data-filter');
          $(".filters a").removeClass('current');
          $(this).addClass('current');
          $admiral_portfolio_masonry.isotope({filter: filterValue});
        });
      }

      // border Width Responsive

      $('.pricing-table-header').data('border', ($('.pricing-table-header').width() / 2) + 'px');

      if ($('.wd-portfolio-masonry-free-style.style-2').length) {
        $('.wd-portfolio-masonry-free-style.style-2').isotope('destroy');
        $('.wd-portfolio-masonry-free-style.style-2').each(function (i, obj) {
          portfolio_masonry_free_style_2_setting(this);
        });
      }

      function portfolio_masonry_free_style_2_setting(el) {
        var $container = $(el);
        var $containerProxy = $container.clone().empty().css({visibility: 'hidden'});
        var colWidth;

        $container.after($containerProxy);

        $(window).resize(function () {
          colWidth = Math.floor($containerProxy.width() / 4);
          $container.css({
            width: colWidth * 4
          })
          $container.isotope({
            resizable: false,
            itemSelector: '.wd-portfolio-masonry-item',
            masonry: {
              columnWidth: colWidth
            }
          });
        }).resize();


        $(window).on("load", function () {
          $container.isotope('layout');
        });

        var filtertoggle = jQuery('body');

        $(window).on("load", function () {
          $container.isotope('layout');
          $(function () {
            setTimeout(function () {
              $container.isotope('layout');
            }, filtertoggle.hasClass("") ? 755 : 755);
          });
        });


        $(window).on("resize", function () {
          $container.isotope('layout');
          $(function () {
            setTimeout(function () {
              $container.isotope('layout');
            }, filtertoggle.hasClass("") ? 755 : 755);
          });
        });


        $('.filters').on('click', 'a', function (e) {
          e.preventDefault();
          var filterValue = $(this).attr('data-filter');
          $(".filters a").removeClass('current');
          $(this).addClass('current');
          $admiral_portfolio_masonry.isotope({filter: filterValue});
        });
      }

      // Add To Cart Button
      $('.quick_view').text('');

      $.urlParam = function (name) {
        var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
        if (results == null) {
          return null;
        } else {
          return decodeURI(results[1]) || 0;
        }
      }
      if ($.urlParam('display') == 'list') {
        $('ul.products').addClass('list').removeClass('grid');
      }

    };


// init Isotope
    var $grid = $('.portfolio_masonry');
    $(window).load(function () {

      $('.filters').on('click', 'button', function () {
        var filterValue = $(this).attr('data-filter');
        // use filterFn if matches value
        $grid.isotope({filter: filterValue});
      });

      // change is-checked class on buttons
      $('.button-group').each(function (i, buttonGroup) {
        var $buttonGroup = $(buttonGroup);
        $buttonGroup.on('click', 'button', function () {
          $buttonGroup.find('.is-checked').removeClass('is-checked');
          $(this).addClass('is-checked');
        });
      });
    });

    $('.portfolio-layout-3').isotope({
      itemSelector: '.element-item',
      layoutMode: 'fitRows',
      resizable: true,
      percentPosition: true,
      masonry: {
        columnWidth: 100,
        gutter: 10,
        fitWidth: true
      }
    });

    if ($('.portfolio-layout-3').length) {
      $('.portfolio-layout-3').isotope('destroy');
      $('.portfolio-layout-3').each(function (i, obj) {
        portfolio_masonry_free_style_2_setting(this);
      });
    }

    function portfolio_masonry_free_style_2_setting(el) {
      var $container = $(el);
      var $containerProxy = $container.clone().empty().css({visibility: 'hidden'});
      var colWidth;

      $container.after($containerProxy);

      $(window).on("resize", function () {
        colWidth = Math.floor($containerProxy.width() / 3);
        $container.css({
          width: colWidth * 3
        })
        $container.isotope({
          resizable: false,
          itemSelector: '.element-item',
          masonry: {
            columnWidth: colWidth
          }
        });
      }).resize();


      $(window).on("load", function () {
        $container.isotope('layout');
      });

      var filtertoggle = jQuery('body');

      $(window).on("load", function () {
        $container.isotope('layout');
        $(function () {
          setTimeout(function () {
            $container.isotope('layout');
          }, filtertoggle.hasClass("") ? 755 : 755);
        });
      });


      $(window).on("resize", function () {
        $container.isotope('layout');
        $(function () {
          setTimeout(function () {
            $container.isotope('layout');
          }, filtertoggle.hasClass("") ? 755 : 755);
        });
      });

    }

    if ($('.portfolio_element-item').length) {
      $('.portfolio_element-item').isotope('destroy');
      $('.portfolio_element-item').each(function (i, obj) {
        portfolio_masonry_free_style_4_setting(this);
      });
    }


    $(function () {
      $(' .portfolio-grid-items > li ').each(function () {
        $(this).hoverdir();
      });
    });

    // header search
    if ($('.header-search').length) {
      $('.header-search .wd-search-icon').on('click', function () {
        $('.header-search .searchform').toggleClass('open');
        $(".top-bar .header-search .searchform .form-group input.form-control").focus();
      })
      $('body').on('click', function (e) {
        if ($(e.target).closest(".header-search").length === 0) {
          $('.header-search .searchform').removeClass('open');
        }
      })
    }


// -------------------------------------------------------------
//   min cart
// -------------------------------------------------------------
//
    var show_cart_btn = $(".show-cart-btn");

    show_cart_btn.on("click", function () {
      $('.xoo-wsc-modal').toggleClass('xoo-wsc-active');
    });

    // Remove Close Cart Text

    setTimeout(function () {
      $('.xoo-wsc-remove').html('<span></span>');
    }, 3000);


    $(".show-search-btn").hoverIntent({
      over: searchover,
      out: searchout,
      timeout: 500
    });

    function searchover() {
      $('.hidden-search')
        .stop(true, true)
        .fadeIn({duration: 500, queue: false})
        .css('display', 'none')
        .slideDown(500);
    }

    function searchout() {
      $('.hidden-search')
        .stop(true, true)
        .fadeOut({duration: 100, queue: false})
        .slideUp(100);
    }


    $("hidden-search").on("mouseover", function () {
      $(this).css("display", "block");
    });

    $("hidden-search").on("mouseout", function () {
      $(this).css("display", "none");
    });
    $("hidden-search").on("mouseover", function () {
      $(this).css("display", "block");
    });



    lightbox.option({
      'resizeDuration': 200,
      'wrapAround': true,
      'alwaysShowNavOnTouchDevices': true
    });

    $('.product_categories').select2();

    if ($('.gridlist-toggle').length) {
      var productStyle = compactor_getCookie("productStyle");
      if (productStyle == 'grid') {
        $('ul.products').removeClass('list');
        $('ul.products').addClass('grid');
      } else if (productStyle == 'list') {
        $('ul.products').removeClass('grid');
        $('ul.products').addClass('list');
      }
    }

    // store product style in cookie
    jQuery('.gridlist-toggle a').on('click', function () {
      //Get Current and next Date
      var nowPlus30Days = new Date(Date.now() + (30 * 24 * 60 * 60 * 1000));
      var styleClass = $(this).attr('id');
      if (styleClass == 'show_grid') {
        document.cookie = "productStyle=grid; expires=" + nowPlus30Days + "; path=/";
      } else if (styleClass == 'show_list') {
        document.cookie = "productStyle=list; expires=" + nowPlus30Days + "; path=/";
      }
    });


    //show-search
    $('.show-search').on('click', function (e) {
      $('.overlay-search').toggleClass('hide');
      e.preventDefault();
    });

    //Get Cookies Function
    function compactor_getCookie(name) {
      var nameEQ = name + "=";
      var ca = document.cookie.split(';');
      for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1);
        if (c.indexOf(nameEQ) != -1) return c.substring(nameEQ.length, c.length);
      }
      return null;
    }

  }, 0);

});
document.addEventListener("DOMContentLoaded", function() {
  var lazyImages = [].slice.call(document.querySelectorAll("img.lazy"));;

  if ("IntersectionObserver" in window && "IntersectionObserverEntry" in window && "intersectionRatio" in window.IntersectionObserverEntry.prototype) {
    let lazyImageObserver = new IntersectionObserver(function(entries, observer) {
      entries.forEach(function(entry) {
        if (entry.isIntersecting) {
          let lazyImage = entry.target;
          lazyImage.src = lazyImage.dataset.src;
          lazyImage.srcset = lazyImage.dataset.srcset;
          lazyImage.classList.remove("lazy");
          lazyImageObserver.unobserve(lazyImage);
        }
      });
    });

    lazyImages.forEach(function(lazyImage) {
      lazyImageObserver.observe(lazyImage);
    });
  }
});
