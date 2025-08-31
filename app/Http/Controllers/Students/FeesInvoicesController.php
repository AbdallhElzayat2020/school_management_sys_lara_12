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
        $Fee_invoices = $this->feesInvoices->index();
        return view('pages.students.feesInvoices.index', compact('Fee_invoices'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        return $this->feesInvoices->store($request);
    }

    public function show(string $id)
    {
        return $this->feesInvoices->show($id);
    }


    public function edit(string $id)
    {
        return $this->feesInvoices->edit($id);
    }


    public function update(Request $request, string $id)
    {
        return $this->feesInvoices->update($id, $request);
    }


    public function destroy(string $id)
    {
        return $this->feesInvoices->destroy($id);
    }
}
