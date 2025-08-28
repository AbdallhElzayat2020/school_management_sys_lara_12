<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Repositories\StudentPromotionsRepository;
use Illuminate\Http\Request;

class StudentPromotionsController extends Controller
{

    public $studentPromotionRepository;

    public function __construct(StudentPromotionsRepository $studentPromotionRepository)
    {
        $this->studentPromotionRepository = $studentPromotionRepository;
    }


    public function index()
    {
        $grades = $this->studentPromotionRepository->index();
        return view('pages.students.student_promotions.index', compact('grades'));
    }


    public function store(Request $request)
    {
        return $this->studentPromotionRepository->store($request);
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
