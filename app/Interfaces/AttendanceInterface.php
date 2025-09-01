<?php

namespace App\Interfaces;

interface AttendanceInterface
{
    public function index();

    public function show($id);

    public function store($request);

    public function edit($id);

    public function update($id, $request);

    public function destroy($id);
}
