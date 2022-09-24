<?php

namespace App\Http\Controllers;

use App\Models\Add;
use App\Models\Banda;
use Illuminate\Http\Request;

class AddController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bandas = Banda::all();
        return view('add.index', compact('bandas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $resultado = $this->verificar($request);
        if($resultado)
        {
            $add = Add::create([
                'participante' => $request->participante,
                'banda_id' => $request->banda_id,
                'puntos' => $request->puntos,
                'fecha' => date('Y-m-d'),
                'modo' => $request->modo
            ]);
            return back()->withInput()->with(['msg' => 'Fue agregado correctamente']);
        }
        else{
            return back()->withInput()->with(['error' => 'Ya fue agrego puntos en esta frecuencia a este participante el dia de hoy']);
        }


    }
    public function verificar($datos)
    {
        $fecha_hoy = date("Y-m-d");
        $resultado = Add::where([
            'fecha' => $fecha_hoy,
            'participante' => $datos->participante,
            'banda_id' => $datos->banda_id,
            'modo' => $datos->modo
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
     * @param  \App\Models\Add  $add
     * @return \Illuminate\Http\Response
     */
    public function show(Add $add)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Add  $add
     * @return \Illuminate\Http\Response
     */
    public function edit(Add $add)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Add  $add
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Add $add)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Add  $add
     * @return \Illuminate\Http\Response
     */
    public function destroy(Add $add)
    {
        //
    }
}
