<?php

namespace App\Http\Controllers;

use App\Http\Requests\MateriaPostRequest;
use App\Models\Materia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Dashboard',[
            'materias' => Materia::latest()
                -> get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MateriaPostRequest $request)
    {
        Materia::create($request->all());
        return redirect()->back()->with('status','Nota Creada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function show(Materia $materia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function edit(Materia $materia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function update(MateriaPostRequest $request, Materia $materia)
    {
        $materia ->update($request->all());

        return redirect()->back()->with('status','Nota Actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function destroy($materia)
    {
        $materia = Materia::where('id', $materia)->delete();
    
        return redirect()->back()->with('status','Nota Eliminada');
    }

    public function dashboard()
    {
        return Inertia::render('Dashboard',[
            'materias' => Materia::latest()
                ->get()
        ]);
    }
}
