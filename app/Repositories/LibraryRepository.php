<?php

namespace App\Repositories;

use App\Models\Grade;
use App\Models\Library;
use App\Models\Section;
use App\Models\Classroom;
use App\Interfaces\LibraryInterface;
use App\Http\Resources\LibraryResource;
use App\Traits\UploadFiles;
use Illuminate\Support\Facades\File;

class LibraryRepository implements LibraryInterface
{
    use UploadFiles;

    public function index()
    {
        $books = Library::latest()->paginate(9);

        return response()->json([
            'message' => 'success',
            'books' => LibraryResource::collection($books),
        ], 200);
    }

    public function store($request)
    {
        $book = Library::create([
            'title' => $request->title,
            'grade_id' => $request->grade_id,
            'classroom_id' => $request->classroom_id,
            'section_id' => $request->section_id,
            'teacher_id' => auth()->user()->id,
        ]);

        if ($request->hasFile('file_name')) {
            $file = $request->file('file_name');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('attachments/library', $fileName, 'upload_attachments');
            $book->update([
                'file_name' => $path,
            ]);
        }

        return response()->json([
            'message' => 'Book added successfully',
            'book' => new LibraryResource($book),
        ], 201);
    }

    public function update($id, $request)
    {
        $book = Library::findOrFail($id);

        $filePath = $book->file_name;

        if ($request->hasFile('file_name')) {
            $file = $request->file('file_name');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('attachments/library', $fileName, 'upload_attachments');
        }

        $book->update([
            'title' => $request->title,
            'file_name' => $filePath,
            'grade_id' => $request->grade_id,
            'classroom_id' => $request->classroom_id,
            'section_id' => $request->section_id,
        ]);

        return response()->json([
            'message' => 'Book updated successfully',
        ], 200);
    }

    public function destroy($id)
    {
        $book = Library::findOrFail($id);

        if ($book->file_name && File::exists(public_path('attachments/library/' . $book->file_name))) {
            File::delete(public_path('attachments/library/' . $book->file_name));
        }

        $book->delete();

        return response()->json([
            'message' => 'Book deleted successfully',
        ], 200);
    }
}
