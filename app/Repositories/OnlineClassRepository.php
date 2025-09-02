<?php

namespace App\Repositories;

use App\Models\OnlineClass;
use Jubaer\Zoom\Facades\Zoom;
use App\Interfaces\OnlineClassInterface;
use App\Http\Resources\OnlineClassResource;

class OnlineClassRepository implements OnlineClassInterface
{
    public function index()
    {
        $meetings = Zoom::getAllMeeting();
        return response()->json([
            'online_classes' => OnlineClassResource::collection($meetings),
        ]);
    }

    public function store($request)
    {
        $online_classes = Zoom::createMeeting([
            'grade_id' => $request->input('grade_id'),
            'classroom_id' => $request->input('classroom_id'),
            'section_id' => $request->input('section_id'),
            'user_id' => $request->input('user_id'),
            'template_id' => $request->input('template_id'),
            'topic' => $request->input('topic'),
            'start_time' => $request->input('start_time'),
            'duration' => $request->input('duration'),
            'password' => $request->input('password'),
        ]);

        return response()->json([
            'online_class' => new OnlineClassResource($online_classes),
        ], 201);
    }

    public function update($id, $request)
    {
        $meetingId = Zoom::getMeeting($id);
        Zoom::updateMeeting($meetingId, [
            'grade_id' => $request->input('grade_id'),
            'classroom_id' => $request->input('classroom_id'),
            'section_id' => $request->input('section_id'),
            'user_id' => $request->input('user_id'),
            'template_id' => $request->input('template_id'),
            'topic' => $request->input('topic'),
            'start_time' => $request->input('start_time'),
            'duration' => $request->input('duration'),
            'password' => $request->input('password'),
        ]);

        return response()->json([
            'message' => 'Online class updated successfully.',
        ]);
    }

    public function destroy($id)
    {
        $meetingId = Zoom::getMeeting($id);
        Zoom::deleteMeeting($meetingId);

        return response()->json([
            'message' => 'Online class deleted successfully.',
        ]);
    }
}
