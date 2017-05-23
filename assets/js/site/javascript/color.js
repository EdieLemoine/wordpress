colors = ["cyan", "magenta", "yellow"]; // Define array

function calc_color() {
  color = colors[ Math.round( 2 * Math.random() ) ]; // Get random index from 0 - 2
  document.getElementById("top").className = "site " + color; // Set class to selected array index
}

setTimeout( calc_color, 2500 ); // Do this after 2.5s
