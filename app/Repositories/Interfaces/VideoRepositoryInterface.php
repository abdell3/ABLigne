<?php

namespace App\Repositories\Interfaces;

use App\Models\Video;

interface VideoRepositoryInterface
{
    public function create(array $data);
    public function update(Video $video, array $data);
    public function delete(Video $video);
    public function findById(int $id);
    public function getByCourse(int $courseId);
}
