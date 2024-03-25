<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;

use App\Models\User;

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

        $user = auth()->user();
        $event->user_id = $user->id;

        $event->save();

        return redirect('/')->with('msg', 'Evento criado com sucesso!');
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {

        //Pega um id de um evento especifico
        $event = Event::findOrFail($id);

        //Pega o id de um usuario especifico
        $eventOwer = User::where('id', $event->user_id)->first()->toArray();

        return view('events.show', ['event' => $event, 'eventOwer' => $eventOwer]);
    }

    public function dashboard() {
        $user = auth()->user();

        $events = $user->events; //este events foi criado la no model

        return view('events.dashboard', ['events' => $events]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    
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
        Event::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg', 'Evento deletado com sucesso!');

    }
}
