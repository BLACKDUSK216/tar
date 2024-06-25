<?php
// Include the necessary controller file
include 'remodeling_cars_controller.php';

// Retrieve data for remodeling cars table
$remodelingCars = getAllRemodelingCars();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Remodeling Cars Table</title>
</head>
<body>
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
                <td><?= $remodelingCar['remodeling_id'] ?></td>
                <td><?= $remodelingCar['reason_for_remodeling'] ?></td>
                <td>₹<?= $remodelingCar['estimated_cost'] ?></td>
                <td>
                    <form method="post" action="">
                        <input type="hidden" name="remodeling_id" value="<?= $remodelingCar['remodeling_id'] ?>">
                        <button type="submit" name="edit_remodeling_car">Edit</button>
                        <button type="submit" name="delete_remodeling_car">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
