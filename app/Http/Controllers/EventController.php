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
        //Aqui eu to pegando o id do usuario que seja igual o id do evento clicado, para que assim a gente consiga exibir o nome do dono do evento
        $eventOwer = User::where('id', $event->user_id)->first()->toArray();

        $user = auth()->user();
        $hasUserJoined = false; //Por padão o usuario não está participando de um evento

        if($user) {

            // Pega o usuario logado e os eventos que esta participando e torna esses dados em uma array
            $userEvents = $user->eventsAsParticipant->toArray();

            // Como eu quero acessar dados de uma array eu tenho que fazer um foreach
            foreach($userEvents as $userEvent) {

                //Quando eu vou acessar os dados de uma array eu faço desta forma $userEvent['id']
                if($userEvent['id'] == $id) {
                    $hasUserJoined = true;
                }
            }
        }

        return view('events.show', ['event' => $event, 'eventOwer' => $eventOwer, 'hasUserJoined' => $hasUserJoined]);
    }

    public function dashboard() {
        $user = auth()->user();

        $events = $user->events; //este events foi criado la no model

        $eventsAsParticipant = $user->eventsAsParticipant;

        return view('events.dashboard', ['events' => $events, 'eventsAsParticipant' => $eventsAsParticipant]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = auth()->user();

        $event = Event::findOrFail($id);

        if($user->id != $event->user_id) {
            return redirect('/dashboard');
        }

        return view('events.update', ['event' => $event]);
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $event = Event::findOrFail($id);

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

        return redirect('/dashboard')->with('msg', 'Evento editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Event::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg', 'Evento deletado com sucesso!');

    }

    public function joinEvent($id) {
        $user = auth()->user();

        $user->eventsAsParticipant()->attach($id);

        $event = Event::FindOrFail($id);

        return redirect('/dashboard')->with('msg', 'Sua presença esta confirmada no evento: ' . $event->title);

    }

    public function leaveEvent($id) {
        $user = auth()->user();

        $user->eventsAsParticipant()->detach($id);

        $event = Event::findOrfail($id);

        return redirect('/dashboard')->with('msg', 'Sua presença foi retirada do evento: ' . $event->title);
    }
}
