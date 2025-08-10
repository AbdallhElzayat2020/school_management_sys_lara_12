<?php

namespace App\Http\Controllers\Grades;

use App\Http\Controllers\Controller;
use App\Http\Requests\Grades\StoreGradeRequest;
use App\Http\Requests\Grades\UpdateGradeRequest;
use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{

    public function index()
    {
        $grades = Grade::all();
        return view('pages.grades.index', compact('grades'));
    }


    public function store(StoreGradeRequest $request): \Illuminate\Http\RedirectResponse
    {
//        if (Grade::where('name->ar',$request->name['ar'])->orWhere('name->en',$request->name['en'])->exists()) {
//            toastr()->error(__('tables.already_exists'));
//            return redirect()->back()->with('error', __('tables.already_exists'));
//        }

        

        try {
            $grade = Grade::create([
                'name' => [
                    'ar' => $request->name['ar'],
                    'en' => $request->name['en'],
                ],
                'status' => $request->status,
                'notes' => [
                    'ar' => $request->notes['ar'],
                    'en' => $request->notes['en'],
                ],
            ]);
            if (!$grade) {
                toastr()->success(__('tables.error_msg'));
                return redirect()->back()->with('error', __('tables.error_msg'));
            }
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', __('tables.error_msg' . ' ' . $exception->getMessage()));
        }
        toastr()->success(__('tables.success_msg'));

        return redirect()->route('grades.index');

    }


    public function update(UpdateGradeRequest $request, string $id)
    {
        $grade = Grade::findOrFail($id);
        try {
            $grade->update([
                'name' => [
                    'ar' => $request->name['ar'],
                    'en' => $request->name['en'],
                ],

                'status' => $request->status,
                'notes' => [
                    'ar' => $request->notes['ar'],
                    'en' => $request->notes['en'],
                ],
            ]);
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', __('tables.error_msg' . ' ' . $exception->getMessage()));
        }

        toastr()->success(__('tables.update_msg'));
        return redirect()->route('grades.index');
    }

    public function destroy(string $id)
    {
        $grade = Grade::findOrFail($id);
        try {
            $grade->delete();
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', __('tables.error_msg' . ' ' . $exception->getMessage()));
        }
        toastr()->success(__('tables.delete_msg'));
        return redirect()->route('grades.index');
    }

    public function changeStatus($id)
    {
        $grade = Grade::findOrFail($id);
        if (!$grade) {
            abort(404, __('messages.not_found'));
        }

        if ($grade->status == 'active') {
            $grade->update([
                'status' => 'inactive',
            ]);
            toastr()->success(__('tables.update_msg'));
            return redirect()->back();
        }
        $grade->update([
            'status' => 'active',
        ]);
        toastr()->success(__('tables.update_msg'));
        return redirect()->back();
    }
}
