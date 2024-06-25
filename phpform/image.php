<?php
// Include your database connection file
include 'dbh.inc.php';

// Check if an ID is provided in the URL
if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    // Prepare and execute the SQL statement to fetch the image
    $stmt = $conn->prepare("SELECT image FROM users WHERE id = :id");
    $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // If the image is found, output it with the appropriate content type
    if ($user && !empty($user['image'])) {
        header("Content-Type: image/jpeg"); // You can change this based on your image type
        echo $user['image'];
    } else {
        echo "Image not found.";
    }
} else {
    echo "User ID not provided.";
}
?>
