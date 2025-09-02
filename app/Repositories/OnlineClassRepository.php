<?php

namespace App\Repositories;

use App\Models\OnlineClass;
use App\Services\ZoomService;
use Jubaer\Zoom\Facades\Zoom;
use App\Interfaces\OnlineClassInterface;
use App\Http\Resources\OnlineClassResource;

class OnlineClassRepository implements OnlineClassInterface
{

    protected ZoomService $zoomServices;

    public function __construct(ZoomService $zoomServices)
    {
        $this->zoomServices = $zoomServices;
    }

    public function index()
    {
        $meetings = Zoom::getAllMeeting();
        return response()->json([
            'online_classes' => OnlineClassResource::collection($meetings),
        ]);
    }

    public function store($request)
    {
        $online_classes = $this->zoomServices->store($request);

        OnlineClass::create([
            'grade_id' => $request->grade_id,
            'classroom_id' => $request->classroom_id,
            'section_id' => $request->section_id,
            'user_id' => auth()->user()->id,
            'template_id' => $online_classes->id,
            'topic' => $online_classes->topic,
            'start_time' => $online_classes->start_time,
            'duration' => $online_classes->duration,
            'password' => $online_classes->password,
        ]);

        return response()->json([
            'online_class' => new OnlineClassResource($online_classes),
        ], 201);
    }

    public function update($id, $request)
    {

        // update from Zoom
        $online_class = $this->zoomServices->update($id, $request);

        // update in DB
        $meeting = OnlineClass::findOrFail($id);
        $meeting->update([
            'grade_id' => $request->grade_id,
            'classroom_id' => $request->classroom_id,
            'section_id' => $request->section_id,
            'template_id' => $online_class->id,
            'topic' => $request->topic,
            'start_time' => $request->start_time,
            'duration' => $request->duration,
        ]);

        return response()->json([
            'message' => 'Online class updated successfully.',
        ]);
    }

    public function destroy($id)
    {
        return $this->zoomServices->destroy($id);
    }
}
