<?php

namespace App\Http\Controllers;

use App\Tour;
use Illuminate\Http\Request;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tour = Tour::latest()->with('locations')->get();

        return $tour;
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|alpha',
            'description' => 'required|alpha',
            'user_id' => 'required|exists:users,id'
        ]);

        $tour = $this->create([
            'title' => request('title'),
            'description' => request('description'),
            'duration' => request('duration'),
            'user_id' => auth()->id(),
        ]);

        return response()->json(['success' => 'success'], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function show(Tour $tour)
    {
        return $tour;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tour $tour)
    {
        $this->validate($request,[
            'title' => 'required|alpha',
            'description' => 'required|alpha',
            'user_id' => 'required|exists:users,id'
        ]);

        $tour->update([
            'title' => request('title'),
            'description' => request('description'),
            'duration' => request('duration'),
            'user_id' => auth()->id(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tour $tour)
    {
       $tour->delete();

       return response()->json(['success' => 'Tour deleted'], 200);

    }
}
