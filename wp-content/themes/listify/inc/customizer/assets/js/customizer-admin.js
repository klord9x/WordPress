/* global wp, jQuery */
(function($){

	var api = wp.customize;

	/**
	 * Multiselect control
	 *
	 * @since 1.5.0
	 */
	api.Multiselect = api.Control.extend({
		/**
		 * When the control has been embedded in to the section.
		 *
		 * @since 1.5.0
		 * @param {int} id
		 * @param {Array} options
		 */
		ready: function( id, options ) {
			api.Control.prototype.ready.apply( this, id, options );

			var control = this;

			control.selection = this.params.selection;

			control.$select = control.container.find( 'select[multiple]' );

			control.$select.select2({
				'placeholder': listifyCustomizer.l10n.facetwpPlaceholder
			});

			control.setting.bind(function( value ) {
				control.$select.trigger( 'change' );
			});

			control.$select.on( 'select2:select', function(e) {
				$selectedElement = $(e.params.data.element);
				$selectedElementOptgroup = $selectedElement.parent( 'optgroup' );

				if ( $selectedElementOptgroup.length > 0 ) {
					$selectedElement.data( 'select2-originaloptgroup', $selectedElementOptgroup );
				}

				$selectedElement.detach().appendTo( $(e.target) );

				control.$select.trigger( 'change' );
			})

			control.$select.on( 'select2:unselect', function(e) {
				var selected = control.$select.find( 'option:selected' );

				if ( 0 == selected.length ) {
					control.setting.set( '' );
					control.$select.select2( 'val', '' );
				}
			});
		}
	});

	$.extend( api.controlConstructor, {
		'multiselect': api.Multiselect
	} );

	// Control visibility for controls
	$.each({
		'nav-secondary': {
			controls: [ 'nav-megamenu' ],
			callback: function( to ) { 
				return !! to; 
			}
		},
		'map-behavior-clusters': {
			controls: [ 'map-behavior-grid-size' ],
			callback: function( to ) { 
				return !! to; 
			}
		},
		'listing-archive-output': {
			controls: [ 'listing-archive-map-position' ],
			callback: function( to ) { 
				return 'results' != to; 
			}
		},
		'listing-archive-card-avatar': {
			controls: [ 'listing-archive-card-avatar-style' ],
			callback: function( to ) { 
				return 'none' != to; 
			}
		},
		'search-filters-meta': {
			controls: [ 'search-filters-rss', 'search-filters-reset' ],
			callback: function( to ) { 
				return !! to; 
			}
		},
		'home-header-style': {
			controls: [ 'home-header-logo' ],
			callback: function( to ) { 
				return 'default' != to; 
			}
		},
		'listing-ratings': {
			controls: [ 'color-listing-star' ],
			callback: function( to ) { 
				return !! to; 
			}
		},
		'listing-card-display-secondary-image': {
			controls: [ 'listing-archive-card-avatar', 'listing-archive-card-avatar-style' ],
			callback: function( to ) { 
				return !! to; 
			}
		},
		'single-listing-secondary-image-display': {
			controls: [ 'single-listing-secondary-image', 'single-listing-secondary-image-style' ],
			callback: function( to ) { 
				return !! to; 
			}
		},
	}, function( settingId, o ) {
		api( settingId, function( setting ) {
			$.each( o.controls, function( i, controlId ) {
				api.control( controlId, function( control ) {
					var visibility = function( to ) {
						control.container.toggle( o.callback( to ) );
					};

					visibility( setting.get() );
					setting.bind( visibility );
				});
			});
		});
	});

	/**
	 * Handle multiple items when changing map provider.
	 *
	 * @since 2.0.0
	 */
	api( 'map-service-provider', function( setting ) {
		var controls;

		var items = {
			googlemaps: {
				control: [ 'map-behavior-api-key', 'map-behavior-trigger', 'map-behavior-autofit', 'map-behavior-max-zoom-out' ],
				section: [ 'map-appearance' ]
			},
			mapbox: {
				control: [ 'mapbox-tile-url', 'map-behavior-autofit' ],
				section: []
			}
		}

		$.each( items, function( providerId, provider ) {
			$.each( provider, function( type, items ) {
				$.each( items, function( z, itemId ) {

					api[ type ]( itemId, function( item ) {
						var visibility = function( to ) {
							item.container.toggle( to === providerId );
						}

						visibility( setting.get() );
						setting.bind( visibility );
					});

				});
			});
		});

	});

})(jQuery);
