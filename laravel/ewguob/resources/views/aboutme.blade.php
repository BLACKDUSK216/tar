<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Me - My Travel Blog</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('css/app3.css') }}">
  <link rel="icon" type="image/png" href="images/logo-black.png">
</head>
<body>
@include('includes.header')
    <div id="about-me-div" class="py-5" style="position: relative;top: 60px;">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-6">
                    <img src="images/aboutme.jpg" alt="About Me" class="img-fluid rounded-circle mb-4">
                </div>
                <div class="col-md-6">
                    <div class="about-me-content">
                        <h2 class="mb-4">About Me</h2>
                        <p class="mb-4">I'm a passionate traveler, explorer, and storyteller. My journey began with a curiosity to discover new places, cultures, and experiences. Over the years, I've traversed through bustling cities, serene landscapes, and hidden gems, collecting memories and tales along the way.</p>
                        <p class="mb-4">With a background in software development, I bring a unique perspective to my travels, often blending technology with tradition to create unforgettable adventures. Whether it's savoring exotic cuisines, immersing myself in local customs, or simply marveling at nature's wonders, each journey enriches my soul and fuels my creative spirit.</p>
                        <p class="mb-4">Join me as I continue to explore the world, one destination at a time. Together, let's embark on a journey of discovery, inspiration, and endless possibilities.</p>
                        <a href="#" class="btn btn-outline-light btn-lg">Contact Me <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="image-section" class="py-5" style="margin-top: 60px;">
        <div class="container">
            <h1>My Images</h1>
            <div class="row justify-content-center align-items-center">
                <div class="col-md-4">
                    <img src="images/image1.jpg" alt="Your Image 1" class="img-fluid rounded-circles mb-4">
                </div>
                <div class="col-md-4">
                    <img src="images/image2.jpg" alt="Your Image 2" class="img-fluid rounded-circles mb-4">
                </div>
                <div class="col-md-4">
                    <img src="images/image3.jpg" alt="Your Image 3" class="img-fluid rounded-circles mb-4">
                </div>
            </div>
        </div>
    </div>
<div class="container">
    <h1>My Favourite Tourist Destination</h1>
</div>
    <div class="parallax-image" style="background-image: url('images/travel_guide1.jpg');">
    </div>
    <div class="container parallax-content">
        <h2>India</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab velit autem perspiciatis, inventore sint ipsum repellat nostrum. Nulla, odit. Dolorem dignissimos enim eaque repellat nesciunt quia aliquam, eos nemo similique?</p><br>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab velit autem perspiciatis, inventore sint ipsum repellat nostrum. Nulla, odit. Dolorem dignissimos enim eaque repellat nesciunt quia aliquam, eos nemo similique?</p>

    </div>
    <div class="parallax-image" style="background-image: url('images/travel_guide2.jpg');">
    </div>
    <div class="container parallax-content">
        <h2>Venice</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab velit autem perspiciatis, inventore sint ipsum repellat nostrum. Nulla, odit. Dolorem dignissimos enim eaque repellat nesciunt quia aliquam, eos nemo similique?</p><br>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab velit autem perspiciatis, inventore sint ipsum repellat nostrum. Nulla, odit. Dolorem dignissimos enim eaque repellat nesciunt quia aliquam, eos nemo similique?</p>  
      </div>
      <div id="contact-section" class="py-5">
        <div class="container">
            <h2>Contact Me</h2>
            <p>If you have any inquiries or just want to say hello, feel free to reach out to me via email:</p>
            <p>Email: your-email@example.com</p>
        </div>
    </div>
    
      <div class="container">
        <h1 class="h1">My Favourite Restaurants</h1>
    </div>
    <div class="parallax-image" style="background-image: url('images/restaurant1.jpg');">
    </div>
    <div class=" container parallax-content my-3">
        <h2>Restaurant 1</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab velit autem perspiciatis, inventore sint ipsum repellat nostrum. Nulla, odit. Dolorem dignissimos enim eaque repellat nesciunt quia aliquam, eos nemo similique?</p><br>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab velit autem perspiciatis, inventore sint ipsum repellat nostrum. Nulla, odit. Dolorem dignissimos enim eaque repellat nesciunt quia aliquam, eos nemo similique?</p><br>

        <div class="map-container  d-flex justify-content-center">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3608.5970990666153!2d55.18853548147085!3d25.141243583891743!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f151c66866d2f%3A0x9d96b682e2a00b8d!2sBurj%20Al%20Arab%20Jumeirah!5e0!3m2!1sen!2sus!4v1648911675130!5m2!1sen!2sus" width="250" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
    <div class="parallax-image" style="background-image: url('images/restaurant2.jpg');">

    </div>
    <div class="container parallax-content my-3">
        <h2>Restaurant 2</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab velit autem perspiciatis, inventore sint ipsum repellat nostrum. Nulla, odit. Dolorem dignissimos enim eaque repellat nesciunt quia aliquam, eos nemo similique?</p><br>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab velit autem perspiciatis, inventore sint ipsum repellat nostrum. Nulla, odit. Dolorem dignissimos enim eaque repellat nesciunt quia aliquam, eos nemo similique?</p><br>
        <div class="map-container  d-flex justify-content-center">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.773623202082!2d103.85845048140326!3d1.2858892990538678!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da1904a93e46f9%3A0x70680e59ce1ee409!2sMarina%20Bay%20Sands!5e0!3m2!1sen!2sus!4v1648911924870!5m2!1sen!2sus" width="250" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>

    <div class="parallax-image" style="background-image: url('images/restaurant3.jpg');">
    </div>
    <div class="container parallax-content my-3">
        <h2>Restaurant 3</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab velit autem perspiciatis, inventore sint ipsum repellat nostrum. Nulla, odit. Dolorem dignissimos enim eaque repellat nesciunt quia aliquam, eos nemo similique?</p><br>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab velit autem perspiciatis, inventore sint ipsum repellat nostrum. Nulla, odit. Dolorem dignissimos enim eaque repellat nesciunt quia aliquam, eos nemo similique?</p><br>
        <div class="map-container  d-flex justify-content-center">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3691.9326860377876!2d114.16205408147073!3d22.302689585250748!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x340400bc522fa32d%3A0x3b34bc96bab4d937!2sThe%20Ritz-Carlton%2C%20Hong%20Kong!5e0!3m2!1sen!2sus!4v1648911815335!5m2!1sen!2sus" width="250" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>

    <div class="parallax-image" style="background-image: url('images/restaurant4.jpg');">
    </div>
    <div class="container parallax-content my-3
    ">
        <h2>Restaurant 4</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab velit autem perspiciatis, inventore sint ipsum repellat nostrum. Nulla, odit. Dolorem dignissimos enim eaque repellat nesciunt quia aliquam, eos nemo similique?</p><br>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab velit autem perspiciatis, inventore sint ipsum repellat nostrum. Nulla, odit. Dolorem dignissimos enim eaque repellat nesciunt quia aliquam, eos nemo similique?</p><br>
        <div class="map-container  d-flex justify-content-center">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3228.3069626767468!2d-115.17511658470667!3d36.11250358006974!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c8c4418a7e41ed%3A0xa6f1df9aacc612c7!2sBellagio%20Las%20Vegas!5e0!3m2!1sen!2sus!4v1648912076356!5m2!1sen!2sus" width="250" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>


</div>
    <div id="footer" class="bg-dark text-white">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-center">
              <p class="mt-4">&copy; 2024 My Travel Blog. All Rights Reserved.</p>
              <ul class="list-inline">
                <li class="list-inline-item"><a href="#" class="text-white">Terms of Use</a></li>
                <li class="list-inline-item"><a href="#" class="text-white">Privacy Policy</a></li>
                <li class="list-inline-item"><a href="#" class="text-white">Contact Us</a></li>
              </ul>
              <p>Follow Us:</p>
              <ul class="list-inline">
                <li class="list-inline-item"><a href="#"><i class="fab fa-facebook text-white"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab fa-twitter text-white"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab fa-instagram text-white"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fa-brands fa-pinterest text-white"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    </body>
</html>
