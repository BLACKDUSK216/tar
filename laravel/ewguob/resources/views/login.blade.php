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
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(5px);
        }

        .modal-content {
            background-color: rgba(255, 255, 255, 0.3);
            margin: 2% auto;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            max-width: 550px;
            position: relative;
        }

        .close {
            position: absolute;
            top: 10px;
            right: 20px;
            color: #aaa;
            font-size: 28px;
            font-weight: bold;
            padding: 8px;
            cursor: pointer;
            background-color: rgba(255, 255, 255, 0.5);
            border-radius: 50%;
        }

        .close:hover,
        .close:focus {
            color: black;
        }

        .modal-content h2 {
            margin-top: 0;
        }

        .modal-content input[type=text],
        .modal-content input[type=email],
        .modal-content input[type=password] {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 8px 0;
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 6px;
            background-color: rgba(255, 255, 255, 0.8);
        }

        .modal-content button[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            float: left;
            transition: background-color 0.3s ease;
        }

        .modal-content button[type=submit]:hover {
            background-color: #45a049;
        }

        .social-btn {
            text-align: center;
            margin-top: 20px;
        }

        .social-btn .google-btn {
            display: inline-block;
            background-color: #dd4b39;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 6px;
            transition: background-color 0.3s ease;
            position: absolute;
            bottom: 0px;
            right: 40px;

        }

        .social-btn .google-btn:hover {
            background-color: #c23321;
        }

        @media screen and (max-width: 700px) {
            .modal-content {
                width: 90%;
            }
        }

        @media screen and (max-width: 400px) {
            .modal-content {
                width: 95%;
            }
        }


        .password-container {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }

        .password-toggle i {
            color: #888;
            position: absolute;
            bottom: 0px;
            right: 0px;
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
                    <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Email" required
                        autofocus>
                </div>
                <div class="password-container">
                    <input id="password" class="form-input" type="password" name="password" placeholder="Password"
                        required> <span class="password-toggle" onclick="togglePassword()">
                        <i class="fas fa-eye" id="toggleIcon"></i>
                    </span>
                </div>
                <div>
                    <button type="submit">Login</button>
                </div>
            </form>
            @if(session('message'))
                <div class="alert alert-danger" role="alert"
                    style="color: red; background-color: transparent; padding: 10px; border-radius: 5px; text-align: center; margin-top: 20px;">
                    {{ session('message') }}
                </div>
            @endif
            @if(session('message1'))
                <div class="alert alert-danger" role="alert"
                    style="color:white; background-color: transparent; padding: 10px; border-radius: 5px; text-align: center; margin-top: 20px;">
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
                <input type="email" name="email" id="email" value="{{ old('name') }}" placeholder="Email" required>
                <span id="email-error" style="color: red;"></span>
                <div>
                    <input id="password" type="password" name="password" placeholder="Password" required>
                </div>
                <div>
                    <input id="password-confirm" type="password" name="password_confirmation"
                        placeholder="Confirm Password" required>
                </div>
                <div class="signup-btn">
                    <button type="submit">Sign Up</button>
                </div>
            </form>
            <div class="social-btn">
                <a href="{{ route('social.login', ['provider' => 'google']) }}" class="google-btn">Sign Up with
                    Google</a>
            </div>
        </div>
    </div>

    <script>
        var modal = document.getElementById("signupModal");
        var btn = document.getElementById("signup-btn");
        var span = document.getElementsByClassName("close")[0];

        btn.onclick = function () {
            modal.style.display = "block";
            setTimeout(function () {
                modal.querySelector('.modal-content').style.transform = "translateY(0)";
            }, 50);
        }

        span.onclick = function () {
            modal.querySelector('.modal-content').style.transform = "translateY(-200%)";
            setTimeout(function () {
                modal.style.display = "none";
            }, 300);
        }

        window.onclick = function (event) {
            if (event.target == modal) {
                modal.querySelector('.modal-content').style.transform = "translateY(-200%)";
                setTimeout(function () {
                    modal.style.display = "none";
                }, 300);
            }
        }
        function togglePassword() {
            var passwordInput = document.getElementById("password");
            var toggleIcon = document.getElementById("toggleIcon");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleIcon.classList.remove("fa-eye");
                toggleIcon.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                toggleIcon.classList.remove("fa-eye-slash");
                toggleIcon.classList.add("fa-eye");
            }
            passwordInput.style.width = "100%";
            passwordInput.style.boxSizing = "border-box";
            passwordInput.style.padding = "10px";
            passwordInput.style.marginBottom = "15px";
            passwordInput.style.border = "1px solid #ccc";
            passwordInput.style.borderRadius = "5px";
        }
        $(document).ready(function () {
            $('#email').on('blur', function () {
                var email = $(this).val();
                $.ajax({
                    url: '{{ route("check.email") }}',
                    method: 'GET',
                    data: { email: email },
                    success: function (response) {
                        if (response.exists) {
                            $('#email-error').text('Email already exists. Please log in.');
                        } else {
                            $('#email-error').text('');
                        }
                    }
                });
            });
        });
    </script>
    @include('includes.footer')


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>

</html>