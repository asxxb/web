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

// Fetch all reservations from the database
$sql = "SELECT * FROM reservation";
$result = $conn->query($sql);

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Delicious Restaurant</title>
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
            max-width: 800px;
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        footer {
            margin-top: 20px;
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body>

    <header>
        <h1>Delicious Restaurant</h1>
    </header>

    <section>
        <h2>Reservations</h2>

        <?php
        if ($result->num_rows > 0) {
            echo '<table>';
            echo '<tr><th>Name</th><th>Email</th><th>Reservation Date</th><th>Number of Guests</th></tr>';

            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['name'] . '</td>';
                echo '<td>' . $row['email'] . '</td>';
                echo '<td>' . $row['date'] . '</td>';
                echo '<td>' . $row['guest'] . '</td>';
                echo '</tr>';
            }

            echo '</table>';
        } else {
            echo '<p>No reservations found.</p>';
        }
        ?>

    </section>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Delicious Restaurant. All rights reserved.</p>
    </footer>

</body>

</html>
