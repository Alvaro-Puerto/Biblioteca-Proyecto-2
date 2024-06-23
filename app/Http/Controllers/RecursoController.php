<?php

namespace App\Http\Controllers;

use App\DataTables\RecursosDataTable;
use App\Models\Recurso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RecursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(RecursosDataTable $recursosDataTable)
    {
        return $recursosDataTable->render('recurso.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Recurso::create($request->all());

        return Redirect::back();
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Recurso $recurso ,Request $request)
    {
        $recurso->update($request->all());
        $recurso->save();
        return Redirect::back();
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function json() {
        $recurso = Recurso::where('inventario', '>', 0)->get();

        return response()->json($recurso);
    }
}
