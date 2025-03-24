<?php

namespace App\Repositories;

use App\Models\Video;
use App\Repositories\Interfaces\VideoRepositoryInterface;

class VideoRepository implements VideoRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    function create(array $data)
    {
        return Video::create($data);
    }

    function update(Video $video, array $data)
    {
        $video->update($data);

        return $video;
    }
    

    function delete(Video $video)
    {
        return $video->delete();
    }


    function findById(int $id)
    {
        return Video::findOrFail($id);
    }


    
    function getByCourse(int $courseId)
    {
        return Video::where('course_id', $courseId)->get();
    }
    
    

}
