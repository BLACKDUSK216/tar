<?php

include('connection/dbh.inc.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = htmlspecialchars($_POST["full_name"]);
    $email = htmlspecialchars($_POST["email"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $blood_type = htmlspecialchars($_POST["blood_type"]);



    try {
        $conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO donors (name, blood_type, phone_number) VALUES (:full_name, :blood_type, :phone)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':full_name', $full_name);
        $stmt->bindParam(':blood_type', $blood_type);
        $stmt->bindParam(':phone', $phone);

        $stmt->execute();

        $confirmation_message = "Thank you, $full_name, for scheduling your blood donation appointment! We will contact you at $email or $phone. Your blood type is $blood_type.";

    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    } finally {
        $conn = null;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donate - Blood Bank</title>
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
    <h2>Become A Donor</h2>

    <?php
    if (isset($confirmation_message)) {
        echo "<p>$confirmation_message</p>";
    } else {
    ?>
    <p>
        Thank you for considering blood donation! Your contribution can save lives.
        Please fill out the form below to schedule your donation appointment.
    </p>

    <form action="donate.php" method="post">
        <label for="full_name">Full Name:</label>
        <input type="text" id="full_name" name="full_name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="phone" required>

        <label for="blood_type">Blood Type:</label>
        <select id="blood_type" name="blood_type" required>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
        </select>

        <button type="submit">Schedule Donation</button>
    </form>
    <?php } ?>
</section>

</body>
</html>
