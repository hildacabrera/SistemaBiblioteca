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
        return view('Prestamo.create',['usuario'=>usuario::all()],['ejemplar'=>Ejemplar::select('ejemplar.*','libro.titulo as libro_titulo')
            ->join('libro','ejemplar.libro_id', '=','libro.id')
            ->where('ejemplar.cantidad', '>', 0)
            ->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        {
            $terminado = $this->ActualizarCantidad($request->get('ejemplar_id'), "RESTA");
            if($terminado == "Y"){
                $prestamo = new Prestamo ();
                $prestamo->fecha_pres =$request->get('fecha_pres');
                $prestamo->fecha_dev =$request->get('fecha_dev');
                $prestamo->usuario_id =$request->get('usuario_id');
                $prestamo->ejemplar_id =$request->get('ejemplar_id');
                $prestamo->save();
                
                return redirect('/Prestamo');
            }else{
                $nombreEjemplarLibro = "";
                $ejemplar = $this->buscarEjemplarLibro($request->get('ejemplar_id'));
                
                foreach($ejemplar as $ejemplar){
                    $nombreEjemplarLibro = $ejemplar->localizacion." - Libro: ".$ejemplar->libro_titulo;
                }

                return redirect()->action([self::class, 'create'],
                ['error' => 'No puede prestar el ejemplar "'.$nombreEjemplarLibro.'" porque esta agotado.']);
            }
            
        }
    }

    public function buscarEjemplarLibro(string $ejemplar_id)
    {
        //$nombreEjemplarLibro = "";
        $ejemplar = Ejemplar::select('ejemplar.*','libro.titulo as libro_titulo')
        ->join('libro','ejemplar.libro_id', '=','libro.id')
        ->where('ejemplar.id', '=', $ejemplar_id)
        ->get();
        // foreach($ejemplar as $ejemplar){
        //     $nombreEjemplarLibro = $ejemplar->localizacion." - Libro: ".$ejemplar->libro_titulo;
        // }
        return $ejemplar;
    }

    public function ActualizarCantidad(string $ejemplar_id, string $parametro)
    {
        $terminado = "N";
        $ejemplar = Ejemplar::find($ejemplar_id);
        $cantidadEjemplar = $ejemplar->cantidad;
        if($parametro == "SUMA"){
            $cantidadEjemplar = $cantidadEjemplar + 1;
            $terminado = "Y";
        }else if($cantidadEjemplar > 0){
            $cantidadEjemplar = $cantidadEjemplar - 1;
            $terminado = "Y";
        }
        $ejemplar->cantidad = $cantidadEjemplar;
        $ejemplar->save();

        return $terminado;
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
        return view('Prestamo.edit',['prestamo'=>Prestamo::find($id),'usuario'=>usuario::all()],['ejemplar'=>Ejemplar::select('ejemplar.*','libro.titulo as libro_titulo')
        ->join('libro','ejemplar.libro_id', '=','libro.id')
        ->where('ejemplar.cantidad', '>', 0)
        ->get()
    ]);
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
        $ejemplar_id_actual = $prestamo->ejemplar_id;
        $prestamo->ejemplar_id =$request->get('ejemplar_id');
        $prestamo->save();

        if ($ejemplar_id_actual != $request->get('ejemplar_id')){
            $this->ActualizarCantidad($ejemplar_id_actual, "SUMA");
            $this->ActualizarCantidad($request->get('ejemplar_id'), "RESTA");
        }
        
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
        $this->ActualizarCantidad($prestamo->ejemplar_id, "SUMA");
        $prestamo->delete();
        return redirect('/Prestamo');
    }
}
