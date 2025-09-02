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
        return $this->zoomServices->store($request);
    }

    public function update($id, $request)
    {
        return $this->zoomServices->update($id, $request);
    }

    public function destroy($id)
    {
        return $this->zoomServices->destroy($id);
    }
}
