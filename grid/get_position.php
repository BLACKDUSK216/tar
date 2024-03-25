<?php
include 'db_config.php';
$positionId = $_GET['positionId'];
$stmt = $conn->prepare("SELECT position FROM user_positions WHERE id = :positionId");
$stmt->bindParam(':positionId', $positionId);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
if ($result && isset($result['position'])) {
    preg_match('/(\d+) \/ (\d+) \/ span 1 \/ span 1/', $result['position'], $matches);
    $row = $matches[1];
    $column = $matches[2];

    header('Content-Type: application/json');
    echo json_encode(['row' => $row, 'column' => $column]);
} else {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Position not found']);
}
?>
