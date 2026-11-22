<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Enrollment</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="enrollment-form-container">
        <a class="back-link" href="{{ route('enrollments.index') }}">&larr; Back to Enrollments</a>

        <div class="page-header">
            <div>
                <p class="eyebrow">Course registration</p>
                <h1>Add students to a course</h1>
                <p class="subtitle">Choose a course and select the students you want to enroll.</p>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success" role="status">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-error" role="alert">{{ session('error') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-error" role="alert">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <section class="panel form-panel">
            <form method="POST" action="{{ route('enrollments.store') }}">
                @csrf

                <div class="field">
                    <label for="course_id">Course</label>
                    <select id="course_id" name="course_id" required>
                        <option value="">Select a course</option>
                        @foreach($courses as $course)
                            <option value="{{ $course->id }}" @selected(old('course_id') == $course->id)>
                                {{ $course->code }} &mdash; {{ $course->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('course_id')
                        <p class="field-error">{{ $message }}</p>
                    @enderror
                </div>

                <fieldset class="enrollment-students">
                    <legend>
                        Students <span class="count">{{ $students->count() }} available</span>
                    </legend>
                    <p class="field-hint">Select one or more students from the list.</p>

                    <div class="enrollment-options">
                        @forelse($students as $student)
                            <label class="enrollment-option">
                                <input type="checkbox"
                                       name="student_ids[]"
                                       value="{{ $student->id }}"
                                       @checked(in_array($student->id, old('student_ids', [])))>
                                <span class="enrollment-person">
                                    <span class="student-name">{{ $student->name }}</span>
                                    <span class="student-email">{{ $student->email }}</span>
                                </span>
                                <span class="student-id">#{{ $student->id }}</span>
                            </label>
                        @empty
                            <p class="empty-state">
                                No students available.
                                <a href="{{ route('students.create') }}">Add a student</a> first.
                            </p>
                        @endforelse
                    </div>

                    @error('student_ids')
                        <p class="field-error">{{ $message }}</p>
                    @enderror
                    @error('student_ids.*')
                        <p class="field-error">{{ $message }}</p>
                    @enderror
                </fieldset>

                <div class="form-actions">
                    <button class="btn" type="submit" @disabled($students->isEmpty() || $courses->isEmpty())>
                        Add Students
                    </button>
                    <a class="btn btn-secondary" href="{{ route('enrollments.index') }}">Cancel</a>
                </div>

                @if($courses->isEmpty())
                    <p class="field-hint">
                        No courses available.
                        <a href="{{ route('courses.create') }}">Add a course</a> first.
                    </p>
                @endif
            </form>
        </section>
    </div>
</body>
</html>