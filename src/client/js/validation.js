window.onload = function() {

  // Listener to highlight input fields if they are empty and clear them
  // if they are not.
  document.addEventListener('input', function(e) {
    var input = document.querySelectorAll('input, textarea');
    for (var i = 0; i < input.length; i++) {
      if (input[i].value == "" || input[i].value == null) {
        input[i].classList.add("unfilled");
      } else {
        input[i].classList.remove("unfilled");
        input[i].classList.remove("errorField");
      }
    }
  });

  // Listener to prevent form submission if required fields are empty, as well
  // as highlight missing required fields in red.
  document.addEventListener('submit', function(e) {
    var input = document.querySelectorAll('.required');
    // console.log(input.length);
    for (var i = 0; i < input.length; i++) {
      if (input[i].type == 'checkbox' && input[i].checked == false) {
        // console.log(input[i].name + " is required!");
        e.preventDefault();
      } else if (input[i].value == "" || input[i].value == null) {
        modal.style.display = "block";
        // document.getElementById("errorMessage").innerHTML = input[i].name + " is required!";
        // console.log(input[i].name + " is required!");
        input[i].classList.add("errorField");
        e.preventDefault();
      } else {
        input[i].classList.remove("errorField");
      }
    }
  });

  // Get the modal
  var modal = document.getElementById('myModal');

  // Get the button that opens the modal
  var btn = document.getElementById("myBtn");

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];

  // When the user clicks on <span> (x), close the modal
  // span.onclick = function() {
  //   modal.style.display = "none";
  // }

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
}
