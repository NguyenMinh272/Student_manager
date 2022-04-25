<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;

use App\Repositories\Faculty\FacultyRepositoryInterface;
use phpDocumentor\Reflection\Types\Null_;


class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $facultyRepo;
    public function __construct(FacultyRepositoryInterface $facultyRepo)
    {
        $this->facultyRepo = $facultyRepo;
    }
    public function index()
    {
        $faculties = $this->facultyRepo->getFaculty();

        return view('faculties.list', compact('faculties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('faculties.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        $data = $request->all();
        $faculty = $this->facultyRepo->create($data);
        return redirect()->route('faculty.index')->with('success', 'Create successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faculty = $this->facultyRepo->find($id);
        return view('faculties.edit', compact('faculty'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required|max:50'
        ]);
        $faculty =$this->facultyRepo->find($id);
        $faculty->update($request->all());

        return redirect()->route('faculty.index', compact('faculty'))
            ->with('success','Update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faculty = $this->facultyRepo->find($id);
        $faculty->delete();

        return redirect()->route('faculty.index')->with('success','Delete successfully!');
    }
}
