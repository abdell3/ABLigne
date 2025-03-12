<?php

namespace App\Providers;

use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\CourseRepositoryInterface;
use App\Interfaces\Interfaces\TagRepositoryInterface;
use App\Interfaces\SubCategoryRepositoryInterface;
use App\Repositories\CategoryRepository;
use App\Repositories\CourseRepository;
use App\Repositories\TagRepository;
use App\Services\CategoryService;
use App\Services\CourseService;
use App\Services\TagService;
use App\SubCategoryRepository;
use App\SubCategoryService;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(CourseRepositoryInterface::class, CourseRepository::class);
        $this->app->bind(SubCategoryRepositoryInterface::class, SubCategoryRepository::class);
        $this->app->bind(TagRepositoryInterface::class, TagRepository::class);



        $this->app->bind(CategoryService::class, function ($app) {
            return new CategoryService($app->make(CategoryRepositoryInterface::class));
        });

        $this->app->bind(CourseService::class, function ($app) {
            return new CourseService($app->make(CourseRepositoryInterface::class));
        });

        $this->app->bind(SubCategoryService::class, function ($app) {
            return new SubCategoryService($app->make(SubCategoryRepositoryInterface::class));
        });

        $this->app->bind(TagService::class, function ($app){
            return new TagService($app->make(TagRepositoryInterface::class));
        });

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
