<?php

// Define your database credentials
$host = "localhost"; // Change to your database host
$username = "root"; // Change to your database username
$password = ""; // Change to your database password
$database = "canteenreservation"; // Change to your database name

// Create a database connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$name = $_POST['name'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];
$phone = $_POST['phone'];

// Insert order into the database
$sql = "INSERT INTO orders (name, quantity, price, phone) VALUES ('$name', $quantity, $price, '$phone')";

if ($conn->query($sql) === TRUE) {
    echo "Order submitted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>