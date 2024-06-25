<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts Table</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <h1 class="text-center mt-5 text-primary">Posts Table</h1>
    
    <div class="container mt-5">
               <tr>
                    <td colspan="6" class="text-end">
                        <a href="{{ route('posts.create') }}" class="btn btn-success" style="position: absolute;right: 7.5%;
    top: 20%;">Add Post</a>
                    </td>
                </tr>
        <table class="table table-bordered table-striped">
            <thead class="bg-primary text-white">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>

                @if(session('success'))
                     <div class="alert alert-success">
                     {{ session('success') }}
                      </div>
                @endif   
                
                
               @forelse ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->content }}</td>
                        <td>{{ $post->created_at }}</td>
                        <td>{{ $post->updated_at }}</td>
                        <td><a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a></td>
                        <td>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">No posts found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
