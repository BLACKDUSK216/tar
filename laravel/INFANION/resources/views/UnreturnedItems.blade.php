<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unreturned Items</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
        <a class="navbar-brand" href="{{ route('DashBoard') }}">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('company.info') }}">Company Info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('employee') }}">Employee</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('inventory') }}">Inventory</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('vendors') }}">Vendors</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('employeeinventory') }}">Employee Inventory</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('unreturneditems') }}">Unreturned Items</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-3">
        <h1>Unreturned Items Information</h1>
        
        <table class="table">
            <thead>
                <tr>
                    <th>Employee ID</th>
                    <th>Employee Name</th>
                    <th>Item ID</th>
                    <th>Item Name</th>
                    <th><button id="myBtn" class="btn btn-primary">Add Unreturned Items</button></th>

                </tr>
            </thead>
            <tbody>
                @foreach($UnreturnedItems as $UnreturnedItems)
                    <tr>
                        <td>{{ $UnreturnedItems->EmployeeID }}</td>
                        <td>{{ $UnreturnedItems->EmployeeName }}</td>
                        <td>{{ $UnreturnedItems->ItemID }}</td>
                        <td>{{ $UnreturnedItems->ItemName }}</td>
                        <td>
                            <a href="{{ route('delete.UnreturnedItems', ['id' => $UnreturnedItems->id]) }}" class="btn btn-danger">
                                <i class="fa-solid fa-trash-can"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div id="addUnreturnedItemsModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('addUnreturnedItemsModal')">&times;</span>
        <form action="{{ route('add.UnreturnedItems') }}" method="post" class="user-card">
            @csrf
            <h3>Add Unreturned Items</h3>
            <div class="form-group">
                <label for="new_EmployeeName">Employee Name:</label>
                <select class="form-control" name="new_EmployeeName" required>
                    @foreach($employees as $employee)
                        <option value="{{ $employee->EmployeeName }}">{{ $employee->EmployeeName }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="new_ItemName">Item Name:</label>
                <select class="form-control" name="new_ItemName" required>
                    @foreach($inventoryItems as $item)
                        <option value="{{ $item->ItemName }}">{{ $item->ItemName }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-info" name="add_UnreturnedItems">Add Unreturned Items</button>
        </form>
    </div>
</div>
</div>
    </div>
  <style>
        .modal {
            z-index: 1;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>

<script>
        var modal = document.getElementById("addUnreturnedItemsModal");
        var btn = document.getElementById("myBtn");
        var span = document.getElementsByClassName("close")[0];

        btn.onclick = function () {
            modal.style.display = "block";
        }

        span.onclick = function () {
            modal.style.display = "none";
        }

        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = "none";
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
