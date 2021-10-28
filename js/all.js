
function hover(element) {
  element.setAttribute('src', 'images/logohover.png');
}
function unhover(element) {
  element.setAttribute('src', 'images/logo1.png');
}
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "mynav") {
    x.className += " responsive";
  } else {
    x.className = "mynav";
  }
}

function getFutureDate(date) {
  let d = new Date(date);
  d.setMonth(d.getMonth() + 6);
  return d.toDateString();
}






