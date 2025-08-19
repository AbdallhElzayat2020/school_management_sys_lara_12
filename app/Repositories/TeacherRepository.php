<?php

namespace App\Repositories;

use App\Interfaces\TeacherRepositoryInterface;
use App\Models\Gender;
use App\Models\Specialization;
use App\Models\Teacher;

class TeacherRepository implements TeacherRepositoryInterface
{
    public function getAll()
    {
        return Teacher::select('id', 'name', 'email', 'updated_at', 'gender_id', 'specialization_id')->get();
    }

    public function create()
    {
        $genders = Gender::select('name', 'id')->get();
        $specializations = Specialization::select('name', 'id')->get();
        return view('pages.teachers.create', compact('genders', 'specializations'));
    }

    public function store($data)
    {

    }
}
