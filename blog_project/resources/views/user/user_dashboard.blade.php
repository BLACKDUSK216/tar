<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">

</head>
<body>
    <div class="sidebar">
        <h2>User Dashboard</h2>
        <ul>
            <h3>Welcome, {{ $username }}!</h3> 
            <li><a href="#">Profile</a></li>
            <li><a href="#">Bookings</a></li>
            <li><a href="#">Payments</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Help</a></li>
            <li><a href="{{ route('logout') }}">Logout</a></li>
        </ul>
    </div>

    <div class="content">
        <h2>Welcome to Your Dashboard</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Profile</h5>
                        <p class="card-text">View and update your profile.</p>
                        <a href="#" class="btn btn-primary btn-lg">Go to Profile</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Bookings</h5>
                        <p class="card-text">View your bookings and reservations.</p>
                        <a href="#" class="btn btn-primary btn-lg">Go to Bookings</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Payments</h5>
                        <p class="card-text">Manage your payment methods.</p>
                        <a href="#" class="btn btn-primary btn-lg">Go to Payments</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Blogs</h5>
                        <p class="card-text">Manage your Blogs.</p>
                        <a href="#" class="btn btn-primary btn-lg">Go to Blogs</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function setCookie(name, value, minutes) {
            var expires = "";
            if (minutes) {
                var date = new Date();
                date.setTime(date.getTime() + (minutes * 60 * 1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + (value || "")  + expires + "; path=/";
        }

        function getCookie(name) {
            var nameEQ = name + "=";
            var ca = document.cookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') c = c.substring(1, c.length);
                if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
            }
            return null;
        }

        function eraseCookie(name) {   
            document.cookie = name + '=; Max-Age=-99999999;';  
        }

        var checkInterval = setInterval(function() {
            if (getCookie('user_id')) {
                setCookie('user_id', getCookie('user_id'), 30);
            } else {
                clearInterval(checkInterval);
                alert('Your session has expired');
                eraseCookie('user_id');
                eraseCookie('user_name');
                window.location.href = '{{ route("logout") }}';
            }
        }, 9000000); 
    </script>
</body>
</html>
