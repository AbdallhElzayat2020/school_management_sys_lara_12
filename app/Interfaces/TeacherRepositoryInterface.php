<?php

namespace App\Interfaces;

interface TeacherRepositoryInterface
{
    public function getAll();

    public function create();

    public function store($data);
}
