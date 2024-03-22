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

        $search = request('search');

        if($search) { //se ouver busca nós exibimos essa lógica

            $events = Event::where([
             ['title', 'like', '%'.$search.'%']
            ])->get();

        } else {

            $events = Event::all();

        }

    
      return view('welcome', ['events' => $events, 'search' => $search]);
    
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
        $event->date = $request->date;
        $event->descripition = $request->descripition;
        $event->city = $request->city;
        $event->private = $request->private;
        $event->items = $request->items;

        if($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $request->image->move(public_path('img/events'), $imageName);

            $event->image = $imageName;
        }

        $event->save();

        return redirect('/')->with('msg', 'Evento criado com sucesso!');
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {

        $event = Event::findOrFail($id);

        return view('events.show', ['event' => $event]);
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
