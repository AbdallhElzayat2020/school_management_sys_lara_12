<?php

use Livewire\Livewire;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Exams\ExamController;
use App\Http\Controllers\Grades\GradeController;
use App\Http\Controllers\Students\FeesController;
use App\Http\Controllers\Quizzes\QuizzeController;
use App\Http\Controllers\Section\SectionController;
use App\Http\Controllers\Teacher\TeacherController;
use App\Http\Controllers\Students\StudentController;
use App\Http\Controllers\Subjects\SubjectController;
use App\Http\Controllers\Questions\QuestionController;
use App\Http\Controllers\Students\GraduatedController;
use App\Http\Controllers\Students\AttendanceController;
use App\Http\Controllers\Classrooms\ClassroomController;
use App\Http\Controllers\Parents\StudentParentController;
use App\Http\Controllers\Students\FeesInvoicesController;
use App\Http\Controllers\Students\ReceiptStudentsController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Students\StudentPromotionsController;

Route::get('/', function () {
    return view('auth.login');
});


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
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
        Route::get('get-sections/{id}', [SectionController::class, 'getSections'])->name('get-sections');
        Route::post('sections/change-status/{id}', [SectionController::class, 'changeStatus'])->name('sections.change-status');
        // ======================= get classes and sections in ajax =======================

        /*  ============ Parents Routes ============  */

        Route::resource('parents', StudentParentController::class);
        Route::get('show-parent/{id}', [StudentParentController::class, 'showParent'])->name('parents.show');

        /*  ============ Parents Routes ============  */
        Route::resource('teachers', TeacherController::class);
        Route::post('teachers/change-status/{id}', [TeacherController::class, 'changeStatus'])->name('teacher.change-status');

        /*  ============ Students Routes ============  */
        Route::resource('students', StudentController::class);
        Route::post('upload_attachment', [StudentController::class, 'uploadAttachment'])->name('students.upload_attachment');
        Route::delete('delete_attachment', [StudentController::class, 'deleteAttachment'])->name('students.delete_attachment');
        Route::get('download_attachment/{student_name}/{file_name}', [StudentController::class, 'downloadAttachment'])->name('students.download_attachment');

        /*  ============ student-promotion Routes ============  */
        Route::resource('student-promotion', StudentPromotionsController::class);

        /*  ============ graduated-student Routes ============  */
        Route::resource('graduated-student', GraduatedController::class);

        /*  ============ student-Fees Routes ============  */
        Route::resource('student-fees', FeesController::class);

        /*  ============ FeesInvoices Routes ============  */
        Route::resource('fees-invoices', FeesInvoicesController::class);

        /*  ============ FeesInvoices Routes ============  */
        Route::resource('recept-students', ReceiptStudentsController::class);

        /*  ============ Attendance Routes ============  */
        Route::resource('attendance', AttendanceController::class);

        /*  ============ Subjects Routes ============  */
        Route::resource('subjects', SubjectController::class);

        /*  ============ Quizzes Routes ============  */
        Route::resource('quizzes', QuizzeController::class);

        /*  ============ Questions Routes ============  */
        Route::resource('questions', QuestionController::class);



        /*  For laravel localization with livewire   */
        Livewire::setUpdateRoute(function ($handle) {
            return Route::post('/livewire/update', $handle);
        });
    }
);

require __DIR__ . '/auth.php';
