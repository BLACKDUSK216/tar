<?php
$servername = "127.0.0.1";
$username = "tariq123";
$password = "tariq123";
$dbname = "form";
$port = 3306;

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;port=$port", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}

function storeFormData($name, $email, $password, $dob, $gender, $mobile, $image = null) {
    global $conn;

    $stmt = $conn->prepare("INSERT INTO users (name, email, password, dob, gender, mobile, image) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$name, $email, $password, $dob, $gender, $mobile, $image]);
}

function getUsers() {
    global $conn;

    $stmt = $conn->query("SELECT * FROM users ORDER BY name");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getUserById($id) {
    global $conn;

    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function updateUser($id, $name, $email, $password, $dob, $gender, $mobile) {
    global $conn;

    $stmt = $conn->prepare("UPDATE users SET name = ?, email = ?, password = ?, dob = ?, gender = ?, mobile = ? WHERE id = ?");
    $stmt->execute([$name, $email, $password, $dob, $gender, $mobile, $id]);
}


?>
