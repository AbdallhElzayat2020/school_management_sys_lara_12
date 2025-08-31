<?php

namespace App\Interfaces;

interface ReceiptStudentsInterface
{
    public function index();

    public function show($id);

    public function edit($id);

    public function store($request);

    public function update($request);

    public function destroy($id);
}
