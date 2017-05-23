function init() {
  var styles = [{
      "featureType": "administrative",
      "elementType": "labels.text",
      "stylers": [{
        "visibility": "off"
      }]
    },
    {
      "featureType": "administrative",
      "elementType": "labels.text.fill",
      "stylers": [{
        "color": "#444444"
      }]
    },
    {
      "featureType": "landscape",
      "elementType": "all",
      "stylers": [{
        "color": "#f2f2f2"
      }]
    },
    {
      "featureType": "poi",
      "elementType": "all",
      "stylers": [{
        "visibility": "off"
      }]
    },
    {
      "featureType": "road",
      "elementType": "all",
      "stylers": [{
          "saturation": -100
        },
        {
          "lightness": 45
        }
      ]
    },
    {
      "featureType": "road",
      "elementType": "labels.icon",
      "stylers": [{
        "visibility": "off"
      }]
    },
    {
      "featureType": "road.highway",
      "elementType": "all",
      "stylers": [{
        "visibility": "simplified"
      }]
    },
    {
      "featureType": "road.highway",
      "elementType": "labels",
      "stylers": [{
        "visibility": "off"
      }]
    },
    {
      "featureType": "road.arterial",
      "elementType": "labels.text.fill",
      "stylers": [{
        "color": mapData.primary_color
      }]
    },
    {
      "featureType": "road.arterial",
      "elementType": "labels.icon",
      "stylers": [{
        "visibility": "off"
      }]
    },
    {
      "featureType": "road.local",
      "elementType": "labels.text.fill",
      "stylers": [{
        "color": mapData.primary_color
      }]
    },
    {
      "featureType": "transit",
      "elementType": "all",
      "stylers": [{
        "visibility": "off"
      }]
    },
    {
      "featureType": "water",
      "elementType": "all",
      "stylers": [{
          "color": mapData.primary_color
        },
        {
          "visibility": "on"
        }
      ]
    }
  ];

  var color = "#8DC63F";
  var dirService = new google.maps.DirectionsService();

  var mapDiv = document.getElementById( mapData.id ),
      mapMarkers = mapData.markers,
      map = new google.maps.Map( mapDiv, {
        zoom: Number( mapData.zoom ),
        center: {
          lat: mapData.center.lat,
          lng: mapData.center.lng
        },
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        styles: styles
      });

  console.log(mapDiv);

  if ( mapMarkers.length ) {
    var infowindow = new google.maps.InfoWindow(),
        marker,
        i;

    for ( i = 0; i < mapMarkers.length; i++ ) {
      marker = new google.maps.Marker({
        position: {
          lat: mapMarkers[i].position.lat,
          lng: mapMarkers[i].position.lng
        },
        icon: {
          path: "M-20,0a20,20 0 1,0 40,0a20,20 0 1,0 -40,0",
          fillColor: mapMarkers[i].color,
          fillOpacity: 1,
          anchor: new google.maps.Point(0,0),
          strokeWeight: 0,
          scale: 0.25
        },
        title: mapMarkers[i].title,
        map: map
      });
      google.maps.event.addListener( marker, 'click', ( function( marker, i ) {
        return function() {
          infowindow.setContent(
            '<div id="ac-infobox">' +
              '<h2>' + mapMarkers[i].title + '</h2>' +
              '<h3 class=h4>' + mapMarkers[i].subtitle + '</h3>' +
              '<p>' + mapMarkers[i].content + '</p>' +
              '<a href="' + mapMarkers[i].url + '" target="_blank" class="x-btn ' + mapMarkers[i].posttype + '">Bekijk ' + mapMarkers[i].posttype + '</a>' +
            '</div>'
          );
          infowindow.open( map, marker );
        };
      })( marker, i ));
    }
  }
}

google.maps.event.addDomListener(window, "load", init);
