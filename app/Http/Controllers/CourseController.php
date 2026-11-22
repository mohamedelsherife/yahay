<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
        $request->validate([
            'name'               => 'required|string|max:255',
            'code'               => 'required|string|max:50|unique:courses,code',
            'credit_hours'       => 'required|integer|min:1',
            'course_description' => 'nullable|string|max:255',
            'course_semester'    => 'required|integer|between:1,8',
            'course_prereq'      => 'required|boolean',
            'file'               => 'nullable|file|mimes:pdf,doc,docx,ppt,pptx,zip,jpg,jpeg,png|max:102400',
        ]);

        $fileName = null;
        if ($request->hasFile('file')) {
            $fileName = Str::uuid() . '.' . $request->file('file')->extension();
            $request->file('file')->storeAs('courses', $fileName, 'public');
        }

        Course::create([
            'name'=> $request->name,
            'code'=> $request->code,
            'credit_hours'=> $request->credit_hours,
            'course_description'=> $request->course_description,
            'course_semester'=> $request->course_semester,
            'course_prereq'=> $request->course_prereq,
            'file' => $fileName,
        ]);
        return redirect()->route('courses.index')->with('success', 'Course created successfully');
    }
        public function destroy($id){

        $courses = Course::findOrFail($id);

        if ($courses->file) {
            Storage::disk('public')->delete('courses/' . $courses->file);
        }

        $courses->delete();

        return redirect()->route('courses.index')->with('success', 'Course deleted successfully');
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
        'file'               => 'nullable|file|mimes:pdf,doc,docx,ppt,pptx,zip,jpg,jpeg,png|max:102400',
    ]);

    $course = Course::findOrFail($id);

    unset($validated['file']);
    if ($request->hasFile('file')) {
        if ($course->file) {
            Storage::disk('public')->delete('courses/' . $course->file);
        }
        $fileName = Str::uuid() . '.' . $request->file('file')->extension();
        $request->file('file')->storeAs('courses', $fileName, 'public');
        $validated['file'] = $fileName;
    }

    $course->update($validated);

    return redirect()->route('courses.index')->with('success', 'Course updated successfully');
}
}