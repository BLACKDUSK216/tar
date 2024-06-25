<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sydney Blog - My Travel Blog</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('css/app2.css') }}">
  <link rel="icon" type="image/png" href="images/logo-black.png">
  <style>
    .card {
      transition: transform 0.3s ease;
      color: white  !important;
      background-color: rgba(0, 0, 0, 0.5);
    }

    .card:hover {
      transform: scale(1.05);
    }
    .card img{
        height: 200px;
        object-fit: cover;
    }
  </style>
</head>
<body>
<header>
        <nav class="nav-container navbar navbar-expand-lg navbar-light navbar-transparent text-white fixed-top">
            <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('images/logo-black.png')}}" alt="My Logo"></a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('blogs') }}">Blogs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('gallery') }}">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('travel') }}">Travel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('restaurants') }}">Restaurants</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('aboutme') }}">About Me</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin') }}">Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Log In</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fab fa-facebook"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fab fa-instagram"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa-brands fa-pinterest"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>    
    <div class="container my-5" >
        <h1 class="header" style="position: relative;top:30px;">Sydney Blog</h1>
    </div>

    <div class="parallax-image" style="background-image: url('images/TouristDestination1.jpg');">
    </div>
    <div class=" container parallax-content my-3">
        <h2>Tourist Destination 1</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab velit autem perspiciatis, inventore sint ipsum repellat nostrum. Nulla, odit. Dolorem dignissimos enim eaque repellat nesciunt quia aliquam, eos nemo similique?</p><br>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab velit autem perspiciatis, inventore sint ipsum repellat nostrum. Nulla, odit. Dolorem dignissimos enim eaque repellat nesciunt quia aliquam, eos nemo similique?</p><br>

        <div class="map-container  d-flex justify-content-center">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3608.5970990666153!2d55.18853548147085!3d25.141243583891743!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f151c66866d2f%3A0x9d96b682e2a00b8d!2sBurj%20Al%20Arab%20Jumeirah!5e0!3m2!1sen!2sus!4v1648911675130!5m2!1sen!2sus" width="250" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
    <div class="parallax-image" style="background-image: url('images/TouristDestination2.jpg');">

    </div>
    <div class="container parallax-content my-3">
        <h2>Tourist Destination 2</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab velit autem perspiciatis, inventore sint ipsum repellat nostrum. Nulla, odit. Dolorem dignissimos enim eaque repellat nesciunt quia aliquam, eos nemo similique?</p><br>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab velit autem perspiciatis, inventore sint ipsum repellat nostrum. Nulla, odit. Dolorem dignissimos enim eaque repellat nesciunt quia aliquam, eos nemo similique?</p><br>
        <div class="map-container  d-flex justify-content-center">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.773623202082!2d103.85845048140326!3d1.2858892990538678!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da1904a93e46f9%3A0x70680e59ce1ee409!2sMarina%20Bay%20Sands!5e0!3m2!1sen!2sus!4v1648911924870!5m2!1sen!2sus" width="250" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>

    <div class="parallax-image" style="background-image: url('images/TouristDestination3.jpg');">
    </div>
    <div class="container parallax-content my-3">
        <h2>Tourist Destination 3</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab velit autem perspiciatis, inventore sint ipsum repellat nostrum. Nulla, odit. Dolorem dignissimos enim eaque repellat nesciunt quia aliquam, eos nemo similique?</p><br>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab velit autem perspiciatis, inventore sint ipsum repellat nostrum. Nulla, odit. Dolorem dignissimos enim eaque repellat nesciunt quia aliquam, eos nemo similique?</p><br>
        <div class="map-container  d-flex justify-content-center">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3691.9326860377876!2d114.16205408147073!3d22.302689585250748!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x340400bc522fa32d%3A0x3b34bc96bab4d937!2sThe%20Ritz-Carlton%2C%20Hong%20Kong!5e0!3m2!1sen!2sus!4v1648911815335!5m2!1sen!2sus" width="250" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>

    <div class="parallax-image" style="background-image: url('images/TouristDestination4.jpg');">
    </div>
    <div class="container parallax-content my-3
    ">
        <h2>Tourist Destination 4</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab velit autem perspiciatis, inventore sint ipsum repellat nostrum. Nulla, odit. Dolorem dignissimos enim eaque repellat nesciunt quia aliquam, eos nemo similique?</p><br>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab velit autem perspiciatis, inventore sint ipsum repellat nostrum. Nulla, odit. Dolorem dignissimos enim eaque repellat nesciunt quia aliquam, eos nemo similique?</p><br>
        <div class="map-container  d-flex justify-content-center">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3228.3069626767468!2d-115.17511658470667!3d36.11250358006974!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c8c4418a7e41ed%3A0xa6f1df9aacc612c7!2sBellagio%20Las%20Vegas!5e0!3m2!1sen!2sus!4v1648912076356!5m2!1sen!2sus" width="250" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>


</div>
<div class="container ">
    <div class="my-5" >
        <h1 class="header" style="position: relative;top:30px;">Read Other Blogs</h1>
    </div> 
    <div class="row">
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="images/TouristDestination1.jpg" class="card-img-top" alt="Blog 1">
            <div class="card-body">
              <h5 class="card-title">Blog Title 1</h5>
              <p class="card-text">Lorem ipsum dolor sit amet,  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iure itaque odit sunt harum consequatur fugiat et temporibus doloremque quisquam! Nesciunt aspernatur rem illum, reprehenderit amet quod delectus sapiente eos magnam.  consectetur adipiscing elit. Nulla convallis libero nec nunc aliquet, sed faucibus purus ultricies.</p>
                  <a href="{{ route('africa') }}" class="btn btn-outline-light btn-lg">Read More <i class="fas fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="images/TouristDestination3.jpg" class="card-img-top" alt="Blog 2">
            <div class="card-body">
              <h5 class="card-title">Blog Title 2</h5>
              <p class="card-text">Lorem ipsum dolor sit amet,  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iure itaque odit sunt harum consequatur fugiat et temporibus doloremque quisquam! Nesciunt aspernatur rem illum, reprehenderit amet quod delectus sapiente eos magnam.  consectetur adipiscing elit. Nulla convallis libero nec nunc aliquet, sed faucibus purus ultricies.</p>
                  <a href="{{ route('sydney') }}" class="btn btn-outline-light btn-lg">Read More <i class="fas fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="images/ameica.jpg" class="card-img-top" alt="Blog 3">
            <div class="card-body">
              <h5 class="card-title">Blog Title 3</h5>
              <p class="card-text">Lorem ipsum dolor sit amet,  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iure itaque odit sunt harum consequatur fugiat et temporibus doloremque quisquam! Nesciunt aspernatur rem illum, reprehenderit amet quod delectus sapiente eos magnam.  consectetur adipiscing elit. Nulla convallis libero nec nunc aliquet, sed faucibus purus ultricies.</p>
                  <a href="{{ route('america') }}" class="btn btn-outline-light btn-lg">Read More <i class="fas fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
  
</div>
</div>




@include('includes.footer')

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>    