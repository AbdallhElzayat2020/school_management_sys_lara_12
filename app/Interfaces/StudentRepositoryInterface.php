<?php

namespace App\Interfaces;

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
    public function updateStudent(int $id, array $data);
    public function deleteStudent(int $id);
}
