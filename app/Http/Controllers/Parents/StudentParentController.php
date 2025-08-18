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
        $my_parents = MyParent::all();
        return view('pages.parents.index', compact('my_parents'));
    }

    public function create()
    {
        return view('pages.parents.add-parent');
    }

    public function showParent($id)
    {
        $Nationalities = Nationalitie::all();
        $Type_Bloods = TypeBlood::all();
        $Religions = Religion::all();
        $parent = MyParent::findOrFail($id);
        return view('pages.parents.show-parent', compact('parent', 'Nationalities', 'Type_Bloods', 'Religions'));
    }
}
