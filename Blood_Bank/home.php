<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Bank</title>
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
<!-- Slideshow container -->
<div class="slideshow-container">

  <div class="mySlides fade">
    <img src="images/banner1.jpg" style="width:100%">
    <div class="text">Every drop tells a life-saving story. Be a hero, donate blood and be the reason someone smiles again. 💉🩸 #DonateLife #BloodHeroes</div>
  </div>

  <div class="mySlides fade">
    <img src="images/banner2.jpg" style="width:100%">
    <div class="text">Our blood unites us all. Give the gift of life and make a difference today. 💪🩸 #BloodDonation #CommunityStrong</div>
  </div>

  <div class="mySlides fade">
    <img src="images/banner3.jpg" style="width:100%">
    <div class="text">In every drop, a lifeline. Be a beacon of hope, donate blood and let kindness flow. 🌟🩸 #GiveBlood #SaveLives</div>
  </div>

  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
</div>

<script>
  var slideIndex = 1;
  showSlides(slideIndex);

  function plusSlides(n) {
    showSlides(slideIndex += n);
  }

  function currentSlide(n) {
    showSlides(slideIndex = n);
  }

  function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");

    if (n > slides.length) {
      slideIndex = 1;
    }

    if (n < 1) {
      slideIndex = slides.length;
    }

    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }

    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
    }

    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
  }
</script>


<section>
    <h2>About Our Blood Bank</h2>

    <p>
        Welcome to Blood Bank, where every drop counts. We are committed to providing a safe and reliable
        supply of blood to those in need. Our mission is to save lives by promoting voluntary
        blood donations and ensuring the availability of quality blood products.
    </p>

    <p>
        Established in 1952, Blood Bank has been serving our community by facilitating blood
        donation events, collaborating with healthcare providers, and maintaining the highest
        standards of blood safety.
    </p>
    <p><strong>
        Blood Bank - Because Every Drop Is a Beacon of Hope.</strong>
    </p>
</section>
<section>
    <h2>Blood Groups</h2>

    <p>
        Blood groups play a vital role in ensuring safe and effective blood transfusions. Understanding the compatibility of blood types is essential for successful donations. Here are the common blood groups:
    </p>

    <ul>
        <li><strong>A+</strong>: Compatible with A+, AB+</li>
        <li><strong>A-</strong>: Compatible with A+, A-, AB+, AB-</li>
        <li><strong>B+</strong>: Compatible with B+, AB+</li>
        <li><strong>B-</strong>: Compatible with B+, B-, AB+, AB-</li>
        <li><strong>O+</strong>: Compatible with O+, A+, B+, AB+</li>
        <li><strong>O-</strong>: Universal blood donor, compatible with all blood types</li>
        <li><strong>AB+</strong>: Universal plasma donor, compatible with all blood types</li>
        <li><strong>AB-</strong>: Compatible with AB+, AB-</li>


    </ul>

    <p>
        It's important to know your blood type, as it determines who you can donate to and receive blood from. If you're unsure of your blood type, our team at the Blood Bank can assist you in finding out during the donation process.
    </p>
</section>



<section>
    <h2>Donate Blood</h2>

    <?php
    if (isset($confirmation_message)) {
        echo "<p>$confirmation_message</p>";
    } else {
    ?>
    <p>
        Thank you for considering blood donation! Your contribution can save lives.
        Please fill out the form below to schedule your donation appointment.
    </p>

    <form action="donate.php" method="post">
        <label for="full_name">Full Name:</label>
        <input type="text" id="full_name" name="full_name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="phone" required>

        <label for="blood_type">Blood Type:</label>
        <select id="blood_type" name="blood_type" required>
        <option value="A">A+</option>
            <option value="A">A-</option>
            <option value="B">B+</option>
            <option value="B">B-</option>
            <option value="AB">AB+</option>
            <option value="AB">AB-</option>
            <option value="O">O+</option>
            <option value="O">O-</option>
        </select>

        <button type="submit">Schedule Donation</button>
    </form>
    <?php } ?>
</section>
<section>
    <h2>Find a Blood Donation Center</h2>

    <ul>
    <li>
            <h3>Center 1</h3>
            <p>Location: Mumbai</p>
            <p>Address:789, PQR Avenue,Bandra West,Mumbai - 400050,Maharashtra, India.</p>
            <p>Contact Person:Aryan Patel</p>
            <p>Contact:+91 98765 43210</p>
        </li>

        <li>
            <h3>Center 2</h3>
            <p>Location: Delhi</p>
            <p>Address:456, XYZ Road,Lajpat Nagar,New Delhi - 110001,Delhi, India.</p>
            <p>Contact Person:Arjun Singh</p>
            <p>Contact: +91 87654 32109</p>
        </li>

    </ul>
</section>


<section>
    <h2>Contact Us</h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = htmlspecialchars($_POST["name"]);
        $email = htmlspecialchars($_POST["email"]);
        $message = htmlspecialchars($_POST["message"]);


        $confirmation_message = "Thank you, $name, for your message! We will get back to you at $email.";
    }
    ?>

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
<footer style="background-color: black; color: #dc3545; text-align: center; padding: 15px;">
<div>
        <a href="https://www.facebook.com/yourpage" target="_blank" style="color: #dc3545; margin-right: 10px;">Facebook</a>
        <a href="https://www.instagram.com/yourpage" target="_blank" style="color: #dc3545; margin-right: 10px;">Instagram</a>
        <a href="https://twitter.com/yourpage" target="_blank" style="color: #dc3545;">Twitter</a>
    </div>
    <p>&copy; 2024 Blood Bank. All rights reserved.</p>
    </footer>



</body>
</html>
