<?php



use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\VideoController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::middleware('auth:api')->group(function () {
    
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);

    Route::get('/categories', [CategoryController::class, 'index']);
    Route::post('/categories', [CategoryController::class, 'store']);
    Route::get('/categories/{id}', [CategoryController::class, 'show']);
    Route::put('/categories/{id}', [CategoryController::class, 'update']);
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);


    Route::get('/sub-categories', [SubCategoryController::class, 'index']);
    Route::post('/sub-categories', [SubCategoryController::class, 'store']);
    Route::get('/sub-categories/{id}', [SubCategoryController::class, 'show']);
    Route::put('/sub-categories/{id}', [SubCategoryController::class, 'update']);
    Route::delete('/sub-categories/{id}', [SubCategoryController::class, 'destroy']);
    Route::get('/tags', [TagController::class, 'index']);
    Route::post('/tags', [TagController::class, 'store']);
    Route::get('/tags/{id}', [TagController::class, 'show']);
    Route::put('/tags/{id}', [TagController::class, 'update']);
    Route::delete('/tags/{id}', [TagController::class, 'destroy']);

     Route::prefix('courses')->group(function (){
          Route::get('/', [CourseController::class, 'index']);
          Route::post('/', [CourseController::class, 'store'])
               ->middleware(['role:mentor']);
          Route::get('/{course}', [CourseController::class, 'show']);
          Route::put('/{course}', [CourseController::class, 'update'])
               ->Middleware('permission:edit-course');
          Route::delete('/courses/{course}', [CourseController::class, 'destroy'])
               ->middleware('permission:delete-course');
          Route::get('/{course}/videos', [VideoController::class, 'index']);
          Route::post('/{course}/videos', [VideoController::class, 'store'])
                    ->middleware('permission:create-video');

     });


     Route::prefix('enrollments')->group(function (){
          Route::get('/', [EnrollmentController::class, 'getAllEnrollment'])
               ->middleware('permission:view-enrollments');
 
          Route::post('/{course}/enrollment', [EnrollmentController::class, 'storeEnrollment']);
          
          Route::put('/{enrollments}', [EnrollmentController::class, 'updateEnrollment'])
               ->middleware('permission:update-enrollments');
     })  ;   

    
    Route::prefix('videos')->group(function (){

         Route::post('/', [VideoController::class, 'store'])
               ->middleware(['role:mentor','permission:create-video']);
         Route::put('/{video}', [VideoController::class, 'update'])
               ->middleware('permission:edit-video');
         Route::delete('/videos/{video}', [VideoController::class, 'destroy'])
               ->middleware('permission:delete-video');
    });
    

    


    Route::apiResource('students', StudentController::class);

    Route::apiResource('mentors', MentorController::class);

    Route::get('/courses/statistics', [CourseController::class, 'getStatistics'])
    ->middleware('view-statistique');
});