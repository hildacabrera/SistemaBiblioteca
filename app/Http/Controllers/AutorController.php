<?php

namespace App\Http\Controllers;
use App\Models\Autor;

use Illuminate\Http\Request;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Autores.index',[
            'autor'=>Autor::all()
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Autores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $autor = new Autor ();
        $autor->nombre =$request->get('nombre');
                $autor->save();
 
        return redirect('/Autores');
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
        return view('Autores.edit',['autor'=>Autor::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $autor = Autor::find($id);
        $autor->nombre =$request->get('nombre');
        $autor->save();

        return redirect('/Autores');
    }
    public function delete(string $id)
    {
     return view('Autores.delete',
     ['autor'=>Autor::find($id)
    ]);

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $autor = Autor::find($id);
        $autor->delete();
        return redirect('/Autores');
    }
    
}
