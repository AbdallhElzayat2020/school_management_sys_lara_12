<?php

namespace App\Http\Controllers\OnlineClasses;

use App\Http\Controllers\Controller;
use App\Repositories\OnlineClassRepository;
use Illuminate\Http\Request;

class OnlineClassController extends Controller
{

    protected OnlineClassRepository $onlineClassRepository;

    public function __construct(OnlineClassRepository $onlineClassRepository)
    {
        $this->onlineClassRepository = $onlineClassRepository;
    }

    public function index()
    {
        return $this->onlineClassRepository->index();
    }


    public function store(Request $request)
    {
        // validate request
        return $this->onlineClassRepository->store($request);
    }


    public function update(Request $request, string $id)
    {
        // validate request
        return $this->onlineClassRepository->update($request, $id);
    }

    public function destroy(string $id)
    {
        return $this->onlineClassRepository->destroy($id);
    }
}
