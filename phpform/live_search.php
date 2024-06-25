<?php
include 'dbh.inc.php';

$searchQuery = $_POST['search_query'] ?? '';

if (!empty($searchQuery)) {
    $users = searchUsers($searchQuery);
    if ($users) {
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>Name</th>";
        echo "<th>Email</th>";
        echo "<th>Date of Birth</th>";
        echo "<th>Gender</th>";
        echo "<th>Mobile Number</th>";
        echo "<th>Action</th>"; // New column for actions
        echo "</tr>";
        foreach ($users as $user) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($user['name']) . "</td>";
            echo "<td>" . htmlspecialchars($user['email']) . "</td>";
            echo "<td>" . htmlspecialchars($user['dob']) . "</td>";
            echo "<td>" . htmlspecialchars($user['gender']) . "</td>";
            echo "<td>" . htmlspecialchars($user['mobile']) . "</td>";
            echo "<td>";
            echo "<form action='view_user.php' method='get'>";
            echo "<input type='hidden' name='id' value='" . $user['id'] . "'>";
            echo "<input type='submit' value='View'>";
            echo "</form>";
            echo "<form action='edit_user.php' method='get'>";
            echo "<input type='hidden' name='id' value='" . $user['id'] . "'>";
            echo "<input type='submit' value='Edit'>";
            echo "</form>";
            echo "<form action='delete_user.php' method='post' onsubmit='return confirm(\"Are you sure you want to delete this user?\");'>";
            echo "<input type='hidden' name='id' value='" . $user['id'] . "'>";
            echo "<input type='submit' value='Delete'>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No results found</p>";
    }
}

function searchUsers($query) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM users WHERE name LIKE :searchTerm ORDER BY name");
    $searchTerm = $query . "%";
    $stmt->bindParam(':searchTerm', $searchTerm, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
