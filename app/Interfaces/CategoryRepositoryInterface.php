<?php

namespace App\Interfaces;

interface CategoryRepositoryInterface
{
    public function getAllCategory();

    public function getCategoryById($Categoryid);

    public function createCategory(array $data);

    public function updateCategory(array $detail, $CategoryId);

    public function deleteCategory($CategoryId);
}
