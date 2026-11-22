<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Enrollments</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="page-header">
        <div>
            <p class="eyebrow">Course registration</p>
            <h1>Course Enrollments</h1>
            <p class="subtitle">See who is enrolled in each course, all in one place.</p>
        </div>
        <a class="btn" href="{{ route('enrollments.create') }}">+ Add Students to a Course</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success" role="status">{{ session('success') }}</div>
    @endif

    <div class="enrollment-course-list">
        @forelse($courses as $course)
            @php $count = $course->students->count(); @endphp
            <section class="panel">
                <div class="table-heading enrollment-course-heading">
                    <div>
                        <p class="eyebrow">{{ $course->code }}</p>
                        <h2>{{ $course->name }}</h2>
                        <p class="field-hint">{{ $course->course_semester }}</p>
                    </div>
                    <span class="count">
                        {{ $count }} {{ $count === 1 ? 'student' : 'students' }} enrolled
                    </span>
                </div>

                @if($count > 0)
                    <div class="table-scroll">
                        <table aria-label="Students enrolled in {{ $course->name }}">
                            <thead>
                                <tr>
                                    <th scope="col">Student ID</th>
                                    <th scope="col">Student Name</th>
                                    <th scope="col">Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($course->students as $student)
                                    <tr>
                                        <td class="student-id">#{{ $student->id }}</td>
                                        <td class="student-name">{{ $student->name }}</td>
                                        <td class="student-email">{{ $student->email }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="empty-state">
                        <p>No students enrolled.</p>
                        <a href="{{ route('enrollments.create') }}">Enroll students &rarr;</a>
                    </div>
                @endif
            </section>
        @empty
            <section class="panel empty-state">
                <p>No courses available yet.</p>
                <a class="btn btn-secondary" href="{{ route('courses.create') }}">Add a Course</a>
            </section>
        @endforelse
    </div>
</body>
</html>