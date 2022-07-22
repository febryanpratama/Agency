<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicesRequest;
use App\Services\Service\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    //
    protected $service;

    public function __construct(Services $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $title = 'Services';

        $result = $this->service->getAll();

        return view('pages.services.index', [
            'title' => $title,
            'data'  => $result['data'],
        ]);
    }

    public function form()
    {
        $title = "Create Service";
        return view('pages.services.form', [
            'title' => $title,
        ]);
    }

    public function store(ServicesRequest $request)
    {
        // dd($request->all());
        $result = $this->service->store($request->all());

        return redirect('/services')->withSuccess($result['message']);
    }

    public function show($id)
    {
        $title = "Edit Service";
        $result = $this->service->getById($id);

        return view('pages.services.form', [
            'data' => $result['data'],
            'title' => $title,
        ]);
    }

    public function update(ServicesRequest $request, $id)
    {
        $result = $this->service->update($request->all(), $id);

        return redirect('/services')->withSuccess($result['message']);
    }

    public function delete($id)
    {
        $result = $this->service->delete($id);

        return response()->json($result);

        // return redirect('/services')->withSuccess($result['message']);
    }
}
