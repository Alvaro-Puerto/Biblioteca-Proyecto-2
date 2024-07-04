<?php

namespace App\Http\Controllers;

use App\DataTables\EditorialsDataTable;
use App\Models\Author;
use App\Models\Editorial;
use App\Models\Recurso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

use function Laravel\Prompts\error;

class EditorialController extends Controller
{
    public function index(EditorialsDataTable $dataTable)
    {
        return $dataTable->render('editorial.index');
    }

    public function store(Request $request)
    {
        $editorial = Editorial::create($request->all());
        return Redirect::back();
    }

    public function update(Editorial $editorial, Request $request)
    {   
        $editorial->update($request->all());
        return Redirect::back();
    }

    public function destroy(Editorial $editorial) {
        $editorial->update([
            'estatus' => $editorial->estatus == 1 ? 0: 1
        ]);
        $editorial->save();
        return Redirect::back();
    }

    public function json() {
        $editorial = Editorial::where('estatus', true)->get();

        return response()->json($editorial);
    }

    public function detalles($id) {
        $recursos = Recurso::where('editorial_id', $id)->get();
        $authores = DB::table('authors')
                    ->join('recursos', 'authors.id', '=', 'recursos.author_id')
                    ->join('editorials', 'editorials.id', '=', 'recursos.editorial_id')
                    ->where('recursos.editorial_id', $id)
                    ->select('authors.*')
                    ->get();

        $data = [
            'recurso' => $recursos,
            'authores' => $authores
        ];

        return response()->json($data);
    }
}
