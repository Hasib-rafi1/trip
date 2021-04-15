<?php

namespace App\Http\Controllers;

use App\Models\Airport;
use Illuminate\Http\Request;

class AirportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $airports = Airport::latest()->paginate(5);

        return view('admin.airport', compact('airports'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Display a listing of the resource.
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function airportList(Request $request)
    {
        if ($request->has('code')) {
   			$airports = Airport::where('code', '!=', $request['code'])->get();
   			return $airports;

		}
        $airports = Airport::all();

        return $airports;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.airport_create');
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
            'code' => 'required',
            'city_code'=> 'required',
            'name'=> 'required',
            'city'=> 'required',
            'country_code'=> 'required',
            'region_code'=> 'required',
            'latitude'=> 'required',
            'longitude'=> 'required',
            'timezone'=> 'required'
        ]);

        Airport::create($request->all());

        return redirect()->route('airport_list')
            ->with('success', 'Airport created successfully.');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($airport)
    {
        //
        $airport = Airport::findorFail($airport);
        return view('admin.airport_edit', compact('airport'));
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
            'code' => 'required',
            'city_code'=> 'required',
            'name'=> 'required',
            'city'=> 'required',
            'country_code'=> 'required',
            'region_code'=> 'required',
            'latitude'=> 'required',
            'longitude'=> 'required',
            'timezone'=> 'required'
        ]);
        $airport = Airport::findorFail($id);
        $airport->update($request->all());

        return redirect()->route('airport_list')
            ->with('success', 'Airport updated successfully');
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
        $airport = Airport::findorFail($id);
        $airport->delete();

        return redirect()->route('airport_list')
            ->with('success', 'Airport deleted successfully');
    }
}
