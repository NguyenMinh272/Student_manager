<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\Student;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        $students = Student::all();
        return view('students.index', compact('students'));
    }
    public function create(){
        $faculties = Faculty::all();
        return view('students.create', compact('faculties'));
    }
    public function store(Request $request){
        $student = new Student();
        $faculties = Faculty::all();
        $student->id = $request->id;
        $student->full_name = $request->full_name;
        $student->address = $request->address;
        $student->email = $request->email;
        $student->birthday = $request->birthday;
        $student->gender = $request->gender;
        $student->phone = $request->phone;
        $student->faculty_id = $request->faculty_id;

        $student->save();
//        dd($student);

        return redirect()->route('students.store');
    }
    public function edit($id){
        $student = Student::find($id);
        $faculties = Faculty::all();
        return view('students.edit', compact('student', 'faculties'));
    }
    public function update(Request $request, $id){
        $this->validate($request, [
            'id'=>'required',
            'full_name'=>'required',
            'address'=>'required',
            'email'=>'required',
            'birthday'=>'required',
            'gender'=>'required',
            'phone'=>'required',
            'faculty_id'=>'required'
        ]);
        $student = Student::find($id);
        $student->update([
            'id' => $request->id,
            'full_name' => $request->full_name,
            'address' => $request->address,
            'email' => $request->email,
            'birthday' => $request->birthday,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'faculty_id'=>$request->faculty_id
        ]);
        return redirect()->route('students.index', $id);

    }
    public function delete($id){
        $student = Student::find($id);
        $student->delete();
        return redirect()->route('students.index');
    }
}
