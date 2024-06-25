<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

include 'dbh.inc.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    deleteUser($_POST['id']);
    $_SESSION['success_message'] = 'User deleted successfully!';
    header("Location: index.php");
    exit();
}

function deleteUser($id) {
    global $conn;

    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->execute([$id]);
}
?>
