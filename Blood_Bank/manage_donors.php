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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_donor'])) {
    $newName = $_POST['new_donor_name'];
    $newBloodType = $_POST['new_blood_type'];
    $newPhoneNumber = $_POST['new_phone_number'];

    $stmt = $conn->prepare("INSERT INTO donors (name, blood_type, phone_number) VALUES (:name, :blood_type, :phone_number)");
    $stmt->bindParam(':name', $newName);
    $stmt->bindParam(':blood_type', $newBloodType);
    $stmt->bindParam(':phone_number', $newPhoneNumber);
    $stmt->execute();

    header("Location: manage_donors.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['remove_donor'])) {
    $donorIdToRemove = $_POST['donor_id_to_remove'];

    $stmt = $conn->prepare("DELETE FROM donors WHERE id = :id");
    $stmt->bindParam(':id', $donorIdToRemove);
    $stmt->execute();

    header("Location: manage_donors.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_donor'])) {
    $donorIdToUpdate = $_POST['donor_id_to_update'];
    $updatedName = $_POST['updated_donor_name'];
    $updatedBloodType = $_POST['updated_blood_type'];
    $updatedPhoneNumber = $_POST['updated_phone_number'];

    $stmt = $conn->prepare("UPDATE donors SET name = :name, blood_type = :blood_type, phone_number = :phone_number WHERE id = :id");
    $stmt->bindParam(':name', $updatedName);
    $stmt->bindParam(':blood_type', $updatedBloodType);
    $stmt->bindParam(':phone_number', $updatedPhoneNumber);
    $stmt->bindParam(':id', $donorIdToUpdate);
    $stmt->execute();

    header("Location: manage_donors.php");
    exit();
}

$stmt = $conn->prepare("SELECT * FROM donors");
$stmt->execute();
$donors = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Donors - Blood Bank</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="images/image.jpg" type="image/x-icon">

</head>
<body>
<style>
        .user-card {
            background-color: #dc3545;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 20px;
            padding: 20px;
            transition: transform 0.2s;
        }

        .user-card:hover {
            transform: scale(1.02);
        }

        h3 {
            color: #fff;
        }

        p {
            margin: 10px 0;
            color: #fff;
        }
    </style>
    

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
    <h2>Manage Donors</h2>

  
    <?php
    if ($donors) {
        foreach ($donors as $donor) {
            echo "<div class='user-card'>";
            echo "<h3>{$donor['name']}</h3>";
            echo "<p><strong>Donor ID:</strong> {$donor['id']}</p>";
            echo "<p><strong>Phone:</strong> {$donor['phone_number']}</p>";
            echo "<p><strong>Blood Group:</strong> {$donor['blood_type']}</p>";
            echo "<p><strong>Age:</strong> {$donor['age']}</p>";
            echo "<p><strong>Gender:</strong> {$donor['sex']}</p>";
            echo "<p><strong>Allergy Information:</strong> {$donor['allergies']}</p>";
            echo "</div>";
        }
    } else {
        echo "<p>No donors found.</p>";
    }
    ?>

    <!-- Add Donor Form -->
    <form action="manage_donors.php" method="post">
        <h3>Add Donor</h3>
        <label for="new_donor_name">Name:</label>
        <input type="text" name="new_donor_name" required placeholder="Enter donor name">
        <label for="new_blood_type">Blood Type:</label>
        <input type="text" name="new_blood_type" required placeholder="Enter blood type">
        <label for="new_phone_number">Phone Number:</label>
        <input type="text" name="new_phone_number" required placeholder="Enter phone number">
        <button type="submit" name="add_donor">Add Donor</button>
    </form>

    <!-- Remove Donor Form -->
    <form action="manage_donors.php" method="post">
        <h3>Remove Donor</h3>
        <label for="donor_id_to_remove">Donor ID to Remove:</label>
        <input type="text" name="donor_id_to_remove" required placeholder="Enter donor ID">
        <button type="submit" name="remove_donor">Remove Donor</button>
    </form>

    <!-- Update Donor Form -->
    <form action="manage_donors.php" method="post">
        <h3>Update Donor Information</h3>
        <label for="donor_id_to_update">Donor ID to Update:</label>
        <input type="text" name="donor_id_to_update" required placeholder="Enter donor ID">
        <label for="updated_donor_name">Updated Name:</label>
        <input type="text" name="updated_donor_name" required placeholder="Enter updated name">
        <label for="updated_blood_type">Updated Blood Type:</label>
        <input type="text" name="updated_blood_type" required placeholder="Enter updated blood type">
        <label for="updated_phone_number">Updated Phone Number:</label>
        <input type="text" name="updated_phone_number" required placeholder="Enter updated phone number">
        <button type="submit" name="update_donor">Update Donor</button>
        
    </form>
</section>

</body>
</html>
