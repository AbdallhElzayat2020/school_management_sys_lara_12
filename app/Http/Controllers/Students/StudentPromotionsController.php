<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\Promotion;
use App\Repositories\StudentPromotionsRepository;
use Illuminate\Http\Request;

class StudentPromotionsController extends Controller
{

    public StudentPromotionsRepository $studentPromotionRepository;

    public function __construct(StudentPromotionsRepository $studentPromotionRepository)
    {
        $this->studentPromotionRepository = $studentPromotionRepository;
    }


    public function index()
    {
        $grades = $this->studentPromotionRepository->index();
        return view('pages.students.student_promotions.index', compact('grades'));
    }

    public function create()
    {
        $promotions = $this->studentPromotionRepository->create();
        return view('pages.students.student_promotions.management', compact('promotions'));
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


    public function destroy(Request $request)
    {
        return $this->studentPromotionRepository->destroy($request);
    }
}
