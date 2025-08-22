<?php

namespace App\Interfaces;

interface TeacherRepositoryInterface
{
    public function getAll();

    public function create();

    public function store($request);

    public function edit($id);

    public function update($id, $request);

    public function destroy($id);
}
