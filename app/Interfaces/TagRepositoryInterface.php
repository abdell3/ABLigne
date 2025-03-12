<?php

namespace App\Interfaces\Interfaces;

interface TagRepositoryInterface
{
    public function getAllTags();

    public function getTagById($TagId);

    public function createTag(array $data);

    public function updateTag(array $detail, $TagId);

    public function deleteTag($TagId);
}
