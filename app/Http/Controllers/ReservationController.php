<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationRequest;
use App\Models\DateWiseVacancy;
use App\Models\Reservation;
use App\Traits\CommonUsageTrait;
use Exception;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class ReservationController extends Controller
{
    use CommonUsageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $get_reservations = Reservation::orderBy('id', 'desc')->get();
        $data['reservations'] = $get_reservations;
        return view('welcome', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReservationRequest $request)
    {
        $validatedInput = $request->validated();
        $unavailable = false;
        $from = date('Y-m-d', strtotime($request->start_date));
        $to = date('Y-m-d', strtotime($request->end_date));
        $resevervation = DateWiseVacancy::whereBetween('vdate', [$from, $to])->get();
        $resevervation = $resevervation->filter(function ($item) use (&$unavailable) {
            if ($item->vacancy > 0) {
                return $item;
            } else {
                $unavailable = true;
            }
        });
        if ($resevervation->count() == 0 || $unavailable) {
            return $this->errorResponse('Some date is already fully booked or vacancy is not specified yet');
        }
        $validatedInput['total_price'] = $resevervation->sum('price');
        DB::beginTransaction();
        $store_data = Reservation::create($validatedInput);
        try {
            DateWiseVacancy::whereBetween('vdate', [$from, $to])->decrement('vacancy');
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return $this->errorResponse(['error' => "An error has been occured while update vacancy count."], 500);
        }
        $data['reservation'] = $store_data;
        return Response::json(View::make('render-reservation-single-row', $data)->render());
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
