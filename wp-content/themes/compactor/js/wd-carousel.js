jQuery(document).ready(function ($) {
  "use strict";


  setTimeout(function () {


    /*---------------caro--------------*/

    var $direction;
    if ($('html').attr('dir') == 'rtl') {
      $direction = true;
    } else {
      $direction = false;
    }
    $('.carousel').slick({
      slidesToShow: 1,
      rtl: $direction,
      autoplay: true,
      autoplayTimeout: 5000,
    });

    var $Bitmnumber = $(".carousel_blog").data("numberitem");
    var $Bmargin = $(".carousel_blog").data("margin");
    $('.carousel_blog').slick({
      slidesToShow: $Pitmnumber,
      arrows: false,
      rtl: $direction,
      prevtArrow: '<i class="fa fa-chevron-left"></i>',
      nextArrow: '<i class="fa fa-chevron-right"></i>',
      dots: false,
      slidesToScroll: elements_to_swipe,
      autoplay: true,
      autoplaySpeed: 8000,
      responsive: [
        {
          breakpoint: 768,
          settings: {
            arrows: false,
            centerPadding: '40px',
            rtl: $direction,
            slidesToShow: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            arrows: false,
            centerPadding: '40px',
            rtl: $direction,
            slidesToShow: 1
          }
        }
      ]
    });

    var $Pitmnumber = $(".carousel_portfolio").data("numberitem");
    var $Pmargin = $(".carousel_portfolio").data("margin");
    $('.carousel_portfolio').slick({
      slidesToShow: $Pitmnumber,
      arrows: false,
      rtl: $direction,
      dots: false,
      slidesToScroll: elements_to_swipe,
      autoplay: true,
      autoplaySpeed: 8000,
      responsive: [
        {
          breakpoint: 768,
          settings: {
            arrows: false,
            centerPadding: '40px',
            rtl: $direction,
            slidesToShow: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            arrows: false,
            centerPadding: '40px',
            rtl: $direction,
            slidesToShow: 1
          }
        }
      ]
    });


    $('.wd-gallery-images-holder').slick({
      slidesToShow: 1,
      rtl: $direction,
      arrows: true,
      prevArrow: "<span class='left'><i class='fas fa-chevron-left'></i></span> ",
      nextArrow: "<span class='right'><i class='fas fa-chevron-right'></i></span>",
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 5000,
    });
    $('.shop-carousel').slick({
      slidesToShow: 1,
      rtl: $direction,
      arrows: false,
      prevtArrow: '<i class="fa fa-angle-left"></i>',
      nextArrow: '<i class="fa fa-angle-right"></i>',
      dots: true,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 5000,
    });

    // Clients Shortcode
    var navigation_style_slider = $('.team-member-slider').data('navigation');
    var navigation_style_carousel = $('.team-member-carousel').data('navigation');

    var elements_to_show_mobile = $('.team-member-carousel').data('showmobile');
    var elements_to_show_tablet = $('.team-member-carousel').data('showtablet');
    var elements_to_show_desktop = $('.team-member-carousel').data('showdesktop');

    var elements_to_swipe = $('.team-member-carousel').data('swipe');
    if (navigation_style_slider == "dotts") {
      $(window).on("load", function () {
        $('.team-member-slider').slick({
          slidesToShow: 1,
          arrows: false,
          dots: true,
          slidesToScroll: 1,
          autoplay: true,
          autoplaySpeed: 8000,
        });
      });

    }
    if (navigation_style_slider == "arrows") {
      $(window).on("load", function () {
        $('.team-member-slider').slick({
          slidesToShow: 1,
          arrows: false,
          dots: true,
          slidesToScroll: 1,
          autoplay: true,
          autoplaySpeed: 8000,
        });
      });
    }
    if (navigation_style_carousel == "arrows") {
      $(window).on("load", function () {
        // Team member Carousel
        $('.team-member-carousel').slick({
          slidesToShow: elements_to_show_desktop,
          arrows: false,
          dots: false,
          slidesToScroll: elements_to_swipe,
          autoplay: true,
          autoplaySpeed: 8000,
          responsive: [
            {
              breakpoint: 768,
              settings: {
                arrows: false,
                centerPadding: '40px',
                slidesToShow: elements_to_show_tablet
              }
            },
            {
              breakpoint: 480,
              settings: {
                arrows: false,
                centerPadding: '40px',
                slidesToShow: elements_to_show_mobile
              }
            }
          ]
        });
      });
    }

    if (navigation_style_carousel == "dotts") {
      $(window).on("load", function () {
        // Team member Carousel
        $('.team-member-carousel').slick({
          slidesToShow: elements_to_show_desktop,
          arrows: false,
          dots: true,
          slidesToScroll: elements_to_swipe,
          autoplay: true,
          autoplaySpeed: 8000,
          responsive: [
            {
              breakpoint: 768,
              settings: {
                arrows: false,
                centerPadding: '40px',
                slidesToShow: elements_to_show_tablet
              }
            },
            {
              breakpoint: 480,
              settings: {
                arrows: false,
                centerPadding: '40px',
                slidesToShow: elements_to_show_mobile
              }
            }
          ]
        });
      });

    }


// _______________Testimonial


    $('.wd-testimonial').slick({
      adaptiveHeight: true,
      dots: false,
      infinite: true,
      arrows: true,
      loop: true,
      autoplay: true,
      speed: 300,
      autoplaySpeed: 3000,
      easing: "easeOutBounce",
      prevArrow: '<span class="left slick-arrow"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512.008 512.008" style="enable-background:new 0 0 512.008 512.008;" xml:space="preserve"><g><g><path d="M384.001,53.333V10.667c0-4.354-2.646-8.281-6.688-9.896C376.022,0.25,374.668,0,373.335,0\n\t\t\tc-2.854,0-5.646,1.146-7.708,3.292L130.96,248.625c-3.937,4.125-3.937,10.625,0,14.75l234.667,245.333\n\t\t\tc3.021,3.146,7.646,4.167,11.688,2.521c4.042-1.615,6.688-5.542,6.688-9.896v-42.667c0-2.729-1.042-5.354-2.917-7.333L196.022,256\n\t\t\tL381.085,60.667C382.96,58.688,384.001,56.063,384.001,53.333z"/>t</g></svg>\n</button>',
      nextArrow: '<span class="right slick-arrow"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"\n\t viewBox="0 0 512.008 512.008" style="enable-background:new 0 0 512.008 512.008;" xml:space="preserve"><g><g><path d="M381.048,248.633L146.381,3.299c-3.021-3.146-7.646-4.167-11.688-2.521c-4.042,1.615-6.688,5.542-6.688,9.896v42.667\n\t\t\tc0,2.729,1.042,5.354,2.917,7.333l185.063,195.333L130.923,451.341c-1.875,1.979-2.917,4.604-2.917,7.333v42.667\n\t\t\tc0,4.354,2.646,8.281,6.688,9.896c1.292,0.521,2.646,0.771,3.979,0.771c2.854,0,5.646-1.146,7.708-3.292l234.667-245.333\n\t\t\tC384.986,259.258,384.986,252.758,381.048,248.633z"/></g></svg></button>',
      responsive: [
        {
          breakpoint: 900,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });

    //-------Start WD Client Carousel

    // Client style 1
    var clientCarouselStyle_1 = $('.wd-clients-carousel.style_1')
    var client_show = clientCarouselStyle_1.data("clientshow");

    clientCarouselStyle_1.on('init', function (event, slick) {
      let item = $(this).find(".wd-clients-carousel-item "),
        button = $(this).find('button'),
        tl = new TimelineMax();
      tl.set($(this), {perspective: 300});
      tl.to([item, button], 0, {x: 200, scale: .5, force3D: true, transformOrigin: "top center -150", opacity: 0});

      $(this).waypoint(function () {
          if (!$(this).hasClass('animate-done')) {
            tl.staggerTo([item, button], .8, {x: 0, scale: 1, opacity: 1, ease: Power2.easeOut}, 0.1);
            $(this).addClass('animate-done');
          }
        },
        {offset: '80%'});
    });

    clientCarouselStyle_1.slick({
      dots: false,
      infinite: true,
      loop: true,
      centerPadding: '50px',
      speed: 300,
      slidesToShow: client_show,
      slidesToScroll: client_show,
      prevArrow: '<button class="slick-prev slick-arrow" aria-label="Previous" type="button" ><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512.008 512.008" style="enable-background:new 0 0 512.008 512.008;" xml:space="preserve"><g><g><path d="M384.001,53.333V10.667c0-4.354-2.646-8.281-6.688-9.896C376.022,0.25,374.668,0,373.335,0\n\t\t\tc-2.854,0-5.646,1.146-7.708,3.292L130.96,248.625c-3.937,4.125-3.937,10.625,0,14.75l234.667,245.333\n\t\t\tc3.021,3.146,7.646,4.167,11.688,2.521c4.042-1.615,6.688-5.542,6.688-9.896v-42.667c0-2.729-1.042-5.354-2.917-7.333L196.022,256\n\t\t\tL381.085,60.667C382.96,58.688,384.001,56.063,384.001,53.333z"/>t</g></svg>\n</button>',
      nextArrow: '<button class="slick-next slick-arrow" aria-label="Next" type="button" ><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"\n\t viewBox="0 0 512.008 512.008" style="enable-background:new 0 0 512.008 512.008;" xml:space="preserve"><g><g><path d="M381.048,248.633L146.381,3.299c-3.021-3.146-7.646-4.167-11.688-2.521c-4.042,1.615-6.688,5.542-6.688,9.896v42.667\n\t\t\tc0,2.729,1.042,5.354,2.917,7.333l185.063,195.333L130.923,451.341c-1.875,1.979-2.917,4.604-2.917,7.333v42.667\n\t\t\tc0,4.354,2.646,8.281,6.688,9.896c1.292,0.521,2.646,0.771,3.979,0.771c2.854,0,5.646-1.146,7.708-3.292l234.667-245.333\n\t\t\tC384.986,259.258,384.986,252.758,381.048,248.633z"/></g></svg></button>',
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            dots: false,
            infinite: true,
            arrows: false,
            speed: 300,
            slidesToShow: 5,
            slidesToScroll: 2,
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            arrows: false,
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 2,
            arrows: false,
            slidesToScroll: 2
          }
        }
      ]
    });

    // Client style 2
    var client_show = $(".wd-clients-carousel.style_2").data("clientshow");
    let slickParams = {
      dots: false,
      infinite: true,
      prevArrow: '<button class="slick-prev slick-arrow" aria-label="Previous" type="button" ><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512.008 512.008" style="enable-background:new 0 0 512.008 512.008;" xml:space="preserve"><g><g><path d="M384.001,53.333V10.667c0-4.354-2.646-8.281-6.688-9.896C376.022,0.25,374.668,0,373.335,0\n\t\t\tc-2.854,0-5.646,1.146-7.708,3.292L130.96,248.625c-3.937,4.125-3.937,10.625,0,14.75l234.667,245.333\n\t\t\tc3.021,3.146,7.646,4.167,11.688,2.521c4.042-1.615,6.688-5.542,6.688-9.896v-42.667c0-2.729-1.042-5.354-2.917-7.333L196.022,256\n\t\t\tL381.085,60.667C382.96,58.688,384.001,56.063,384.001,53.333z"/>t</g></svg>\n</button>',
      nextArrow: '<button class="slick-next slick-arrow" aria-label="Next" type="button" ><svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"\n\t viewBox="0 0 512.008 512.008" style="enable-background:new 0 0 512.008 512.008;" xml:space="preserve"><g><g><path d="M381.048,248.633L146.381,3.299c-3.021-3.146-7.646-4.167-11.688-2.521c-4.042,1.615-6.688,5.542-6.688,9.896v42.667\n\t\t\tc0,2.729,1.042,5.354,2.917,7.333l185.063,195.333L130.923,451.341c-1.875,1.979-2.917,4.604-2.917,7.333v42.667\n\t\t\tc0,4.354,2.646,8.281,6.688,9.896c1.292,0.521,2.646,0.771,3.979,0.771c2.854,0,5.646-1.146,7.708-3.292l234.667-245.333\n\t\t\tC384.986,259.258,384.986,252.758,381.048,248.633z"/></g></svg></button>',
      speed: 500,
      centerMode: true,
      centerPadding: '200px',
      slidesToShow: client_show,
      slidesToScroll: client_show,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            dots: false,
            infinite: true,
            arrows: true,
            speed: 300,
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 600,
          settings: {
            dots: false,
            infinite: true,
            arrows: true,
            slidesToShow: 1,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            dots: false,
            infinite: true,
            arrows: true,
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    };

    let slickParamsMarquee = {};
    if ($('.wd-clients-carousel').length && $('.wd-clients-carousel')[0].length) {
      if ($('.wd-clients-carousel.style_2')[0].hasAttribute('data-marquee')) {
        slickParamsMarquee = {
          speed: 8000,
          autoplay: true,
          autoplaySpeed: 0,
          cssEase: 'linear',
          arrows: false,
        };
      }
    }

    //-------End WD Client Carousel


//------------------ Portfolio --------------------------
    var autoplay = $('.portfolio_carousel').data("autoplay"),
      item = $('.portfolio_carousel').data("show");

    $('.portfolio_carousel').slick({
      dots: false,
      infinite: true,
      speed: 300,
      slidesToShow: item,
      slidesToScroll: 1,
      autoplay: autoplay,
      autoplaySpeed: 5000,
      nextArrow: '<span class="right-side"> <i class="fa fa-chevron-right"></i></span>',
      prevArrow: '<span class="left-side"><i class="fa fa-chevron-left"></i></span>',
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: item,
            slidesToScroll: 1,
            infinite: true,
            dots: false
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });

  }, 1000);

});