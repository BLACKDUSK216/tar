<?php
$servername = "127.0.0.1";
$username = "php_projects";
$password = "php_projects";
$dbname = "blood_bank";
$port = 3306;

try {
    $conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->query("SELECT * FROM user_info");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users - Blood Bank</title>
    <link rel="stylesheet" href="style.css"> 
    <link rel="icon" href="images/image.jpg" type="image/x-icon">

    <style>
        .user-card {
            border: 1px solid #ddd;
            padding: 10px;
            margin: 10px;
            border-radius: 5px;
            background-color: #dc3545;
            color: #fff;
        }
        .user-card:hover {
            transform: scale(1.02);
        }
    </style>
</head>
<body>

<header>
    <h1>Admin Dashboard</h1>
</header>

<nav>
    <a href="admin_dashboard.php">Home</a>
    <a href="manage_donors.php">Manage Donors</a>
    <a href="manage_requests.php">Manage Requests</a>
    <a href="manage_users.php">Manage Users</a>
    <a href="logout.php">Logout</a>
</nav>

<section>
    <h2>Manage Users</h2>

    <?php
    if ($users) {
        foreach ($users as $user) {
            echo "<div class='user-card'>";
            echo "<h3>{$user['name']}</h3>";
            echo "<p>Username: {$user['username']}</p>";
            echo "<p>Email: {$user['email']}</p>";
            echo "<p>Date of Birth: {$user['date_of_birth']}</p>";
            echo "<p>Phone: {$user['phone']}</p>";
            echo "<p>Blood Group: {$user['bloodgroup']}</p>";
            echo "<p>Age: {$user['age']}</p>";
            echo "<p>Gender: {$user['sex']}</p>";
            echo "<p>Allergy Information: {$user['allergies']}</p>";



            echo "</div>";
        }
    } else {
        echo "<p>No users found.</p>";
    }
    ?>
</section>

</body>
</html>
