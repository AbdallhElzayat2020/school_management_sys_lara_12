<?php

namespace App\Http\Controllers\Classrooms;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{

    public function index()
    {
        $classrooms = Classroom::select('class_name', 'id', 'status', 'grade_id')
            ->with('grade')
            ->get();

        return view('pages.classrooms.index', compact('classrooms'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }

    public function changeStatus(string $id)
    {

    }
}
