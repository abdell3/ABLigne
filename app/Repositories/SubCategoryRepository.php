<?php

namespace App;

use App\Interfaces\SubCategoryRepositoryInterface;
use App\Models\SubCategory;

class SubCategoryRepository implements SubCategoryRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        
    }


    public function getAllSubCategory()
    {
        return SubCategory::query()->get();
    }

    public function getSubCategoryById($SubCategoryId)
    {
        return SubCategory::findOrFail($SubCategoryId);
    }

    public function createSubCategory(array $data)
    {
        return SubCategory::create($data);
    }


    public function updateSubCategory(array $detail, $SubCategoryId)
    {
        return SubCategory::whereId($SubCategoryId)->update($detail);
    }


    public function deleteSubCategory($SubCategoryId)
    {
        return SubCategory::destroy($SubCategoryId);
    }
}
