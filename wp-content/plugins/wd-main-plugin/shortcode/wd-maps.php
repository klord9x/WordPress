<?php
if(!function_exists('compactor_maps')){
  function compactor_maps($atts) {

    $maps = vc_param_group_parse_atts($atts['maps']);

    extract( shortcode_atts( array(
      'compactor_map_latitude'  => '31.27984', // -37.817612
      'compactor_map_longitude'  => '4.25896', // 144.959399
      'compactor_map_height' => '500',
      'compactor_map_zoom' => '14',
      'compactor_map_style' => 'wa_map_style1',
      'compactor_map_company_name' => 'Envato',
      'compactor_map_company_description' => '2 Elizabeth St, Melbourne Victoria 3000 Australia',
      'compactor_map_source_image' => '',
      'compactor_map_extra_class_name' => '',
      'css_animation' => 'no'
    ), $atts ) );

    ob_start();

    $compactor_image = wp_get_attachment_image_src( $compactor_map_source_image, '50X50');
    $data_animated = '';
    $animation_classes =  "";
    if(($css_animation != 'no')){
      $animation_classes =  " animated ";
      $data_animated = "data-animated=$css_animation";
    }

    ?>
    <script>
      jQuery(function ($) {

        var compactor_map_style = '<?php echo $compactor_map_style; ?>';
        switch (compactor_map_style) {
          case "wa_map_style1":
            var styles = [
              {
                "featureType": "administrative",
                "elementType": "labels.text.fill",
                "stylers": [
                  {
                    "color": "#444444"
                  }
                ]
              },
              {
                "featureType": "landscape",
                "elementType": "all",
                "stylers": [
                  {
                    "color": "#f2f2f2"
                  }
                ]
              },
              {
                "featureType": "poi",
                "elementType": "all",
                "stylers": [
                  {
                    "visibility": "off"
                  }
                ]
              },
              {
                "featureType": "road",
                "elementType": "all",
                "stylers": [
                  {
                    "saturation": -100
                  },
                  {
                    "lightness": 45
                  }
                ]
              },
              {
                "featureType": "road.highway",
                "elementType": "all",
                "stylers": [
                  {
                    "visibility": "simplified"
                  }
                ]
              },
              {
                "featureType": "road.arterial",
                "elementType": "labels.icon",
                "stylers": [
                  {
                    "visibility": "off"
                  }
                ]
              },
              {
                "featureType": "transit",
                "elementType": "all",
                "stylers": [
                  {
                    "visibility": "off"
                  }
                ]
              },
              {
                "featureType": "water",
                "elementType": "all",
                "stylers": [
                  {
                    "color": "#162466"
                  },
                  {
                    "visibility": "on"
                  }
                ]
              }
            ];
            break;
          case "wa_map_style2":
            var styles = [
              {
                "featureType": "water",
                "elementType": "geometry",
                "stylers": [
                  {
                    "color": "#e9e9e9"
                  },
                  {
                    "lightness": 17
                  }
                ]
              },
              {
                "featureType": "landscape",
                "elementType": "geometry",
                "stylers": [
                  {
                    "color": "#f5f5f5"
                  },
                  {
                    "lightness": 20
                  }
                ]
              },
              {
                "featureType": "road.highway",
                "elementType": "geometry.fill",
                "stylers": [
                  {
                    "color": "#ffffff"
                  },
                  {
                    "lightness": 17
                  }
                ]
              },
              {
                "featureType": "road.highway",
                "elementType": "geometry.stroke",
                "stylers": [
                  {
                    "color": "#ffffff"
                  },
                  {
                    "lightness": 29
                  },
                  {
                    "weight": 0.2
                  }
                ]
              },
              {
                "featureType": "road.arterial",
                "elementType": "geometry",
                "stylers": [
                  {
                    "color": "#ffffff"
                  },
                  {
                    "lightness": 18
                  }
                ]
              },
              {
                "featureType": "road.local",
                "elementType": "geometry",
                "stylers": [
                  {
                    "color": "#ffffff"
                  },
                  {
                    "lightness": 16
                  }
                ]
              },
              {
                "featureType": "poi",
                "elementType": "geometry",
                "stylers": [
                  {
                    "color": "#f5f5f5"
                  },
                  {
                    "lightness": 21
                  }
                ]
              },
              {
                "featureType": "poi.park",
                "elementType": "geometry",
                "stylers": [
                  {
                    "color": "#dedede"
                  },
                  {
                    "lightness": 21
                  }
                ]
              },
              {
                "elementType": "labels.text.stroke",
                "stylers": [
                  {
                    "visibility": "on"
                  },
                  {
                    "color": "#ffffff"
                  },
                  {
                    "lightness": 16
                  }
                ]
              },
              {
                "elementType": "labels.text.fill",
                "stylers": [
                  {
                    "saturation": 36
                  },
                  {
                    "color": "#333333"
                  },
                  {
                    "lightness": 40
                  }
                ]
              },
              {
                "elementType": "labels.icon",
                "stylers": [
                  {
                    "visibility": "off"
                  }
                ]
              },
              {
                "featureType": "transit",
                "elementType": "geometry",
                "stylers": [
                  {
                    "color": "#f2f2f2"
                  },
                  {
                    "lightness": 19
                  }
                ]
              },
              {
                "featureType": "administrative",
                "elementType": "geometry.fill",
                "stylers": [
                  {
                    "color": "#fefefe"
                  },
                  {
                    "lightness": 20
                  }
                ]
              },
              {
                "featureType": "administrative",
                "elementType": "geometry.stroke",
                "stylers": [
                  {
                    "color": "#fefefe"
                  },
                  {
                    "lightness": 17
                  },
                  {
                    "weight": 1.2
                  }
                ]
              }
            ];
            break;
          case "wa_map_style3":
            var styles = [{
              "featureType": "water",
              "elementType": "geometry",
              "stylers": [{
                "color": "#193341"
              }]
            }, {
              "featureType": "landscape",
              "elementType": "geometry",
              "stylers": [{
                "color": "#2c5a71"
              }]
            }, {
              "featureType": "road",
              "elementType": "geometry",
              "stylers": [{
                "color": "#29768a"
              }, {
                "lightness": -37
              }]
            }, {
              "featureType": "poi",
              "elementType": "geometry",
              "stylers": [{
                "color": "#406d80"
              }]
            }, {
              "featureType": "transit",
              "elementType": "geometry",
              "stylers": [{
                "color": "#406d80"
              }]
            }, {
              "elementType": "labels.text.stroke",
              "stylers": [{
                "visibility": "on"
              }, {
                "color": "#3e606f"
              }, {
                "weight": 2
              }, {
                "gamma": 0.84
              }]
            }, {
              "elementType": "labels.text.fill",
              "stylers": [{
                "color": "#ffffff"
              }]
            }, {
              "featureType": "administrative",
              "elementType": "geometry",
              "stylers": [{
                "weight": 0.6
              }, {
                "color": "#1a3541"
              }]
            }, {
              "elementType": "labels.icon",
              "stylers": [{
                "visibility": "off"
              }]
            }, {
              "featureType": "poi.park",
              "elementType": "geometry",
              "stylers": [{
                "color": "#2c5a71"
              }]
            }];
            break;
          case "wa_map_style4":

            var styles = [{
              "featureType": "all",
              "elementType": "labels.icon",
              "stylers": [{
                "visibility": "off"
              }]
            }, {
              "featureType": "administrative",
              "elementType": "geometry.fill",
              "stylers": [{
                "color": "#eeeeee"
              }]
            }, {
              "featureType": "administrative.country",
              "elementType": "geometry",
              "stylers": [{
                "lightness": "80"
              }]
            }, {
              "featureType": "administrative.country",
              "elementType": "labels",
              "stylers": [{
                "visibility": "off"
              }]
            }, {
              "featureType": "administrative.province",
              "elementType": "all",
              "stylers": [{
                "visibility": "off"
              }]
            }, {
              "featureType": "administrative.locality",
              "elementType": "labels.text",
              "stylers": [{
                "visibility": "simplified"
              }, {
                "color": "#777777"
              }]
            }, {
              "featureType": "administrative.locality",
              "elementType": "labels.icon",
              "stylers": [{
                "visibility": "simplified"
              }, {
                "lightness": 60
              }]
            }, {
              "featureType": "administrative.neighborhood",
              "elementType": "all",
              "stylers": [{
                "visibility": "off"
              }]
            }, {
              "featureType": "administrative.land_parcel",
              "elementType": "all",
              "stylers": [{
                "visibility": "off"
              }]
            }, {
              "featureType": "landscape.man_made",
              "elementType": "geometry.fill",
              "stylers": [{
                "color": "#fbfbfb"
              }]
            }, {
              "featureType": "landscape.man_made",
              "elementType": "geometry.stroke",
              "stylers": [{
                "color": "#cfcfcf"
              }]
            }, {
              "featureType": "landscape.man_made",
              "elementType": "labels",
              "stylers": [{
                "visibility": "off"
              }]
            }, {
              "featureType": "landscape.natural",
              "elementType": "geometry",
              "stylers": [{
                "color": "#ffffff"
              }]
            }, {
              "featureType": "landscape.natural",
              "elementType": "labels",
              "stylers": [{
                "visibility": "simplified"
              }]
            }, {
              "featureType": "poi",
              "elementType": "geometry.fill",
              "stylers": [{
                "color": "#dedede"
              }]
            }, {
              "featureType": "poi",
              "elementType": "labels",
              "stylers": [{
                "visibility": "off"
              }]
            }, {
              "featureType": "poi",
              "elementType": "labels.icon",
              "stylers": [{
                "visibility": "off"
              }]
            }, {
              "featureType": "poi.attraction",
              "elementType": "geometry",
              "stylers": [{
                "color": "#eeeeee"
              }]
            }, {
              "featureType": "poi.business",
              "elementType": "labels.icon",
              "stylers": [{
                "visibility": "off"
              }]
            }, {
              "featureType": "poi.park",
              "elementType": "all",
              "stylers": [{
                "color": "#d1d1d1"
              }, {
                "invert_lightness": true
              }]
            }, {
              "featureType": "poi.park",
              "elementType": "geometry",
              "stylers": [{
                "invert_lightness": true
              }]
            }, {
              "featureType": "poi.park",
              "elementType": "labels",
              "stylers": [{
                "visibility": "off"
              }]
            }, {
              "featureType": "road.highway",
              "elementType": "geometry",
              "stylers": [{
                "color": "#e5e5e5"
              }, {
                "visibility": "simplified"
              }]
            }, {
              "featureType": "road.highway",
              "elementType": "labels",
              "stylers": [{
                "visibility": "off"
              }]
            }, {
              "featureType": "road.arterial",
              "elementType": "geometry.stroke",
              "stylers": [{
                "color": "#cfcfcf"
              }, {
                "visibility": "on"
              }, {
                "weight": "0.55"
              }]
            }, {
              "featureType": "road.arterial",
              "elementType": "labels.text",
              "stylers": [{
                "visibility": "simplified"
              }]
            }, {
              "featureType": "road.arterial",
              "elementType": "labels.icon",
              "stylers": [{
                "visibility": "off"
              }]
            }, {
              "featureType": "road.local",
              "elementType": "geometry.fill",
              "stylers": [{
                "color": "#efefef"
              }]
            }, {
              "featureType": "road.local",
              "elementType": "geometry.stroke",
              "stylers": [{
                "visibility": "off"
              }]
            }, {
              "featureType": "road.local",
              "elementType": "labels",
              "stylers": [{
                "visibility": "simplified"
              }]
            }, {
              "featureType": "road.local",
              "elementType": "labels.text",
              "stylers": [{
                "color": "#777777"
              }, {
                "visibility": "off"
              }]
            }, {
              "featureType": "road.local",
              "elementType": "labels.icon",
              "stylers": [{
                "visibility": "off"
              }]
            }, {
              "featureType": "transit.line",
              "elementType": "geometry",
              "stylers": [{
                "color": "#cdcdcd"
              }]
            }, {
              "featureType": "transit.line",
              "elementType": "labels",
              "stylers": [{
                "visibility": "off"
              }]
            }, {
              "featureType": "transit.station",
              "elementType": "geometry.fill",
              "stylers": [{
                "color": "#cccccc"
              }]
            }, {
              "featureType": "water",
              "elementType": "all",
              "stylers": [{
                "visibility": "simplified"
              }]
            }, {
              "featureType": "water",
              "elementType": "geometry.fill",
              "stylers": [{
                "color": "#e0e0e0"
              }]
            }, {
              "featureType": "water",
              "elementType": "labels",
              "stylers": [{
                "visibility": "off"
              }]
            }];

        }
        var styledMap = new google.maps.StyledMapType(styles, {
          name: "Styled Map"
        });

        if ($('.map .map-canvas').length) {
          $('.map .map-canvas').each(function(i, obj) {
            compactor_map_setting(this);
          });
        }
        function compactor_map_setting(el) {
          if ($(el).length > 0) {
            var locations = [
              <?php foreach ($maps as $map) { ?>
              ['<?php echo $map['compactor_map_company_name']; ?>', '<?php echo $map['compactor_map_company_description']; ?>', <?php echo $map['compactor_map_latitude']; ?>, <?php echo $map['compactor_map_longitude']; ?>],
              <?php } ?>
            ];

            var map = new google.maps.Map(document.getElementById('map-canvas'), {
              zoom: <?php echo $compactor_map_zoom; ?>,
              center: new google.maps.LatLng(<?php echo $maps[0]['compactor_map_latitude'];?>, <?php echo $maps[0]['compactor_map_longitude']; ?>),
              mapTypeControlOptions: {
                mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
              }
            })
            map.mapTypes.set('map_style', styledMap);
            map.setMapTypeId('map_style');

            var infowindow = new google.maps.InfoWindow();

            var marker, i, company_info

            for (i = 0; i < locations.length; i++) {
              marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][2], locations[i][3]),
                map: map,
                icon : '<?php echo get_template_directory_uri() ?>/images/unnamed.png'
              });
              google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                  company_info =  '<div class="map-company-info">';
                  company_info += '<h3> ' + locations[i][0] + '</h3>';
                  company_info += '<p> ' + locations[i][1] + ' </p>';
                  company_info += '</div>';
                  infowindow.setContent(company_info);
                  infowindow.open(map, marker);
                }
              })(marker, i));
            }
          };
        }
      });
    </script>
    <div class="map <?php echo esc_attr($animation_classes)  ?>" <?php echo esc_attr($data_animated); ?>>
      <div id="map-canvas" class="map-canvas" data-id="map-canvas" style="height: <?php echo $compactor_map_height ?>px;">
      </div>
    </div>


    <?php return ob_get_clean();
  }
  add_shortcode( 'compactor_maps', 'compactor_maps' );
}  


