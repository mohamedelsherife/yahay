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
    <h2>courses form</h2>
    @if ($errors->any())
        <ul class="error">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label>course Name</label>
        <input type="text" name="name" value="{{ old('name') }}" required>
        <br><br>

        <label>course code</label>
        <input type="text" name="code" value="{{ old('code') }}" required>
        <br><br>

        <label>course credit</label>
        <input type="number" name="credit_hours" value="{{ old('credit_hours') }}" required>
        <br><br>

        <label for="des">course Description</label>
        <textarea name="course_description" id="des" cols="30" rows="10" placeholder="write here......">{{ old('course_description') }}</textarea>
        <br><br>

        <label for="sem">select course semester</label>
        <select name="course_semester" id="sem">
            @for($i = 1; $i <= 8; $i++)
                <option value="{{ $i }}" {{ old('course_semester') == $i ? 'selected' : '' }}>{{ $i }}</option>
            @endfor
        </select>
        <br><br>

        <label>pre-request</label>
        <input type="radio" id="yes" name="course_prereq" value="1">
        <label for="yes">yes</label>
        <input type="radio" id="no" name="course_prereq" value="0" checked>
        <label for="no">no</label>
        <br><br>

        <label for="file">course file</label>
        <input type="file" name="file" id="file" accept=".pdf,.doc,.docx,.ppt,.pptx,.zip,.jpg,.jpeg,.png">
        @error('file') <small class="error">{{ $message }}</small> @enderror
        <br><br>

        <button type="submit">save course</button>
    </form>
</body>
</html>