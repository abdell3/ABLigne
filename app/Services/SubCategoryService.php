<?php

namespace App;

class SubCategoryService
{


    protected $subCategoryRepository;


    /**
     * Create a new class instance.
     */
    public function __construct(SubCategoryRepository $subCategoryRepository)
    {
        $this->subCategoryRepository = $subCategoryRepository;
    }


    public function getAllSubCategory()
    {
        return $this->subCategoryRepository->getAllSubCategory();
    }


    public function getSubCategoryById($subCategoryId)
    {
        return $this->subCategoryRepository->getSubCategoryById($subCategoryId);
    }


    public function createSubCategory(array $data)
    {
        return $this->subCategoryRepository->createSubCategory($data);
    }


    public function updateSubCategory(array $detail, $subCategoryId)
    {
        return $this->subCategoryRepository->updateSubCategory($detail, $subCategoryId) ;
    }

    public function deleteSubCategory($subCategoryId)
    {
        return $this->subCategoryRepository->deleteSubCategory($subCategoryId);
    }





}
