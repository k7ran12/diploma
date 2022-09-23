<?php

namespace App\Http\Controllers;

use App\Models\Banda;
use App\Models\Participant;
use App\Models\Punto;
use Illuminate\Http\Request;

/**
 * Class PuntoController
 * @package App\Http\Controllers
 */
class PuntoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $puntos = Punto::paginate();

        return view('punto.index', compact('puntos'))
            ->with('i', (request()->input('page', 1) - 1) * $puntos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $punto = new Punto();
        $bandas = Banda::all();
        return view('punto.create', compact('punto', 'bandas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store($evento_id, $participante_id, Request $request)
    {
        $verificacion = $this->verificar($participante_id, $request);

        if ($verificacion) {
            $this->configuracion_puntos($participante_id, $request->puntos, 'add');
            request()->validate(Punto::$rules);
            $punto = Punto::create([
                'lugar_contacto' => $request->lugar_contacto,
                'puntos' => $request->puntos,
                'participant_id' => $participante_id,
                'fecha' => date("Y-m-d"),
                'banda_id' => $request->banda_id,
            ]);

            return redirect()->route('participant.show', ['event' => $evento_id, 'participant' => $participante_id])
                ->with('success', 'Puntos agregado correctamente.');
        } else {
            return back()->withInput()->with(['msg' => 'Ya agregaste puntos a este usuario en esta banda el día de hoy']);
        }
    }
    public function configuracion_puntos($participante_id, $puntos, $tipo_add)
    {
        $participante = Participant::where('id', $participante_id)->first();
        if ($tipo_add == 'add') {
            $participante->cantidad_puntos += $puntos;
            $participante->cantidad_contactos += 1;
        } else {
            $participante->cantidad_puntos -= $puntos;
            $participante->cantidad_contactos -= 1;
        }
        $participante->save();
    }

    public function verificar($participante_id, $datos)
    {
        $fecha_hoy = date("Y-m-d");
        $resultado = Punto::where([
            'fecha' => $fecha_hoy,
            'participant_id' => $participante_id,
            'banda_id' => $datos->banda_id
        ])->get();

        //dd(count($resultado));

        if (count($resultado) > 0) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $punto = Punto::find($id);

        return view('punto.show', compact('punto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($evento, $participante, $id)
    {
        $punto = Punto::find($id);
        $bandas = Banda::all();
        return view('punto.edit', compact('punto', 'bandas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Punto $punto
     * @return \Illuminate\Http\Response
     */
    public function update($evento, $participante, Request $request, Punto $punto)
    {
        request()->validate(Punto::$rules);

        $this->configuracion_puntos($participante, $punto->puntos, 'delete');
        $this->configuracion_puntos($participante, $request->puntos, 'add');

        $punto->update($request->all());


        return redirect()->route('participant.show', ['event' => $evento, 'participant' => $participante])
            ->with('success', 'Puntos editado correctamente.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $punto = Punto::find($id)->delete();

        return redirect()->route('puntos.index')
            ->with('success', 'Punto deleted successfully');
    }
}
