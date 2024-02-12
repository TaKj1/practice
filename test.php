<?php
$database = new SQLite3('my_database.db');

$results = $database->query('SELECT * FROM items');

if ($results) {
    while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
        echo "ID: " . $row['id'] . "\n";
        echo "Date: " . $row['date'] . "\n";
        echo "Name: " . $row['name'] . "\n";
        echo "Price: " . $row['price'] . "\n";
        echo "Kind: " . $row['kind'] . "\n";
        echo "---------------------\n";
    }
} else {
    echo "No data found or unable to query the database.\n";
}
?>
