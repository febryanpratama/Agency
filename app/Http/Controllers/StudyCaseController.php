<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudyCaseRequest;
use App\Services\StudyCase\StudyCase;
use Illuminate\Http\Request;

class StudyCaseController extends Controller
{
    //
    protected $studyCase;

    public function __construct(StudyCase $studyCase)
    {
        $this->studyCase = $studyCase;
    }

    public function index()
    {
        $title = "Study Case";
        $result = $this->studyCase->getAll();

        return view('pages.studycase.index', [
            'title' => $title,
            'data'  => $result['data'],
        ]);
    }

    public function form()
    {
        return view('pages.studycase.form', [
            'title' => 'Create Study Case',
            'data'  => null,
        ]);
    }

    public function store(StudyCaseRequest $request)
    {
        $result = $this->studyCase->store($request->all());
        return redirect('/study-case')->withSuccess($result['message']);
    }

    public function show($id)
    {
        $title = "Edit Study Case";
        $result = $this->studyCase->getById($id);

        return view('pages.studycase.form', [
            'data' => $result['data'],
            'title' => $title,
        ]);
    }

    public function update(StudyCaseRequest $request, $id)
    {
        $result = $this->studyCase->update($request->all(), $id);
        return redirect('/study-case')->withSuccess($result['message']);
    }

    public function delete($id)
    {
        $result = $this->studyCase->delete($id);
        return response()->json($result);
        // return redirect('/study-case')->withSuccess($result['message']);
    }
}
