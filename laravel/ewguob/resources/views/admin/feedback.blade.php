<!DOCTYPE html>
<html lang="en">
<head>
<title>Feedbacks</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
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
    <h1>Feedbacks</h1>

    @if($feedbacks->isEmpty())
        <p>No feedbacks found.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Feedback ID</th>
                    <th>Employee ID</th>
                    <th>Booking ID</th>
                    <th>User ID</th>
                    <th>Rating</th>
                    <th>Comment</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($feedbacks as $feedback)
                    <tr>
                        <td>{{ $feedback->feedback_id }}</td>
                        <td>{{ $feedback->employee_id }}</td>
                        <td>{{ $feedback->booking_id }}</td>
                        <td>{{ $feedback->user_id }}</td>
                        <td>{{ $feedback->rating }}</td>
                        <td>{{ $feedback->comment }}</td>
                        <td>{{ $feedback->created_at }}</td>
                        <td>{{ $feedback->updated_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>
