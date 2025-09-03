<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collection = Setting::all();
        $setting['setting'] = $collection->flatMap(function ($collection) {
            return [$collection['key'] => $collection['value']];
        });

        return response()->json([
            'message' => 'success',
            'settings' => $setting,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {

            $setting = Setting::findOrFail($id);
            $setting->update($request->except(['logo']));

            if ($request->hasFile('logo')) {
                $file = $request->file('logo');
                $fileName = 'logo' . '.' . $file->getClientOriginalExtension();
                $file->storeAs('attachments/setting', $fileName, 'upload_attachments');
                $setting->update(['value' => $fileName]);
            }

            return response()->json([
                'message' => 'success',
                'setting' => $setting,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'error',
                'error' => $th->getMessage(),
            ], 500);
        }
    }
}
