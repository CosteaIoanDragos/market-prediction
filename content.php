<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motorcycle Guide</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
        <h1><b>Motorcycle Guide</b></h1>
    </div>
    <div class="topnav">
        <a href="registration.html">Registration</a>
        <a href="login.html">Login</a>
        <a href="crud.html"><span class="home-symbol">⌂</span></a>
    </div>
    <section>
        <!-- Display motorcycle data in a table -->
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Brand</th>
                    <th>Type</th>
                    <th>CC</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Database connection
                $host = 'localhost';
                $username = 'root';
                $password = '';
                $dbname = 'motocycles';

                try {
                    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch (PDOException $e) {
                    die("Database connection failed: " . $e->getMessage());
                }

                // Retrieve motorcycle data
                $query = "SELECT name, brand, type, cc, price FROM motorcycle";
                $stmt = $pdo->prepare($query);
                $stmt->execute();

                // Display motorcycle information
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>{$row['name']}</td>";
                    echo "<td>{$row['brand']}</td>";
                    echo "<td>{$row['type']}</td>";
                    echo "<td>{$row['cc']}</td>";
                    echo "<td>{$row['price']}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </section>

    <footer>
        <div class="footer">
            <p>© Proprietatea intelectuala a lui Costea Ioan Dragos. Va rugam nu plagiati! Suckers!</p>
        </div>
    </footer>
    <script>
        // Your JavaScript code here
    </script>
</body>
</html>
