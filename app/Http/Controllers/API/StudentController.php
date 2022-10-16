<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Models\student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    function get($id = null)
    {
        if (isset($id)) {
            $student = student::findOrfail($id);
            return response()->json(['msg' => 'data diambil', 'data' => $student], 200);
        } else {
            $students = student::get();
            return response()->json(['msg' => 'data diambil', 'data' => $students], 200);
        }
    }

    function store(StudentRequest $request)
    {
        $student = student::create($request->all());
        return response()->json(["msg" => "data dibuat", "data" => $student], 200);
    }

    function update($id, StudentRequest $request)
    {
        $student = student::findOrfail($id);
        $student->update($request->all());
        return response()->json(['msg' => 'data diubah', "data" => $student], 200);
    }

    function destroy($id)
    {
        $student = student::findOrfail($id);
        $student->delete();
        return response()->json(['msg' => 'data dihapus', 'data' => $student], 200);
    }
}
