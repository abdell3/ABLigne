<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Http\Requests\StoreEnrollmentRequest;
use App\Http\Requests\UpdateEnrollmentRequest;
use App\Services\EnrollmentService;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $enrollmentService;


    public function __construct(EnrollmentService $enrollmentService)
    {
        $this->enrollmentService = $enrollmentService;
    }

    public function storeEnrollment(Request $request, $courseId)
    {
        $enrollment = $this->enrollmentService->createEnrollment($courseId);

        return response()->json($enrollment, 201);
    }

    public function updateEnrollment(Request $request, $enrollmentId)
    {
        $request->validate(['status' => 'required|in:accepted, rejected']);
        $enrollment = $this->enrollmentService->updateEnrollment($enrollmentId, $request->status);

        return response()->json($enrollment);
    }


    public function getUserEnrollment()
    {
        $enrollment = $this->enrollmentService->enrollmentByUser();

        return response()->json($enrollment);
    }


    public function getCourseEnrollment($courseId)
    {
        $enrollment = $this->enrollmentService->enrollmentByCourse($courseId);
        return response()->json($enrollment);
    }


    public function getAllEnrollment()
    {
        $enrollments = $this->enrollmentService->getAllEnrollment();
        return response()->json($enrollments);
    }


    public function index()
    {
        
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
    public function store(StoreEnrollmentRequest $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Enrollment $enrollment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enrollment $enrollment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEnrollmentRequest $request, Enrollment $enrollment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enrollment $enrollment)
    {
        //
    }
}
