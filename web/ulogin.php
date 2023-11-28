<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Perform basic authentication (replace this with your authentication logic)
    $validUsernames = ['user1', 'aseeb']; // Add valid usernames
    $validPasswords = ['password1', 'aseeb123']; // Add corresponding passwords

    // Check if the provided username and password are valid
    if (in_array($username, $validUsernames) && in_array($password, $validPasswords)) {
        // Authentication successful, redirect to a protected page or perform further actions
        header("Location: main.html");
        exit();
    } else {
        // Authentication failed, display an error message
        echo "Invalid username or password.";
    }
}
?>
