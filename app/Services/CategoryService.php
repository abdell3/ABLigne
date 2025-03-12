<?php

namespace App\Services;

use App\Repositories\CategoryRepository;

class CategoryService
{

    protected $categoryRepository;


    /**
     * Create a new class instance.
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }


    public function getAllCategory()
    {
        return $this->categoryRepository->getAllCategory();
    }


    public function getCategoryById($categoryId)
    {
        return $this->categoryRepository->getCategoryById($categoryId);
    }

    public function createCategory(array $data)
    {
        return $this->categoryRepository->createCategory($data);
    }


    public function updateCategory(array $detail, $categoryId)
    {
        return $this->categoryRepository->updateCategory($detail, $categoryId);
    }


    public function deletCategory($categoryId)
    {
        return $this->categoryRepository->deleteCategory($categoryId);
    }


}
