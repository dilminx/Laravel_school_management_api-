<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teachers;

class TeachersController extends Controller
{
    public function index()
    {
        $teachers = Teachers::all();
        if ($teachers->isNotEmpty()) {
            return response()->json([
                'data' => $teachers,
                'message' => 'success'
            ], 200);
        } else {
            return response()->json([
                'data' => [],
                'message' => 'not found to search'
            ], 404);
        }
    }

    public function show($id)
    {
        $teacher = Teachers::find($id);
        if ($teacher) {
            return response()->json([
                'data' => $teacher,
                'message' => 'success'
            ], 200);
        } else {
            return response()->json([
                'data' => [],
                'message' => 'teacher not found'
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'subject' => 'required'
        ]);

        $teacher = Teachers::create($request->all());

        return response()->json([
            'data' => $teacher,
            'message' => 'success saved'
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'subject' => 'required'
        ]);

        $teacher = Teachers::find($id);
        if ($teacher) {
            $teacher->update($request->all());
            return response()->json([
                'data' => $teacher,
                'message' => 'success'
            ], 200);
        } else {
            return response()->json([
                'data' => [],
                'message' => 'not found teacher'
            ], 404);
        }
    }

    public function destroy($id)
    {
        $teacher = Teachers::find($id);
        if ($teacher) {
            $teacher->delete();
            return response()->json([
                'message' => 'teacher deleted'
            ], 200);
        } else {
            return response()->json([
                'message' => 'not found teacher'
            ], 404);
        }
    }
}
