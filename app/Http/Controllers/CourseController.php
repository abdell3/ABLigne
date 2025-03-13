<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Services\CourseService;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    protected $courseService;


    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $request->validate([
            'per_page' => 'nullable|integer|min:1|max:100'
        ]);

        $perPage = $request->input('per_page', 10);

        
        $courses = $this->courseService->getAllCourses()->paginate($perPage);

        
        return response()->json($courses);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        $course = $this->courseService->createCourse($request->validated());

        
        return response()->json($course, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $courseId)
    {

        $course = $this->courseService->getCourseById($courseId);

       
        return response()->json($course);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $courseId)
    {
        $course = $this->courseService->updateCourse($request->validated(), $courseId);

        return response()->json($course);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $courseId)
    {
        $this->courseService->deleteCourse($courseId);

        return response()->json(null, 204);

    }
}
