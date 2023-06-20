<?php

namespace App\Http\Controllers;
use App\Models\Usuario;
use App\Models\Ejemplar;
use App\Models\Prestamo;
use Illuminate\Http\Request;

class PrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Prestamo.index',[
            'prestamo'=>Prestamo::select('prestamo.*','usuario.nombre as nombre_usuario','ejemplar.localizacion as localizacion_ejemplar')
            ->join('usuario','prestamo.usuario_id', '=','usuario.id')
            ->join('ejemplar','prestamo.ejemplar_id', '=','ejemplar.id')
            ->orderBy('id','asc')
            ->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Prestamo.create',['usuario'=>usuario::all()],['ejemplar'=>Ejemplar::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        {
            $prestamo = new Prestamo ();
            $prestamo->fecha_pres =$request->get('fecha_pres');
            $prestamo->fecha_dev =$request->get('fecha_dev');
            $prestamo->usuario_id =$request->get('usuario_id');
            $prestamo->ejemplar_id =$request->get('ejemplar_id');
            $prestamo->save();
     
            return redirect('/Prestamo');
        }
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
        return view('Prestamo.edit',['prestamo'=>Prestamo::find($id),'usuario'=>usuario::all()],['ejemplar'=>Ejemplar::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $prestamo = Prestamo::find($id);
        $prestamo->fecha_pres =$request->get('fecha_pres');
        $prestamo->fecha_dev =$request->get('fecha_dev');
        $prestamo->usuario_id =$request->get('usuario_id');
        $prestamo->ejemplar_id =$request->get('ejemplar_id');
        $prestamo->save();

        return redirect('/Prestamo');
    }
    public function delete(string $id)
    {
        //return view('Prestamo.delete',['prestamo'=>Prestamo::find($id)]);
        return view('Prestamo.delete',[ 
            'prestamo'=>Prestamo::select('prestamo.*','usuario.nombre as nombre_usuario')
            ->join('usuario','prestamo.usuario_id', '=','usuario.id')
            ->where('prestamo.id', '=', $id)
            ->get()
        ]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $prestamo = Prestamo::find($id);
        $prestamo->delete();
           return redirect('/Prestamo');
    }
}
