<?php

namespace App\Repositories;

use App\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;
use App\SubCategoryRepository;

class CategoryRepository implements CategoryRepositoryInterface

{


    protected $subCategoryRepository;


    /**
     * Create a new class instance.
     */
    public function __construct(SubCategoryRepository $subCategoryRepository)
    {
        $this->subCategoryRepository = $subCategoryRepository;

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
        $this->subCategoryRepository->deleteSubCategoriesByCategoryId($Categoryid);
        return Category::destroy($Categoryid);
    }


}
