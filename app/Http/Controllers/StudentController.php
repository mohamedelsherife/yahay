<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
{
    $search = $request->search;
    $students = Student::where('name', 'LIKE', "%{$search}%")->get();

    return view('students.index', compact('students'));
}

    public function create(){
        return view('Students.create');
    }
    public function store(Request $request){
        Student::create([
            'name'=> $request->name,
            'email'=> $request->email
        ]);
        return redirect('/');
    }
    public function destroy($id){

        $student = Student::findOrFail($id);

        $student->delete();

        return redirect('/');
    }
}