<?php

namespace App\Repositories;

use App\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;


class CategoryRepository implements CategoryRepositoryInterface

{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        
    }
    
    public function getAllCategory()
    {
        return Category::query()->get();
    }

    public function getCategoryById($Categoryid)
    {
        return Category::findOrFail($Categoryid);
    }


    public function createCategory(array $data)
    {
        return Category::create($data);
    }


    public function updateCategory(array $data, $Categoryid)
    {
        return Category::whereId($Categoryid)->update($data);
    }

    public function deleteCategory($Categoryid)
    {
        return Category::destroy($Categoryid);
    }


}
