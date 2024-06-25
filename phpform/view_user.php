<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <link rel="stylesheet" href="styles2.css">
</head>
<body>

<div class="container">
    <?php
    include 'dbh.inc.php';

    if(isset($_GET['id'])) {
        $userId = $_GET['id'];

        $stmt = $conn->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user) {
            echo "<h2>User Details</h2>";
            echo "<img src='data:image/jpeg;base64," . base64_encode($user['image']) . "' alt='User Image' width='150'>"; 
            echo "<p><strong>Name:</strong> " . htmlspecialchars($user['name']) . "</p>";
            echo "<p><strong>Email:</strong> " . htmlspecialchars($user['email']) . "</p>";
            echo "<p><strong>Date of Birth:</strong> " . htmlspecialchars($user['dob']) . "</p>";
            echo "<p><strong>Gender:</strong> " . htmlspecialchars($user['gender']) . "</p>";
            echo "<p><strong>Mobile Number:</strong> " . htmlspecialchars($user['mobile']) . "</p>";

            echo "<form action='edit_view.php' method='get'>";
            echo "<input type='hidden' name='id' value='$userId'>";
            echo "<input type='submit' class='edit-btn' value='Edit'>";
            echo "</form>";

            echo "<form action='delete_user.php' method='post' onsubmit='return confirm(\"Are you sure you want to delete this user?\");'>";
            echo "<input type='hidden' name='id' value='$userId'>";
            echo "<input type='submit' class='delete-btn' value='Delete'>";
            echo "</form>";
        } else {
            echo "<p>User not found.</p>";
        }
    } else {
        echo "<p>User ID not provided.</p>";
    }
    ?>
</div>

</body>
</html>
