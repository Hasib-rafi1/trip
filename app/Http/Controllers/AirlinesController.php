<?php

namespace App\Http\Controllers;

use App\Models\Airline;
use Illuminate\Http\Request;

class AirlinesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $airlines = Airline::latest()->paginate(5);

        return view('admin.airline', compact('airlines'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function airlineList()
    {
        $airlines = Airline::all();

        return $airlines;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.airline_create');
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
            'name' => 'required'
        ]);

        Airline::create($request->all());

        return redirect()->route('airlines_list')
            ->with('success', 'Airline created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Airline  $airline
     * @return \Illuminate\Http\Response
     */
    public function show(Airline $airline)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($airline)
    {
        //
        $airline = Airline::findorFail($airline);
        return view('admin.airline_edit', compact('airline'));
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
            'name' => 'required'
        ]);
        $airline = Airline::findorFail($id);
        $airline->update($request->all());

        return redirect()->route('airlines_list')
            ->with('success', 'Airline updated successfully');
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
        $airline = Airline::findorFail($id);
        $airline->delete();

        return redirect()->route('airlines_list')
            ->with('success', 'Airline deleted successfully');
    }
}
