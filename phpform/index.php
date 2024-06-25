<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

$errors = $_SESSION['errors'] ?? [];
function displayError($fieldName) {
    global $errors;
    if (isset($errors[$fieldName])) {
        echo "<p style='color:red;' class='error-message'>{$errors[$fieldName]}</p>";
    }
}

include 'dbh.inc.php';

$searchQuery = $_POST['search_query'] ?? '';
$users = $searchQuery ? searchUsers($searchQuery) : getUsers();

function searchUsers($query) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM users WHERE name LIKE :searchTerm");
    $searchTerm = $query . "%";
    $stmt->bindParam(':searchTerm', $searchTerm, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <link rel="stylesheet" href="styles.css">
    <script>
        function displayErrorsInConsole() {
            var errorMessages = document.getElementsByClassName("error-message");
            for (var i = 0; i < errorMessages.length; i++) {
                console.error(errorMessages[i].innerText);
            }
        }
        function liveSearch() {
            var searchQuery = document.getElementById('search_query').value;
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById('search_results').innerHTML = this.responseText;
                }
            };
            xhttp.open("POST", "live_search.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("search_query=" + searchQuery);
        }
    </script>
</head>
<body>
    <h2>Registration Form</h2>
    <?php if (isset($_SESSION['success_message'])): ?>
        <p style='color:green;'><?php echo $_SESSION['success_message']; ?></p>
        <?php unset($_SESSION['success_message']); ?>
    <?php endif; ?>
    <form action="form_controller.php" method="post" onsubmit="displayErrorsInConsole()">
    
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        <?php displayError('name'); ?><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        <?php displayError('email'); ?><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <?php displayError('password'); ?><br><br>
        
        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" required><br><br>
        <?php displayError('dob'); ?><br><br>
        
        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select><br><br>
        <?php displayError('gender'); ?><br><br>
        
        <label for="mobile">Mobile:</label>
        <input type="tel" id="mobile" name="mobile" required><br><br>
        <?php displayError('mobile'); ?><br><br>

        <label for="image">Choose an image:</label>
        <input type="file" id="image" name="image" accept="image/*" required><br><br>
        
        <input type="submit" value="Submit">
    </form>

    <!-- <form action="index.php" method="post">
        <input type="hidden" name="view_users" value="true">
        <input type="submit" value="View Users">
    </form> -->

    <h2>Search Users</h2>
    <form action="index.php" method="post">
    <input type="text" id="search_query" name="search_query" placeholder="Search by name" onkeyup="liveSearch()">
        <input type="submit" value="Search">
    </form>
    <div id="search_results">
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Date of Birth</th>
            <th>Gender</th>
            <th>Mobile Number</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo htmlspecialchars($user['name']); ?></td>
                <td><?php echo htmlspecialchars($user['email']); ?></td>
                <td><?php echo htmlspecialchars($user['dob']); ?></td>
                <td><?php echo htmlspecialchars($user['gender']); ?></td>
                <td><?php echo htmlspecialchars($user['mobile']); ?></td>
                <td>
                    <form action="view_user.php" method="get" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                        <input type="submit" value="View">
                    </form>
                    <form action="edit_view.php" method="get" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                        <input type="submit" value="Edit">
                    </form>
                    <form action="delete_user.php" method="post" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                        <input type="submit" value="Delete" onclick="return confirm('Are you sure you want to delete this user?');">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    </div>

    <?php if ($searchQuery): ?>
        <h3>Search Results for "<?php echo htmlspecialchars($searchQuery); ?>"</h3>
    <?php elseif (isset($_POST['view_users']) && $_POST['view_users'] == 'true'): ?>
    <?php endif; ?>
</body>
</html>

<?php
unset($_SESSION['errors']);
?>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST['name'], $_POST['email'], $_POST['password'], $_POST['dob'], $_POST['gender'], $_POST['mobile'], $_FILES['image'])) {
            $servername = "127.0.0.1";
            $username = "tariq123";
            $password = "tariq123";
            $dbname = "form";
            $port = 3306;

            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname;port=$port", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $name = $_POST['name'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $dob = $_POST['dob'];
                $gender = $_POST['gender'];
                $mobile = $_POST['mobile'];

                if(isset($_FILES['image'])) {
                    $imageData = file_get_contents($_FILES['image']['tmp_name']);
                    $stmt = $conn->prepare("INSERT INTO users (name, email, password, dob, gender, mobile, image) VALUES (:name, :email, :password, :dob, :gender, :mobile, :image)");

                    $stmt->bindParam(':name', $name);
                    $stmt->bindParam(':email', $email);
                    $stmt->bindParam(':password', $password);
                    $stmt->bindParam(':dob', $dob);
                    $stmt->bindParam(':gender', $gender);
                    $stmt->bindParam(':mobile', $mobile);
                    $stmt->bindParam(':image', $imageData, PDO::PARAM_LOB);
                    $stmt->execute();

                    echo "Image inserted successfully!";
                } else {
                    echo "Image not uploaded!";
                }
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            $conn = null;
        }
    }
?>
