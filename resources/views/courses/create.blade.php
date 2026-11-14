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
    <form action="{{ route('courses.store') }}" method="POST">
        @csrf

        <label>course Name</label>
        <input type="text" name="name" required>
        <br><br>

        <label>course code</label>
        <input type="text" name="code" required>
        <br><br>

        <label>course credit</label>
        <input type="number" name="credit_hours" required>
        <br><br>

        <label for="des">course Description</label>
        <textarea name="course_description" id="des" cols="30" rows="10" placeholder="write here......"></textarea>
        <br><br>

        <label for="sem">select course semester</label>
        <select name="course_semester" id="sem">
            @for($i = 1; $i <= 8; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>
        <br><br>

        <label>pre-request</label>
        <input type="radio" id="yes" name="course_prereq" value="1">
        <label for="yes">yes</label>
        <input type="radio" id="no" name="course_prereq" value="0" checked>
        <label for="no">no</label>
        <br><br>

        <button type="submit">save course</button>
    </form>
</body>
</html>