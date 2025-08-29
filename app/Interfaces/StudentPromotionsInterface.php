<?php

namespace App\Interfaces;

interface StudentPromotionsInterface
{
    public function index();

    public function create();

    public function store($request);

    public function destroy($request);
}
