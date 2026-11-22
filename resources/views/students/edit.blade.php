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

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="name">Student Name:</label>
        <input type="text" name="name" value="{{ old('name', $student->name) }}" required id="name">

        <label for="email">Student Email:</label>
        <input type="email" name="email" value="{{ old('email', $student->email) }}" required id="email">

        <label for="image">Student Image:</label>
        @if($student->image)
            <img src="{{ asset('storage/students/' . $student->image) }}" alt="student image" width="70" height="70">
        @endif
        <input type="file" name="image" id="image" accept="image/jpeg,image/png,image/webp">
        @error('image') <small class="error">{{ $message }}</small> @enderror
        <br><br>

        <button type="submit">Update student</button>
    </form>
</body>
</html>
