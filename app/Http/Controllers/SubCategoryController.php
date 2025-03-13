<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use App\Http\Requests\StoreSubCategoryRequest;
use App\Http\Requests\UpdateSubCategoryRequest;
use Illuminate\Http\Request;
use App\SubCategoryService;

class SubCategoryController extends Controller
{

    protected $subCategoryService;

    public function __construct(SubCategoryService $subCategoryService)
    {
        $this->subCategoryService = $subCategoryService;
    }


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $perPage = $request->input('per_page', 10);

        $subCategory = $this->subCategoryService->getAllSubCategory()->paginate($perPage);

        return response()->json($subCategory);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubCategoryRequest $request)
    {
        $subCategory = $this->subCategoryService->createSubCategory($request->validated());

        return response()->json($subCategory, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(SubCategory $subCategory, $subCategoryId)
    {
        $subCategory = $this->subCategoryService->getSubCategoryById($subCategoryId);

        return response()->json($subCategory);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCategory $subCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubCategoryRequest $request, SubCategory $subCategoryId)
    {
        $subCategory = $this->subCategoryService->updateSubCategory($request->validated(), $subCategoryId);

        return response()->json($subCategory);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $subCategoryId)
    {
        $this->subCategoryService->deleteSubCategory($subCategoryId);

        return response()->json(null, 204);
    }
}
