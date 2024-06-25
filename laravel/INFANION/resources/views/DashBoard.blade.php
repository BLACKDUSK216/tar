<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
    <div class="container mt-4">
        <div class="alert alert-success" role="alert">
            Welcome, Admin! You have complete access to the page.
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"> Company Info</h5>
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates ratione accusantium nostrum eum vero ipsam, sapiente dignissimos consectetur ea natus minima minus? Reprehenderit iure animi necessitatibus vero! Incidunt, nihil corrupti!</p>
            </div>
        </div>

        <!-- Blog Section -->
        <div class="mt-4">
            <h2>Latest Blog Posts</h2>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Blog Post 1</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Impedit repellendus, eos itaque laborum doloribus earum labore modi obcaecati, similique saepe vel, ex animi non consequuntur libero sit recusandae magnam vitae.</p>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title">Blog Post 2</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusamus quas natus commodi perferendis excepturi, aut nisi. Soluta consequatur quidem animi reiciendis voluptas. Facere id vero minima laborum! Laudantium, officia esse?</p>
                </div>
            </div>
        </div>
    </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
