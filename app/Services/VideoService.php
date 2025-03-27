<?php

namespace App\Services;

use App\Repositories\VideoRepository;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Mentor;

class VideoService
{
    /**
     * Create a new class instance.
     */

    protected $videoRepository;

    public function __construct(VideoRepository $videoRepository)
    {
        $this->videoRepository = $videoRepository;
    }


    public function createVideo($data)
    {
        return $this->videoRepository->create($data);
    }


    public function updateVideo($videoId, $data)
    {
        $video = $this->videoRepository->findById($videoId);

        if(Auth::user()->id !== $video->course->mentor_id && !Auth::user()->hasRole(['mentor', 'admin']))
        {
            throw new \Exception('vous pouvez pas le modifier');
        }

        return $this->videoRepository->update($videoId, $data);
    }


    public function deleteVideo($videoId)
    {
        $video = $this->videoRepository->findById($videoId);

        if(Auth::user()->id !== $video->course->mentor_id &&  !Auth::user()->hasRole(['mentor', 'admin']))
        {
            throw new \Exception('vous pouvez pas le supprimer');
        }

        return $this->videoRepository->delete($videoId);
    }

    public function studentAccessCourse($courseId)
    {
        if (Auth::user()->hasRole('student')) {
            $userEnrolled = Enrollment::where('user_id', Auth::id())
                ->where('course_id', $courseId)
                ->where('status', 'accepted')
                ->exists();
    
            if (!$userEnrolled) {
                throw new \Exception('Error.');
            }
        }
    }


    public function getCourseVideos($courseId)
    {
        $this->studentAccessCourse($courseId);

        return $this->videoRepository->getByCourse($courseId);
    }




}
