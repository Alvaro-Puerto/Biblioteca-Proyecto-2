<?php

namespace App\Http\Controllers;

use App\DataTables\PrestamosDataTable;
use App\Models\Prestamo;
use App\Models\Recurso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DataTables;
use Yajra\DataTables\QueryDataTable;

use Illuminate\Support\Facades\DB;

class PrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PrestamosDataTable $prestamosDataTable )
    {
        return $prestamosDataTable->render('prestamo.index');
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
        $request['fecha_hora_prestamo'] = now();
        $request['estado'] = 'PRESTADO';
        $request['user_id'] = auth()->user()->id;
        Prestamo::create($request->all());

        $prestamo = Recurso::find($request->recurso_id);
        $prestamo->inventario = $prestamo->inventario -1;
        $prestamo->save();
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
    public function update(Request $request, Prestamo $prestamo)
    {
        $prestamo->update($request->all());
        $prestamo->save();

        $recurso = Recurso::find($prestamo->recurso_id);

        $recurso->inventario = $prestamo->inventario -1;
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

    public function devolucion(int $id, Request $request) {
       
        $prestamo = Prestamo::find($id); 
        $prestamo->fecha_hora_devolucion = now();
        $prestamo->estado = 'DEVUELTO';
        $prestamo->user_id = auth()->user()->id;
        $prestamo->save();

        $recurso = Recurso::find($prestamo->recurso_id);
 
        $recurso->inventario = $recurso->inventario  + 1;
        $recurso->save();
        return Redirect::back();
    }
}
