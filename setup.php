<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$database = new SQLite3('my_database.db');

$query = "CREATE TABLE IF NOT EXISTS items (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    date TEXT,
    name TEXT,
    price REAL,
    kind TEXT
)";
if ($database->exec($query)) {
    echo "Table created successfully or already exists.\n";
} else {
    echo "Failed to create table.\n";
}
?>
