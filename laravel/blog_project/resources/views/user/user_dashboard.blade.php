<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #1e1e1e;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #ffffff;
        }

        .sidebar {
            background-color: #2c2c2c;
            color: #ffffff;
            height: 100vh;
            padding-top: 20px;
            transition: all 0.3s;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 24px;
            letter-spacing: 1px;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar ul li {
            margin-bottom: 10px;
        }

        .sidebar ul li a {
            color: #ffffff;
            text-decoration: none;
            display: block;
            padding: 10px;
            transition: background-color 0.3s;
        }

        .sidebar ul li a:hover {
            background-color: #3d3d3d;
            border-left: 5px solid #007bff;
            padding-left: 15px;
        }

        .content {
            padding: 20px;
            opacity: 0.9;
        }

        .card {
            margin-bottom: 20px;
            border: none;
            background-color: #333333;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 1.8rem;
            margin-bottom: 15px;
            color: #ffffff;
        }

        .card-text {
            font-size: 1rem;
            margin-bottom: 20px;
            color: #ffffff;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 sidebar">
                <h2>User Dashboard</h2>
                <ul>
                    <h3>Welcome, {{ $username }}!</h3>
                    <li><a href="#">Profile</a></li>
                    <li><a href="#">Bookings</a></li>
                    <li><a href="#">Payments</a></li>
                    <li><a href="{{ route('user.user_blogs') }}">Blogs</a></li>
                    <li><a href="#">Settings</a></li>
                    <li><a href="#">Help</a></li>
                    <li><a href="{{ route('logout') }}">Logout</a></li>
                </ul>
            </div>

            <div class="col-md-9 content">
                <h2>Welcome to Your Futuristic Dashboard</h2>
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
                                <a href="{{ route('user.user_blogs') }}" class="btn btn-primary btn-lg">Go to Blogs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>