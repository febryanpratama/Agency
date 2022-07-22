<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Services\Client\ClientService;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    //
    protected $clientService;

    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }
    public function index()
    {
        $result = $this->clientService->getClient();

        return view('pages.client.index', [
            'title' => 'Client',
            'data'  => $result['data'],
        ]);
    }

    public function form()
    {
        return view('pages.client.form', [
            'title' => 'Add',
            'data'  => null,
        ]);
    }

    public function store(Request $request)
    {
        $result = $this->clientService->store($request->all());

        return redirect('client')->withSuccess($result['message']);
    }

    public function show($id)
    {
        $result = $this->clientService->getClientById($id);

        return view('pages.client.form', [
            'title' => 'Edit',
            'data'  => $result['data'],
        ]);
    }

    public function update(Request $request, $id)
    {
        $result = $this->clientService->update($request->all(), $id);

        return redirect('client')->withSuccess($result['message']);
    }

    public function delete($id)
    {
        $result = $this->clientService->delete($id);

        return response()->json($result);
    }
}
