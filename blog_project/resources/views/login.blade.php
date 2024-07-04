<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin:-3% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            transform: translateY(-200%);
            transition: transform 0.3s ease-out;
        }

        .modal.show-modal {
            transform: translateY(0);
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div id="video-container">
            <video autoplay muted loop id="video-bg">
                <source src="{{ asset('videos/ken.mp4') }}" type="video/mp4">
                Your browser does not support HTML5 video.
            </video>
        </div>
        <div id="login-form">
            <h2>Login</h2>
            <form method="POST" action="{{ url('login') }}">
                @csrf
                <div>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
                </div>
                <div>
                    <input id="password" type="password" name="password" placeholder="Password" required>
                </div>
                <div>
                    <button type="submit">Login</button>
                </div>
            </form>
            @if(session('message'))
            <div class="alert alert-danger" role="alert" style="color: red; background-color: transparent; padding: 10px; border-radius: 5px; text-align: center; margin-top: 20px;">
                {{ session('message') }}
            </div>
            @endif
            @if(session('message1'))
            <div class="alert alert-danger" role="alert" style="color:white; background-color: transparent; padding: 10px; border-radius: 5px; text-align: center; margin-top: 20px;">
                {{ session('message1') }}
            </div>
            @endif
            <div class="home-link">
                <a href="{{ route('home') }}">Return to Home Page</a>
            </div>
            <div class="home-link">
                <a href="javascript:void(0)" id="signup-btn">Don't have an account? Sign Up</a>
            </div>
        </div>
        <div class="right-heading">
            <h1>Lorem ipsum dolor sit amet consectetur.</h1>
            <div class="social-icons">
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-pinterest"></i></a>
            </div>
        </div>
    </div>

    <div id="signupModal" class="modal">
        <div class="modal-content green-theme">
            <span class="close">&times;</span>
            <h2>Sign Up</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" placeholder="Name" required>
                </div>
                <div>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Email" required>
                </div>
                <div>
                    <input id="password" type="password" name="password" placeholder="Password" required>
                </div>
                <div>
                    <input id="password-confirm" type="password" name="password_confirmation" placeholder="Confirm Password" required>
                </div>
                <div class="signup-btn">
                    <button type="submit">Sign Up</button>
                </div>
            </form>
            <div class="social-btn">
              <a href="{{ route('social.login', ['provider' => 'google']) }}" class="google-btn">Sign Up with Google</a>
            </div>
        </div>
    </div>

    <script>
        var modal = document.getElementById("signupModal");
        var btn = document.getElementById("signup-btn");
        var span = document.getElementsByClassName("close")[0];
        
        btn.onclick = function() {
            modal.style.display = "block";
            setTimeout(function() {
                modal.querySelector('.modal-content').style.transform = "translateY(0)";
            }, 50);
        }

        span.onclick = function() {
            modal.querySelector('.modal-content').style.transform = "translateY(-200%)";
            setTimeout(function() {
                modal.style.display = "none";
            }, 300);
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.querySelector('.modal-content').style.transform = "translateY(-200%)";
                setTimeout(function() {
                    modal.style.display = "none";
                }, 300);
            }
        }
    </script>
    @include('includes.footer')
</body>
</html>
