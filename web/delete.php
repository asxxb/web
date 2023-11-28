<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Retrieve the item name to delete
    $itemName = $_GET['name'];

    // Load menu items from menu.json
    $menuItems = json_decode(file_get_contents('menu.json'), true) ?: array();

    // Find the item in the array and remove it
    foreach ($menuItems as $key => $item) {
        if ($item['name'] === $itemName) {
            unset($menuItems[$key]);
            break;
        }
    }

    // Save the updated menu back to the file
    file_put_contents('menu.json', json_encode(array_values($menuItems), JSON_PRETTY_PRINT));

    // Redirect back to the menu page
    header("Location: menu.php");
    exit();
}
?>
