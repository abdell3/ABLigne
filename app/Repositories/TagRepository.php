<?php

namespace App\Repositories;

use App\Interfaces\Interfaces\TagRepositoryInterface;
use App\Models\Tag;

class TagRepository implements TagRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        
    }


    public function getAllTags()
    {
        return Tag::query()->get();
    }

    public function getTagById($TagId)
    {
        return Tag::findOrFail($TagId);
    }


    public function createTag(array $data)
    {
        return Tag::create($data);
    }


    public function updateTag(array $detail, $TagId)
    {
        return Tag::whereId($TagId)->update($detail);
    }

    public function deleteTag($TagId)
    {
        return Tag::destroy($TagId);
    }
}
