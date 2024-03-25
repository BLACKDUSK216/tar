<?php
session_start();

include('connection/dbh.inc.php');

try {
    $conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $query = "SELECT * FROM user_info WHERE username = :username AND password = :password";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':useruser_loginname', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        print_r($stmt->rowCount());exit;
        if ($stmt->rowCount() > 0) {
            $_SESSION['username'] = $username; 
            header("Location: myprofile.php");
            exit();
        } else {
            $login_error = "Invalid credentials. Please try again.";
        }
    }

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="images/image.jpg" type="image/x-icon">

</head>
<body>

<header>
    <h1>My Profile</h1>
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
    <h2>Login</h2>
   

    <?php
    if (isset($login_error) && $login_error !== "") {
        echo "<p>$login_error</p>";
    }
    ?>

    <form action="user_login.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Login</button>
    </form>
</section>


</body>
</html>
