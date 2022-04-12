<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    public function index(){
        $faculties = Faculty::all();

        return view("faculties.list", compact('faculties'));
    }

    public function create(){
        return view('faculties.create');
    }
    public function store(Request $request){
        $faculty = new Faculty();
        $faculty->id = $request->id;
        $faculty->name = $request->name;
        $faculty->save();
//        dd($faculty);

        return redirect()->route('faculties.index')->with('success','Create successfully!');
    }
    public function edit($id){
        $faculty = Faculty::find($id);
//        dd($faculty);
        return view('faculties.edit', compact('faculty'));
    }

    public function update(Request $request, $id){
        $this->validate($request,[
            'id'=>'required',
            'name'=>'required'
        ]);
        $faculty = Faculty::find($id);
        $faculty->update(
            [
                'id' => $request->id,
                'name' => $request->name
            ]
        );
//        dd($request);
//     dd($faculty);
        return redirect()->route('faculties.index', compact('faculty'));
    }
    public function delete($id){
        $faculty = Faculty::find($id);
        $faculty->delete();

        return redirect()->route('faculties.index')->with('success','Delete successfully!');

    }
}
