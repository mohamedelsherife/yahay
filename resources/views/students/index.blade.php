<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
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
    <a href="{{ route('students.create') }}" class="btn btn-add">
    <i class="fa-solid fa-plus"></i> Add Student
</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>image</th>
                <th>Name</th>
                <th>Email</th>
                <th>operations</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>
                        @if($student->image)
                        <img src="{{ asset('storage/students/' . $student->image) }}" alt="student image" width="70" height="70">
                        @else
                        no image
                        @endif
                    </td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"><i class="fa-solid fa-trash-can"></i></button>
                        </form>
                        <a href="{{ route('students.edit', $student->id) }}">
                        <button type="button"><i class="fa-solid fa-pen"></i></button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>