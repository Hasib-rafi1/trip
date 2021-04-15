<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;

class FlightsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flights = Flight::latest()->paginate(5);

        return view('admin.flight', compact('flights'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.flight_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'airline'=> 'required',
            'number' => 'required',
            'departure_airport' => 'required',
            'departure_time' => 'required',
            'arrival_airport'=> 'required',
            'arrival_time'=> 'required',
            'price'=> 'required',
        ]);

        Flight::create($request->all());

        return redirect()->route('flight_list')
            ->with('success', 'Flight created successfully.');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($flight)
    {
        //
        $flight = Flight::findorFail($flight);
        return view('admin.flight_edit', compact('flight'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'airline'=> 'required',
            'number' => 'required',
            'departure_airport' => 'required',
            'departure_time' => 'required',
            'arrival_airport'=> 'required',
            'arrival_time'=> 'required',
            'price'=> 'required',
        ]);
        $flight = Flight::findorFail($id);
        $flight->update($request->all());

        return redirect()->route('flight_list')
            ->with('success', 'Flight updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $flight = Flight::findorFail($id);
        $flight->delete();

        return redirect()->route('flight_list')
            ->with('success', 'Flight deleted successfully');
    }
}
