<?php

namespace App\Repositories;

use App\Models\Grade;
use App\Models\Gender;
use App\Models\Classroom;
use App\Models\TypeBlood;
use App\Models\Nationalitie;
use App\Interfaces\StudentRepositoryInterface;
use App\Models\MyParent;
use App\Models\Student;
use Illuminate\View\View;

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

        if (!$student->save()) {
            flash()->error(__('tables.error_msg'));
        }
        flash()->success(__('tables.success_msg'));
        return back();
    }

    public function getStudentById(int $id)
    { //
    }

    public function updateStudent(int $id, array $data)
    { //
    }

    public function deleteStudent(int $id)
    { //
    }
}
