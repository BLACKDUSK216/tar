<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Info</title>
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
        <h1>Inventory Information</h1>
        
        <table class="table">
            <thead>
                <tr>
                    <th>Item ID</th>
                    <th>Item Name</th>
                    <th>QuantityAvailable</th>
                    <th>Unit Price</th>
                    <th><button id="myBtn" class="btn btn-primary">Add Item</button></th>
                </tr>
            </thead>
            <tbody>
                @foreach($Inventory as $Item)
                    <tr>
                        <td>{{ $Item->ItemID }}</td>
                        <td>{{ $Item->ItemName }}</td>
                        <td>{{ $Item->QuantityAvailable }}</td>
                        <td>{{ $Item->UnitPrice }}</td>
                        <td>
                        <button onclick="openEditModal('{{ $Item->ItemID }}')"
                            class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></button>
                        <a href="{{ route('delete.item', ['id' => $Item->ItemID]) }}"
                            class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal('myModal')">&times;</span>
                <form action="{{ route('add.item') }}" method="post" class="user-card">
                    @csrf
                    <h3>Add Item</h3>
                    <div class="form-group">
                        <label for="new_ItemId">Item ID:</label>
                        <input type="text" class="form-control" name="new_ItemId" required
                            placeholder="Enter Item ID">
                    </div>
                    <div class="form-group">
                        <label for="new_ItemName">Item Name:</label>
                        <input type="text" class="form-control" name="new_ItemName" required
                            placeholder="Enter Item name">
                    </div>
                    <div class="form-group">
                        <label for="new_QuantityAvailable">QuantityAvailable:</label>
                        <input type="text" class="form-control" name="new_QuantityAvailable" required
                            placeholder="Enter QuantityAvailable">
                    </div>
                    <div class="form-group">
                        <label for="new_UnitPrice">Unit Price:</label>
                        <input type="text" class="form-control" name="new_UnitPrice" required
                            placeholder="Enter Unit Price">
                    </div>
                    <button type="submit" class="btn btn-info" name="add_Item">Add Item</button>
                </form>
            </div>
        </div>

        <div id="editItemModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal('editItemModal')">&times;</span>
                <form action="{{ route('edit.item') }}" method="post" class="user-card">
                    @csrf
                    <h3>Edit Item</h3>
                    <input type="hidden" name="edit_item_id" id="edit_item_id" value="">
                    <div class="form-group">
                        <label for="edit_item_name">Item Name:</label>
                        <input type="text" class="form-control" name="edit_item_name" id="edit_item_name" required
                            placeholder="Enter Item name">
                    </div>
                    <div class="form-group">
                        <label for="edit_quantity_available">Quantity Available:</label>
                        <input type="text" class="form-control" name="edit_quantity_available" id="edit_quantity_available" required
                            placeholder="Enter QuantityAvailable">
                    </div>
                    <div class="form-group">
                        <label for="edit_unit_price">Unit Price:</label>
                        <input type="text" class="form-control" name="edit_unit_price" id="edit_unit_price" required
                            placeholder="Enter Industry Type">
                    </div>
                    <button type="submit" class="btn btn-info" name="edit_Item">Save Changes</button>
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
};

span.onclick = function () {
    modal.style.display = "none";
};

window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
};

function openEditModal(ItemId) {
    fetch('/get-item-details/' + ItemId)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            document.getElementById("edit_item_id").value = ItemId;
            document.getElementById("edit_item_name").value = data.ItemName;
            document.getElementById("edit_quantity_available").value = data.QuantityAvailable;
            document.getElementById("edit_unit_price").value = data.UnitPrice;
            document.getElementById("editItemModal").style.display = "block";
        })
        .catch(error => {
            console.error('Error fetching Item details:', error);
        });
}

function closeModal(modalId) {
    document.getElementById(modalId).style.display = "none";
}

</script>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
