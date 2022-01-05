<?php

namespace App\Http\Controllers;

use App\Http\Requests\DateWiseVacancyRequest;
use App\Models\DateWiseVacancy;
use App\Traits\CommonUsageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;

class DateWiseVacancyController extends Controller
{
    use CommonUsageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $get_data = DateWiseVacancy::orderBy('id', 'desc')->get();
        $data['vacancies'] = $get_data;
        return view('set-vacancy', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DateWiseVacancyRequest $request)
    {
        $validatedInput = $request->validated();
        $store_data = DateWiseVacancy::updateOrCreate(['vdate' => date('Y-m-d', strtotime($request->vdate))], $validatedInput);
        $data['vacancies'] = DateWiseVacancy::orderBy('id', 'desc')->get();
        return Response::json(View::make('render-vacancy', $data)->render());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
