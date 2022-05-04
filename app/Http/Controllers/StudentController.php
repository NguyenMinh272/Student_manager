<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\Student;
use App\Models\Subject;

use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Driver\Selector;
use Symfony\Component\Console\Input\Input;
use function Symfony\Component\String\s;
use App\Repositories\Student\StudentRepositoryInterface;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $studentRepo;
    public function __construct(StudentRepositoryInterface $studentRepo)
    {
        $this->studentRepo = $studentRepo;
    }

    public function index()
    {
        $students = $this->studentRepo->getStudent();

        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $faculties = Faculty::all();
        return view('students.create', compact('faculties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'full_name'=>'required|min:6|max:40',
            'address'=>'required|max:255',
            'email'=>'required|email:rfc,dns',
            'birthday'=>'required|date',
            'gender'=>'required',
            'phone'=>'required|max:12',
            'avatar'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'faculty_id'=>'required'
        ]);
        $data = $request->all();
        if ($request->hasFile('image')){
            $file = $request->file('image');
            $file_name = $file->move('images', $file->getClientOriginalName());
            $data['avatar'] = $file_name;
        }

        $student = $this->studentRepo->create($data);
        return redirect()->route('student.index')->with('success','Create student successful!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = $this->studentRepo->find($id);
        $faculties = Faculty::all();
        $subjects = Subject::all();
        return view('students.edit', compact('student', 'faculties','subjects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $this->validate($request, [
            'full_name'=>'required|min:6|max:40',
            'address'=>'required|max:255',
            'email'=>'required',
            'birthday'=>'required|date',
            'gender'=>'required',
            'phone'=>'required|max:13',
            'faculty_id'=>'required',
            'mark'=>'required',
            'subject_id'=>'required'
        ]);
            $student = $this->studentRepo->find($id);
            $marks = collect($request->input('mark',[]))
                ->map(function ($mark){
                    return ['mark'=>$mark];
                });
            $student->subject =$request->input('subject_id');
//          dd($student);
            $student->subjects()->sync($marks);
            $student->update($request->all());
            return redirect()->route('student.index', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = $this->studentRepo->find($id);
        $student->delete();
        return redirect()->route('student.index');
    }


}
