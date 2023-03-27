<?php

namespace App\Http\Controllers;

use App\Models\superheroe;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class SuperheroeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $datos['superheroes']=superheroe::paginate(5);
        return view('superheroe.index',$datos );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('superheroe.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //$datosSuperheroe = request()->all();
        $datosSuperheroe = request()->except('_token');

        if($request->hasFile('Foto')){
            $datosSuperheroe['Foto']=$request->file('Foto')->store('uploads','public');
        }


        superheroe::insert($datosSuperheroe);

        // return response()->json($datosSuperheroe);
        return redirect('superheroe')->with('mensaje','Superheroe agregado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Superheroe $superheroe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $superheroe=superheroe::findOrFail($id);
        return view('superheroe.edit', compact('superheroe') );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $datosSuperheroe = request()->except(['_token','_method']);

        if($request->hasFile('Foto')){
            $superheroe=superheroe::findOrFail($id);

            Storage::delete('public/'.$superheroe->Foto);

            $datosSuperheroe['Foto']=$request->file('Foto')->store('uploads','public');
        }



        superheroe::where('id','=',$id)->update($datosSuperheroe);
        $superheroe=superheroe::findOrFail($id);
        return view('superheroe.edit', compact('superheroe') );

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //

        $superheroe=superheroe::findOrFail($id);

        if(Storage::delete('public/'.$superheroe->Foto)){
        superheroe::destroy($id);    

        }


        

        return redirect('superheroe')->with('mensaje','Superheroe borrado');
    }
}
