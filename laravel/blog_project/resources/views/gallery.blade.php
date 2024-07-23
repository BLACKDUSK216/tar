<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery - My Travel Blog</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/app2.css') }}">
    <link rel="icon" type="image/png" href="images/logo-black.png">
</head>

<body>
    <style>
        .image-container {
            position: relative;
            overflow: hidden;
        }

        .image-container img {
            transition: transform 0.4s ease-out;
        }

        .image-container:hover img {
            transform: scale(1.1) rotate(3deg);
        }

        .image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .image-container:hover .image-overlay {
            opacity: 1;
        }

        .overlay-text {
            color: white;
            font-size: 1.2rem;
            font-weight: bold;
            text-align: center;
            margin-bottom: 10px;
            transform: translateY(20px);
            transition: transform 0.3s ease;
        }

        .image-container:hover .overlay-text {
            transform: translateY(0);
        }

        .btn-view-details {
            background-color: rgba(255, 255, 255, 0.2);
            border: none;
            color: white;
            padding: 8px 16px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn-view-details:hover {
            background-color: rgba(255, 255, 255, 0.5);
        }
    </style>
    @include('includes.header')

    <div class="container my-5">
        <h1 class="header" style="position: relative;top:30px;">My Photos</h1>
    </div>

    <div class="container my-5 gallery">
        <div class="row mt-5">
            <div class="col-md-6">
                <div class="image-container">
                    <img src="images/image1.jpg" alt="Image 1" class="img-fluid">
                    <div class="image-overlay d-flex flex-column justify-content-center align-items-center">
                        <span class="overlay-text">Image From Greece</span>
                        <a href="new_page.html" class="btn btn-outline-light btn-sm mt-2">View Details</a>
                    </div>



                </div>
            </div>
            <div class="col-md-6">
                <div class="image-container">
                    <img src="images/image2.jpg" alt="Image 2" class="img-fluid">
                    <div class="image-overlay d-flex flex-column justify-content-center align-items-center">
                        <span class="overlay-text">Image From America</span>
                        <a href="new_page.html" class="btn btn-outline-light btn-sm mt-2">View Details</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-6">
                <div class="image-container">
                    <img src="images/image3.jpg" alt="Image 3" class="img-fluid">
                    <div class="image-overlay d-flex flex-column justify-content-center align-items-center">
                        <span class="overlay-text">Image From Australia</span>
                        <a href="new_page.html" class="btn btn-outline-light btn-sm mt-2">View Details</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="image-container">
                    <img src="images/image4.jpg" alt="Image 4" class="img-fluid">
                    <div class="image-overlay d-flex flex-column justify-content-center align-items-center">
                        <span class="overlay-text">Image From Venice</span>
                        <a href="new_page.html" class="btn btn-outline-light btn-sm mt-2">View Details</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-6">
                <div class="image-container">
                    <img src="images/image1.jpg" alt="Image 1" class="img-fluid">
                    <div class="image-overlay d-flex flex-column justify-content-center align-items-center">
                        <span class="overlay-text">Image From Greece</span>
                        <a href="new_page.html" class="btn btn-outline-light btn-sm mt-2">View Details</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="image-container">
                    <img src="images/image2.jpg" alt="Image 2" class="img-fluid">
                    <div class="image-overlay d-flex flex-column justify-content-center align-items-center">
                        <span class="overlay-text">Image From America</span>
                        <a href="new_page.html" class="btn btn-outline-light btn-sm mt-2">View Details</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-6">
                <div class="image-container">
                    <img src="images/image3.jpg" alt="Image 3" class="img-fluid">
                    <div class="image-overlay d-flex flex-column justify-content-center align-items-center">
                        <span class="overlay-text">Image From Australia</span>
                        <a href="new_page.html" class="btn btn-outline-light btn-sm mt-2">View Details</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="image-container">
                    <img src="images/image4.jpg" alt="Image 4" class="img-fluid">
                    <div class="image-overlay d-flex flex-column justify-content-center align-items-center">
                        <span class="overlay-text">Image From Venice</span>
                        <a href="new_page.html" class="btn btn-outline-light btn-sm mt-2">View Details</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-6">
                <div class="image-container">
                    <img src="images/image1.jpg" alt="Image 1" class="img-fluid">
                    <div class="image-overlay d-flex flex-column justify-content-center align-items-center">
                        <span class="overlay-text">Image From Greece</span>
                        <a href="new_page.html" class="btn btn-outline-light btn-sm mt-2">View Details</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="image-container">
                    <img src="images/image2.jpg" alt="Image 2" class="img-fluid">
                    <div class="image-overlay d-flex flex-column justify-content-center align-items-center">
                        <span class="overlay-text">Image From America</span>
                        <a href="new_page.html" class="btn btn-outline-light btn-sm mt-2">View Details</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-6">
                <div class="image-container">
                    <img src="images/image3.jpg" alt="Image 3" class="img-fluid">
                    <div class="image-overlay d-flex flex-column justify-content-center align-items-center">
                        <span class="overlay-text">Image From Australia</span>
                        <a href="new_page.html" class="btn btn-outline-light btn-sm mt-2">View Details</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="image-container">
                    <img src="images/image4.jpg" alt="Image 4" class="img-fluid">
                    <div class="image-overlay d-flex flex-column justify-content-center align-items-center">
                        <span class="overlay-text">Image From Venice</span>
                        <a href="new_page.html" class="btn btn-outline-light btn-sm mt-2">View Details</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-6">
                <div class="image-container">
                    <img src="images/image1.jpg" alt="Image 1" class="img-fluid">
                    <div class="image-overlay d-flex flex-column justify-content-center align-items-center">
                        <span class="overlay-text">Image From Greece</span>
                        <a href="new_page.html" class="btn btn-outline-light btn-sm mt-2">View Details</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="image-container">
                    <img src="images/image2.jpg" alt="Image 2" class="img-fluid">
                    <div class="image-overlay d-flex flex-column justify-content-center align-items-center">
                        <span class="overlay-text">Image From America</span>
                        <a href="new_page.html" class="btn btn-outline-light btn-sm mt-2">View Details</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-6">
                <div class="image-container">
                    <img src="images/image3.jpg" alt="Image 3" class="img-fluid">
                    <div class="image-overlay d-flex flex-column justify-content-center align-items-center">
                        <span class="overlay-text">Image From Australia</span>
                        <a href="new_page.html" class="btn btn-outline-light btn-sm mt-2">View Details</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="image-container">
                    <img src="images/image4.jpg" alt="Image 4" class="img-fluid">
                    <div class="image-overlay d-flex flex-column justify-content-center align-items-center">
                        <span class="overlay-text">Image From Venice</span>
                        <a href="new_page.html" class="btn btn-outline-light btn-sm mt-2">View Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('includes.footer')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>

</body>

</html>