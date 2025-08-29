<?php

namespace App\Interfaces;

interface GraduatedStudentInterface
{
    public function index();

    public function create();

    public function softDelete($request);


    public function restoreStudent($id);

    public function forceDelete($id);
}
