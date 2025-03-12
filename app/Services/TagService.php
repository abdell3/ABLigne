<?php

namespace App\Services;

use App\Repositories\TagRepository;

class TagService
{


    protected $tagRepository;



    /**
     * Create a new class instance.
     */
    public function __construct(TagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }


    public function getAllTag()
    {
        return $this->tagRepository->getAllTags();
    }


    public function getTagById($tagId)
    {
        return $this->tagRepository->getTagById($tagId);
    }


    public function createTag(array $data)
    {
        return $this->tagRepository->createTag($data);
    }


    public function updateTag(array $detail, $tagId)
    {
        return $this->tagRepository->updateTag($detail, $tagId);
    }


    public function deleteTag($tagId)
    {
        return $this->tagRepository->deleteTag($tagId);
    }




}
