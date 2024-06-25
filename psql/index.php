<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include database connection
include 'dbh.inc.php';
include 'cars_controller.php';
include 'remodeling_cars_controller.php';

// Handle CRUD operations for cars and remodeling cars
$error_message = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    error_log(print_r($_POST, true)); // Log POST data for debugging
    if (isset($_POST['add_car'])) {
        if (isset($_POST['company'], $_POST['model'], $_POST['year'], $_POST['color'])) {
            addCar($_POST['company'], $_POST['model'], $_POST['year'], $_POST['color']);
        }
    } elseif (isset($_POST['edit_car'])) {
        if (isset($_POST['car_id'], $_POST['company'], $_POST['model'], $_POST['year'], $_POST['color'])) {
            updateCar($_POST['car_id'], $_POST['company'], $_POST['model'], $_POST['year'], $_POST['color']);
        }
    } elseif (isset($_POST['delete_car'])) {
        if (isset($_POST['car_id'])) {
            try {
                deleteCar($_POST['car_id']);
            } catch (Exception $e) {
                $error_message = $e->getMessage();
            }
        }
    } elseif (isset($_POST['add_remodeling_car'])) {
        if (isset($_POST['reason_for_remodeling'], $_POST['estimated_cost'])) {
            addRemodelingCar($_POST['reason_for_remodeling'], $_POST['estimated_cost']);
        }
    } elseif (isset($_POST['edit_remodeling_car'])) {
        if (isset($_POST['remodeling_id'], $_POST['reason_for_remodeling'], $_POST['estimated_cost'])) {
            updateRemodelingCar($_POST['remodeling_id'], $_POST['reason_for_remodeling'], $_POST['estimated_cost']);
        }
    } elseif (isset($_POST['delete_remodeling_car'])) {
        if (isset($_POST['remodeling_id'])) {
            deleteRemodelingCar($_POST['remodeling_id']);
        }
    }
}

// Retrieve data for cars table
$cars = getAllCars();

// Retrieve data for remodeling cars table
$remodelingCars = getAllRemodelingCars();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Index</title>
    <style>
        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 60px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h2>Cars Database</h2>
    <?php if ($error_message): ?>
        <div class="error-message"><?= htmlspecialchars($error_message ?? '', ENT_QUOTES, 'UTF-8') ?></div>
    <?php endif; ?>
    <table>
        <tr>
            <th>Car ID</th>
            <th>Company</th>
            <th>Model</th>
            <th>Year</th>
            <th>Color</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($cars as $car) : ?>
            <tr>
                <td><?= htmlspecialchars($car['car_id'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($car['company'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($car['model'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($car['year'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($car['color'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                <td>
                    <form method="post" action="">
                        <input type="hidden" name="car_id" value="<?= htmlspecialchars($car['car_id'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
                        <button type="submit" name="edit_car">Edit</button>
                        <button type="submit" name="delete_car">Delete</button>
                    </form>
                    <button onclick="openModal('addCarModal')">Add New Car</button>
                </td>
            </tr>
        <?php endforeach;
        
        ?>
    </table>

    <h2>Remodeling Cars Database</h2>
    <table>
        <tr>
            <th>Remodeling ID</th>
            <th>Reason for Remodeling</th>
            <th>Estimated Cost</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($remodelingCars as $remodelingCar) : ?>
            <tr>
                <td><?= htmlspecialchars($remodelingCar['remodeling_id'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($remodelingCar['reason_for_remodeling'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                <td>₹<?= htmlspecialchars($remodelingCar['estimated_cost'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                <td>
                    <form method="post" action="">
                        <input type="hidden" name="remodeling_id" value="<?= htmlspecialchars($remodelingCar['remodeling_id'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
                        <button type="submit" name="edit_remodeling_car">Edit</button>
                        <button type="submit" name="delete_remodeling_car">Delete</button>
                    </form>
                    <button onclick="openModal('addRemodelingCarModal')">Add New Remodeling Car</button>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <!-- Modal for adding a new car -->
    <div id="addCarModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('addCarModal')">&times;</span>
            <h2>Add New Car</h2>
            <form method="post" action="">
                <label for="company">Company:</label>
                <input type="text" name="company" required>
                <label for="model">Model:</label>
                <input type="text" name="model" required>
                <label for="year">Year:</label>
                <input type="number" name="year" required>
                <label for="color">Color:</label>
                <input type="text" name="color" required>
                <button type="submit" name="add_car">Add Car</button>
            </form>
        </div>
    </div>

    <!-- Modal for adding a new remodeling car -->
    <div id="addRemodelingCarModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('addRemodelingCarModal')">&times;</span>
            <h2>Add New Remodeling Car</h2>
            <form method="post" action="">
                <label for="reason_for_remodeling">Reason for Remodeling:</label>
                <input type="text" name="reason_for_remodeling" required>
                <label for="estimated_cost">Estimated Cost:</label>
                <input type="number" name="estimated_cost" required>
                <button type="submit" name="add_remodeling_car">Add Remodeling Car</button>
            </form>
        </div>
    </div>

    <script>
        function openModal(modalId) {
            document.getElementById(modalId).style.display = "block";
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = "none";
        }

        // Close modals when clicking outside of them
        window.onclick = function(event) {
            if (event.target.classList.contains('modal')) {
                closeModal(event.target.id);
            }
        }
    </script>
</body>
</html>
