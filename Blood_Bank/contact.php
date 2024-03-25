        <?php
        include('connection/dbh.inc.php');


        try {
            $conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = htmlspecialchars($_POST["name"]);
            $email = htmlspecialchars($_POST["email"]);
            $message = htmlspecialchars($_POST["message"]);

            try {
                $stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (:name, :email, :message)");
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':message', $message);
                $stmt->execute();

                $confirmation_message = "Thank you, $name, for your message! We will get back to you at $email.";
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
        ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Contact Us - Blood Bank</title>
            <link rel="stylesheet" href="style.css"> 
            <link rel="icon" href="images/image.jpg" type="image/x-icon">

        </head>
        <body>

        <header>
            <h1>Blood Bank</h1>
        </header>

        <nav>
            <a href="home.php">Home</a>
            <a href="donate.php">Donate</a>
            <a href="find_center.php">Find a Center</a>
            <a href="about_us.php">About Us</a>
            <a href="contact.php">Contact</a>
            <a href="donor_list.php">Donor List</a> 
            <a href="admin_login.php">Admin</a>
            <a href="my_profile.php">My Profile</a>


        </nav>

        <section>
            <h2>Contact Us</h2>

            <?php
            if (isset($confirmation_message)) {
                echo "<p>$confirmation_message</p>";
            } else {
            ?>
            <p>
                Have a question or want to get in touch? Use the form below to send us a message.
            </p>

            <form action="contact.php" method="post">
                <label for="name">Your Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Your Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="message">Your Message:</label>
                <textarea id="message" name="message" rows="4" required></textarea>

                <button type="submit">Send Message</button>
            </form>
            <?php } ?>
        </section>

        </body>
        </html>
