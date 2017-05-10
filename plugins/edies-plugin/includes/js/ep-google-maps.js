function init() {
  var styles = [{
      "featureType": "all",
      "elementType": "labels.icon",
      "stylers": [{
        "visibility": "off"
      }]
    },
    {
      "featureType": "administrative",
      "elementType": "labels.text",
      "stylers": [{
        "visibility": "on"
      }]
    },
    {
      "featureType": "administrative.locality",
      "elementType": "labels.text",
      "stylers": [{
        "visibility": "on"
      }]
    },
    {
      "featureType": "administrative.neighborhood",
      "elementType": "labels.text",
      "stylers": [{
        "visibility": "on"
      }]
    },
    {
      "featureType": "landscape.man_made",
      "elementType": "labels.text",
      "stylers": [{
        "visibility": "on"
      }]
    },
    {
      "featureType": "landscape.natural",
      "elementType": "geometry.fill",
      "stylers": [{
          "visibility": "on"
        },
        {
          "color": "#e0efef"
        }
      ]
    },
    {
      "featureType": "landscape.natural",
      "elementType": "labels.text",
      "stylers": [{
        "visibility": "off"
      }]
    },
    {
      "featureType": "poi",
      "elementType": "geometry.fill",
      "stylers": [{
          "visibility": "on"
        },
        {
          "hue": "#1900ff"
        },
        {
          "color": "#c0e8e8"
        }
      ]
    },
    {
      "featureType": "road",
      "elementType": "geometry",
      "stylers": [{
          "lightness": 100
        },
        {
          "visibility": "simplified"
        }
      ]
    },
    {
      "featureType": "road",
      "elementType": "labels",
      "stylers": [{
        "visibility": "on"
      }]
    },
    {
      "featureType": "transit",
      "elementType": "labels.text",
      "stylers": [{
        "visibility": "off"
      }]
    },
    {
      "featureType": "transit",
      "elementType": "labels.icon",
      "stylers": [{
        "visibility": "off"
      }]
    },
    {
      "featureType": "transit.line",
      "elementType": "geometry",
      "stylers": [{
          "visibility": "on"
        },
        {
          "lightness": 700
        }
      ]
    },
    {
      "featureType": "water",
      "elementType": "all",
      "stylers": [{
        "color": "#7dcdcd"
      }]
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
