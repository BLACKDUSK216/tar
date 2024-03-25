<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendors</title>
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
        <h1>Vendors Information</h1>
        
        <table class="table">
            <thead>
                <tr>
                    <th>Vendors ID</th>
                    <th>Vendors Name</th>
                    <th>ContactPerson</th>
                    <th>ContactNumber</th>
                    <th><button id="myBtn" class="btn btn-primary">Add Vendor</button></th>

                </tr>
            </thead>
            <tbody>
                @foreach($Vendors as $Vendors)
                    <tr>
                        <td>{{ $Vendors->VendorID }}</td>
                        <td>{{ $Vendors->VendorName }}</td>
                        <td>{{ $Vendors->ContactPerson }}</td>
                        <td>{{ $Vendors->ContactNumber }}</td>
                        <td>
                        <button onclick="openEditModal('{{ $Vendors->VendorID }}')" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></button>
<a href="{{ route('delete.vendor', ['id' => $Vendors->VendorID]) }}" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>

                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal('myModal')">&times;</span>
                <form action="{{ route('add.vendor') }}" method="post" class="user-card">
                    @csrf
                    <h3>Add Vendor</h3>
                    <div class="form-group">
                        <label for="new_VendorId">Vendor ID:</label>
                        <input type="number" class="form-control" name="new_VendorId" required
                            placeholder="Enter Vendor ID">
                    </div>
                    <div class="form-group">
                        <label for="new_VendorName">Vendor Name:</label>
                        <input type="text" class="form-control" name="new_VendorName" required
                            placeholder="Enter Vendor name">
                    </div>
                    <div class="form-group">
                        <label for="new_ContactPerson">Contact Person:</label>
                        <input type="text" class="form-control" name="new_ContactPerson" required
                            placeholder="Enter Contact Person">
                    </div>
                    <div class="form-group">
                        <label for="new_ContactNumber">Contact Number:</label>
                        <input type="number" class="form-control" name="new_ContactNumber" required
                            placeholder="Enter Contact Number">
                    </div>
                    <button type="submit" class="btn btn-info" name="add_Vendor">Add Vendor</button>
                </form>
            </div>
        </div>

        <div id="editVendorModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal('editVendorModal')">&times;</span>
                <form action="{{ route('edit.vendor') }}" method="post" class="user-card">
                    @csrf
                    <h3>Edit Vendor</h3>
                    <input type="hidden" name="edit_VendorId" id="edit_VendorId" value="">
                    <div class="form-group">
                        <label for="edit_VendorName">Vendor Name:</label>
                        <input type="text" class="form-control" name="edit_VendorName" id="edit_VendorName" required
                            placeholder="Enter Vendor name">
                    </div>
                    <div class="form-group">
                        <label for="edit_ContactPerson">Contact Person:</label>
                        <input type="text" class="form-control" name="edit_ContactPerson " id="edit_ContactPerson" required
                            placeholder="Enter Contact Person">
                    </div>
                    <div class="form-group">
                        <label for="edit_ContactNumber">Contact Number:</label>
                        <input type="text" class="form-control" name="edit_ContactNumber" id="edit_ContactNumber" required
                            placeholder="Enter Contact Number">
                    </div>
                    <button type="submit" class="btn btn-info" name="edit_Vendor">Save Changes</button>
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

        function openEditModal(VendorID) {
            document.getElementById("editVendorModal").style.display = "block";
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = "none";
        }
        function openEditModal(VendorId) {
     fetch('/get-vendor-details/' + VendorId)
        .then(response => response.json())
        .then(data => {
            document.getElementById("edit_VendorId").value = VendorId;
            document.getElementById("edit_VendorName").value = data.VendorName;
            document.getElementById("edit_ContactPerson").value = data.ContactPerson;
            document.getElementById("edit_ContactNumber").value = data.ContactNumber;
            document.getElementById("editVendorModal").style.display = "block";
        })
        .catch(error => {
            console.error('Error fetching Vendor details:', error);
        });
}

    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
