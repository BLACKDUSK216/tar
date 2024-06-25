<?php
include 'dbh.inc.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userId = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $mobile = $_POST['mobile'];

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image = file_get_contents($_FILES['image']['tmp_name']);
        $stmt = $conn->prepare("UPDATE users SET name = :name, email = :email, dob = :dob, gender = :gender, mobile = :mobile, image = :image WHERE id = :id");
        $stmt->bindParam(':image', $image, PDO::PARAM_LOB);
    } else {
        $stmt = $conn->prepare("UPDATE users SET name = :name, email = :email, dob = :dob, gender = :gender, mobile = :mobile WHERE id = :id");
    }

    $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':dob', $dob, PDO::PARAM_STR);
    $stmt->bindParam(':gender', $gender, PDO::PARAM_STR);
    $stmt->bindParam(':mobile', $mobile, PDO::PARAM_STR);

    if ($stmt->execute()) {
        header("Location: view_user.php?id=$userId");
        exit();
    } else {
        echo "Error updating user.";
    }
} else {
    echo "Invalid request method.";
}
?>
