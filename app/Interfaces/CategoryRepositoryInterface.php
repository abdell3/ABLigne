<?php

namespace App\Interfaces;

interface CategoryRepositoryInterface
{
    public function getAllCategory();

    public function getById($id);

    public function createCategory(array $data);

    public function updateCategory(array $data, $id);

    public function deleteCategory($id);
}
