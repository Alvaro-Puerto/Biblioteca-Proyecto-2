<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

use function Laravel\Prompts\error;

class PermisosController extends Controller
{
    public function index(User $usuario)
    {
        
        $permisos = Permission::all();
        $usuarioPermisos =  $usuario->permissions;;

        $data = [
            'permisos' => $permisos,
            'usuario' => $usuario,
            'usuarioPermisos' => $usuarioPermisos,
        ];

        return response()->json($data);
    }

    public function store(Request $request, User $usuario)
    {
        $usuario->syncPermissions($request->permisos);
        return response()->json(['message' => 'Permisos actualizados']);
    }
}
