<?php

namespace App\Http\Controllers\Parents;

use App\Http\Controllers\Controller;
use App\Models\MyParent;
use App\Models\Nationalitie;
use App\Models\Religion;
use App\Models\TypeBlood;

class StudentParentController extends Controller
{
    public function index()
    {
        return 'parents home';
    }

    public function create()
    {
        return view('pages.parents.add-parent');
    }
}
