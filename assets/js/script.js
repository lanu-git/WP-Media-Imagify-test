var width = window.innerWidth;
var icon = document.getElementsByClassName(".icon")



icon.addEventListener("click", myFunction());

function myFunction() {
  var x = document.getElementById("nav-mobile");
  if (width <= 768 && x.className === "nav-center") {
    x.className += " responsive";
  }
  else {
    x.className = "nav-center"
  }

}