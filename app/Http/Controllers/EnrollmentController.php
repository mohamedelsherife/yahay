<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;
class EnrollmentController extends Controller
{
    public function create(){
        $students = Student::all();
        $courses = Course::all();

        return view('enrollments.create', compact('students', 'courses'));
    }

   public function store(Request $request)
    {
        $request->validate([
            'course_id'     => 'required|exists:courses,id',
            'student_ids'   => 'required|array|min:1',
            'student_ids.*' => 'integer|exists:students,id',
        ]);

        $course = Course::findOrFail($request->course_id);
        $course->students()->syncWithoutDetaching(
            $request->student_ids
        );
        return redirect()->back()
            ->with('success', 'Success add student');
    }

    public function index()
    {
        $courses = Course::with('students')->get();

        return view('enrollments.index',
            compact('courses'));
    }
}
