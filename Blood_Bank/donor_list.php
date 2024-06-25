<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor List - Blood Bank</title>
    <link rel="stylesheet" href="style.css"> 
    <link rel="icon" href="images/image.jpg" type="image/x-icon">

</head>
<body>

<header>
    <h1>Blood Bank</h1>
</header>

<nav>
    <a href="home.php">Home</a>
    <a href="donate.php">Donate</a>
    <a href="find_center.php">Find a Center</a>
    <a href="about_us.php">About Us</a>
    <a href="contact.php">Contact</a>
    <a href="donor_list.php">Donor List</a> 
    <a href="admin_login.php">Admin</a>
    <a href="my_profile.php">My Profile</a>
</nav>

<section>
    <h2>Donor List</h2>

    <?php
    $servername = "127.0.0.1";
    $username = "php_projects";
    $password = "php_projects";
    $dbname = "blood_bank";
    $port = 3306;

    try {
        $conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->query("SELECT * FROM donors");
        $donors = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($donors as $donor) {
            echo "<div style='display: flex; justify-content: center; margin-bottom: 20px;'>";
            echo "<div style='border: 1px solid #ddd; border-radius: 8px; padding: 15px; background-color: #dc3545; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);'>";
            echo "<h3 style='color: white;'>{$donor['name']}</h3>";
            echo "<p style='color: white; margin: 8px 0;'>Donor ID: {$donor['id']}</p>";
            echo "<p style='color: white; margin: 8px 0;'>Blood Type: {$donor['blood_type']}</p>";
            echo "<p style='color: white; margin: 8px 0;'>Phone Number: {$donor['phone_number']}</p>";
            echo "<p style='color: white; margin: 8px 0;'>Allergy Information: {$donor['allergies']}</p>";
            echo "<p style='color: white; margin: 8px 0;'>Age: {$donor['age']}</p>";
            echo "</div>";
            echo "</div>";
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    ?>
</section>

</body>
</html>
