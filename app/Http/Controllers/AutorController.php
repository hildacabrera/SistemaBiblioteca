<?php

namespace App\Http\Controllers;
use App\Models\Autor;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Autor.index',[
            'autor'=>Autor::all(),
            'error' => session('error')
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Autor.create', [
            'errors' => session('errors')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|max:50|',
          ]);
      
          if ($validator->fails()) {
              return redirect('Autor/create')
                          ->withErrors($validator)
                          ->withInput();
          }

        $autor = new Autor ();
        $autor->nombre =$request->get('nombre');
                $autor->save();
 
        return redirect('/Autor');
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
        return view('Autor.edit',['autor'=>Autor::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $autor = Autor::find($id);
        $autor->nombre =$request->get('nombre');
        $autor->save();

        return redirect('/Autor');
    }
    public function delete(string $id)
    {
     return view('Autor.delete',
     ['autor'=>Autor::find($id)
    ]);

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $borrarAutor = $this->buscarAutorEnLibro($id);
        if($borrarAutor == "Y"){
            $autor = Autor::find($id);
            $autor->delete();
            return redirect('/Autor');
        }else{
            $autor = Autor::find($id);
            $nombreAutor = $autor->nombre;

            return redirect()->action([self::class, 'index'],
            ['error' => 'No puede eliminar el autor "'.$nombreAutor.'" porque esta asignado en varios libros.']);
        }
        
    }

    public function buscarAutorEnLibro(string $autor_id)
    {
        $borrarAutor = "N";
        $autor = Autor::select('*')
        ->join('libro','autor.id', '=','libro.autor_id')
        ->where('autor.id', '=', $autor_id)
        ->get();
        if($autor->count() > 0){
            $borrarAutor = "N";
        }else{
            $borrarAutor = "Y";
        }
        // }
        // foreach($ejemplar as $ejemplar){
        //     $nombreEjemplarLibro = $ejemplar->localizacion." - Libro: ".$ejemplar->libro_titulo;
        // }
        return $borrarAutor;
    }
    
}
