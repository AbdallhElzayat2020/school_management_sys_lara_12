<?php

namespace App\Http\Controllers\Library;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\LibraryRepository;
use Illuminate\Support\Facades\File;

class LibraryController extends Controller
{
    protected $libraryRepository;

    public function __construct(LibraryRepository $libraryRepository)
    {
        $this->libraryRepository = $libraryRepository;
    }

    public function index()
    {
        return $this->libraryRepository->index();
    }


    public function store(Request $request)
    {
        // validate
        if ($request->hasFile('file_name')) {
            $file = $request->file('file_name');
            $fileName = time() . $file->getClientOriginalName();
            $path = $file->storeAs('', $fileName, '');
        }
        //        return $this->libraryRepository->store($request);
    }


    public function update(Request $request, string $id)
    {
        // validate
        return $this->libraryRepository->update($request, $id);
    }


    public function destroy(string $id)
    {
        return $this->libraryRepository->destroy($id);
    }
}
