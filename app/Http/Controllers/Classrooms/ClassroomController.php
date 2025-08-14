<?php

namespace App\Http\Controllers\Classrooms;

use App\Http\Requests\Classrooms\UpdateClassRoomRequest;
use App\Models\Grade;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Classrooms\StoreClassRoomRequest;

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


    public function store(StoreClassRoomRequest $request): ?\Illuminate\Http\RedirectResponse
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

    public function update(UpdateClassRoomRequest $request, string $id): ?\Illuminate\Http\RedirectResponse
    {
        try {
            $classroom = Classroom::findOrFail($id);

            $classroom->update([
                'class_name' => [
                    'ar' => $request->class_name['ar'],
                    'en' => $request->class_name['en']
                ],
                'grade_id' => $request->grade_id,
                'status' => $request->status ?? $classroom->status,
            ]);

            toastr()->success(__('tables.success_msg'));
            return to_route('classrooms.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => __('tables.error_msg') . $e->getMessage()]);
        }
    }

    public function destroy(string $id): ?\Illuminate\Http\RedirectResponse
    {
        try {
            $classroom = Classroom::findOrFail($id);
            $classroom->delete();

            toastr()->success(__('tables.success_msg'));
            return to_route('classrooms.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => __('tables.error_msg') . $e->getMessage()]);
        }
    }

    public function changeStatus(string $id): ?\Illuminate\Http\RedirectResponse
    {
        try {
            $classroom = Classroom::findOrFail($id);

            $classroom->status = $classroom->status === 'active' ? 'inactive' : 'active';
            $classroom->save();

            toastr()->success(__('tables.success_msg'));
            return redirect()->back();
        } catch (\Exception $e) {
            toastr()->error(__('tables.error_msg') . $e->getMessage());
            return redirect()->back();
        }
    }
}
