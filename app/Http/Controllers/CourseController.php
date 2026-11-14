<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index(Request $request)
{
    $search = $request->search;
    $courses = Course::where('name', 'LIKE', "%{$search}%")->get();

    return view('courses.index', compact('courses'));
}

     public function create(){
        return view('courses.create');
    }

      public function store(Request $request){
        Course::create([
            'name'=> $request->name,
            'code'=> $request->code,
            'credit_hours'=> $request->credit_hours,
            'course_description'=> $request->course_description,
            'course_semester'=> $request->course_semester,
            'course_prereq'=> $request->course_prereq
        ]);
        return redirect('/courses');
    }
        public function destroy($id){

        $courses = Course::findOrFail($id);

        $courses->delete();

        return redirect('/courses');
    } 

  public function edit($id)
{
    $course = Course::findOrFail($id);
    return view('courses.edit', compact('course'));
}

public function update(Request $request, $id)
{
    $validated = $request->validate([
        'name'               => 'required|string|max:255',
        'code'               => 'required|string|max:50',
        'credit_hours'       => 'required|integer|min:1',
        'course_description' => 'nullable|string',
        'course_semester'    => 'required|integer|between:1,8',
        'course_prereq'      => 'required|boolean',
    ]);

    $course = Course::findOrFail($id);
    $course->update($validated);

    return redirect()->route('courses.index')->with('success', 'Course updated successfully');
}
}