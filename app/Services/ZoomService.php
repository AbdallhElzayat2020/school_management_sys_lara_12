<?php

namespace App\Services;

use App\Http\Resources\OnlineClassResource;
use App\Models\OnlineClass;
use Jubaer\Zoom\Facades\Zoom;

class ZoomService
{
    public function store($request)
    {
        return Zoom::createMeeting([
            'template_id' => $request->input('template_id'),
            'topic' => $request->input('topic'),
            'start_time' => $request->input('start_time'),
            'duration' => $request->input('duration'),
            'password' => $request->input('password'),
            "settings" => [
                'join_before_host' => false, // if you want to join before host set true otherwise set false
                'host_video' => false, // if you want to start video when host join set true otherwise set false
                'participant_video' => false, // if you want to start video when participants join set true otherwise set false
                'mute_upon_entry' => false, // if you want to mute participants when they join the meeting set true otherwise set false
                'waiting_room' => false, // if you want to use waiting room for participants set true otherwise set false
                'audio' => 'both', // values are 'both', 'telephony', 'voip'. default is both.
                'auto_recording' => 'none', // values are 'none', 'local', 'cloud'. default is none.
                'approval_type' => 0, // 0 => Automatically Approve, 1 => Manually Approve, 2 => No Registration Required
            ],
        ]);
    }


    public function update($id, $request)
    {
        $meetingId = Zoom::getMeeting($id);
        return Zoom::updateMeeting($meetingId, [
            'template_id' => $request->input('template_id'),
            'topic' => $request->input('topic'),
            'start_time' => $request->input('start_time'),
            'duration' => $request->input('duration'),
            'password' => $request->input('password'),
        ]);
    }


    public function destroy($id)
    {
        $meetingId = Zoom::getMeeting($id);
        Zoom::deleteMeeting($meetingId);

        OnlineClass::destroy($id);

        return response()->json([
            'message' => 'Online class deleted successfully.',
        ]);
    }
}
