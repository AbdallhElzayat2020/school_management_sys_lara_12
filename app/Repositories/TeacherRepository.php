<?php

namespace App\Repositories;

use App\Interfaces\TeacherRepositoryInterface;
use App\Models\Gender;
use App\Models\Specialization;
use App\Models\Teacher;
use Illuminate\View\View;

class TeacherRepository implements TeacherRepositoryInterface
{
    public function getAll()
    {
        return Teacher::with(['gender', 'specialization'])
            ->select('id', 'name', 'email', 'updated_at', 'gender_id', 'specialization_id', 'address', 'join_date')
            ->latest()
            ->get();
    }

    public function create(): View
    {
        $genders = Gender::select('name', 'id')->get();
        $specializations = Specialization::select('name', 'id')->get();
        return view('pages.teachers.create', compact('genders', 'specializations'));
    }

    public function store($request): \Illuminate\Http\RedirectResponse
    {
        try {
            Teacher::create([
                'name' => [
                    'ar' => $request->name['ar'],
                    'en' => $request->name['en'],
                ],
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'join_date' => $request->join_date,
                'specialization_id' => $request->specialization_id,
                'gender_id' => $request->gender_id,
                'address' => $request->address,
            ]);

            flash()->success(__('tables.success_msg'));
            return back();
        } catch (\Exception $exception) {
            flash()->success(__('tables.success_msg'));
            return back();
        }
    }

    public function edit($id): View
    {
        $teacher = Teacher::findOrFail($id);
        $genders = Gender::select('name', 'id')->get();
        $specializations = Specialization::select('name', 'id')->get();

        return view('pages.teachers.edit', compact('teacher', 'genders', 'specializations'));
    }

    public function update($id, $request): \Illuminate\Http\RedirectResponse
    {
        try {
            $teacher = Teacher::findOrFail($id);

            $data = [
                'name' => [
                    'ar' => $request->input('name.ar'),
                    'en' => $request->input('name.en'),
                ],
                'email' => $request->email,
                'join_date' => $request->join_date,
                'specialization_id' => $request->specialization_id,
                'gender_id' => $request->gender_id,
                'address' => $request->address,
            ];

            if ($request->filled('password')) {
                $data['password'] = bcrypt($request->password);
            }

            $teacher->update($data);

            flash()->success(__('tables.success_msg'));
            return back();
        } catch (\Exception $e) {
            flash()->success(__('tables.success_msg'));
            return back();
        }
    }

    public function destroy($id)
    {
        Teacher::findOrFail($id)->delete();
        toastr()->success(trans('tables.delete'));
        return redirect()->route('teachers.index');
    }
}
