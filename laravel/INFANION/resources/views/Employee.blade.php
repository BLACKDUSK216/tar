<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Info</title>
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
        <h1>Employee Information</h1>
        
        <table class="table">
            <thead>
                <tr>
                    <th>Employee ID</th>
                    <th>Employee Name</th>
                    <th>Department</th>
                    <th>Position</th>
                    <th><button id="myBtn" class="btn btn-primary">Add Employee</button></th>
                </tr>
            </thead>
            <tbody>
                @foreach($Employee as $Employee)
                    <tr>
                        <td>{{ $Employee->EmployeeID }}</td>
                        <td>{{ $Employee->EmployeeName }}</td>
                        <td>{{ $Employee->Department }}</td>
                        <td>{{ $Employee->Position }}</td>
                        <td>
                        <button onclick="openEditModal('{{ $Employee->EmployeeID }}')"
                            class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></button>
                        <a href="{{ route('delete.employee', ['id' => $Employee->EmployeeID]) }}"
                            class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal('myModal')">&times;</span>
                <form action="{{ route('add.employee') }}" method="post" class="user-card">
                    @csrf
                    <h3>Add Employee</h3>
                    <div class="form-group">
                        <label for="new_EmployeeId">Employee ID:</label>
                        <input type="text" class="form-control" name="new_EmployeeId" required
                            placeholder="Enter Employee ID">
                    </div>
                    <div class="form-group">
                        <label for="new_EmployeeName">Employee Name:</label>
                        <input type="text" class="form-control" name="new_EmployeeName" required
                            placeholder="Enter Employee name">
                    </div>
                    <div class="form-group">
                        <label for="new_Department">Department:</label>
                        <input type="text" class="form-control" name="new_Department" required
                            placeholder="Enter Department">
                    </div>
                    <div class="form-group">
                        <label for="new_Position">Position:</label>
                        <input type="text" class="form-control" name="new_Position" required
                            placeholder="Enter Position">
                    </div>
                    <button type="submit" class="btn btn-info" name="add_Employee">Add Employee</button>
                </form>
            </div>
        </div>

        <div id="editEmployeeModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal('editEmployeeModal')">&times;</span>
                <form action="{{ route('edit.employee') }}" method="post" class="user-card">
                    @csrf
                    <h3>Edit Employee</h3>
                    <input type="hidden" name="edit_EmployeeId" id="edit_EmployeeId" value="">
                    <div class="form-group">
                        <label for="edit_EmployeeName">Employee Name:</label>
                        <input type="text" class="form-control" name="edit_EmployeeName" id="edit_EmployeeName" required
                            placeholder="Enter Employee name">
                    </div>
                    <div class="form-group">
                        <label for="edit_Department">Department:</label>
                        <input type="text" class="form-control" name="edit_Department" id="edit_Department" required
                            placeholder="Enter Department">
                    </div>
                    <div class="form-group">
                        <label for="edit_Position">Position:</label>
                        <input type="text" class="form-control" name="edit_Position" id="edit_Position" required
                            placeholder="Enter Position">
                    </div>
                    <button type="submit" class="btn btn-info" name="edit_Employee">Save Changes</button>
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
        var modal = document.getElementById("myModal");
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

        function openEditModal(EmployeeId) {
            document.getElementById("editEmployeeModal").style.display = "block";
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = "none";
        }
        function openEditModal(EmployeeId) {
     fetch('/get-Employee-details/' + EmployeeId)
        .then(response => response.json())
        .then(data => {
            document.getElementById("edit_EmployeeId").value = EmployeeId;
            document.getElementById("edit_EmployeeName").value = data.EmployeeName;
            document.getElementById("edit_Department").value = data.Department;
            document.getElementById("edit_Position").value = data.Position;
            document.getElementById("editEmployeeModal").style.display = "block";
        })
        .catch(error => {
            console.error('Error fetching Employee details:', error);
        });
}

    </script>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
