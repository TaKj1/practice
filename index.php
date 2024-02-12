<?php
$database = new SQLite3('my_database.db');

if (isset($_POST['submit'])) {
    $date = SQLite3::escapeString($_POST['date']);
    $name = SQLite3::escapeString($_POST['name']);
    $price = SQLite3::escapeString($_POST['price']);
    $kind = SQLite3::escapeString($_POST['kind']);

    $query = "INSERT INTO items (date, name, price, kind) VALUES ('$date', '$name', $price, '$kind')";
    $database->exec($query);
}

$results = $database->query("SELECT * FROM items");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Submission</title>
    <style>
        body { font-family: Arial, sans-serif; }
        form { margin-bottom: 20px; }
        input, button { margin-top: 10px; display: block; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Add New Item</h2>
    <form action="index.php" method="post">
        Date: <input type="date" name="date" required><br>
        Name: <input type="text" name="name" required><br>
        Price: <input type="number" step="0.01" name="price" required><br>
        Kind: <input type="text" name="kind" required><br>
        <button type="submit" name="submit">Submit</button>
    </form>

    <h2>Stored Items</h2>
    <table>
        <tr>
            <th>Date</th>
            <th>Name</th>
            <th>Price</th>
            <th>Kind</th>
        </tr>
        <?php
        $results = $database->query("SELECT * FROM items");
        if ($results === false) {
            throw new Exception("Database query failed: " . $database->lastErrorMsg());
        }
        
         while ($row = $results->fetchArray()) { ?>
        <tr>
            <td><?php echo $row['date']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td><?php echo $row['kind']; ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
