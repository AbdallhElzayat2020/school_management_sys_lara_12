<?php

namespace App\Interfaces;

interface LibraryInterface
{
    public function index();

    public function store($request);

    public function update($id, $request);

    public function destroy($id);
}
