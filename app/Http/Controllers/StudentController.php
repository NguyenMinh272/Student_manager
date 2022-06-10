<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Faculty;
use App\Models\Student;
use App\Models\Subject;

use App\Repositories\Faculty\FacultyRepositoryInterface;
use App\Repositories\Subject\SubjectRepositoryInterface;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Driver\Selector;
use Symfony\Component\Console\Input\Input;
use function Symfony\Component\String;
use App\Repositories\Student\StudentRepositoryInterface;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $studentRepo;
    protected $subjectRepo;
    protected $facultyRepo;

    public function __construct(
        StudentRepositoryInterface $studentRepo,
        SubjectRepositoryInterface $subjectRepo,
        FacultyRepositoryInterface $facultyRepo
    ) {
        $this->studentRepo = $studentRepo;
        $this->subjectRepo = $subjectRepo;
        $this->facultyRepo = $facultyRepo;
    }

    public function index(Request $request)
    {
        $faculties = $this->facultyRepo->getFaculty()->pluck('name', 'id');
        $students = $this->studentRepo->search($request->all());

        return view('student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $faculties = $this->facultyRepo->getFaculty()->pluck('name', 'id');
        return view('student.form', compact('faculties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        $data = $request->all();
        $get_image = $request->file('image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 9999) . '.' . $get_image->getClientOriginalName();
            $get_image->move('images', $new_image);
            $data['image'] = $new_image;
        }
        $student = $this->studentRepo->create($data);
        return redirect()->route('student.index')->with('success', 'Create student successful!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = $this->studentRepo->find($id);

        return view('student.detail', compact('student'));
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
        $faculties = $this->facultyRepo->getFaculty()->pluck('name', 'id');
        return view('student.form', compact('student', 'faculties'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request, $id)
    {
        $data = $request->all();
        $student = $this->studentRepo->find($id);
        $get_image = $request->file('image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 9999) . '.' . $get_image->getClientOriginalName();
            $get_image->move('images', $new_image);
            $data['image'] = $new_image;
        }
        $student = $this->studentRepo->create($data);
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

    public function createSubjects($id)
    {
        $subjects = $this->subjectRepo->getSubject();
        $student = $this->studentRepo->find($id);

        return view('student.register_subject', compact('student', 'subjects'));
    }

    public function storeSubject(Request $request, $id)
    {
        $this->studentRepo->find($id)->subjects()->syncWithoutDetaching($request['subject_id']);

        return redirect()->route('students.index')->with('success', 'Successfully !');
    }
}
