<?php

namespace App\Repositories;

use App\Models\Grade;
use App\Models\Image;
use App\Models\Gender;
use App\Models\Student;
use App\Models\MyParent;
use App\Models\Classroom;
use App\Models\TypeBlood;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Support\Str;
use App\Models\Nationalitie;
use App\Interfaces\StudentRepositoryInterface;

class StudentRepository implements StudentRepositoryInterface
{
    public function getNationalities()
    {
        return Nationalitie::all();
    }

    public function getGenders()
    {
        return Gender::all();
    }

    public function getBloodTypes()
    {
        return TypeBlood::all();
    }

    public function getGrades()
    {
        return Grade::all();
    }

    public function getClassrooms()
    {
        return Classroom::all();
    }

    public function getParents()
    {
        return MyParent::all();
    }

    public function getAllStudents()
    {
        return Student::with(['section', 'gender', 'grade', 'classroom', 'images'])->paginate(9);
    }

    public function createStudent(): View
    {
        $genders = $this->getGenders();
        $bloods = $this->getBloodTypes();
        $nationalities = $this->getNationalities();
        $grades = $this->getGrades();
        $classrooms = $this->getClassrooms();
        $parents = $this->getParents();

        return view('pages.students.create', compact(
            'genders',
            'bloods',
            'nationalities',
            'grades',
            'classrooms',
            'parents'
        ));
    }

    public function storeStudent($request)
    {
        try {
            DB::beginTransaction();
            $student = Student::create([
                'name' => [
                    'ar' => $request->name['ar'],
                    'en' => $request->name['en'],
                ],
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'academic_year' => $request->academic_year,
                'classroom_id' => $request->classroom_id,
                'blood_type_id' => $request->blood_type_id,
                'date_birth' => $request->date_birth,
                'gender_id' => $request->gender_id,
                'nationality_id' => $request->nationality_id,
                'parent_id' => $request->parent_id,
                'grade_id' => $request->grade_id,
                'section_id' => $request->section_id,
            ]);

            if ($request->hasFile('photos')) {
                foreach ($request->photos as $file) {
                    $filename = $file->getClientOriginalName();
                    $path = 'attachments/students/' . Str::slug($request->name['en']);

                    $file->storeAs($path, $filename, 'upload_attachments');

                    $imgModel = new Image();
                    $imgModel->url = $path . '/' . $filename;
                    $imgModel->imageable_id = $student->id;
                    $imgModel->imageable_type = Student::class;
                    $imgModel->save();
                }
            }
            DB::commit();

            flash()->success(__('tables.success_msg'));
            return back();
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }
    }

    public function getStudentById(int $id)
    {
        return Student::with(['images', 'grade', 'classroom', 'section', 'parent'])->findOrFail($id);
    }

    public function showStudent($id)
    {
        $student = $this->getStudentById($id);
        return view('pages.students.show', compact('student'));
    }

    public function editStudent(int $id)
    {
        $student = $this->getStudentById($id);
        $genders = $this->getGenders();
        $bloods = $this->getBloodTypes();
        $nationalities = $this->getNationalities();
        $grades = $this->getGrades();
        $classrooms = $this->getClassrooms();
        $parents = $this->getParents();
        return view(
            'pages.students.edit',
            compact('student', 'nationalities', 'nationalities', 'classrooms', 'genders', 'bloods', 'grades', 'parents')
        );
    }


    public function updateStudent(int $id, $request)
    {
        $student = $this->getStudentById($id);
        if ($request->password) {
            $student->password = bcrypt($request->password);
        }
        $student->update([
            'name' => [
                'ar' => $request->name['ar'],
                'en' => $request->name['en'],
            ],
            'email' => $request->email,
            'academic_year' => $request->academic_year,
            'classroom_id' => $request->classroom_id,
            'blood_type_id' => $request->blood_type_id,
            'date_birth' => $request->date_birth,
            'gender_id' => $request->gender_id,
            'nationality_id' => $request->nationality_id,
            'parent_id' => $request->parent_id,
            'grade_id' => $request->grade_id,
            'section_id' => $request->section_id,
        ]);

        // Handle photo uploads
        if ($request->hasFile('photos')) {
            foreach ($request->photos as $file) {
                $filename = $file->getClientOriginalName();
                $path = 'attachments/students/' . Str::slug($request->name['en']);

                $file->storeAs($path, $filename, 'upload_attachments');

                $student->images()->update([
                    'url' => $path . '/' . $filename,
                    'imageable_id' => $student->id,
                    'imageable_type' => Student::class,
                ]);
            }
        }

        flash()->success(__('tables.success_msg'));
        return back();
    }


    public function uploadAttachment($request): \Illuminate\Http\RedirectResponse
    {
        if ($request->hasFile('photos')) {
            foreach ($request->photos as $file) {
                $filename = $file->getClientOriginalName();
                $path = 'attachments/students/' . Str::slug($request->student_name);

                $file->storeAs($path, $filename, 'upload_attachments');

                $imgModel = new Image();
                $imgModel->url = $path . '/' . $filename;
                $imgModel->imageable_id = $request->student_id;
                $imgModel->imageable_type = Student::class;
                $imgModel->save();
            }
        }
        flash()->success(__('tables.success_msg'));
        return back();
    }

    public function deleteAttachment($request): \Illuminate\Http\RedirectResponse
    {
        try {
            $image = Image::findOrFail($request->id);

            // Delete file from storage
            $filePath = public_path($image->url);
            if (file_exists($filePath)) {
                unlink($filePath);
            }

            // Delete record from database
            $image->delete();

            flash()->success('تم حذف المرفق بنجاح');
        } catch (\Exception $e) {
            flash()->error('حدث خطأ أثناء حذف المرفق: ' . $e->getMessage());
        }

        return back();
    }

    public function downloadAttachment($student_name, $file_name)
    {
        $file = public_path('attachments/students/' . $student_name . '/' . $file_name);

        if (file_exists($file)) {
            return response()->download($file);
        }

        flash()->error('الملف غير موجود');
        return back();
    }

    public function deleteStudent(int $id)
    {
        $student = $this->getStudentById($id);
        $student->delete();
        flash()->success(__('tables.delete_msg'));
        return back();
    }
}
