<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface StudentRepositoryInterface
{
    public function getNationalities();

    public function getGenders();

    public function getBloodTypes();

    public function getGrades();

    public function getClassrooms();

    public function getParents();

    public function createStudent();

    public function storeStudent($request);

    public function getStudentById(int $id);

    public function getAllStudents();

    public function updateStudent(int $id, $request);

    public function editStudent(int $id);

    public function showStudent($id);

    public function uploadAttachment($request);

    public function deleteAttachment($request);

    public function downloadAttachment($student_name, $file_name);

    public function deleteStudent(int $id);
}
