<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;
use DB;
use App\Repositories\Faculty\FacultyRepositoryInterface;

class FacultyController extends Controller
{
    protected $facultyRepo;

    public function __construct(FacultyRepositoryInterface $facultyRepo)
    {
        $this->facultyRepo = $facultyRepo;
    }

    public function index(){
        $faculties = DB::table('faculties')->paginate(5);
        return view("faculties.list", compact('faculties'));
    }

    public function create(){
        return view('faculties.create');
    }
    public function store(Request $request){
        $faculty = new Faculty();
        $faculty = $this->facultyRepo->create($request->all());

        return redirect()->route('faculties.index')->with('success','Create successfully!');
    }
    public function edit($id){
        $faculty = $this->facultyRepo->find($id);

        return view('faculties.edit', compact('faculty'));
    }

    public function update(Request $request, $id){
        $this->validate($request,[

            'name'=>'required|max:50'
        ]);
        $faculty =$this->facultyRepo->find($id);
        $faculty->update($request->all());

        return redirect()->route('faculties.index', compact('faculty'))->with('success','Update successfully!');
    }
    public function delete($id){
        $faculty = $this->facultyRepo->find($id);
        $faculty->delete();

        return redirect()->route('faculties.index')->with('success','Delete successfully!');

    }
}
