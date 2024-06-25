<?php
$servername = "127.0.0.1";
$username_db = "php_projects";
$password_db = "php_projects";
$dbname = "blood_bank"; 
$port = 3306;

try {
    $conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username_db, $password_db);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);

    $stmt = $conn->prepare("SELECT * FROM admin_users WHERE username = :username AND password = :password");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        header("Location: admin_dashboard.php");
        exit();
    } else {
        $login_error = "Invalid credentials. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Blood Bank</title>
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

</nav>
<section>
    <h2>Admin Login</h2>
    

    <?php
    if (isset($login_error)) {
        echo "<p>$login_error</p>";
    }
    ?>

    <form action="admin_login.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required placeholder="Admin Name" >

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required placeholder="Admin Password" >

        <button type="submit">Login</button>
    </form>
</section>

</body>
</html>
