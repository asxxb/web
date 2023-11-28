<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle delete request
    if (isset($_POST['delete'])) {
        $itemNameToDelete = $_POST['delete'];
        deleteMenuItem($itemNameToDelete);
    }
    // Handle add new item request
    else {
        // Retrieve form data
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $image = $_POST['image']; // For simplicity, you may want to handle file uploads separately

        // Validate the form data (add more validation as needed)
        if (empty($name) || empty($description) || empty($price) || empty($image)) {
            echo "Please fill in all fields.";
        } else {
            // Add the new food item to the menu array (this is a simple example)
            $newItem = array(
                "name" => $name,
                "description" => $description,
                "price" => $price,
                "image" => $image,
            );

            // Load existing menu items from a file or database
            $existingMenu = getMenuItems();

            // Add the new item to the existing menu
            $existingMenu[] = $newItem;

            // Save the updated menu back to the file
            saveMenuItems($existingMenu);

            echo "Food item added successfully!";
        }
    }
}

// Function to get menu items from menu.json
function getMenuItems()
{
    return json_decode(file_get_contents('menu.json'), true) ?: array();
}

// Function to save menu items to menu.json
function saveMenuItems($menuItems)
{
    file_put_contents('menu.json', json_encode($menuItems, JSON_PRETTY_PRINT));
}

// Function to delete a menu item by name
// Function to delete a menu item by name
function deleteMenuItem($itemNameToDelete)
{
    // Load existing menu items
    $existingMenu = getMenuItems();

    // Find the index of the item to delete
    $indexToDelete = array_search($itemNameToDelete, array_column($existingMenu, 'name'));

    // Remove the item from the array
    if ($indexToDelete !== false) {
        unset($existingMenu[$indexToDelete]);

        // Reindex the array
        $existingMenu = array_values($existingMenu);

        // Save the updated menu back to the file
        saveMenuItems($existingMenu);

        echo "Food item deleted successfully!";
    } else {
        echo "Item not found for deletion.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="admin.css">
</head>

<body>

    <header>
        <h1>Admin Panel</h1>
        <nav>
        <a href="items.php" class="order-history-link">Order History</a>
        <a href="main.html" class="order-history-link">Go To Home</a>


            <!-- Add other admin links as needed -->
        </nav>
    </header>

    <section class="admin-section">
        <h2>Add Food Item</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="name">Name:</label>
            <input type="text" name="name" required>
            <br>
            <label for="description">Description:</label>
            <textarea name="description" rows="4" required></textarea>
            <br>
            <label for="price">Price:</label>
            <input type="number" name="price" step="0.01" required>
            <br>
            <label for="image">Image URL:</label>
            <input type="text" name="image" required>
            <br>
            <input type="submit" value="Add Food Item">
        </form>

        <h2>Delete Food Item</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="delete">Select item to delete:</label>
            <select name="delete">
                <?php
                // Display options for deletion
                $menuItems = getMenuItems();    
                foreach ($menuItems as $item) {
                    echo "<option value='{$item["name"]}'>{$item["name"]}</option>";
                }
                ?>
            </select>
            <br>
            <input type="submit" value="Delete Food Item">
        </form>
    </section>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Delicious Restaurant. All rights reserved.</p>
    </footer>

</body>

</html>
