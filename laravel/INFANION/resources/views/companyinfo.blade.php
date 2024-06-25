<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Info</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('DashBoard') }}">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
        <h1>Company Information</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>Company ID</th>
                    <th>Company Name</th>
                    <th>Location</th>
                    <th>Industry Type</th>
                    <th><button id="myBtn" class="btn btn-primary">Add Company</button></th>
                </tr>
            </thead>
            <tbody>
                @foreach($companyInfo as $company)
                <tr>
                    <td>{{ $company->CompanyID }}</td>
                    <td>{{ $company->CompanyName }}</td>
                    <td>{{ $company->Location }}</td>
                    <td>{{ $company->IndustryType }}</td>
                    <td>
                        <button onclick="openEditModal('{{ $company->CompanyID }}')"
                            class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></button>
                        <a href="{{ route('delete.company', ['id' => $company->CompanyID]) }}"
                            class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal('myModal')">&times;</span>
                <form action="{{ route('add.company') }}" method="post" class="user-card">
                    @csrf
                    <h3>Add Company</h3>
                    <div class="form-group">
                        <label for="new_CompanyId">Company ID:</label>
                        <input type="text" class="form-control" name="new_CompanyId" required
                            placeholder="Enter Company ID">
                    </div>
                    <div class="form-group">
                        <label for="new_CompanyName">Company Name:</label>
                        <input type="text" class="form-control" name="new_CompanyName" required
                            placeholder="Enter Company name">
                    </div>
                    <div class="form-group">
                        <label for="new_Location">Location:</label>
                        <input type="text" class="form-control" name="new_Location" required
                            placeholder="Enter Location">
                    </div>
                    <div class="form-group">
                        <label for="new_IndustryType">Industry Type:</label>
                        <input type="text" class="form-control" name="new_IndustryType" required
                            placeholder="Enter Industry Type">
                    </div>
                    <button type="submit" class="btn btn-info" name="add_Company">Add Company</button>
                </form>
            </div>
        </div>

        <div id="editCompanyModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal('editCompanyModal')">&times;</span>
                <form action="{{ route('edit.company') }}" method="post" class="user-card">
                    @csrf
                    <h3>Edit Company</h3>
                    <input type="hidden" name="edit_CompanyId" id="edit_CompanyId" value="">
                    <div class="form-group">
                        <label for="edit_CompanyName">Company Name:</label>
                        <input type="text" class="form-control" name="edit_CompanyName" id="edit_CompanyName" required
                            placeholder="Enter Company name">
                    </div>
                    <div class="form-group">
                        <label for="edit_Location">Location:</label>
                        <input type="text" class="form-control" name="edit_Location" id="edit_Location" required
                            placeholder="Enter Location">
                    </div>
                    <div class="form-group">
                        <label for="edit_IndustryType">Industry Type:</label>
                        <input type="text" class="form-control" name="edit_IndustryType" id="edit_IndustryType" required
                            placeholder="Enter Industry Type">
                    </div>
                    <button type="submit" class="btn btn-info" name="edit_Company">Save Changes</button>
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

        function openEditModal(companyId) {
            document.getElementById("editCompanyModal").style.display = "block";
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = "none";
        }
        function openEditModal(companyId) {
     fetch('/get-company-details/' + companyId)
        .then(response => response.json())
        .then(data => {
            document.getElementById("edit_CompanyId").value = companyId;
            document.getElementById("edit_CompanyName").value = data.CompanyName;
            document.getElementById("edit_Location").value = data.Location;
            document.getElementById("edit_IndustryType").value = data.IndustryType;
            document.getElementById("editCompanyModal").style.display = "block";
        })
        .catch(error => {
            console.error('Error fetching company details:', error);
        });
}

    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
