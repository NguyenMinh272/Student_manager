<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index(){
        $subjects = Subject::all();
        return view('subjects.index', compact('subjects'));

    }
    public function create(){
        return view('subjects.create');
    }
    public function store(Request $request){
        $subject = new Subject();
        $subject->id = $request->id;
        $subject->name = $request->name;
        $subject->save();
        return redirect()->route('subjects.index');
    }
    public function edit($id){
        $subject = Subject::find($id);
        return view('subjects.edit', compact('subject'));

    }
    public function update(Request $request, $id){
        $this->validate($request, [
            'id'=>'required',
            'name'=>'required'
        ]);
        $subject = Subject::find($id);
        $subject->update([
            'id' => $request->id,
            'name' => $request->name
        ]);

        return redirect()->route('subjects.index');

    }
    public function delete($id){
        $subject = Subject::find($id);
        $subject->delete();
        return redirect()->route('subjects.index');
    }
}
