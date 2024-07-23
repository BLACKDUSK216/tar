<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookings List</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
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
    <div class="sidebar">
        @include('includes.adminheader')
    </div>
    <div class="content">
        <h1>Bookings List</h1>

        <button class="btn btn-success" data-toggle="modal" data-target="#addBookingModal"
            style="position:absolute;right:20px;top:35px;">Add Booking</button>

        <table class="table">
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Destination ID</th>
                    <th>Booking Date</th>
                    <th>Travel Date</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="bookingsTable">
                @foreach($bookings as $booking)
                    <tr id="booking-{{ $booking->booking_id }}">
                        <td>{{ $booking->booking_id }}</td>
                        <td>{{ $booking->destination_id }}</td>
                        <td>{{ $booking->booking_date }}</td>
                        <td>{{ $booking->travel_date }}</td>
                        <td>{{ $booking->status }}</td>
                        <td>{{ $booking->created_at }}</td>
                        <td>{{ $booking->updated_at }}</td>
                        <td>
                            <button class="btn btn-primary edit-booking" data-id="{{ $booking->booking_id }}">Edit</button>
                            <button class="btn btn-danger delete-booking"
                                data-id="{{ $booking->booking_id }}">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Add Booking Modal -->
    <div class="modal fade" id="addBookingModal" tabindex="-1" aria-labelledby="addBookingModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addBookingModalLabel">Add Booking</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addBookingForm">
                        @csrf
                        <div class="form-group">
                            <label for="id">User ID</label>
                            <input type="number" class="form-control" id="id" name="id" required>
                        </div>
                        <div class="form-group">
                            <label for="destination_id">Destination ID</label>
                            <input type="number" class="form-control" id="destination_id" name="destination_id"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="booking_date">Booking Date</label>
                            <input type="datetime-local" class="form-control" id="booking_date" name="booking_date"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="travel_date">Travel Date</label>
                            <input type="date" class="form-control" id="travel_date" name="travel_date" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="text" class="form-control" id="status" name="status" maxlength="20" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Booking</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Booking Modal -->
    <div class="modal fade" id="editBookingModal" tabindex="-1" aria-labelledby="editBookingModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editBookingModalLabel">Edit Booking</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editBookingForm">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="edit_booking_id" name="booking_id">
                        <div class="form-group">
                            <label for="edit_id">User ID</label>
                            <input type="number" class="form-control" id="edit_id" name="id" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_destination_id">Destination ID</label>
                            <input type="number" class="form-control" id="edit_destination_id" name="destination_id"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="edit_booking_date">Booking Date</label>
                            <input type="datetime-local" class="form-control" id="edit_booking_date" name="booking_date"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="edit_travel_date">Travel Date</label>
                            <input type="date" class="form-control" id="edit_travel_date" name="travel_date" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_status">Status</label>
                            <input type="text" class="form-control" id="edit_status" name="status" maxlength="20"
                                required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Booking</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function () {
            // Add Booking
            $('#addBookingForm').on('submit', function (e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: '{{ route("admin.bookings.store") }}',
                    data: $(this).serialize(),
                    success: function (response) {
                        location.reload();
                    },
                    error: function (xhr, status, error) {
                        console.error('XHR:', xhr);
                        console.error('Status:', status);
                        console.error('Error:', error);
                        alert('An error occurred. Please try again.');
                    }
                });
            });

            // Edit Booking
            $('.edit-booking').on('click', function () {
                var bookingId = $(this).data('id');
                $.get('{{ route("admin.bookings.edit", ":id") }}'.replace(':id', bookingId), function (data) {
                    $('#editBookingModal').modal('show');
                    $('#edit_booking_id').val(data.booking_id);
                    $('#edit_id').val(data.id);
                    $('#edit_destination_id').val(data.destination_id);
                    $('#edit_booking_date').val(data.booking_date.replace(" ", "T"));
                    $('#edit_travel_date').val(data.travel_date);
                    $('#edit_status').val(data.status);
                });
            });

            $('#editBookingForm').on('submit', function (e) {
                e.preventDefault();
                var bookingId = $('#edit_booking_id').val();
                $.ajax({
                    type: 'PUT',
                    url: '{{ route("admin.bookings.update", ":id") }}'.replace(':id', bookingId),
                    data: $(this).serialize(),
                    success: function (response) {
                        location.reload();
                    },
                    error: function (response) {
                        if (response.status === 422) {
                            var errors = response.responseJSON.errors;
                            var errorMessages = '';
                            for (var key in errors) {
                                if (errors.hasOwnProperty(key)) {
                                    errorMessages += errors[key][0] + '\n';
                                }
                            }
                            alert('Validation Error:\n' + errorMessages);
                        } else {
                            console.error(response);
                            alert('An error occurred. Please try again.');
                        }
                    }
                });
            });

            // Delete Booking
            $('.delete-booking').on('click', function () {
                var bookingId = $(this).data('id');
                if (confirm('Are you sure you want to delete this booking?')) {
                    $.ajax({
                        type: 'DELETE',
                        url: '{{ route("admin.bookings.destroy", ":id") }}'.replace(':id', bookingId),
                        data: {
                            '_token': '{{ csrf_token() }}'
                        },
                        success: function (response) {
                            $('#booking-' + bookingId).remove();
                        },
                        error: function (response) {
                            alert(response.responseJSON.error);
                        }
                    });
                }
            });
        });


    </script>
</body>

</html>