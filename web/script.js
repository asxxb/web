$(document).ready(function(){
    $('.carousel').slick({
      autoplay: true,
      autoplaySpeed: 2000,
      dots: true,
      arrows: false,
    });
  });










// Function to prompt user for their name
function getUserInput() {
  var userName = prompt("Please enter your name:");
  return userName;
}

// Function to display a personalized greeting
function displayGreeting() {
  var name = getUserInput();

  if (name) {
      alert("Hello, " + name + "! Welcome to Delicious Restaurant.");
  } else {
      alert("Hello, guest! Welcome to Delicious Restaurant.");
  }
}

