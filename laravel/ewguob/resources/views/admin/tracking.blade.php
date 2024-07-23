<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Tracking</title>
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
<div class="sidebar">
    @include('includes.adminheader')
    </div>
    <div class="content">

    <h1>Live Tracking</h1>

    @if($trackingData->isEmpty())
        <p>No tracking data found.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Tracking ID</th>
                    <th>Entity ID</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Timestamp</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($trackingData as $tracking)
                    <tr>
                        <td>{{ $tracking->tracking_id }}</td>
                        <td>{{ $tracking->entity_id }}</td>
                        <td>{{ $tracking->latitude }}</td>
                        <td>{{ $tracking->longitude }}</td>
                        <td>{{ $tracking->timestamp }}</td>
                        <td>{{ $tracking->status }}</td>
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
