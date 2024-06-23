<?php

namespace App\Http\Controllers;

use App\DataTables\CategoriaDataTable;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CategoriaDataTable $dataTable)
    {
        return $dataTable->render('Categoria.Index');
    }

    public function store(Request $request)
    {
        $request['user_id'] = auth()->user()->id;
        $categoria = Categoria::create($request->all());
        return Redirect::back();
    }
    public function update(int $id, Request $request)
    {
        error_log($id);

        $categoria = Categoria::find($id);
        $categoria->update($request->all());
        return Redirect::back();
    }

    public function destroy(int $id)
    {
        $categoria = Categoria::find($id);
        $categoria->delete();
        return Redirect::back();
    }

    public function json() {
        return response()->json(Categoria::where('status', true)->get());
    }
}
