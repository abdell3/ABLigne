<?php

namespace App\Http\Controllers;

use App\Services\MentorService;
use Illuminate\Http\Request;

class MentorController extends Controller
{
    protected $mentorService;

    public function __construct(MentorService $mentorService)
    {
        $this->mentorService = $mentorService;
    }

    public function index()
    {
        $mentors = $this->mentorService->getAllMentors();
        return response()->json($mentors);
    }

    public function store(Request $request)
    {
        $mentor = $this->mentorService->createMentor($request->all());
        return response()->json($mentor, 201);
    }

    public function show($id)
    {
        $mentor = $this->mentorService->getMentorById($id);
        return response()->json($mentor);
    }

    public function update(Request $request, $id)
    {
        $mentor = $this->mentorService->updateMentor($id, $request->all());
        return response()->json($mentor);
    }

    public function destroy($id)
    {
        $this->mentorService->deleteMentor($id);
        return response()->json(null, 204);
    }
}
