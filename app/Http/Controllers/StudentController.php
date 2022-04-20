<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\Student;

use Illuminate\Http\Request;
use DB;
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
        $faculties = new Faculty();
        $students = DB::table('students')->paginate(5);
        return view('students.index', compact('students','faculties'));
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

        $student = $request->all();
        $student = $this->studentRepo->create($student);
        return redirect()->route('students.index')->with('success','Create student successful!');

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
        return view('students.edit', compact('student', 'faculties'));
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
            'birthday'=>'required',
            'gender'=>'required',
            'phone'=>'required|date',
            'faculty_id'=>'required'
        ]);
            $student = $this->studentRepo->find($id);
            $student->update($request->all());
        return redirect()->route('students.index', $id);
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
        return redirect()->route('students.index');
    }
}
