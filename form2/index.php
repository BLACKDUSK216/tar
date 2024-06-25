<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration with Image Upload</title>
</head>
<body>
    <h2>User Registration with Image Upload</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" required><br><br>
        
        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select><br><br>
        
        <label for="mobile">Mobile:</label>
        <input type="tel" id="mobile" name="mobile" required><br><br>
        
        <label for="image">Choose an image:</label>
        <input type="file" id="image" name="image" accept="image/*" required><br><br>
        
        <input type="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $servername = "127.0.0.1";
        $username = "tariq123";
        $password = "tariq123";
        $dbname = "form";
        $port = 3306;

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname;port=$port", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $dob = $_POST['dob'];
            $gender = $_POST['gender'];
            $mobile = $_POST['mobile'];

            $imageData = file_get_contents($_FILES['image']['tmp_name']);

            $stmt = $conn->prepare("INSERT INTO users (name, email, password, dob, gender, mobile, image) VALUES (:name, :email, :password, :dob, :gender, :mobile, :image)");

            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':dob', $dob);
            $stmt->bindParam(':gender', $gender);
            $stmt->bindParam(':mobile', $mobile);
            $stmt->bindParam(':image', $imageData, PDO::PARAM_LOB);
            $stmt->execute();

            echo "Image inserted successfully!";
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
    }
    ?>
</body>
</html>
