<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Menu</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        

       
       

        .menu-section {
            max-width: 800px;
            margin: auto;
            padding: 20px;
    margin-bottom: 20px;
        }

        .menu-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .menu-item {
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .menu-item:hover {
            transform: scale(1.05);
        }

        .menu-img {
            width: 100%;
            height: auto;
            border-radius: 8px 8px 0 0;
        }

        .menu-details {
            padding: 20px;
        }

        h3 {
            margin: 0;
        }

        p {
            margin: 10px 0;
        }

        .price {
            font-weight: bold;
            color: #4caf50;
        }

        .buy-button{
            color: #fff;
            
        },
        .delete-button {
            display: block;
            background-color: #4caf50;
            color: #fff;
            text-decoration: none;
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
            transition: background-color 0.3s;
        }

        .buy-button:hover,
        .delete-button:hover {
            background-color: #45a049;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1em 0;
            bottom: 0;
           
        }
    </style>
</head>

<body>

    <header>
        <h1>Delicious Restaurant</h1>
        <nav>
            <a href="main.html">Home</a>
            <a href="menu.php">Menu</a>
            <a href="#">About</a>
            <a href="#">Contact</a>
            <a href="reservation.php">Reserve</a>
            <a href="login.html">Admin</a>
        </nav>
    </header>

    <section class="menu-section">
        <h2>Our Menu</h2>
        <div class="menu-container">
            <?php
            // Load menu items from menu.json
            $menuItems = json_decode(file_get_contents('menu.json'), true) ?: array();

            // Loop through the array to display each menu item
            foreach ($menuItems as $item) {
                echo "<div class='menu-item'>";
                echo "<img class='menu-img' src='{$item["image"]}' alt='{$item["name"]}'>";
                echo "<div class='menu-details'>";
                echo "<h3>{$item['name']}</h3>";
                echo "<p>{$item['description']}</p>";
                echo "<p class='price'>$" . number_format($item['price'], 2) . "</p>";
                echo "<a href='order.html?item={$item["name"]}&price={$item["price"]}' class='buy-button'>Buy Now</a>";
                
                echo "</div>";
                echo "</div>";
            }
            ?>
        </div>
        
    </section>
    

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Delicious Restaurant. All rights reserved.</p>
    </footer>

</body>

</html>
