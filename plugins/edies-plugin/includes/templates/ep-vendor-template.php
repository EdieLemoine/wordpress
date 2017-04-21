<?php get_header(); ?>
<?php while ( have_posts() ) : the_post();

  // Contact info functions
  function fa_icon($icon) {
    return '<i class="fa fa-fw fa-' . $icon . '"></i>';
  }

  $header = get_field('header_foto');
  $profielfoto = get_field('profielfoto');

  $phone = get_field('telefoonnummer');

  function format_phone($phone) {
    return $phone;
  }

  // Contact info
  $phone_display = format_phone($phone);
  $phone_callable = format_phone($phone);

  $website = get_field('website');
  $email = get_field('e-mail');
  $location = get_field('locatie');

  $facebook = get_field('facebook');
  $twitter = get_field('twitter');
  $instagram = get_field('instagram');

  $social = array($facebook, $twitter, $instagram);

  // Map data
  $centerLat = '52.356041';
  $centerLng = '4.893975';

  // Category
  $taxonomy = '';

  if ( get_post_type() == 'ep-kraam' ) {
    $taxonomy = 'kraam-cat';
  }
  if ( get_post_type() == 'ep-winkel' ) {
    $taxonomy = 'winkel-cat';
  }

  $terms = get_the_terms(get_the_ID(), $taxonomy);

  ?>

  <div class="x-main full vendor" role="main">

    <?php if ( $header ): ?> <!-- Output header differently depending on whether there's a header image or not -->
      <div id="vendor-header"class="x-section bg-image" style="background-image:url('<?php the_field('header_foto'); ?>')">
      <div class="x-container max width">
      <h2 class="vendor-title"><?php the_title(); ?></h2>

    <?php else : ?>
      <div id="vendor-header"class="x-section">
      <div class="x-container max width">
      <h1 class="h2"><?php the_title(); ?></h1>
    <?php endif; ?>

        <?php if ( $profielfoto ) : ?> <!-- Output profile picture only if available -->

          <div class="x-img x-img-circle bg-image" id="vendor-pf" style="background-image:url('<?php the_field('header_foto'); ?>')">
          </div>

        <?php endif; ?>

        </div>
      </div>

    <div class="x-section vendor-info">
      <div class="x-container max width">
        <div class="vendor-left left cf">

          <div class="vendor-box left">
            <div class="content">
              <h2 class="h4 man">Contactgegevens</h2>
                <ul class="fa-ul">

                <?php

                if ( $phone ) {
                  echo '<li>' . fa_icon('phone') . '<a href="phone:' . $phone_callable . '">' . $phone_display . '</a></li>';
                }
                if ( $website ) {
                  echo '<li>' . fa_icon('link') . $website . '</li>';
                }
                if ( $email ) {
                  echo '<li>' . fa_icon('envelope-o') . '<a href="mailto:' . $email . '">' . $email . '</a></li>';
                }
                if ( $location ) {
                  echo '<li>' . fa_icon('map-marker') . '<a href="#map">' . $location['address'] . '</a></li>';
                }
                ?>
              </ul>

                <?php if ( $social ) { ?>

                  <div class="vendor-social cf mtm">

                  <?php
                  if ( $facebook ) {
                    echo '<a href="http://facebook.com/' . $facebook . '"><i class="fa fa-facebook"></i></a>';
                  }
                  if ( $twitter ) {
                    echo '<a href="http://twitter.com/' . $twitter . '"><i class="fa fa-twitter"></i></a>';
                  }
                  if ( $instagram ) {
                    echo '<a href="http://instagram.com/' . $instagram . '"><i class="fa fa-instagram"></i></a>';
                  } ?>

                  </div>

                  <?php } ?>
            </div>
          </div>
          <?php if ($terms && !is_wp_error( $terms)): ?>
          <div class="vendor-box left">
            <div class="content">
              <h2 class="h4 man">Categorieën</h2>
              <p>
                <?php

                foreach ( $terms as $term ) {
                  $link = get_term_link( $term, $taxonomy );
                  if ( is_wp_error( $link ) ) {
                    return $link;
                  }
                  echo '<a href="' . esc_url( $link ) . '"><h3 class="h6">' . $term->name . '</h3></a>';
                }
                 ?>
              </p>
            </div>
          </div>
          <?php endif; ?>
        </div>
        <div class="vendor-right left cf">
          <div class="vendor-box">
            <div class="content">

              <h2 class="h4 man">Over <?php the_title(); ?></h2>

              <?php if ( get_the_content() ): the_content(); ?>
              <?php else: ?>
                <p><i>Geen informatie beschikbaar.</i></p>
              <?php endif; ?>

            </div>
          </div>
        </div>
      </div>
    </div>
    <?php if ( $location ): ?> <!-- Don't add map if it's not needed -->
    <div id="map"></div> <!-- Location for Google Map output -->
  <?php endif; ?>
  </div>

  <?php if ( $location ): ?> <!-- Don't add script if it's not needed -->
  <script>


    var centerLat = <?php echo $centerLat ?>;
    var centerLng = <?php echo $centerLng ?>;
    var markerLat = <?php
      if ( $location['lat'] ): echo $location['lat'];
      else: echo $centerLat;
      endif; ?>;
    var markerLng = <?php
      if ( $location['lng'] ): echo $location['lng'];
      else: echo $centerLng;
      endif; ?>;
    var startCor = "52.354945, 4.890377"; // Start of AC
    var endCor = "52.357121, 4.899486"; // End of AC

    // Create map on load
    google.maps.event.addDomListener(window, 'load', init);

    function init() {
      var mapOptions = {
        zoom: 17,
        center: new google.maps.LatLng( centerLat, centerLng ),
        scrollwheel: false,
        // Map styles
        styles:[{
          "featureType": "administrative",
          "elementType": "labels.text",
          "stylers": [{
            "visibility": "on"
          }]
        }, {
          "featureType": "administrative.locality",
          "elementType": "labels.text",
          "stylers": [{
            "visibility": "on"
          }]
        }, {
          "featureType": "administrative.neighborhood",
          "elementType": "labels.text",
          "stylers": [{
            "visibility": "on"
          }]
        }, {
          "featureType": "landscape.man_made",
          "elementType": "labels.text",
          "stylers": [{
            "visibility": "on"
          }]
        }, {
          "featureType": "landscape.natural",
          "elementType": "geometry.fill",
          "stylers": [{
            "visibility": "on"
          }, {
            "color": "#e0efef"
          }]
        }, {
          "featureType": "landscape.natural",
          "elementType": "labels.text",
          "stylers": [{
            "visibility": "off"
          }]
        }, {
          "featureType": "poi",
          "elementType": "geometry.fill",
          "stylers": [{
            "visibility": "on"
          }, {
            "hue": "#1900ff"
          }, {
            "color": "#c0e8e8"
          }]
        }, {
          "featureType": "road",
          "elementType": "geometry",
          "stylers": [{
            "lightness": 100
          }, {
            "visibility": "simplified"
          }]
        }, {
          "featureType": "road",
          "elementType": "labels",
          "stylers": [{
            "visibility": "off"
          }]
        }, {
          "featureType": "transit",
          "elementType": "labels.text",
          "stylers": [{
            "visibility": "off"
          }]
        }, {
          "featureType": "transit",
          "elementType": "labels.icon",
          "stylers": [{
            "visibility": "off"
          }]
        }, {
          "featureType": "transit.line",
          "elementType": "geometry",
          "stylers": [{
            "visibility": "on"
          }, {
            "lightness": 700
          }]
        }, {
          "featureType": "water",
          "elementType": "all",
          "stylers": [{
            "color": "#7dcdcd"
          }]
        }]
      };

      // Get the element where the map should be
      var mapElement = document.getElementById('map');

      // Create the Google Map using our element and options defined above
      var map = new google.maps.Map(mapElement, mapOptions);

      // Add marker
      var marker = new google.maps.Marker({
        position: new google.maps.LatLng( markerLat, markerLng ),
        map: map,
        // icon: icon,
        animation: google.maps.Animation.DROP,
        title: '<?php echo esc_attr(the_title()) ?>'
      });

      // init directions service
      var dirService = new google.maps.DirectionsService();
      var dirRenderer = new google.maps.DirectionsRenderer({
        preserveViewport: true,
        suppressMarkers: true,
        polylineOptions: {
          strokeColor: "#8DC63F",
          strokeOpacity: 0.75,
          strokeWeight: 5
        }
      });
      dirRenderer.setMap(map);

      // highlight a street
      var request = {
        origin: startCor,
        destination: endCor,
        travelMode: google.maps.TravelMode.WALKING
      };
      dirService.route(request, function(result, status) {
        if (status == google.maps.DirectionsStatus.OK) {
          dirRenderer.setDirections(result);
        }
      });
    }
  </script>
  <?php

  endif;
endwhile;
get_footer();

?>
