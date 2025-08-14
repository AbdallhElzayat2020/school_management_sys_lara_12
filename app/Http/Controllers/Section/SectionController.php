<?php

namespace App\Http\Controllers\Section;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sections\StoreSectionRequest;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grades = Grade::with('sections')->get();

        $list_grades = Grade::with('sections', 'classrooms')->get();

        return view('pages.sections.index', compact('grades', 'list_grades'));
    }


    public function store(StoreSectionRequest $request): ?\Illuminate\Http\RedirectResponse
    {
        try {
            $section = Section::create([
                'section_name' => [
                    'ar' => $request->section_name['ar'],
                    'en' => $request->section_name['en']
                ],
                'grade_id' => $request->grade_id,
                'classroom_id' => $request->classroom_id,
            ]);
            if (!$section->save()) {
                toastr()->error(__('tables.error_msg'));
                return back();
            }
            toastr()->success(__('tables.success_msg'));
            return redirect()->route('sections.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => __('tables.error_msg') . $e->getMessage()]);
        }
    }


    public
    function update(Request $request, string $id): ?\Illuminate\Http\RedirectResponse
    {
        try {
            $section = Section::findOrFail($id);

            $section->update([
                'section_name' => [
                    'ar' => $request->section_name['ar'],
                    'en' => $request->section_name['en']
                ],
                'grade_id' => $request->grade_id,
                'classroom_id' => $request->classroom_id,
                'status' => $request->status,
            ]);
            if (!$section->save()) {
                toastr()->error(__('tables.error_msg'));
                return back();
            }
            toastr()->success(__('tables.success_msg'));
            return redirect()->route('sections.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => __('tables.error_msg') . $e->getMessage()]);
        }
    }

    public
    function destroy(string $id): ?\Illuminate\Http\RedirectResponse
    {
        try {
            $section = Section::findOrFail($id);
            if (!$section) {
                toastr()->error(__('tables.error_msg'));
                return redirect()->route('sections.index');
            }
            $section->delete();
            toastr()->success(__('tables.success_msg'));
            return redirect()->route('sections.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => __('tables.error_msg') . $e->getMessage()]);
        }

    }

    public
    function changeStatus(Request $request)
    {

    }

    public
    function getClasses($id)
    {
        return Classroom::where('grade_id', $id)->pluck('class_name', 'id');
    }
}
