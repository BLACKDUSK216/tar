<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
    <div class="sidebar">
    @include('includes.adminheader')
    </div>

    <div class="content">
        <h2>Dashboard</h2>
        <p>Welcome to the travel admin dashboard!</p>

        <div class="row">
            <div class="col-md-3">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Bookings</h5>
                        <p class="card-text">Manage and view bookings.</p>
                        <a href="{{ route('admin.bookings') }}" class="btn btn-primary btn-lg">Go to Bookings</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Destinations</h5>
                        <p class="card-text">View and manage destinations.</p>
                        <a href="{{ route('admin.destinations') }}" class="btn btn-primary btn-lg">Go to Destinations</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Users</h5>
                        <p class="card-text">Manage user accounts.</p>
                        <a href="{{ route('admin.users') }}" class="btn btn-primary btn-lg">Go to Users</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Live Tracking</h5>
                        <p class="card-text">Track live status.</p>
                        <a href="{{ route('admin.tracking') }}" class="btn btn-primary btn-lg">Go to Tracking</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Employees</h5>
                        <p class="card-text">Manage employee details.</p>
                        <a href="{{ route('admin.employee') }}" class="btn btn-primary btn-lg">Go to Employees</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Blog Vault</h5>
                        <p class="card-text">Manage Blog details.</p>
                        <a href="{{ route('admin.employee') }}" class="btn btn-primary btn-lg">Go to BlogVault</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Comments</h5>
                        <p class="card-text">Manage Comment details.</p>
                        <a href="{{ route('admin.employee') }}" class="btn btn-primary btn-lg">Go to Comments</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Feedback</h5>
                        <p class="card-text">View user feedback.</p>
                        <a href="{{ route('admin.feedback') }}" class="btn btn-primary btn-lg">Go to Feedback</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>
