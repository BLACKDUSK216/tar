<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Travel Blog</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
  @include('includes.header')

  <div id="hero-div" class="parallax-div">
    <video autoplay muted loop id="hero-video">
      <source src="videos/video1.mp4" type="video/mp4">
      Your browser does not support HTML5 video.
    </video>
    <audio id="background-music" loop>
      <source src="audio/audio1.mp3" type="audio/mp3">
      Your browser does not support the audio element.
    </audio>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="hero-content text-white text-center">
            <h1>Welcome to My Travel Blog</h1>
            <p>Explore amazing destinations around the world with us!</p>
            <a href="{{ route('blogs') }}" class="btn btn-outline-light btn-lg text-white"><span>View More <i
                  class="fas fa-arrow-right"></i></span></a>
          </div>
        </div>
      </div>
    </div>
    <div class="btn-container">
      <button id="toggle-video" class="btn btn-outline-light btn-lg mt-3 plause" onclick="toggleVideo()"><span><i
            class="fa-solid fa-pause"></i></span></button>
      <button id="toggle-music" class="btn btn-outline-light btn-lg mt-3 plause" onclick="toggleMusic()"><span><i
            class="fa-solid fa-volume-xmark mute"></i></span></button>
    </div>
  </div>



  <div id="div" class="parallax-div">
    <div class="container">
      <div class="row justify-content-center align-items-center my-5">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-4 my-2 position-relative">
              <img src="images/travel.jpg" class="img-fluid" alt="Travel">
              <div class="image-overlay ">
                <h5 class="overlay-title">Travel</h5>
                <p class="overlay-text">Explore amazing destinations around the world.</p>
                <a href="#" class="btn btn-outline-light">Travel</a>
              </div>
            </div>
            <div class="col-md-4 my-2 position-relative">
              <img src="images/eat.jpg" class="img-fluid" alt="Eat">
              <div class="image-overlay">
                <h5 class="overlay-title">Eat</h5>
                <p class="overlay-text">Discover delicious cuisines and local flavors.</p>
                <a href="#" class="btn btn-outline-light">Eat</a>
              </div>
            </div>
            <div class="col-md-4 my-2 position-relative">
              <img src="images/relax.jpg" class="img-fluid third-image" alt="Relax">
              <div class="image-overlay">
                <h5 class="overlay-title">Relax</h5>
                <p class="overlay-text">Unwind and rejuvenate in tranquil settings.</p>
                <a href="#" class="btn btn-outline-light">Relax</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>




  <div id="about-me-div" class="parallax-div">
    <div class="container">
      <div class="row justify-content-center align-items-center">
        <div class="col-md-6">
          <img src="images/aboutme.jpg" alt="About Me" class="img-fluid rounded-circle mb-4">
        </div>
        <div class="col-md-6">
          <div class="about-me-content">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

            <h2 class="mb-4">About Me</h2>
            <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id tellus at quam
              faucibus placerat. Nullam sit amet elit ac ipsum congue feugiat. Sed tristique semper ex, eu lacinia lacus
              faucibus a. Nam vulputate rutrum mi, id efficitur nunc ullamcorper vel. Nulla facilisi.</p>
            <a href="{{ route('aboutme') }}" class="btn btn-outline-light btn-lg"><span>Contact Me <i
                  class="fas fa-arrow-right"></span></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="gallery-div" class="py-5">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center">
        <h2 class="text-left my-3">Gallery</h2>
        <a href="{{ route('gallery') }}" class="btn btn-outline-light"><span>View More <i
              class="fas fa-arrow-right"></i></span></a>
      </div>
      <div class="row">
        <div class="col-md-4 mb-4">
          <img src="images/image1.jpg" class="img-fluid" alt="Image 1">
        </div>
        <div class="col-md-4 mb-4">
          <img src="images/image2.jpg" class="img-fluid relative-image" alt="Image 2">
        </div>
        <div class="col-md-4 mb-4">
          <img src="images/image3.jpg" class="img-fluid" alt="Image 3">
        </div>
      </div>
      <div class="row my-5">
        <div class="col-md-4 mb-4">
          <img src="images/image4.jpg" class="img-fluid" alt="Image 4">
        </div>
        <div class="col-md-4 mb-4">
          <img src="images/image5.jpg" class="img-fluid relative-image" alt="Image 5">
        </div>
        <div class="col-md-4 mb-4">
          <img src="images/image6.jpg" class="img-fluid" alt="Image 6">
        </div>
      </div>
    </div>
  </div>



  <div id="blogs-div" class="parallax-div">
    <div class="container">
      <h2 class="text-left text-white my-4" style="position: relative;top: 10px;">Recent Blogs</h2>
      <div class="row">
        <div class="col-md-3 mb-4">
          <div class="card">
            <img src="images/ameica.jpg" class="card-img-top" alt="Blog 1">
            <div class="card-body text-white">
              <h5 class="card-title">New York, America</h5>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
              <a href="{{ route('america') }}" class="btn btn-outline-light btn-lg"><span>Read More <i
                    class="fas fa-arrow-right"></i></span></a>
            </div>
          </div>
        </div>
        <div class="col-md-3 mb-4">
          <div class="card">
            <img src="images/sydney.jpg" class="card-img-top" alt="Blog 2">
            <div class="card-body text-white">
              <h5 class="card-title">Sydney, Australia</h5>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
              <a href="{{ route('sydney') }}" class="btn btn-outline-light btn-lg"><span>Read More <i
                    class="fas fa-arrow-right"></i></span></a>
            </div>
          </div>
        </div>
        <div class="col-md-3 mb-4">
          <div class="card">
            <img src="images/japan.jpg" class="card-img-top" alt="Blog 3">
            <div class="card-body text-white">
              <h5 class="card-title text-white">Kyoto, Japan</h5>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
              <a href="{{ route('japan') }}" class="btn btn-outline-light btn-lg"><span>Read More <i
                    class="fas fa-arrow-right"></i></span></a>
            </div>
          </div>
        </div>
        <div class="col-md-3 mb-4">
          <div class="card">
            <img src="images/africa.jpg" class="card-img-top" alt="Blog 4">
            <div class="card-body text-white">
              <h5 class="card-title">Tanzania, Africa</h5>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
              <a href="{{ route('africa') }}" class="btn btn-outline-light btn-lg"><span>Read More <i
                    class="fas fa-arrow-right"></i></span></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="comments-section" class="py-5 input-wrapper">
    <div class="container">
      <h2 class="text-left mb-4">Comments</h2>
      <form>
        <div class="form-group">
          <label for="commentName">Name:</label>
          <input type="text" class="form-control" id="commentName" placeholder="Enter Your name...." required>
        </div>
        <div class="form-group">
          <label for="commentEmail">Email address:</label>
          <input type="email" class="form-control" id="commentEmail" placeholder="Enter Your email...." required>
        </div>
        <div class="form-group">
          <label for="commentMessage">Message:</label>
          <input class="form-control" id="commentMessage" rows="3" placeholder="Enter Your comment...."
            required></input>
        </div>
        <div class="form-group">
          <label for="commentFile">Upload File</label>
          <input type="file" class="form-control-file" id="commentFile">
        </div>
        <a href="#" class="btn btn-outline-light btn-lg">Submit</a>
      </form>
    </div>
  </div>

  <div id="comments-list" class="parallax-div">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="text-left text-white my-4">Comments List</h2>
          <div class="card1 mb-3">
            <div class="card-body text-white">
              <h5 class="card-title">Ravi Kumar</h5>
              <h6 class="card-subtitle mb-2 text-white">ravikumar@example.com</h6>
              <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente dolores eius
                temporibus at distinctio voluptatibus fuga facere? Vel, provident! Placeat, quaerat dolorum alias unde
                impedit quae ex optio ullam excepturi.</p>
            </div>
          </div>
          <div class="card1 mb-3">
            <div class="card-body text-white">
              <h5 class="card-title">Priya Patel</h5>
              <h6 class="card-subtitle mb-2 text-white">priyapatel@example.com</h6>
              <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Omnis molestiae rem
                architecto facere! Quo, quisquam ipsam autem ducimus eaque cum hic placeat, tempore fuga ut fugiat
                minima, perferendis repellendus aut?</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('includes.footer')


  <!-- <img src="images/airplane.png" alt="Airplane" id="airplane" style="position: absolute; display: none;width:50px;height:50px;"> -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/scrollreveal"></script>
  <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>