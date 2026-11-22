<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StudentController extends Controller
{
    public function index(Request $request)
{
    $search = $request->search;
    $students = Student::where('name', 'LIKE', "%{$search}%")->get();

    return view('students.index', compact('students'));
}

    public function create(){
        return view('students.create');
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240'
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = Str::uuid() . '.' .
                        $request->file('image')->extension();
                
            $request->file('image')->storeAs(
                'students',
                $imageName,
                'public'
            );
        }

        Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'image' => $imageName,
        ]);

        return redirect()->route('students.index')->with('success', 'Student created successfully');
    }
    public function destroy($id){

        $student = Student::findOrFail($id);

        if ($student->image) {
            Storage::disk('public')->delete('students/' . $student->image);
        }

        $student->delete();

        return redirect('/');
    } 
 public function edit($id){
    $student = Student::findOrFail($id);
    return view('students.edit', compact('student'));
}

public function update(Request $request, $id){
    $student = Student::findOrFail($id);

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:students,email,' . $student->id,
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240'
    ]);

    $data = [
        'name' => $request->name,
        'email' => $request->email,
    ];

    if ($request->hasFile('image')) {
        if ($student->image) {
            Storage::disk('public')->delete('students/' . $student->image);
        }
        $imageName = Str::uuid() . '.' . $request->file('image')->extension();
        $request->file('image')->storeAs('students', $imageName, 'public');
        $data['image'] = $imageName;
    }

    $student->update($data);

    return redirect()->route('students.index')->with('success', 'Student updated successfully');
}
}