<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Autor;
use App\Models\Editorial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Libro.index',[
            'libro'=>Libro::select('libro.*','autor.nombre as nombre_autor','editorial.nombre as nombre_editorial')
            ->join('autor','libro.autor_id', '=','autor.id')
            ->join('editorial','libro.editorial_id', '=','editorial.id')
            ->orderBy('id', 'asc')
            ->get()
        ]);

    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Libro.create',['autor'=>Autor::all()],['editorial'=>Editorial::all(),[
            'errors' => session('errors')]]);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'titulo' => 'required|max:50|',
            'isbn'=> 'required|max:20|', 
            'paginas'=> 'required|max:4|', 
            'localizacion'=> 'required|max:50|'   
            
          ]);
      
          if ($validator->fails()) {
              return redirect('Libro/create')
                          ->withErrors($validator)
                          ->withInput();
           }
        {
            $libro = new Libro ();
            $libro->titulo =$request->get('titulo');
            $libro->isbn =$request->get('isbn');
            $libro->paginas =$request->get('paginas');
            $libro->localizacion =$request->get('localizacion');
            $libro->autor_id =$request->get('autor_id');
            $libro->editorial_id =$request->get('editorial_id');
            $libro->save();
     
            return redirect('/Libro');
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
        return view('Libro.edit',['libro'=>Libro::find($id),'autor'=>Autor::all()],['editorial'=>Editorial::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $libro = Libro::find($id);
        $libro->titulo =$request->get('titulo');
        $libro->isbn =$request->get('isbn');
        $libro->paginas =$request->get('paginas');
        $libro->localizacion =$request->get('localizacion');
        $libro->autor_id =$request->get('autor_id');
        $libro->editorial_id =$request->get('editorial_id');
        $libro->save();

        return redirect('/Libro');
    }

    public function delete(string $id)
    {
     return view('Libro.delete',['libro'=>Libro::find($id)]);
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       /* $libro = Libro::find($id);
        $libro->delete();
           return redirect('/Libro');*/

        $borrarLibro = $this->buscarLibroEjemplar($id);
        if($borrarLibro == "Y"){
            $libro = Libro::find($id);
            $libro->delete();
            return redirect('/Ejemplar');
        }else{
            $libro = Libro::find($id);
            $nombreLibro = $libro->titulo;
   
            return redirect()->action([self::class, 'index'],
            ['error' => 'No puede eliminar el libro "'.$nombreLibro.'" porque esta asignado en varios ejemplares.']);
        }
    }
    public function buscarLibroEjemplar(string $libro_id)
    {
        $borrarLibro = "N";
        $libro = Libro::select('*')
        ->join('ejemplar','libro.id', '=','ejemplar.libro_id')
        ->where('libro.id', '=', $libro_id)
        ->get();
   
        if($libro->count() > 0){
            $borrarLibro = "N";
        }else{
            $borrarLibro = "Y";
        }
        // }
        // foreach($ejemplar as $ejemplar){
        //     $nombreEjemplarLibro = $ejemplar->localizacion." - Libro: ".$ejemplar->libro_titulo;
        // }
        return $borrarLibro;
    }
}
