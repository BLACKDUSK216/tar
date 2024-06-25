<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

include 'dbh.inc.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $user = getUserById($_GET['id']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $errors = [];
    validateName($errors);
    validateEmail($errors);
    validatePassword($errors);
    validateDOB($errors);
    validateGender($errors);
    validateMobile($errors);

    if (empty($errors)) {
        updateUser($_POST['id'], $_POST['name'], $_POST['email'], $_POST['password'], $_POST['dob'], $_POST['gender'], $_POST['mobile']);
        $_SESSION['success_message'] = 'User updated successfully!';
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['errors'] = $errors;
        header("Location: edit_user.php?id=" . $_POST['id']);
        exit();
    }
}

function validateName(&$errors) {
    if (empty($_POST['name'])) {
        $errors['name'] = 'Name is required.';
    }
}

function validateEmail(&$errors) {
    if (empty($_POST['email'])) {
        $errors['email'] = 'Email is required.';
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Invalid email format.';
    }
}

function validatePassword(&$errors) {
    if (empty($_POST['password'])) {
        $errors['password'] = 'Password is required.';
    }
}

function validateDOB(&$errors) {
    if (empty($_POST['dob'])) {
        $errors['dob'] = 'Date of Birth is required.';
    }
}

function validateGender(&$errors) {
    if (empty($_POST['gender'])) {
        $errors['gender'] = 'Gender is required.';
    }
}

function validateMobile(&$errors) {
    if (empty($_POST['mobile'])) {
        $errors['mobile'] = 'Mobile number is required.';
    } elseif (!preg_match('/^[0-9]{10}$/', $_POST['mobile'])) {
        $errors['mobile'] = 'Invalid mobile number format.';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <link rel="stylesheet" href="styles.css">

</head>
<body>
    <h2>Edit User</h2>
    <form action="edit_user.php" method="post">
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
        
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="<?php echo $user['name']; ?>"><br><br>
        
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>"><br><br>
        
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" value="<?php echo $user['password']; ?>"><br><br>
        
        <label for="dob">Date of Birth:</label><br>
        <input type="date" id="dob" name="dob" value="<?php echo $user['dob']; ?>"><br><br>
        
        <label for="gender">Gender:</label><br>
        <input type="radio" id="male" name="gender" value="male" <?php echo $user['gender'] == 'male' ? 'checked' : ''; ?>>
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="female" <?php echo $user['gender'] == 'female' ? 'checked' : ''; ?>>
        <label for="female">Female</label><br><br>
        
        <label for="mobile">Mobile Number:</label><br>
        <input type="tel" id="mobile" name="mobile" pattern="[0-9]{10}" value="<?php echo $user['mobile']; ?>"><br><br>
        
        <input type="submit" value="Update">
    </form>
</body>
</html>
