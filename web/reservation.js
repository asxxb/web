function validateReservation() {
    // Get form values
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var date = document.getElementById('date').value;
    var guests = document.getElementById('guests').value;
  
    // Simple validation
    if (name.trim() === '' || email.trim() === '' || date.trim() === '' || guests.trim() === '') {
      document.getElementById('validationMessage').innerText = 'Please fill in all fields.';
    } else {
      document.getElementById('validationMessage').innerText = 'Reservation successful!';
  
      // You can add additional logic here, like sending the reservation details to a server.
      // For now, let's just reset the form.
      document.getElementById('reservationForm').reset();
    }
  }
  