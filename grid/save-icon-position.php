<?php
$servername = "127.0.0.1";
$username = "php_projects";
$password = "php_projects";
$dbname = "icon_positions";
$port = 3306;

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;port=$port", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $data = json_decode(file_get_contents('php://input'), true);
    
    error_log('Received data: ' . print_r($data, true));

    if (isset($data['position']) && $data['position'] !== null) {
        $position = $data['position'];

        $stmt = $conn->prepare("INSERT INTO user_positions (position) VALUES (:position)");
        $stmt->bindParam(':position', $position);
        $stmt->execute();

        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Position value is missing or null']);
    }
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}

$conn = null;
?>
