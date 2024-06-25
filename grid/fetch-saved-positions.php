<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Positions</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h2 {
            color: #333;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        a {
            display: inline-block;
            padding: 10px 20px;
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #0056b3;
        }

        .center-link {
            text-align: center;
            margin-top: 20px;
        }

        .jump-form {
            text-align: center;
            margin-top: 20px;
        }
.jump-form {
    text-align: center;
    margin-top: 20px;
}

select {
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ddd;
    border-radius: 5px;
    margin-right: 10px;
}

input[type="submit"] {
    padding: 10px 20px;
    font-size: 16px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

.center-link a {
    display: inline-block;
    padding: 10px 20px;
    text-decoration: none;
    color: #fff;
    background-color: #007bff;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.center-link a:hover {
    background-color: #0056b3;
}

    </style>
</head>

<body>

    <?php
    $servername = "127.0.0.1";
    $username = "php_projects";
    $password = "php_projects";
    $dbname = "icon_positions";
    $port = 3306;

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname;port=$port", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->query("SELECT * FROM user_positions");
        $positions = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

        <h2>Saved Positions</h2>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Position</th>
            </tr>
            <?php
            foreach ($positions as $position) {
                echo '<tr>';
                echo '<td>' . $position['id'] . '</td>';
                echo '<td>' . $position['position'] . '</td>';
                echo '</tr>';
            }
            ?>
        </table>

        <div class="jump-form">
            <form action="index.php" method="get">
                <label for="positionId">Select Position ID:</label>
                <select name="positionId" id="positionId">
                    <?php
                    foreach ($positions as $position) {
                        echo '<option value="' . $position['id'] . '">' . $position['id'] . '</option>';
                    }
                    ?>
                </select>
                <input type="submit" value="Jump to Position">
            </form>
        </div>

        <div class="center-link">
            <a href="index.php">Back to Main Page</a>
        </div>

    <?php
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }

    $conn = null;
    ?>

</body>

</html>
