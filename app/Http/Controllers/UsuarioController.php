<?php

namespace App\Http\Controllers;

use App\DataTables\UsuariosDataTable;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UsuariosDataTable $usuariosDataTable)
    {
        return $usuariosDataTable->render('usuario.index');
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
        $usuario = Usuario::create($request->all()); 
        return Redirect::back();
    }

   
   
    public function update(Usuario $usuario, Request $request)
    {
        $usuario->update($request->all());
        return Redirect::back();
    }

   
    public function destroy(string $id)
    {
        
    }

    public function json() {
    return response()->json(Usuario::all());    
    }
}
