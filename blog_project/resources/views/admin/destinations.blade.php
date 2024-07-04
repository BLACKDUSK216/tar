<!-- destinations.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destination List</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <style>

        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        img {
            max-width: 100px;
            max-height: 100px;
        }
    </style>
</head>
<body>
<div class="sidebar">
    @include('includes.adminheader')
    </div>

    <div class="content">
    <h1>Destinations</h1>

    @if($destinations->isEmpty())
        <p>No destinations found.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Image</th>
                    <th>Average Rating</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($destinations as $destination)
                    <tr>
                        <td>{{ $destination->destination_id }}</td>
                        <td>{{ $destination->name }}</td>
                        <td>{{ $destination->location }}</td>
                        <td><img src="{{ $destination->image_url }}" alt="{{ $destination->name }}"></td>
                        <td>{{ $destination->average_rating }}</td>
                        <td>{{ $destination->created_at }}</td>
                        <td>{{ $destination->updated_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>
