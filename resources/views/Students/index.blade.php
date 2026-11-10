<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <meta charset="UTF-8">
    <title>Student page</title>
</head>
<body>
    <h1>Student List</h1>
    <form action="{{ route('students.index') }}" method="GET">
        <input type="text" name="search" placeholder="Enter student name....." value="{{ request('search') }}">
        <button type="submit">Search</button>
        <a href="{{ route('students.index') }}">Reset</a>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>operations</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>