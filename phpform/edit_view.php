<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="styles2.css">
</head>
<body>

<div class="container">
    <?php
    include 'dbh.inc.php';

    if (isset($_GET['id'])) {
        $userId = $_GET['id'];

        $stmt = $conn->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            echo "<h2>Edit User</h2>";
            echo "<form action='update_user.php' method='post' enctype='multipart/form-data'>";
            echo "<input type='hidden' name='id' value='" . htmlspecialchars($userId) . "'>";
            
            echo "<label for='name'>Name:</label>";
            echo "<input type='text' id='name' name='name' value='" . htmlspecialchars($user['name']) . "' required><br>";

            echo "<label for='email'>Email:</label>";
            echo "<input type='email' id='email' name='email' value='" . htmlspecialchars($user['email']) . "' required><br>";

            echo "<label for='dob'>Date of Birth:</label>";
            echo "<input type='date' id='dob' name='dob' value='" . htmlspecialchars($user['dob']) . "' required><br>";

            echo "<label for='gender'>Gender:</label>";
            echo "<select id='gender' name='gender' required>";
            echo "<option value='Male' " . ($user['gender'] == 'Male' ? 'selected' : '') . ">Male</option>";
            echo "<option value='Female' " . ($user['gender'] == 'Female' ? 'selected' : '') . ">Female</option>";
            echo "<option value='Other' " . ($user['gender'] == 'Other' ? 'selected' : '') . ">Other</option>";
            echo "</select><br>";

            echo "<label for='mobile'>Mobile Number:</label>";
            echo "<input type='tel' id='mobile' name='mobile' pattern='[0-9]{10}' value='" . htmlspecialchars($user['mobile']) . "' required><br>";

            echo "<label for='image'>Profile Image:</label>";
            echo "<input type='file' id='image' name='image' onchange='previewImage(event)'><br>";
            echo "<img src='data:image/jpeg;base64," . base64_encode($user['image']) . "' alt='User Image' width='150' id='previewImage'><br>";

            echo "<input type='submit' value='Update'>";
            echo "</form>";
        } else {
            echo "<p>User not found.</p>";
        }
    } else {
        echo "<p>User ID not provided.</p>";
    }
    ?>
    
    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('previewImage');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</div>

</body>
</html>
