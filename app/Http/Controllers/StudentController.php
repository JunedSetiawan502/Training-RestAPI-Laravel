<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = student::all();
        return view('student/list', [
            "title" => "List Students",
            "students" => $students
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // create create logic here
        return view('student/create', [
            "title" => "Create Student"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // store logic here
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'nrp' => 'required|size:9|unique:students',
            'email' => 'required|email:dns|unique:students',
            'major' => 'required'
        ]);

        student::create($validatedData);
        return redirect('/student')->with('success', 'New student has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = student::find($id);
        return view('student/detail', [
            "title" => "Detail Student",
            "student" => $student
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = student::find($id);
        return view('student/edit', [
            "title" => "Edit Student",
            "student" => $student
        ]);
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
        $rules = [
            'name' => 'required|max:255',
            'major' => 'required'
        ];

        $student = student::find($id);
        if ($request->nrp != $student->nrp) {
            $rules['nrp'] = 'required|size:9|unique:students';
        }
        if ($request->email != $student->email) {
            $rules['email'] = 'required|email:dns|unique:students';
        }

        $validatedData = $request->validate($rules);

        student::where('id', $id)->update($validatedData);
        return redirect('/student')->with('success', 'Student has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        student::destroy($id);
        return redirect('/student')->with('success', 'Student has been deleted!');
    }
}
