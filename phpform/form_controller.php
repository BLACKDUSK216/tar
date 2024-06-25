<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

include 'dbh.inc.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = [];
    validateName($errors);
    validateEmail($errors);
    validatePassword($errors);
    validateDOB($errors);
    validateGender($errors);
    validateMobile($errors);

    if (empty($errors)) {
        storeFormData($_POST['name'], $_POST['email'], $_POST['password'], $_POST['dob'], $_POST['gender'], $_POST['mobile']);
        $_SESSION['success_message'] = 'Form submitted successfully!';
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['errors'] = $errors;
        header("Location: index.php?input_error=true");
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
    } else {
        $passwordValue = trim($_POST['password']);

        if (strlen($passwordValue) < 12) {
            $errors['password'] = 'Password must be at least 12 characters long.';
        }

        if (!preg_match('/[A-Z]/', $passwordValue)) {
            $errors['password'] = 'Password must contain at least one uppercase letter.';
        }

        if (!preg_match('/\d/', $passwordValue)) {
            $errors['password'] = 'Password must contain at least one number.';
        }

        if (!preg_match('/[\W_]/', $passwordValue)) {
            $errors['password'] = 'Password must contain at least one special character.';
        }
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
