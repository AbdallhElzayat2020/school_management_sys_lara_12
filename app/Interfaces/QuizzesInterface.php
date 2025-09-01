<?php

namespace App\Interfaces;

interface QuizzesInterface
{
    public function index();

    public function store($request);

    public function update($id, $request);

    public function destroy($id);
}
