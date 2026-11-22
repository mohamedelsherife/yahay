<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit course</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <h2>edit course</h2>

    @if ($errors->any())
        <ul class="error">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>course Name</label>
        <input type="text" name="name" value="{{ old('name', $course->name) }}" required>

        <label>course code</label>
        <input type="text" name="code" value="{{ old('code', $course->code) }}" required>

        <label>course credit</label>
        <input type="number" name="credit_hours" value="{{ old('credit_hours', $course->credit_hours) }}" required>

        <label for="des">course Description</label>
        <textarea name="course_description" id="des" cols="30" rows="10" placeholder="write here......">{{ old('course_description', $course->course_description) }}</textarea>

        <label for="sem">select course semester</label>
        <select name="course_semester" id="sem">
            @for($i = 1; $i <= 8; $i++)
                <option value="{{ $i }}" {{ old('course_semester', $course->course_semester) == $i ? 'selected' : '' }}>
                    {{ $i }}
                </option>
            @endfor
        </select>

        <label>pre-request</label>
        <input type="radio" id="yes" name="course_prereq" value="1"
            {{ old('course_prereq', $course->course_prereq) == 1 ? 'checked' : '' }}>
        <label for="yes">yes</label>

        <input type="radio" id="no" name="course_prereq" value="0"
            {{ old('course_prereq', $course->course_prereq) == 0 ? 'checked' : '' }}>
        <label for="no">no</label>
        <br><br>

        <label for="file">course file</label>
        @if($course->file)
            <a href="{{ asset('storage/courses/' . $course->file) }}" target="_blank">current file</a>
        @endif
        <input type="file" name="file" id="file" accept=".pdf,.doc,.docx,.ppt,.pptx,.zip,.jpg,.jpeg,.png">
        <br><br>

        <button type="submit"><i class="fa-solid fa-floppy-disk"></i> update course</button>
        <a href="{{ route('courses.index') }}">Cancel</a>
    </form>
</body>
</html>