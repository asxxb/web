<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // In a real-world scenario, validate the username and password against a database
    $validUsername = "aseeb";
    $validPassword = "aseeb123";

    $enteredUsername = $_POST['username'];
    $enteredPassword = $_POST['password'];

    // Check if the entered username and password match the valid credentials
    if ($enteredUsername == $validUsername && $enteredPassword == $validPassword) {
        // Successful login, redirect to the admin page
        header("Location: admin.php");
        exit();
    } else {
        // Invalid credentials, display an error message
        echo "Invalid username or password. Please try again.";
    }
}
?>
