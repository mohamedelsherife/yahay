<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <h1>Course List</h1>
    <form action="{{ route('courses.index') }}" method="GET">
        <input type="text" name="search" placeholder="Enter course name....." value="{{ request('search') }}">
        <button type="submit">Search</button>
        <a href="{{ route('courses.index') }}">Reset</a>
    </form>

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('courses.create') }}" class="btn btn-add">+ Add Course</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Code</th>
                <th>Credit Hours</th>
                <th>Description</th>
                <th>Semester</th>
                <th>Pre-reqs</th>
                <th>File</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
                <tr>
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->code }}</td>
                    <td>{{ $course->credit_hours }}</td>
                    <td>{{ $course->course_description }}</td>
                    <td>{{ $course->course_semester }}</td>
                    <td>{{ $course->course_prereq ? 'Yes' : 'No' }}</td>
                    <td>
                        @if($course->file)
                            <a href="{{ asset('storage/courses/' . $course->file) }}" target="_blank">
                                <i class="fa-solid fa-file-arrow-down"></i> Download
                            </a>
                        @else
                            —
                        @endif
                    </td>
                    <td>

                        <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"><i class="fa-solid fa-trash-can"></i></button>
                        </form>
                         <a href="{{ route('courses.edit', $course->id) }}">
                            <button type="button"><i class="fa-solid fa-pen"></i></button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>