<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;
use App\Services\VideoService;
use Illuminate\Auth\Events\Validated;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $videoService;


    public function __construct(VideoService $videoService)
    {
        $this->videoService = $videoService;
    }


    public function index($courseId)
    {
        
        $video = $this->videoService->getCourseVideos($courseId);

        return response()->json($video);
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
    public function store(StoreVideoRequest $request)
    {
        $video =  $this->videoService->createVideo($request->Validated());
        
        return response()->json($video, 201);
    }   

    /**
     * Display the specified resource.
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Video $video)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVideoRequest $request, $videoId)
    {
        $video = $this->videoService->updateVideo($videoId, $request->validated());

        return response()->json($video) ;
      }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($videoId)
    {
        $video = $this->videoService->deleteVideo($videoId);

        return response()->json($video, 204);
    }
}
