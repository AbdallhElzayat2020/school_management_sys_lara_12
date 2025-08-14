<?php

use App\Http\Controllers\Classrooms\ClassroomController;
use App\Http\Controllers\Grades\GradeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Section\SectionController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
});

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:web']
    ],
    function () {


        Route::middleware('auth')->group(function () {
            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        });

        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard.index');


        /*  ============ Grades Routes ============  */
        Route::resource('grades', GradeController::class);
        Route::post('grades/change-status/{id}', [GradeController::class, 'changeStatus'])->name('grade.change-status');

        /*  ============ Classrooms Routes ============  */
        Route::resource('classrooms', ClassroomController::class);
        Route::post('classrooms/change-status/{id}', [ClassroomController::class, 'changeStatus'])->name('classroom.change-status');

        /*  ============ Sections Routes ============  */
        Route::resource('sections', SectionController::class);
        Route::get('get-classes/{id}', [SectionController::class, 'getClasses'])->name('sections.get-classes');
        Route::post('sections/change-status/{id}', [SectionController::class, 'changeStatus'])->name('sections.change-status');


    }
);


require __DIR__ . '/auth.php';
