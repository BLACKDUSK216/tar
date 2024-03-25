<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Inventory</title>
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
        <h1>Employee Inventory Information</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>Employee Name</th>
                    <th>Item Name</th>
                    <th>ReceivedDate</th>
                    <th>ReturnDate</th>
                    <th><button id="myBtn" class="btn btn-primary">Add Employee Inventory</button></th>
                </tr>
            </thead>
            <tbody>
                @foreach($EmployeeInventory as $employeeInventory)
                    <tr>
                        <td>{{ $employeeInventory->EmployeeName }}</td>
                        <td>{{ $employeeInventory->ItemName }}</td>
                        <td>{{ $employeeInventory->ReceivedDate }}</td>
                        <td>{{ $employeeInventory->ReturnDate }}</td>
                        <td>
                            <a href="{{ route('delete.employeeinventory', ['name' => $employeeInventory->id]) }}" class="btn btn-danger">
                                <i class="fa-solid fa-trash-can"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div id="addEmployeeInventoryModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('addEmployeeInventoryModal')">&times;</span>
        <form action="{{ route('add.employeeinventory') }}" method="post" class="user-card">
            @csrf
            <h3>Add Employee Inventory</h3>
            <div class="form-group">
                <label for="newEmployeeName">Employee Name:</label>
                <select class="form-control" name="newEmployeeName" required>
                    @foreach($employees as $employee)
                        <option value="{{ $employee->EmployeeName }}">{{ $employee->EmployeeName }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="newItemName">Item Name:</label>
                <select class="form-control" name="newItemName" required>
                    @foreach($inventoryItems as $item)
                        <option value="{{ $item->ItemName }}">{{ $item->ItemName }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="new_ReceivedDate">Received Date:</label>
                <input type="date" class="form-control" name="new_ReceivedDate" required placeholder="Enter Received Date">
            </div>
            <div class="form-group">
    <label for="new_ReturnDate">Return Date:</label>
    <div class="input-group">
        <input type="date" class="form-control" name="new_ReturnDate">
        <div class="input-group-append">
            <div class="input-group-text">
                <input type="checkbox" id="didNotReturn" name="didNotReturn">
                <label for="didNotReturn">Did Not Return</label>
            </div>
        </div>
    </div>
</div>
            <button type="submit" class="btn btn-info" name="add_EmployeeInventory">Add Employee Inventory</button>
        </form>
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
        var modal = document.getElementById("addEmployeeInventoryModal");
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
