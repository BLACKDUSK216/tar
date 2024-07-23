<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Head content -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Your Blogs</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        /* CSS for blog display */
        .card {
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card-img-top {
            max-height: 300px;
            object-fit: cover;
        }

        .card-body {
            background-color: #f8f9fa;
        }

        /* Additional styling as per your design preferences */
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Your Blogs</h1>
                <table class="table table-striped">
                    <tbody>
                        <!-- Displaying user's blogs -->
                        @foreach($userBlogs as $blog)
                            <div class="card mb-3">
                                @if($blog->image_data)
                                    <img src="{{ asset('storage/' . $blog->image_data) }}" class="card-img-top"
                                        alt="Blog Image">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $blog->title }}</h5>
                                    <p class="card-text">{{ $blog->content }}</p>
                                    <button class="btn btn-sm btn-primary edit-blog" data-id="{{ $blog->id }}"
                                        data-title="{{ $blog->title }}" data-content="{{ $blog->content }}">Edit</button>
                                    <form action="{{ route('blog.delete', ['id' => $blog->id]) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
                <button class="btn btn-success" id="add-blog">Add New Blog</button>
            </div>
        </div>
    </div>

    <!-- Modal for Add Blog -->
    <div class="modal fade" id="addBlogModal" tabindex="-1" role="dialog" aria-labelledby="addBlogModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="addBlogForm" action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addBlogModalLabel">Add New Blog</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="add-blog-title">Title</label>
                            <input type="text" class="form-control" id="add-blog-title" name="blog_title">
                        </div>
                        <div class="form-group">
                            <label for="add-blog-content">Content</label>
                            <textarea class="form-control" id="add-blog-content" name="blog_content"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="add-blog-image">Image</label>
                            <input type="file" class="form-control-file" id="add-blog-image" name="blog_image">
                        </div>
                        <div class="form-group">
                            <label for="add-blog-file">File</label>
                            <input type="file" class="form-control-file" id="add-blog-file" name="blog_file">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal for Edit Blog -->
    <div class="modal fade" id="editBlogModal" tabindex="-1" role="dialog" aria-labelledby="editBlogModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="editBlogForm" action="#" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="blog_id" id="edit-blog-id">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editBlogModalLabel">Edit Blog</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="edit-blog-title">Title</label>
                            <input type="text" class="form-control" id="edit-blog-title" name="blog_title">
                        </div>
                        <div class="form-group">
                            <label for="edit-blog-content">Content</label>
                            <textarea class="form-control" id="edit-blog-content" name="blog_content"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="edit-blog-image">Image</label>
                            <input type="file" class="form-control-file" id="edit-blog-image" name="blog_image">
                        </div>
                        <div class="form-group">
                            <label for="edit-blog-file">File</label>
                            <input type="file" class="form-control-file" id="edit-blog-file" name="blog_file">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            // Show Add Blog Modal
            $('#add-blog').click(function () {
                $('#addBlogModal').modal('show');
            });

            // Show Edit Blog Modal
            $('.edit-blog').click(function () {
                var id = $(this).data('id');
                var title = $(this).data('title');
                var content = $(this).data('content');

                $('#edit-blog-id').val(id);
                $('#edit-blog-title').val(title);
                $('#edit-blog-content').val(content);

                $('#editBlogModal').modal('show');
            });

            // Submit Add Blog Form via AJAX
            $('#addBlogForm').submit(function (e) {
                e.preventDefault();

                var formData = new FormData(this);

                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        $('#addBlogModal').modal('hide');
                        location.reload(); // Reload the page to show new blog
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });

            // Submit Edit Blog Form via AJAX
            $('#editBlogForm').submit(function (e) {
                e.preventDefault();

                var id = $('#edit-blog-id').val();
                var formData = new FormData(this);

                $.ajax({
                    url: '/blog/' + id + '/update',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        $('#editBlogModal').modal('hide');
                        location.reload(); // Reload the page to show updated blog
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });

    </script>
</body>

</html>