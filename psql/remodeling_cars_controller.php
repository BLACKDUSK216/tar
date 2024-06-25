<?php
// Include database connection
include 'dbh.inc.php';

// Create
function addRemodelingCar($reason_for_remodeling, $estimated_cost) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO remodeling_cars (reason_for_remodeling, estimated_cost) VALUES (?, ?)");
    $stmt->execute([$reason_for_remodeling, $estimated_cost]);
}

// Read
function getAllRemodelingCars() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM remodeling_cars");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Update
function updateRemodelingCar($remodeling_id, $reason_for_remodeling, $estimated_cost) {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE remodeling_cars SET reason_for_remodeling=?, estimated_cost=? WHERE remodeling_id=?");
    $stmt->execute([$reason_for_remodeling, $estimated_cost, $remodeling_id]);
}

// Delete
function deleteRemodelingCar($remodeling_id) {
    global $pdo;
    
    // Check if $remodeling_id is empty or not a valid integer
    if (!empty($remodeling_id) && is_numeric($remodeling_id)) {
        $stmt = $pdo->prepare("DELETE FROM remodeling_cars WHERE remodeling_id = ?");
        $stmt->execute([$remodeling_id]);
    } else {
        echo "Invalid remodeling ID";
    }
}

?>
