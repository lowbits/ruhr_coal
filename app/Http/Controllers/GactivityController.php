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
        $gactivity = Gactivity::latest()->load('gactivity_user')->get();

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
            'title' => 'required|alpha',
            'user_id' => 'required|exists:users,id',
            'location_id' => 'required|exists:locations,id'
        ]);

        $gactivity = Gactivity::create([
            'title' => request('title'),
            'description' => request('description'),
            'user_id' => auth()->id(),
            'price' => request('price'),
            'student_discount' => request('student_discount'),
            'location_id' => request('location_id'),
            'person_count' => request('person_count'),
            'is_public' => request('is_public'),
            'category' => request('category'),
            'location_id' => request('location_id'),
            'date' => request('date'),
            'rythm' => request('rythm'),
        ]);

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
        return $gactivity->load('gactivity_user');
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
        //
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
        $gactivity->participants()->attach(Auth::user()->id);


        return response()->json(['successs', 'success']);

    }

    public function unparticipate(Gactivity $gactivity)
    {
        $gactivity->participants()->detach(Auth::user()->id);

        return response()->json(['success', 'success']);
    }
}
