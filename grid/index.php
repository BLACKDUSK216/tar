<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <script src="script.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Grid Example</title>
</head>

<body>
    <h2>Grid Example</h2>

    <div class="grid-container" id="gridContainer">
        <div class="grid-item" id="iconContainer"><i class="fa-solid fa-chess-queen"></i></div>
    </div>

    <div>
        <label for="direction">Select Direction:</label>
        <select id="direction" name="direction">
            <option value="up">Up</option>
            <option value="down">Down</option>
            <option value="left">Left</option>
            <option value="right">Right</option>
        </select>

        <label for="spaces">Select Spaces To Jump (1-5):</label>
        <input type="number" id="spaces" name="spaces" min="1" max="5" value="1">

        <button onclick="moveIcon()">Move</button>
        <button onclick="saveIconPosition()">Save Icon Position</button>
        <button onclick="viewSavedPositions()">View Saved Positions</button>
    </div>

    <?php
        include 'db_config.php';
      
    ?>

</body>

</html>
