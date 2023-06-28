<?php

namespace App\Http\Controllers;

use App\Models\Ejemplar;
use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EjemplarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Ejemplar.index', [
            'ejemplar' => Ejemplar::select('ejemplar.*', 'libro.titulo as libro_titulo')
                ->join('libro', 'ejemplar.libro_id', '=', 'libro.id')
                ->orderBy('id','asc')
                ->get()
                
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Ejemplar.create',['libro'=>Libro::all(),[
            'errors' => session('errors')]]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'localizacion'=> 'required|max:50|',
            'cantidad'=> 'required|max:5|'
          ]);
      
          if ($validator->fails()) {
              return redirect('Ejemplar/create')
                          ->withErrors($validator)
                          ->withInput();
           }
        {
            $ejemplar = new Ejemplar ();
            $ejemplar->localizacion =$request->get('localizacion');
            $ejemplar->cantidad =$request->get('cantidad');
            $ejemplar->libro_id =$request->get('libro_id');
            $ejemplar->save();
     
            return redirect('/Ejemplar');
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
        return view('Ejemplar.edit',['ejemplar'=> Ejemplar::find($id), 'libro'=> Libro::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ejemplar = Ejemplar::find($id);
        $ejemplar->localizacion =$request->get('localizacion');
        $ejemplar->cantidad =$request->get('cantidad');
        $ejemplar->libro_id =$request->get('libro_id');
        $ejemplar->save();

        return redirect('/Ejemplar');
    }
    public function delete(string $id)
    {
     return view('Ejemplar.delete',['ejemplar'=>Ejemplar::find($id)]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ejemplar = Ejemplar::find($id);
        $ejemplar->delete();
           return redirect('/Ejemplar');
    }
}
