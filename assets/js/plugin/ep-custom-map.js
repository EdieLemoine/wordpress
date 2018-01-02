function init() {
  // var dirService = new google.maps.DirectionsService();

  for ( key in maps ) {
    if ( maps.hasOwnProperty(key) ) {
      mapData = maps[key];

      mapDiv = document.getElementById( mapData.id );
      mapMarkers = mapData.markers;

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

      icon = {
        path: "M-20,0a20,20 0 1,0 40,0a20,20 0 1,0 -40,0",
        scale: 0.5,
        strokeColor: '#1d1d1b',
        strokeWeight: 2
      }

      marker = new google.maps.Marker({
        position: new google.maps.LatLng( mapData.center.lat, mapData.center.lng ),
        map: map,
        // icon: icon,
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

      // infowindow.open();
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
  }
}

google.maps.event.addDomListener( window, "load", init );
