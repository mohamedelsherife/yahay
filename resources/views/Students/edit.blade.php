<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Edit student</title>
</head>
<body>
    <h2>Edit Student</h2>
    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Student Name:</label>
        <input type="text" name='name' value="{{ $student->name }} " required id='name'>
        <label for="email">Student Email:</label>
        <input type="email" name='email' value="{{ $student->email }} " required id='email'>
        <button type="submit">Update student</button>
    </form>
</body>
</html>