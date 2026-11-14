<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <h2>student form</h2>
   <form action="{{ route('students.store') }}" method="POST">
    @csrf
    <label>student Name</label>
    <input type="text" name="name" required>
    <br><br>
    <label>Email</label>
    <input type="email" name="email" required>
    <br><br>
    <button type="submit">save student</button>
</form>
    
</body>
</html>
