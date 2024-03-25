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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_request'])) {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (:name, :email, :message)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':message', $message);
    $stmt->execute();

    header("Location: manage_messages.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_request'])) {
    $requestId = $_POST['delete_request'];

    $stmt = $conn->prepare("DELETE FROM contacts WHERE id = :id");
    $stmt->bindParam(':id', $requestId);
    $stmt->execute();

    header("Location: manage_messages.php");
    exit();
}

$stmt = $conn->prepare("SELECT * FROM contacts ORDER BY created_at DESC");
$stmt->execute();
$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Messages - Blood Bank</title>
    <link rel="stylesheet" href="style.css"> 
    <link rel="icon" href="images/image.jpg" type="image/x-icon">

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
    <h2>Manage Requests</h2>

    <!-- Display Requests -->
    <?php
    if ($messages) {
        echo "<ul>";
        foreach ($messages as $message) {
            echo "<li>";
            echo "<strong>Name:</strong> {$message['name']}<br>";
            echo "<strong>Email:</strong> {$message['email']}<br>";
            echo "<strong>Message:</strong> {$message['message']}<br>";
            echo "<strong>Created At:</strong> {$message['created_at']}<br>";

            echo "<form action='manage_messages.php' method='post'>";
            echo "<button type='submit' name='delete_request' value='{$message['id']}'>Delete Request</button>";
            echo "</form>";

            echo "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No requests found.</p>";
    }
    ?>

    <!-- Add Request Form -->
    <form action="manage_messages.php" method="post">
        <h3>Add Request</h3>
        <label for="name">Name:</label>
        <input type="text" name="name" required placeholder="Enter name">

        <label for="email">Email:</label>
        <input type="email" name="email" required placeholder="Enter email">

        <label for="message">Message:</label>
        <textarea name="message" required placeholder="Enter request message"></textarea>

        <button type="submit" name="add_request">Add Request</button>
    </form>
</section>

</body>
</html>
