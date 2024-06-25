<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Blogs - My Travel Blog</title>
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
@include('includes.header')

  <div class="container mt-5">
    <div class="container my-5" >
        <h1 class="header" style="position: relative;top:30px;">My Blogs</h1>
    </div>   
     <div class="row">
      <div class="col-md-4 mb-4">
        <div class="card">
          <img src="images/TouristDestination1.jpg" class="card-img-top" alt="Blog 1">
          <div class="card-body">
            <h5 class="card-title">Blog Title 1</h5>
            <p class="card-text">Lorem ipsum dolor sit amet,  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iure itaque odit sunt harum consequatur fugiat et temporibus doloremque quisquam! Nesciunt aspernatur rem illum, reprehenderit amet quod delectus sapiente eos magnam.  consectetur adipiscing elit. Nulla convallis libero nec nunc aliquet, sed faucibus purus ultricies.</p>
                <a href="{{ route('blog1') }}" class="btn btn-outline-light btn-lg">Read More <i class="fas fa-arrow-right"></i></a>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card">
          <img src="images/TouristDestination3.jpg" class="card-img-top" alt="Blog 2">
          <div class="card-body">
            <h5 class="card-title">Blog Title 2</h5>
            <p class="card-text">Lorem ipsum dolor sit amet,  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iure itaque odit sunt harum consequatur fugiat et temporibus doloremque quisquam! Nesciunt aspernatur rem illum, reprehenderit amet quod delectus sapiente eos magnam.  consectetur adipiscing elit. Nulla convallis libero nec nunc aliquet, sed faucibus purus ultricies.</p>
                <a href="{{ route('blog2') }}" class="btn btn-outline-light btn-lg">Read More <i class="fas fa-arrow-right"></i></a>
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
      <div class="col-md-4 mb-4">
        <div class="card">
          <img src="images/africa.jpg" class="card-img-top" alt="Blog 3">
          <div class="card-body">
            <h5 class="card-title">Blog Title 4</h5>
            <p class="card-text">Lorem ipsum dolor sit amet,  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iure itaque odit sunt harum consequatur fugiat et temporibus doloremque quisquam! Nesciunt aspernatur rem illum, reprehenderit amet quod delectus sapiente eos magnam.  consectetur adipiscing elit. Nulla convallis libero nec nunc aliquet, sed faucibus purus ultricies.</p>
                <a href="{{ route('africa') }}" class="btn btn-outline-light btn-lg">Read More <i class="fas fa-arrow-right"></i></a>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card">
          <img src="images/japan.jpg" class="card-img-top" alt="Blog 3">
          <div class="card-body">
            <h5 class="card-title">Blog Title 5</h5>
            <p class="card-text">Lorem ipsum dolor sit amet,  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iure itaque odit sunt harum consequatur fugiat et temporibus doloremque quisquam! Nesciunt aspernatur rem illum, reprehenderit amet quod delectus sapiente eos magnam.  consectetur adipiscing elit. Nulla convallis libero nec nunc aliquet, sed faucibus purus ultricies.</p>
                <a href="{{ route('japan') }}" class="btn btn-outline-light btn-lg">Read More <i class="fas fa-arrow-right"></i></a>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card">
          <img src="images/sydney.jpg" class="card-img-top" alt="Blog 3">
          <div class="card-body">
            <h5 class="card-title">Blog Title 6</h5>
            <p class="card-text">Lorem ipsum dolor sit amet,  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iure itaque odit sunt harum consequatur fugiat et temporibus doloremque quisquam! Nesciunt aspernatur rem illum, reprehenderit amet quod delectus sapiente eos magnam.  consectetur adipiscing elit. Nulla convallis libero nec nunc aliquet, sed faucibus purus ultricies.</p>
                <a href="{{ route('sydney') }}" class="btn btn-outline-light btn-lg">Read More <i class="fas fa-arrow-right"></i></a>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card">
          <img src="images/TouristDestination1.jpg" class="card-img-top" alt="Blog 1">
          <div class="card-body">
            <h5 class="card-title">Blog Title 7</h5>
            <p class="card-text">Lorem ipsum dolor sit amet,  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iure itaque odit sunt harum consequatur fugiat et temporibus doloremque quisquam! Nesciunt aspernatur rem illum, reprehenderit amet quod delectus sapiente eos magnam.  consectetur adipiscing elit. Nulla convallis libero nec nunc aliquet, sed faucibus purus ultricies.</p>
                <a href="{{ route('blog1') }}" class="btn btn-outline-light btn-lg">Read More <i class="fas fa-arrow-right"></i></a>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card">
          <img src="images/TouristDestination3.jpg" class="card-img-top" alt="Blog 2">
          <div class="card-body">
            <h5 class="card-title">Blog Title 8</h5>
            <p class="card-text">Lorem ipsum dolor sit amet,  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iure itaque odit sunt harum consequatur fugiat et temporibus doloremque quisquam! Nesciunt aspernatur rem illum, reprehenderit amet quod delectus sapiente eos magnam.  consectetur adipiscing elit. Nulla convallis libero nec nunc aliquet, sed faucibus purus ultricies.</p>
                <a href="{{ route('blog2') }}" class="btn btn-outline-light btn-lg">Read More <i class="fas fa-arrow-right"></i></a>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card">
          <img src="images/ameica.jpg" class="card-img-top" alt="Blog 3">
          <div class="card-body">
            <h5 class="card-title">Blog Title 9</h5>
            <p class="card-text">Lorem ipsum dolor sit amet,  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iure itaque odit sunt harum consequatur fugiat et temporibus doloremque quisquam! Nesciunt aspernatur rem illum, reprehenderit amet quod delectus sapiente eos magnam.  consectetur adipiscing elit. Nulla convallis libero nec nunc aliquet, sed faucibus purus ultricies.</p>
                <a href="{{ route('america') }}" class="btn btn-outline-light btn-lg">Read More <i class="fas fa-arrow-right"></i></a>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card">
          <img src="images/africa.jpg" class="card-img-top" alt="Blog 3">
          <div class="card-body">
            <h5 class="card-title">Blog Title 10</h5>
            <p class="card-text">Lorem ipsum dolor sit amet,  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iure itaque odit sunt harum consequatur fugiat et temporibus doloremque quisquam! Nesciunt aspernatur rem illum, reprehenderit amet quod delectus sapiente eos magnam.  consectetur adipiscing elit. Nulla convallis libero nec nunc aliquet, sed faucibus purus ultricies.</p>
                <a href="{{ route('africa') }}" class="btn btn-outline-light btn-lg">Read More <i class="fas fa-arrow-right"></i></a>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card">
          <img src="images/japan.jpg" class="card-img-top" alt="Blog 3">
          <div class="card-body">
            <h5 class="card-title">Blog Title 11</h5>
            <p class="card-text">Lorem ipsum dolor sit amet,  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iure itaque odit sunt harum consequatur fugiat et temporibus doloremque quisquam! Nesciunt aspernatur rem illum, reprehenderit amet quod delectus sapiente eos magnam.  consectetur adipiscing elit. Nulla convallis libero nec nunc aliquet, sed faucibus purus ultricies.</p>
                <a href="{{ route('japan') }}" class="btn btn-outline-light btn-lg">Read More <i class="fas fa-arrow-right"></i></a>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card">
          <img src="images/sydney.jpg" class="card-img-top" alt="Blog 3">
          <div class="card-body">
            <h5 class="card-title">Blog Title 12</h5>
            <p class="card-text">Lorem ipsum dolor sit amet,  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iure itaque odit sunt harum consequatur fugiat et temporibus doloremque quisquam! Nesciunt aspernatur rem illum, reprehenderit amet quod delectus sapiente eos magnam.  consectetur adipiscing elit. Nulla convallis libero nec nunc aliquet, sed faucibus purus ultricies.</p>
                <a href="{{ route('sydney') }}" class="btn btn-outline-light btn-lg">Read More <i class="fas fa-arrow-right"></i></a>
          </div>
        </div>
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
