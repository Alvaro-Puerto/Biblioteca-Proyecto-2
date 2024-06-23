<?php

namespace App\Http\Controllers;

use App\DataTables\AuthorsDataTable;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AuthorController extends Controller
{
    public function index(AuthorsDataTable $dataTable)
    {
        return $dataTable->render('author.index');
    }

    public function store(Request $request)
    {
        $author = Author::create($request->all());
        return Redirect::back();
    }

    public function update(Author $author, Request $request)
    {   
        $author->update($request->all());
        return Redirect::back();
    }

    public function destroy(Author $author) {
        $author->update([
            'estado' => $author->estado == 1 ? 0: 1
        ]);
        $author->save();
        return Redirect::back();
    }


    public function json() {
        $autors = Author::where('estado', true)->get();

        return response()->json($autors);
    }
}
