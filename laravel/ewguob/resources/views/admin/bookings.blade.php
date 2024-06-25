<!-- resources/views/admin/bookings.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee List</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
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

<h1>Bookings List</h1>

<table>
    <thead>
        <tr>
            <th>Booking ID</th>
            <th>Destination Name</th>
            <th>Booking Date</th>
            <th>Travel Date</th>
            <th>Status</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
    </thead>
    <tbody>
        @foreach($bookings as $booking)
            <tr>
                <td>{{ $booking->booking_id }}</td>
                <td>{{ $booking->destination_name }}</td>
                <td>{{ $booking->booking_date }}</td>
                <td>{{ $booking->travel_date }}</td>
                <td>{{ $booking->status }}</td>
                <td>{{ $booking->created_at }}</td>
                <td>{{ $booking->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/admin.js') }}"></script>

</body>
</html>
