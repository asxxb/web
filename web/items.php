<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order History </title>
  <!-- Include your CSS file for styling -->
  <!-- <link rel="stylesheet" href="style.css"> -->
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      background-color: #f8f8f8;
    }

    .container {
      width: 80%;
      margin: 0 auto;
    }

    h1 {
      text-align: center;
    }

    .order-list {
      list-style: none;
      padding: 0;
    }

    .order-item {
      background-color: #fff;
      margin: 10px;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .order-item h2 {
      margin-bottom: 10px;
    }

    .order-item p {
      margin: 0;
    }

    .order-item .price {
      font-weight: bold;
    }
  </style>
</head>

<body>

  <div class="container">

    <h1>Order History</h1>

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

    // Query to retrieve all orders
    $sql = "SELECT * FROM orders";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // Output data of each row
      while ($row = $result->fetch_assoc()) {
        ?>
        <div class="order-item">
          <h2><?php echo $row["name"]; ?></h2>
          <p>Quantity: <?php echo $row["quantity"]; ?></p>
          <p>Price: $<?php echo number_format($row["price"], 2); ?></p>
          <p>Phone: <?php echo $row["phone"]; ?></p>
        </div>
      <?php
      }
    } else {
      echo "No orders found.";
    }

    // Close the database connection
    $conn->close();
    ?>

  </div>

</body>

</html>