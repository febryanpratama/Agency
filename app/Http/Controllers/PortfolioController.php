<?php

namespace App\Http\Controllers;

use App\Http\Requests\PortfolioRequest;
use App\Services\Portfolio\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    //
    protected $portfolioService;

    public function __construct(Portfolio $portfolio)
    {
        $this->portfolioService = $portfolio;
    }

    public function index()
    {
        $result = $this->portfolioService->index();
        return view('pages.portfolio.index', [
            'title' => 'Portfolio',
            'data'  => $result['data'],
        ]);
    }

    public function form()
    {
        return view('pages.portfolio.form', [
            'title' => 'Add Portfolio',
        ]);
    }

    public function store(PortfolioRequest $request)
    {
        $result = $this->portfolioService->store($request->all());
        return redirect('portfolio')->withSuccess($result['message']);
    }

    public function show($id)
    {
        $result = $this->portfolioService->show($id);
        return view('pages.portfolio.form', [
            'title' => 'Edit Portfolio',
            'data'  => $result['data'],
        ]);
    }

    public function update(PortfolioRequest $request, $id)
    {
        $result = $this->portfolioService->update($request->all(), $id);

        return redirect(
            'portfolio'
        )->withSuccess(
            $result['message']
        );
    }

    public function delete($id)
    {
        $result = $this->portfolioService->delete($id);
        return response()->json($result);
        // return redirect('portfolio')->withSuccess($result['message']);
    }
}
