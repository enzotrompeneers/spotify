<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contest;
use App\User;

use DateTime;
use Carbon\Carbon;

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
        $admin_email = User::where('isAdmin', 1)->value('email');
        return view ('datums.index', compact('contests', 'admin_email'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // create in index
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
        return back()->with('contestCreated', 'Wedstrijddatum aangemaakt!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // show all in index
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin_email = User::where('isAdmin', 1)->value('email');
        $contests = Contest::findOrFail($id);

        $startDateTime = explode(" ", $contests['startDate']);
        $contests->startDate = $startDateTime[0]; 
        $contests->startHour = $startDateTime[1]; 

        $endDateTime = explode(" ", $contests['endDate']);
        $contests->endDate = $endDateTime[0]; 
        $contests->endHour = $endDateTime[1]; 

        
    	return view ('datums.edit', compact('contests', 'admin_email'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DatumRequest $request, Contest $contest)
    {
        $dates = $request->all();

        $startDate = $dates['startDate'];
        $startHour = $dates['startHour'];
        $endDate = $dates['endDate'];
        $endHour = $dates['endHour'];


        $startDateTime = new DateTime($startDate . $startHour);
        $endDateTime = new DateTime($endDate . $endHour);

        $contest->find($id)->update(['startDate' => $startDateTime,  'endDate' => $endDateTime]);
        return redirect()->route('datum.index')->with('contestUpdated', 'Wedstrijddatum gewijzigd!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contest $contest, $id)
    {
        $contest->find($id)->delete();

        return redirect()->route('datum.index')->with('contestDestroyed', 'Wedstrijddatum verwijderd!');
    }
}
