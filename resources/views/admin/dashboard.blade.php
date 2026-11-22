<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>dahboard</title>
</head>
<body>
    <h1>Welcome to admin Dashboard</h1>
    <hr>
    <h3>Admin Information</h3>

    <p>
        Admin ID:
        {{ session('admin_id') }}
    </p>
    <hr>
    <form action="{{ route('admin.logout') }}" method="POST">
        @csrf
        <button type="submit">logout</button>
    </form>
</body>
</html>