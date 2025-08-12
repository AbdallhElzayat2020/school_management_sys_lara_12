<?php

namespace App\Http\Controllers\Classrooms;

use App\Http\Controllers\Controller;
use App\Http\Requests\Classrooms\StoreClassRoomRequest;
use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{

    public function index()
    {
        $classrooms = Classroom::select('class_name', 'id', 'status', 'grade_id')
            ->with('grade')
            ->get();

        $grades = Grade::select('name', 'id')
            ->latest()
            ->get();

        return view('pages.classrooms.index', compact('classrooms', 'grades'));
    }


    public function store(StoreClassRoomRequest $request)
    {
        try {
            $List_Classes = $request->List_Classes;
            $classrooms = [];

            foreach ($List_Classes as $class) {
                $classrooms[] = Classroom::create([
                    'class_name' => [
                        'ar' => $class['ar'],
                        'en' => $class['en']
                    ],
                    'grade_id' => $class['grade_id'],
                ]);
            }

            toastr()->success(__('tables.success_msg'));
            return to_route('classrooms.index');
        } catch (\Exception $e) {
            toastr()->success(__('tables.error_msg'));
            return redirect()->back();
        }
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
