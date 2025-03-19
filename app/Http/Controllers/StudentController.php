<?php

namespace App\Http\Controllers;

use App\Services\StudentService;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected $studentService;

    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }

    public function index()
    {
        $students = $this->studentService->getAllStudents();
        return response()->json($students);
    }

    public function store(Request $request)
    {
        $student = $this->studentService->createStudent($request->all());
        return response()->json($student, 201);
    }

    public function show($id)
    {
        $student = $this->studentService->getStudentById($id);
        return response()->json($student);
    }

    public function update(Request $request, $id)
    {
        $student = $this->studentService->updateStudent($id, $request->all());
        return response()->json($student);
    }

    public function destroy($id)
    {
        $this->studentService->deleteStudent($id);
        return response()->json(null, 204);
    }
}
