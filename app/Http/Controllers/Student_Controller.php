<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;


class Student_Controller extends Controller
{
    public function index()
    {
        $students = Student::all();
        return $students;
    }
    public function show($id)
    {
        $student = Student::find($id);

        if ($student) {
            return response()->json($student);
        } else {
            return response()->json(["message" => "User not found"], 404);
        }
    }


    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|string",
            "age" => "required|integer",
            "gender" => "required|string",
        ]);
        $student = Student::create($request->all());
        return response()->json([$student, "status" => 200, "message" => "Successfully created"]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => "required|string",
            "age" => "required|integer",
            "gender" => "required|string",
        ]);
        $student = Student::find($id);
        $student->update($request->all());
        return $student;
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        if ($student) {

            Student::destroy($id);
            return response()->json(["message" => "delete successfully"]);
        } else {
            return response()->json(["message" => "user not found"], 404);
        }
    }


}
