<?php

namespace App\Http\Controllers;

use App\Gactivity;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GactivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gactivity = Gactivity::latest()->with('participants', 'location')->get();

        return $gactivity;
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
            'title' => 'required',
            'user_id' => 'required|exists:users,id',
            'location_id' => 'required|exists:locations,id'
        ]);

        $gactivity = Gactivity::create($request->all());

        return response()->json(['success' => 'success'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gactivity  $gactivity
     * @return \Illuminate\Http\Response
     */
    public function show(Gactivity $gactivity)
    {
        return $gactivity->load(['participants', 'location']);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gactivity  $gactivity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gactivity $gactivity)
    {
        $gactivity->update($request->all());

        return response()->json(['success' => 'success'], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gactivity  $gactivity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gactivity $gactivity)
    {
        $gactivity->delete();

        return response()->json(['success' => 'Activity deleted'], 200);

    }

    public function participate(Gactivity $gactivity)
    {
        $gactivity->participants()->attach(1);

        return response()->json(['successs', 'success']);
    }

    public function unparticipate(Gactivity $gactivity)
    {
        $gactivity->participants()->detach(1);

        return response()->json(['success', 'success']);
    }
}
