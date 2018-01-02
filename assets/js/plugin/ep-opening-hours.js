now = new Date();

// day = now.getDay();
// var hour = now.getHours();
// var minutes = now.getMinutes();

today = openingHoursData.js[now.getDay()];
// var timeDiv = document.getElementById('timeDiv');
// var debugDiv = document.getElementById('debugDiv');
// var suffix = '';
//
// var openJS = openingHoursData.js;
// var openTimes = openingHoursData.times;

// var checkTime = function() {

  // add 0 to one digit minutes
  // if ( minutes < 10 ) {
  //   minutes = "0" + minutes
  // };

  // if ( openingHoursData.hourdisplay ) {
  //   hour = ((hour + 11) % 12 + 1);
  //   var suffix = hour >= 12 ? "PM" : "AM";
  // }

  // debugDiv.innerHTML = "CURRENT: Day: " + day +" | Hour: "+ hour +" | Minute: "+ minutes;
  // console.log(openJS);
  //
  // var openJS = jQuery.map(openJS, function(value, index) {
  //   return [value];
  // });
  //
  // for ( i = 0; i < openJS.length; i++ ) {
  //   otime = openTimes[openJS[i]];
  //   for ( var key2 in otime ) {
  //     if (openJS.hasOwnProperty(key2)) {
  //       console.log( i + "->" + key2 + "->" + otime[key2] );
  //     }
  //   }
  // };
  //
  // if ((day == 0 || day == 6) && hour >= 13 && hour <= 23) {
  //   timeDiv.innerHTML = openingHoursData.text.prefix + today + ' ' + hour + ':' + minutes + suffix + openingHoursData.text.open;
  //   timeDiv.className = 'open';
  // }
  //
  // else if ((day == 3 || day == 4 || day == 5) && hour >= 16 && hour <= 23) {
  //   timeDiv.innerHTML = openingHoursData.text.prefix + today + ' ' + hour + ':' + minutes + suffix + openingHoursData.text.closed;
  //   timeDiv.className = 'closed';
  // }
  //
  // else {
  //   // if ( hour == 0 || hour > 12 ) {
  //   //   hour = ((hour + 11) % 12 + 1); //i.e. show 1:15 instead of 13:15
  //   // }
  //   timeDiv.innerHTML = 'Het is  ' + today + ' ' + hour + ':' + minutes + suffix + ' - we zijn gesloten.';
  //   timeDiv.className = 'closed';
  // }
// };

jQuery( ".ep-day." + today ).addClass("today");

// setInterval(checkTime, 5000);
// checkTime();
