<?php

namespace App\Http\Controllers\Section;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sections\StoreSectionRequest;
use App\Http\Requests\Sections\UpdateSectionRequest;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Teacher;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('pages.sections.index', [
            'grades' => Grade::with(['sections', 'classrooms'])->get(),
            'teachers' => Teacher::select('id', 'name')->get(),
        ]);
    }


    public function store(StoreSectionRequest $request)
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
            $section->teachers()->attach($request->teacher_id);

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
    function update(UpdateSectionRequest $request, string $id): ?\Illuminate\Http\RedirectResponse
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
            $section->teachers()->sync($request->teacher_id);
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
            $section->delete();
            toastr()->success(__('tables.success_msg'));
            return redirect()->route('sections.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => __('tables.error_msg') . $e->getMessage()]);
        }
    }

    public function changeStatus($id): \Illuminate\Http\RedirectResponse
    {
        $section = Section::findOrFail($id);

        if ($section->status == 'active') {
            $section->update([
                'status' => 'inactive',
            ]);
            toastr()->success(__('tables.update_msg'));
            return redirect()->back();
        }
        $section->update([
            'status' => 'active',
        ]);
        toastr()->success(__('tables.update_msg'));
        return redirect()->back();
    }

    public function getClasses($id)
    {
        return Classroom::where('grade_id', $id)->pluck('class_name', 'id');
    }

    public function getSections($id)
    {
        return Section::where('classroom_id', $id)->pluck('section_name', 'id');
    }
}
