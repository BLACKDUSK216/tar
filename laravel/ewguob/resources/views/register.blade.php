<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>
    <form method="POST" action="{{ route('register.submit') }}">
        @csrf
        <div>
            <input id="name" type="text" name="name" value="{{ old('name') }}" placeholder="Name" required autofocus>
        </div>
        <div>
            <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Email" required>
        </div>
        <div>
            <input id="password" type="password" name="password" placeholder="Password" required>
        </div>
        <div>
            <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm Password" required>
        </div>
        <div>
            <button type="submit">Register</button>
        </div>
    </form>
</body>
</html>
