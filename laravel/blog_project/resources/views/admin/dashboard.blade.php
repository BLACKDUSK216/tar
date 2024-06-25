<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <style>
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideInUp {
            from { transform: translateY(100%); }
            to { transform: translateY(0); }
        }

        @keyframes zoomIn {
            from { transform: scale(0); }
            to { transform: scale(1); }
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-30px);
            }
            60% {
                transform: translateY(-15px);
            }
        }

        .card h1 {
            animation: fadeIn 1s ease-in-out;
        }

        .card i {
            animation: slideInUp 1s ease-in-out;
        }

        .card p {
            animation: zoomIn 1s ease-in-out;
        }

        .card {
            overflow: hidden;
            position: relative;
            height: 100%;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .card:hover .widget i {
            animation: bounce 2s infinite;
        }

        .card .card-body {
            font-size: x-small;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
            height: 100%;
        }

        .widget {
            margin-top: auto;
            text-align: center;
            animation: fadeIn 1s ease-in-out;
        }

        .widget i {
            font-size: 2em;
        }

        .widget .value {
            font-size: 1.5em;
            font-weight: bold;
            margin-top: 5px;
        }

        .pie-chart {
            width: 100px;
            height: 100px;
            background: conic-gradient(
                #4caf50 0% 75%,
                #ccc 75% 100%
            );
            border-radius: 50%;
            margin: 10px auto;
        }

        .counter {
            font-size: 1.5em;
            font-weight: bold;
            margin: 10px 0;
        }

        .spinner {
            width: 40px;
            height: 40px;
            border: 4px solid #ccc;
            border-top: 4px solid #007bff;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 10px auto;
        }

        .bar {
            width: 100%;
            height: 20px;
            background: linear-gradient(90deg, #4caf50 75%, #ccc 25%);
            margin: 10px auto;
        }

        .gauge {
            width: 100px;
            height: 50px;
            background: linear-gradient(90deg, #4caf50 60%, #ffeb3b 30%, #f44336 10%);
            border-radius: 100%/50%;
            margin: 10px auto;
        }

        .activity {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 10px solid #ccc;
            border-top: 10px solid #4caf50;
            animation: spin 2s linear infinite;
            margin: 10px auto;
        }

        .bar-chart {
            width: 100%;
            height: 100px;
            margin: 10px auto;
            display: flex;
            justify-content: space-around;
            align-items: flex-end;
        }

        .bar-chart div {
            width: 20px;
            height: 60px;
            background-color: #4caf50;
            transition: height 0.5s ease-in-out;
        }

        .bar-chart div:hover {
            height: 100px;
        }

        .map-widget {
            width: 100%;
            height: 150px;
            background: url('https://via.placeholder.com/300x150') no-repeat center center;
            background-size: cover;
            margin: 10px auto;
            border-radius: 5px;
            position: relative;
        }

        .map-widget .route {
            position: absolute;
            width: 2px;
            height: 100px;
            background: #007bff;
            left: 50%;
            top: 10%;
            transform: rotate(45deg);
            transform-origin: top left;
        }

        .map-widget .marker {
            position: absolute;
            width: 10px;
            height: 10px;
            background: red;
            border-radius: 50%;
            top: 20%;
            left: 50%;
            transform: translate(-50%, -50%);
            animation: bounce 2s infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body class="light-theme">
    <header class="text-center">
        <h1 class="mt-3 mb-2">Travel Admin Dashboard</h1>
        <nav>
            <ul class="nav nav-pills mb-3">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.bookings') }}">Bookings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.destinations') }}">Destinations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.users') }}">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.tracking') }}">Live tracking</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.employee') }}">Employees</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.feedback') }}">Feedback</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                </li>
                <li class="nav-item ml-auto">
                    <button class="btn btn-sm btn-outline-dark" id="theme-toggle"><i class="fa fa-toggle-off"></i></button>
                </li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <div class="row mt-2">
            <div class="col-md-7">
                <div class="row">
                    <div class="col-md-4 mb-2 mx-0">
                        <a href="{{ route('admin.bookings') }}">
                            <div class="card">
                                <div class="card-body">
                                    <i class="fas fa-calendar-check fa-2x mt-2"></i>
                                    <h1>Bookings</h1>
                                    <p>Manage all bookings</p>
                                    <div class="widget">
                                        <div class="pie-chart"></div>
                                        <div class="value">324</div>
                                        <div class="text-muted">Completed</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-8 mb-2 p-0">
                        <a href="{{ route('admin.users') }}">
                            <div class="card">
                                <div class="card-body">
                                    <i class="fas fa-users fa-2x"></i>
                                    <h1>Users</h1>
                                    <p>View and manage users</p>
                                    <div class="widget">
                                        <div class="bar-chart">
                                            <div style="height: 50px;"></div>
                                            <div style="height: 70px;"></div>
                                            <div style="height: 80px;"></div>
                                            <div style="height: 90px;"></div>
                                            <div style="height: 60px;"></div>
                                        </div>
                                        <div class="text-muted">User growth</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-8 mb-2">
                        <a href="{{ route('admin.feedback') }}">
                            <div class="card">
                                <div class="card-body">
                                    <i class="fas fa-comments fa-2x"></i>
                                    <h1>Feedback</h1>
                                    <p>Read user feedback</p>
                                    <div class="widget">
                                        <div class="activity"></div>
                                        <div class="value">48</div>
                                        <div class="text-muted">New</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 mb-2 p-0">
                        <a href="{{ route('admin.destinations') }}">
                            <div class="card">
                                <div class="card-body">
                                    <i class="fas fa-map-marker-alt fa-2x"></i>
                                    <h1>Destinations</h1>
                                    <p>Manage destinations</p>
                                    <div class="widget">
                                        <div class="bar"></div>
                                        <div class="value">24</div>
                                        <div class="text-muted">Destinations</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-12 mb-2 p-0">
                        <a href="{{ route('admin.employee') }}">
                            <div class="card card-2">
                                <div class="card-body">
                                    <i class="fas fa-briefcase fa-2x"></i>
                                    <h1>Employees</h1>
                                    <p>Manage employees</p>
                                    <div class="widget">
                                        <div class="gauge"></div>
                                        <div class="value">50</div>
                                        <div class="text-muted">Active</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <a href="{{ route('admin.tracking') }}">
                    <div class="card card-1">
                        <div class="card-body">
                            <i class="fas fa-map fa-3x"></i>
                            <h1>Live Tracking</h1>
                            <p>Track live activities</p>
                            <div class="widget">
                                <div class="map-widget">
                                    <div class="route"></div>
                                    <div class="marker"></div>
                                </div>
                                <div class="value">24</div>
                                <div class="text-muted">Active routes</div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    @include('includes.footer')


    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>
