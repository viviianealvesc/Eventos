<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {

      $events = Event::all();
    
      return view('welcome', ['events' => $events]);
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $event = new Event;

        $event->title = $request->title;
        $event->descripition = $request->descripition;
        $event->city = $request->city;
        $event->private = $request->private;

        $event->save();

        return redirect('/');
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
