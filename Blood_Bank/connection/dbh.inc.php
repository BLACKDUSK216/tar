<?php
$servername = "127.0.0.1";
$username = "php_projects";
$password = "php_projects";
$dbname = "blood_bank";
$port = 3306;
try {
  $conn = new PDO("mysql:host=$servername;dbname=blood_bank", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>