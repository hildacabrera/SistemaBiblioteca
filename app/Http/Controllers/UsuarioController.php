<?php

namespace App\Http\Controllers;
use App\Models\Usuario;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Usuario.index',[
            'usuario'=>Usuario::all()
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $usuario = new Usuario ();
        $usuario->nombre =$request->get('nombre');
        $usuario->telefono =$request->get('telefono');
        $usuario->direccion =$request->get('direccion');
        $usuario->save();
 
        return redirect('/Usuario');
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
        return view('Usuario.edit',['usuario'=>Usuario::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $usuario = Usuario::find($id);
        $usuario->nombre =$request->get('nombre');
        $usuario->telefono =$request->get('telefono');
        $usuario->direccion =$request->get('direccion');
        $usuario->save();

        return redirect('/Usuario');
    }
    public function delete(string $id)
    {
     return view('Usuario.delete',
     ['usuario'=>Usuario::find($id)
    ]);

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       /* $usuario = Usuario::find($id);
        $usuario->delete();
        return redirect('/Usuario');*/
        $borrarUsuario = $this->buscarUsuarioPrestamo($id);
        if($borrarUsuario == "Y"){
            $usuario = Usuario::find($id);
            $usuario->delete();
            return redirect('/Usuario');
        }else{
            $usuario = Usuario::find($id);
            $nombreUsuario = $usuario->nombre;
   
            return redirect()->action([self::class, 'index'],
            ['error' => 'No puede eliminar el libro "'.$nombreUsuario.'" porque esta asignado en varios editoriales.']);
        }    
    
    }
    public function buscarUsuarioPrestamo(string $usuario_id)
    {
        $borrarUsuario = "N";
        $usuario = Usuario::select('*')
        ->join('prestamo','usuario.id', '=','prestamo.usuario_id')
        ->where('usuario.id', '=', $usuario_id)
        ->get();
   
        if($usuario->count() > 0){
            $borrarUsuario = "N";
        }else{
            $borrarUsuario = "Y";
        }
        // }
        // foreach($ejemplar as $ejemplar){
        //     $nombreEjemplarLibro = $ejemplar->localizacion." - Libro: ".$ejemplar->libro_titulo;
        // }
        return $borrarUsuario;
    }
}
