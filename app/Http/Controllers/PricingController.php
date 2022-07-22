<?php

namespace App\Http\Controllers;

use App\Services\Pricing\Pricing;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    //
    protected $pricingServices;

    public function __construct(Pricing $pricingServices)
    {
        $this->pricingServices = $pricingServices;
    }

    public function index()
    {
        $result = $this->pricingServices->getAll();

        return view('pages.pricing.index', [
            'title'     => 'Pricing',
            'data'      => $result['data'],
        ]);
    }

    public function form()
    {
        return view('pages.pricing.form', [
            'title'     => 'Add Pricing',
            'data'      => null,
        ]);
    }

    public function store(Request $request)
    {
        $result = $this->pricingServices->store($request);

        if ($result['status'] == true) {
            return redirect('pricing')->withSuccess($result['message']);
        } else {
            return back()->withError($result['message']);
        }
    }

    public function show($id)
    {
        $result = $this->pricingServices->getById($id);

        return view('pages.pricing.form', [
            'title'    => 'Edit Pricing',
            'data'     => $result['data']
        ]);
    }

    public function update(Request $request, $id)
    {

        $result = $this->pricingServices->update($request, $id);

        if ($result['status'] == true) {
            return redirect('pricing')->withSuccess($result['message']);
        } else {
            return back()->withError($result['message']);
        }
    }

    public function delete($id)
    {
        $result = $this->pricingServices->delete($id);

        return response()->json($result['status']);
    }
}
