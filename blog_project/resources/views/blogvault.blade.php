<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Vault</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/app2.css') }}">
    <link rel="icon" type="image/png" href="images/logo-black.png">   
</head>
<body>
    @include('includes.header')

    <div class="container mt-5">
        <h1 class="header" style="position: relative;top:30px;">Blog Vault</h1>
        
        <div class="mt-5">
            @foreach ($blogs as $blog)
                <div class="card mb-3">
                    <div class="card-header">
                        <h2>{{ $blog->title }}</h2>
                        <p>by {{ $blog->name }}</p>
                    </div>
                    <div class="card-body">
                        <p>{{ $blog->content }}</p>
                        <img src="{{ asset($blog->file) }}" alt="Blog Image" class="img-fluid">
                    </div>
                    <div class="card-footer text-muted">
                        Created at: {{ $blog->created_at }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @include('includes.footer')


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
