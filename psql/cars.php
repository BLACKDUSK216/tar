<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Cars Table</title>
</head>
<body>
    <h2>Cars Database</h2>
    <?php
    include 'cars_controller.php';
        $cars = getAllCars();
    echo '<table>';
    echo '<tr><th>Car ID</th><th>Company</th><th>Model</th><th>Year</th><th>Color</th><th>Actions</th></tr>';
    foreach ($cars as $car) {
        echo '<tr>';
        echo '<td>' . $car['car_id'] . '</td>';
        echo '<td>' . $car['company'] . '</td>';
        echo '<td>' . $car['model'] . '</td>';
        echo '<td>' . $car['year'] . '</td>';
        echo '<td>' . $car['color'] . '</td>';
        echo '<td>';
        echo '<form method="post" action="">';
        echo '<input type="hidden" name="car_id" value="' . $car['car_id'] . '">';
        echo '<button type="submit" name="edit_car">Edit</button>';
        echo '<button type="submit" name="delete_car">Delete</button>';
        echo '</form>';
        echo '</td>';
        echo '</tr>';
    }
    echo '</table>';
    ?>
</body>
</html>
