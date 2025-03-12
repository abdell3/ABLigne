<?php

namespace App\Interfaces;

interface SubCategoryRepositoryInterface
{
    public function getAllSubCategory();

    public function getSubCategoryById($SubCategoryId);

    public function createSubCategory(array $data);

    public function updateSubCategory(array $detail, $SubCategoryId);

    public function deleteSubCategory($SubCategoryId);
}
