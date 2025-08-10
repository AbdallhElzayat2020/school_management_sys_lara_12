<?php

namespace App\Http\Controllers\Grades;

use App\Http\Controllers\Controller;
use App\Http\Requests\Grades\StoreGradeRequest;
use App\Http\Requests\Grades\UpdateGradeRequest;
use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grades = Grade::all();
        return view('pages.grades.index', compact('grades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGradeRequest $request): \Illuminate\Http\RedirectResponse
    {

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

    /**
     * Remove the specified resource from storage.
     */
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
}
