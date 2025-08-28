<?php

namespace App\Interfaces;

interface StudentPromotionsInterface
{
    public function index();

    public function create();

    public function store($request);

    public function edit($id);

    public function update($id, $request);

    public function destroy($request);
}
