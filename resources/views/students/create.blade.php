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

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="name">student Name</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required>
        @error('name') <small class="error">{{ $message }}</small> @enderror
        <br><br>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" required>
        @error('email') <small class="error">{{ $message }}</small> @enderror
        <br><br>

        <label for="image">student image</label>
        <input type="file" name="image" id="image" accept="image/jpeg,image/png,image/webp">
        @error('image') <small class="error">{{ $message }}</small> @enderror
        <br><br>

        <button type="submit">save student</button>
    </form>
    
</body>
</html>
