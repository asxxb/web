<?php
// Database credentials
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'canteenreservation';

// Create a database connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $date = $conn->real_escape_string($_POST['date']);
    $guests = $conn->real_escape_string($_POST['guests']);

    // Insert data into the database
    $sql = "INSERT INTO reservation (name, email, date, guest) VALUES ('$name', '$email', '$date', '$guests')";

    if ($conn->query($sql) === TRUE) {
        echo "Reservation successfully added to the database";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reservation - Delicious Restaurant</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      font-family: 'Arial', sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }

    header {
      background-color: #333;
      color: white;
      padding: 10px;
      text-align: center;
    }

    section {
      max-width: 400px;
      margin: 20px auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
      text-align: center;
      color: #333;
    }

    form {
      display: flex;
      flex-direction: column;
    }

    label {
      font-size: 14px;
      margin-bottom: 5px;
    }

    input {
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    button {
      background-color: #4CAF50;
      color: white;
      padding: 10px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }

    button:hover {
      background-color: #45a049;
    }

    .error-message {
      color: red;
      margin-top: 10px;
    }
  </style>
</head>

<body>

  
  <header>
    <h1>Delicious Restaurant</h1>
    <nav>
      <a href="index.html">Home</a>
      <a href="menu.php">Menu</a>
      <a href="#">About</a>
      <a href="#">Contact</a>
      <a href="reservation.php">Reserve</a>
      <a href="login.html">Admin</a>
    </nav>
  </header>
 

  <section>
    <h2>Make a Reservation</h2>

    <form id="reservationForm" action=""  method="POST">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>

      <label for="date">Reservation Date:</label>
      <input type="text" id="date" name="date" required>

      <label for="guests">Number of Guests:</label>
      <input type="number" id="guests" name="guests" min="1" required>

      <button type="submit"  >Submit Reservation</button>
    </form>

    <div id="validationMessage" class="error-message"></div>
  </section>

  <footer>
    <p>&copy; 2023 Delicious Restaurant. All rights reserved.</p>
  </footer>

  <script src="reservation.js"></script>
</body>

</html>