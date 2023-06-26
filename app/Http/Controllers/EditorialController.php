<?php

namespace App\Http\Controllers;

use App\Models\Editorial;
use Illuminate\Http\Request;

class EditorialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Editorial.index',[
            'editorial'=>Editorial::all()
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Editorial.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $editorial = new Editorial ();
        $editorial->nombre =$request->get('nombre');
                $editorial->save();
 
        return redirect('/Editorial');
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
        return view('Editorial.edit',['editorial'=>Editorial::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $editorial = Editorial::find($id);
        $editorial->nombre =$request->get('nombre');
        $editorial->save();

        return redirect('/Editorial');
    }
    public function delete(string $id)
    {
     return view('Editorial.delete',
     ['editorial'=>Editorial::find($id)
    ]);

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       /* $editorial = Editorial::find($id);
        $editorial->delete();
        return redirect('/Editorial');*/
        $borrarEditorial = $this->buscarEditorialEnLibro($id);
        if($borrarEditorial == "Y"){
            $editorial = Editorial::find($id);
            $editorial->delete();
            return redirect('/Editorial');
        }else{
            $editorial = Editorial::find($id);
            $nombreEditorial = $editorial->nombre;

            return redirect()->action([self::class, 'index'],
            ['error' => 'No puede eliminar el Editorial "'.$nombreEditorial.'" porque esta asignado en varios libros.']);
        }

    }
    public function buscarEditorialEnLibro(string $editorial_id)
    {
        $borrarEditorial = "N";
        $editorial = Editorial::select('*')
        ->join('libro','editorial.id', '=','libro.editorial_id')
        ->where('editorial.id', '=', $editorial_id)
        ->get();
        if($editorial->count() > 0){
            $borrarEditorial = "N";
        }else{
            $borrarEditorial = "Y";
        }
        // }
        // foreach($ejemplar as $ejemplar){
        //     $nombreEjemplarLibro = $ejemplar->localizacion." - Libro: ".$ejemplar->libro_titulo;
        // }
        return $borrarEditorial;
    }
}
