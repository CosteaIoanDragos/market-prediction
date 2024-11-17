<?php
// Database connection
$host = 'localhost'; // Change to your database host
$username = 'root'; // Change to your database username
$password = ''; // Change to your database password
$dbname = 'motocycles'; // Change to your database name

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Retrieve motorcycle data
$query = "SELECT name, brand, type, cc, price FROM motorcycles";
$stmt = $pdo->prepare($query);
$stmt->execute();

// Display motorcycle information
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "Name: {$row['name']}<br>";
    echo "Brand: {$row['brand']}<br>";
    echo "Type: {$row['type']}<br>";
    echo "CC: {$row['cc']}<br>";
    echo "Price: {$row['price']}<br><br>";
}
?>
