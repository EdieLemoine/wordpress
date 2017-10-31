function init() {
  var styles = mapData.snazzy_style;

  // console.log( mapData );
  
  // styles = styles.replace( '&lsqb;', '[' );
  // styles = styles.replace( '&rsqb;', ']' );

  // document.getElementsByTagName( "h1" ).innerHTML = styles;
  console.log( styles );

  styles = JSON.parse( styles );

  console.log( styles );

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
            '<div id="ep-infobox">' +
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
