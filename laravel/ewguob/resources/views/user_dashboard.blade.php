<!-- user_dashboard.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">User Dashboard</div>
                    <div class="card-body">
                        @isset($username)
                            <p>Welcome, {{ $username }}!</p>
                            <a class="btn btn-outline-primary" href="{{ route('logout') }}">Logout</a>
                            <hr>
                            <h4>Write Your Blog</h4>
                            <form action="{{ route('save.blog') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="blog_title">Blog Title</label>
        <input type="text" class="form-control" id="blog_title" name="blog_title" required>
    </div>
    <div class="form-group">
        <label for="blog_content">Blog Content</label>
        <textarea class="form-control" id="blog_content" name="blog_content" rows="5" required></textarea>
    </div>
    <div class="form-group">
        <label for="blog_file">Upload File</label>
        <input type="file" class="form-control-file" id="blog_file" name="blog_file">
    </div>
    <button type="submit" class="btn btn-primary">Publish Blog</button>
</form>

                        @else
                            <p>User information not available.</p>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
