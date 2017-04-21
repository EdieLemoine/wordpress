<?php

/**
 * Shortcode handler
 */

if ( !wp_script_is( 'ep-google-maps' ) ) :
	wp_enqueue_script( 'ep-google-maps' );
endif;

$ep_class = new EP_Custom_Map();
$mapID = $ep_class->getStaticID();
$style = '';

$snazzy_style = json_encode( $snazzy_style );

if ( $spinner ) :
	$style .= 'background-image: url("' . $spinner . '");';
endif;

$atts = cs_atts( array(
	'id' => trim($id . ' ' . $mapID),
	'class' => trim('ep-map bg-image ' . $class),
	'style' => 'height: ' . $height . ';' . $style
) );
$stuff = array(
	$atts,
	$mapID,
	$zoom,
	$snazzy_style,
	$scroll_toggle,
	$spinner_toggle,
	$spinner
);
//
// foreach ( $stuff as $item ) {
// 	echo $item . '<br />';
// }

?>
<div <?php echo $atts ?>></div>

<script>
	// Create map on load
	google.maps.event.addDomListener( window, 'load', initMap );

	function initMap() {
		// Get the element where the map should be
		var mapElement = document.getElementById( <?php echo '"' . $mapID . '"' ?> );

		var mapOptions = {
			center: new google.maps.LatLng( <?php echo $centerLatLng ?> ),
			zoom: <?php echo $zoom ?>,
			scrollwheel: <?php echo $scroll_toggle ?>,
			// Output SnazzyMaps style if available
			<?php if ( $snazzy_style ) : ?>
				styles: <?php print $snazzy_style ?>
			<?php endif; ?>
		}

		// Create the Google Map using our element and options defined above
		var map = new google.maps.Map( mapElement, mapOptions );

		// Draw polygon on map
			// var polyCoords = [
			//   {
			//     lat: 52.352762,
			//     lng: 4.891126
			//   }, {
			//     lat: 52.353208,
			//     lng: 4.894474
			//   }, {
			//     lat: 52.354164,
			//     lng: 4.899216
			//   }, {
			//     lat: 52.35482,
			//     lng: 4.901276
			//   }, {
			//     lat: 52.356668,
			//     lng: 4.899795
			//   }, {
			//     lat: 52.357611,
			//     lng: 4.899259
			//   }, {
			//     lat: 52.357336,
			//     lng: 4.898486
			//   }, {
			//     lat: 52.356877,
			//     lng: 4.897006
			//   }, {
			//     lat: 52.355907,
			//     lng: 4.892886
			//   }, {
			//     lat: 52.355409,
			//     lng: 4.890397
			//   }, {
			//     lat: 52.354885,
			//     lng: 4.890311
			//   }
			// ];
			//
			// var albertcuyp = new google.maps.Polygon({
			//   paths: polyCoords,
			//   strokeColor: '#8DC63F',
			//   strokeOpacity: 0.8,
			//   strokeWeight: 0,
			//   fillColor: '#8DC63F',
			//   fillOpacity: 0.15
			// });
			// albertcuyp.setMap(map);

		// Add marker
		// var marker = new google.maps.Marker({
		// 	position: new google.maps.LatLng( markerLat, markerLng ),
		// 	map: map,
		// 	// icon: icon,
		// 	animation: google.maps.Animation.DROP,
		// 	title: '<?php echo esc_attr(the_title()) ?>'
		// });

		// init directions service
		// var dirService = new google.maps.DirectionsService();
		// var dirRenderer = new google.maps.DirectionsRenderer({
		// 	preserveViewport: true,
		// 	suppressMarkers: true,
		// 	polylineOptions: {
		// 		strokeColor: "#8DC63F",
		// 		strokeOpacity: 0.75,
		// 		strokeWeight: 5
		// 	}
		// });
		//
		// dirRenderer.setMap(map);
		//
		// // highlight a street
		// var request = {
		// 	origin: startCor,
		// 	destination: endCor,
		// 	travelMode: google.maps.TravelMode.WALKING
		// };
		// dirService.route(request, function(result, status) {
		// 	if (status == google.maps.DirectionsStatus.OK) {
		// 		dirRenderer.setDirections(result);
		// 	}
		// });
	}
</script>
