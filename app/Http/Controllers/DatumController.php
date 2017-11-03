<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contest;
use App\User;

use DateTime;


use App\Http\Requests\DatumRequest;

class DatumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contests = Contest::all();
        $admin_email = User::where('isAdmin', '=', 1)->first()->email;
    	return view ('wedstrijddatums', compact('contests', 'admin_email'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // already in index
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DatumRequest $request)
    {
        $dates = $request->all();

        
        $startDate = $dates['startDate'];
        $startHour = $dates['startHour'];
        $endDate = $dates['endDate'];
        $endHour = $dates['endHour'];

        $startDateTime = new DateTime($startDate . $startHour);
        $endDateTime = new DateTime($endDate . $endHour);


    
        Contest::create(['startDate' => $startDateTime,  'endDate' => $endDateTime]);
        return redirect()->route('datum.index');
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
