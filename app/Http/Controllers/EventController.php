<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Imagen;
use App\Models\Participant;
use Illuminate\Http\Request;

/**
 * Class EventController
 * @package App\Http\Controllers
 */
class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::orderBy('created_at', 'desc')->paginate();

        return view('event.index', compact('events'))
            ->with('i', (request()->input('page', 1) - 1) * $events->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $event = new Event();
        return view('event.create', compact('event'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imagen_diploma = $request->file('fotos_diplomas');
        $imagen_descripcion = $request->file('fotos_descripcion');

        $cantidad_evento = Event::all()->count();
        if($cantidad_evento > 0){
            $ultimo_evento = Event::all()->sortByDesc('created_at')->first();
            $ultimo_evento->estado = 0;
            $ultimo_evento->save();
            $request->estado = 1;
        }

        request()->validate(Event::$rules);

        $event = Event::create($request->all());

        for ($i = 0; $i < count($imagen_diploma); $i++) {

            $destinationPath = 'images/diploma/';
            $profileImage = uniqid() . "." . $imagen_diploma[$i]->getClientOriginalExtension();
            $imagen_diploma[$i]->move($destinationPath, $profileImage);
            Imagen::create([
                "nombre" => $destinationPath . $profileImage,
                "tipo" => 0,
                "event_id" => $event->id
            ]);
        }
        for ($i = 0; $i < count($imagen_descripcion); $i++) {

            $destinationPath = 'images/descripcion/';
            $profileImage = uniqid() . "." . $imagen_descripcion[$i]->getClientOriginalExtension();
            $imagen_descripcion[$i]->move($destinationPath, $profileImage);
            Imagen::create([
                "nombre" => $destinationPath . $profileImage,
                "tipo" => 1,
                "event_id" => $event->id
            ]);
        }

        return redirect()->route('event.index')
            ->with('success', 'Event created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);
        $participants = Participant::where('event_id', $id)->get();
        return view('event.show', compact('event', 'participants'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);

        return view('event.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Event $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        request()->validate(Event::$rules);

        $event->update($request->all());

        return redirect()->route('event.index')
            ->with('success', 'Event updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $event = Event::find($id)->delete();

        return redirect()->route('event.index')
            ->with('success', 'Event deleted successfully');
    }
}
