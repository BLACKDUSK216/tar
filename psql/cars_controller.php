<?php
// Include database connection
include 'dbh.inc.php';

// Create
function addCar($company, $model, $year, $color) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO cars (company, model, year, color) VALUES (?, ?, ?, ?)");
    $stmt->execute([$company, $model, $year, $color]);
}

// Read
function getAllCars() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM cars");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Update
function updateCar($car_id, $company, $model, $year, $color) {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE cars SET company=?, model=?, year=?, color=? WHERE car_id=?");
    $stmt->execute([$company, $model, $year, $color, $car_id]);
}

// Delete
function deleteCar($car_id) {
    global $pdo;

    try {
        // Begin transaction
        $pdo->beginTransaction();

        // Delete dependencies in customer_remodeling table first
        $stmt = $pdo->prepare("DELETE FROM customer_remodeling WHERE car_id = ?");
        $stmt->execute([$car_id]);

        // Proceed to delete the car
        $stmt = $pdo->prepare("DELETE FROM cars WHERE car_id = ?");
        $stmt->execute([$car_id]);

        // Commit transaction
        $pdo->commit();
    } catch (Exception $e) {
        // Roll back transaction if something failed
        $pdo->rollBack();
        throw $e;
    }
}
