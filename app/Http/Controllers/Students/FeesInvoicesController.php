<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Repositories\FeeInvoicesRepository;
use Illuminate\Http\Request;

class FeesInvoicesController extends Controller
{

    protected $feesInvoices;

    public function __construct(FeeInvoicesRepository $feesInvoices)
    {
        $this->feesInvoices = $feesInvoices;
    }

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
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
