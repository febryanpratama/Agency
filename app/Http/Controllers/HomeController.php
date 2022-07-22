<?php

namespace App\Http\Controllers;

use App\Services\Client\ClientService;
use App\Services\Portfolio\Portfolio;
use App\Services\Pricing\Pricing;
use App\Services\Service\Services;
use App\Services\StudyCase\StudyCase;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    protected $clientService;
    protected $services;
    protected $pricing;
    protected $studyCase;
    protected $portfolio;

    public function __construct(ClientService $clientService, Services $services, Pricing $pricing, StudyCase $studyCase, Portfolio $portfolio)
    {
        $this->clientService = $clientService;
        $this->services = $services;
        $this->pricing = $pricing;
        $this->studyCase = $studyCase;
        $this->portfolio = $portfolio;
    }

    public function index()
    {
        $services = $this->services->getAll();
        $studyCase = $this->studyCase->getAll();
        $pricing = $this->pricing->getAll();
        $portfolio = $this->portfolio->index();
        $client = $this->clientService->getClient();


        return view('layouts.base.main', [
            'title' => 'StarlabSys - Professional Web Development',
            'services' => $services['data'],
            'studyCase' => $studyCase['data'],
            'pricing' => $pricing['data'],
            'portfolio' => $portfolio['data'],
            'client' => $client['data'],
        ]);
    }
}
