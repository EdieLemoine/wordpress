function init() {
  // var styles = [ {
  //     "featureType": "all",
  //     "elementType": "all",
  //     "stylers": [ {
  //       "saturation": "-100"
  //     } ]
  //   },
  //   {
  //     "featureType": "poi",
  //     "elementType": "labels",
  //     "stylers": [ {
  //       "visibility": "off"
  //     } ]
  //   },
  //   {
  //     "featureType": "road",
  //     "elementType": "labels.text.fill",
  //     "stylers": [ {
  //       "lightness": "100"
  //     } ]
  //   },
  //   {
  //     "featureType": "road",
  //     "elementType": "labels.icon",
  //     "stylers": [ {
  //       "visibility": "off"
  //     } ]
  //   },
  //   {
  //     "featureType": "road.highway",
  //     "elementType": "geometry.fill",
  //     "stylers": [ {
  //       "color": "#1d1d1b"
  //     } ]
  //   },
  //   {
  //     "featureType": "road.highway",
  //     "elementType": "labels",
  //     "stylers": [ {
  //       "visibility": "off"
  //     } ]
  //   },
  //   {
  //     "featureType": "road.highway",
  //     "elementType": "labels.text.stroke",
  //     "stylers": [ {
  //       "color": "#1d1d1b"
  //     } ]
  //   },
  //   {
  //     "featureType": "road.arterial",
  //     "elementType": "geometry.fill",
  //     "stylers": [ {
  //       "color": "#4c4b4a"
  //     } ]
  //   },
  //   {
  //     "featureType": "road.arterial",
  //     "elementType": "labels.text.stroke",
  //     "stylers": [ {
  //       "color": "#4c4b4a"
  //     } ]
  //   },
  //   {
  //     "featureType": "road.local",
  //     "elementType": "geometry.fill",
  //     "stylers": [ {
  //       "color": "#7a7a7a"
  //     } ]
  //   },
  //   {
  //     "featureType": "road.local",
  //     "elementType": "labels.text.stroke",
  //     "stylers": [ {
  //       "color": "#7a7a7a"
  //     } ]
  //   },
  //   {
  //     "featureType": "transit",
  //     "elementType": "all",
  //     "stylers": [ {
  //       "visibility": "off"
  //     } ]
  //   }
  // ];

  console.log(mapData.snazzy_style);

  var dirService = new google.maps.DirectionsService();

  var mapDiv = document.getElementById( mapData.id ),
  mapMarkers = mapData.markers,
  map = new google.maps.Map( mapDiv, {
    zoom: Number( mapData.zoom ),
    disableDefaultUI: true,
    center: {
      lat: mapData.center.lat,
      lng: mapData.center.lng
    },
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    styles: mapData.snazzy_style
  } );

  var icon = {
    path: "M-20,0a20,20 0 1,0 40,0a20,20 0 1,0 -40,0",
    scale: 0.5,
    strokeColor: '#1d1d1b',
    strokeWeight: 2
  }

  var creatievehoek = new google.maps.Marker({
    position: new google.maps.LatLng( 52.509614, 4.944798 ),
    map: map,
    icon: icon,
    title: 'De Creatieve Hoek'
  });

  // var infowindow = new SnazzyInfoWindow({
  //   marker: creatievehoek,
  //   offset: {
  //     top: '2px',
  //     left: '1px'
  //   },
  //   border: false,
  //   backgroundColor: '#1d1d1b',
  //   padding: 0,
  //   borderRadius: 0,
  //   closeOnMapClick: false,
  //   showCloseButton: false,
  //   content: '<img draggable="false" id="marker-logo" src="wp-content/plugins/edies-plugin/includes/svg/de-creatieve-hoek-logo.svg" />'
  //   // <div id="ep-infobox"><img id="marker-logo" src="wp-content/plugins/edies-plugin/includes/svg/de-creatieve-hoek-logo.svg" /></div>
  // });

  infowindow.open();
  // google.maps.event.addListener( creatievehoek, 'click', ( function() {
  //   return function() {
  //     infowindow.setContent(
  //       '<div id="ep-infobox">' +
  //       '<h2>De Creatieve Hoek</h2>' +
  //       // '<h3 class=h4>' + '</h3>' +
  //       // '<p>' + mapMarkers[ i ].content + '</p>' +
  //       // '<a href="' + mapMarkers[ i ].url + '" target="_blank" class="x-btn ' + mapMarkers[ i ].posttype + '">Bekijk ' + mapMarkers[ i ].posttype + '</a>' +
  //       '</div>'
  //     );
  //     infowindow.open( map, creatievehoek );
  //   };
  // }));
}

google.maps.event.addDomListener( window, "load", init );
