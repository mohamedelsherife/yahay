<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>

</head>
<body>
    <h2>admin login</h2>

    @if($errors->any())
    <p style="color: red"> {{ $errors->first() }}</p>
    @endif
    <form action="{{ route('admin.login.submit' )}}" method="POST">
        @csrf
        <div>
            <label for="email">Email:</label>
            <input type="email" id="eamil" name="email" value="{{ old('email') }}" required>
        </div>
        <br>
        <div>
            <label for="pass">Password:</label>
            <input type="password" name="password" required>
        </div>
        <button type="submit">login</button>
    </form>
</body>
</html>