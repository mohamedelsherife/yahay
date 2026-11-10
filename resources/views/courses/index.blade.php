<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <meta charset="UTF-8">
    <title>Courses</title>
</head>
<body>
    <h1>Course List</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Code</th>
                <th>Credit Hours</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
                <tr>
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->code }}</td>
                    <td>{{ $course->credit_hours }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>