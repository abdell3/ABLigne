<?php

namespace App\Providers;

use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Interfaces\CourseRepositoryInterface;
use App\Repositories\Interfaces\MentorRepositoryInterface;
use App\Repositories\Interfaces\TagRepositoryInterface;
use App\Repositories\Interfaces\StudentRepositoryInterface;
use App\Repositories\Interfaces\SubCategoryRepositoryInterface;
use App\Repositories\CategoryRepository;
use App\Repositories\CourseRepository;
use App\Repositories\TagRepository;
use App\Repositories\SubCategoryRepository;
use App\Services\CategoryService;
use App\Services\CourseService;
use App\Services\MentorService;
use App\Services\StudentService;
use App\Services\TagService;
use App\Services\SubCategoryService;
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

        $this->app->bind(CategoryRepositoryInterface::class, function ($app) {
            return new CategoryRepository(
                $app->make(SubCategoryRepositoryInterface::class)
            );
        });



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

        $this->app->bind(StudentService::class, function ($app){
            return new StudentService($app->make(StudentRepositoryInterface::class));
        });

        $this->app->bind(MentorService::class, function ($app){
            return new MentorService($app->make(MentorRepositoryInterface::class));
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
