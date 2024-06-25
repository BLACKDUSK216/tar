<?php
include('connection/dbh.inc.php');


try {
    $conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $query = "SELECT * FROM user_info WHERE username = :username AND password = :password";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            echo "Login successful! Welcome, $username!";
        } else {
            header("Location: login_failed.php");
            exit();
        }
    }

    $query = "SELECT * FROM user_info WHERE username = :username";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $userDetails = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        header("Location: user_login.php");
        exit();
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


    <style>
     img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>

<h1>Welcome, <?php echo $userDetails['name']; ?>!</h1>
<img src="<?php echo $userDetails['image_url']; ?>" alt="User Image">
<ul>
    <li><strong>Name:</strong> <?php echo $userDetails['name']; ?></li>
    <li><strong>Username:</strong> <?php echo $userDetails['username']; ?></li>
    <li><strong>Age:</strong> <?php echo $userDetails['age']; ?></li>
    <li><strong>Phone:</strong> <?php echo $userDetails['phone']; ?></li>
    <li><strong>Email:</strong> <?php echo $userDetails['email']; ?></li>
    <li><strong>Blood Group:</strong> <?php echo $userDetails['bloodgroup']; ?></li>
    <li><strong>Sex:</strong> <?php echo $userDetails['sex']; ?></li>
    <li><strong>Allergies:</strong> <?php echo $userDetails['allergies']; ?></li>
</ul>


<li>
        <form action="user_logout.php" method="post">
            <button type="submit" name="logout">Logout</button>
        </form>
    </li>

</body>
</html>
