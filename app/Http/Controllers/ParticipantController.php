<?php

namespace App\Http\Controllers;

use App\Models\Banda;
use App\Models\Participant;
use App\Models\Punto;
use Illuminate\Http\Request;

/**
 * Class ParticipantController
 * @package App\Http\Controllers
 */
class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $participants = Participant::paginate();

        return view('participant.index', compact('participants'))
            ->with('i', (request()->input('page', 1) - 1) * $participants->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $participant = new Participant();
        $bandas = Banda::all();
        return view('participant.create', compact('participant', 'bandas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Participant::$rules);

        $existencia_datos = Participant::where([
            'nombre' => $request->nombre,
            'event_id' => $request->event_id
        ])->get();

        if (count($existencia_datos) > 0) {
            //return back()->withInput();
            return back()->withInput()->with(['msg' => 'El participante ' . $request->nombre . ' ya fue creado para este evento']);
        } else {
            $participant = Participant::create([
                'nombre' => $request->nombre,
                'cantidad_puntos' => $request->cantidad_puntos,
                'event_id' => $request->event_id,
            ]);

            if ($participant) {
                $punto = Punto::create([
                    'lugar_contacto' => $request->lugar_contacto,
                    'puntos' => $request->cantidad_puntos,
                    'participant_id' => $participant->id,
                    'fecha' => date("Y-m-d"),
                    'banda_id' => $request->select_banda
                ]);
            }

            return redirect()->route('event.show', $request->event_id)
                ->with('success', 'Participant created successfully.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($evento_id, $participante_id)
    {
        $participante = Participant::where('id', $participante_id)->first();
        $puntos = Punto::with('bandas')->where('participant_id', $participante_id)->get();
        return view('participant.show', compact('puntos', 'participante'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $participant = Participant::find($id);

        return view('participant.edit', compact('participant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Participant $participant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Participant $participant)
    {
        request()->validate(Participant::$rules);

        $participant->update($request->all());

        return redirect()->route('participant.index')
            ->with('success', 'Participant updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $participant = Participant::find($id)->delete();

        return redirect()->route('participant.index')
            ->with('success', 'Participant deleted successfully');
    }
}
