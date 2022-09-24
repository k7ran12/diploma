<?php

namespace App\Http\Controllers;

use App\Models\Add;
use App\Models\Evento;
use App\Models\Eventos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only('index', 'store');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $evento = Evento::first();
        return view('home', compact('evento'));
    }

    public function store(Request $request)
    {

        $imagen_diploma_1 = $request->file('imagen_diploma_1');
        $imagen_diploma_2 = $request->file('imagen_diploma_2');
        $imagen_diploma_3 = $request->file('imagen_diploma_3');
        $destinationPath = 'images/diploma/';


        //Imagen 1
        if (!empty($request->imagen_diploma_1)) {
            $profileImage1 = uniqid() . "." . $imagen_diploma_1->getClientOriginalExtension();
            $imagen_diploma_1->move($destinationPath, $profileImage1);
        }
        if (!empty($request->imagen_diploma_2)) {
            //Imagen 2
            $profileImage2 = uniqid() . "." . $imagen_diploma_2->getClientOriginalExtension();
            $imagen_diploma_2->move($destinationPath, $profileImage2);
        }
        if (!empty($request->imagen_diploma_3)) {
            //Imagen 3
            $profileImage3 = uniqid() . "." . $imagen_diploma_3->getClientOriginalExtension();
            $imagen_diploma_3->move($destinationPath, $profileImage3);
        }

        $primer_evento = Evento::first();



        if ($primer_evento != null) {
            if (!empty($request->numero_diplomas)) {
                $primer_evento->numero_diplomas = $request->numero_diplomas;
            }
            if (!empty($request->imagen_diploma_1)) {
                $primer_evento->imagen_diploma_1 = $destinationPath . $profileImage1;
            }
            if (!empty($request->imagen_diploma_2)) {
                $primer_evento->imagen_diploma_2 = $destinationPath . $profileImage2;
            }
            if (!empty($request->imagen_diploma_3)) {
                $primer_evento->imagen_diploma_3 = $destinationPath . $profileImage3;
            }
            if (!empty($request->cantacto_diploma_1)) {
                $primer_evento->contacto_diploma_1 = $request->cantacto_diploma_1;
            }
            if (!empty($request->cantacto_diploma_2)) {
                $primer_evento->contacto_diploma_2 = $request->cantacto_diploma_2;
            }
            if (!empty($request->cantacto_diploma_3)) {
                $primer_evento->contacto_diploma_3 = $request->cantacto_diploma_3;
            }
            if (!empty($request->descripcion_actividad)) {
                $primer_evento->descripcion_actividad = $request->descripcion_actividad;
            }
            if (!empty($request->estado)) {
                $primer_evento->estado = $request->estado;
            }

            $primer_evento->save();
        } else {
            Evento::create($request->all());
        }

        //Evento::create($request->all());
        return back()->withInput()->with(['msg' => 'Se guardo correctamente']);
    }

    public function search($participante, $top)
    {
        //INformacion General
        $contactos = DB::table('Adds')
            ->select(DB::raw('sum(contacto) as total_contactos'))
            ->first();
        $indicadores = DB::table('Adds')
            ->select(DB::raw('sum(contacto) as total_contactos'))
            ->groupBy('participante')
            ->orderByDesc('total_contactos')
            ->first();
        //
        if($top == 'general')
        {
            $puntos = Add::with('bandas')->where('participante', $participante)->get();
        }
        else if($top == 'fonia')
        {
            $puntos = Add::with('bandas')->where(['participante'=> $participante, 'modo'=> 'SSB'])->get();
        }
        else if($top == 'ft8')
        {
            $puntos = Add::with('bandas')->where(['participante'=> $participante, 'modo'=> 'FT8'])->get();
        }

        $evento = Evento::first();
        return view('usuarios.index', compact('puntos', 'evento', 'contactos', 'indicadores'));
    }

    public function diploma_pdf($usuario, $tipo_diploma)
    {
        $imagen = '';
        $evento = Evento::first();
        if($tipo_diploma == 'imagen_diploma_1')
        {
            $imagen = $evento->imagen_diploma_1;
        }
        if($tipo_diploma == 'imagen_diploma_2')
        {
            $imagen = $evento->imagen_diploma_2;
        }
        if($tipo_diploma == 'imagen_diploma_3')
        {
            $imagen = $evento->imagen_diploma_3;
        }

        $pdf = PDF::loadView('usuarios.diploma', compact('imagen', 'usuario'));
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download('pruebapdf.pdf');
    }
}
