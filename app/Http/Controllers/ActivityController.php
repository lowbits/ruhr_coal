<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Location;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activites = $this->getActivities();

        return $activites;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|alpha',
            'user_id' => 'required|exists:users,id',
            'location_id' => 'required|exists:locations,id'
        ]);

        $activity = Activity::create($request->all());

        return response()->json(['success' => 'success'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        return $activity->load(['location', 'user']);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activity $activity)
    {

        $this->validate($request, [
            'title' => 'required',
            'user_id' => 'required|exists:users,id',
            'location_id' => 'required|exists:locations,id'
        ]);

        $activity->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {

        $activity->delete();

        return response()->json(['success' => 'Activity deleted'], 200);


    }

    protected function getActivities(){
        $activites = Activity::latest()->with(['location', 'user']);

        return $activites->get();

    }
}
