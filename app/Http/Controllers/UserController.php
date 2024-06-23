<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index( UsersDataTable $dataTable)
    {
        return $dataTable->render('users.index');
    }

    public function permisos() {
        $user = Auth::user();

        $usuarioPermisos =  $user->permissions;

        return response()->json($usuarioPermisos);
    }
}
