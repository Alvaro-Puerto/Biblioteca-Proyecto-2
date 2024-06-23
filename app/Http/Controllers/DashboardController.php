<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use App\Models\Recurso;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $libros = Recurso::all();
        $prestamos = $this->prestamos('2024-01-01', '2024-12-31');
        $data = [
            'libros' => count($libros),
            'prestamos' => count($prestamos),
            'prestamos_vencidos' => count($this->prestamo_vencidos()),
            'libros_sin_inventario' => count($this->libros_vencidos())

        ];
        return view('dashboard.index', ['data' => $data]);
    }

    public function prestamos($fecha_inicio, $fecha_fin)
    {
        $query = Prestamo::query();
        $query ->join('usuarios', 'usuarios.id', '=', 'prestamos.usuario_id')
        ->join('recursos', 'recursos.id', '=', 'prestamos.recurso_id')
        ->whereBetween('fecha_hora_prestamo', [$fecha_inicio, $fecha_fin])
        ->where('fecha_hora_devolucion', '=', null)
        ->select('prestamos.id',
                 'usuarios.nombres as usuario',
                 'recursos.tipo',
                 'prestamos.estado',
                 'recursos.titulo',
                 'fecha_hora_prestamo',
                 'fecha_hora_entrega',
                 'fecha_hora_devolucion',
                
                 'prestamos.created_at',
                 'prestamos.updated_at',
                DB::raw('DATEDIFF(CURDATE(), fecha_hora_entrega) as diif_dias')
                );

        return $query->get();
    }

    public function prestamo_vencidos() {
        $query = Prestamo::query();
        $query ->join('usuarios', 'usuarios.id', '=', 'prestamos.usuario_id')
        ->join('recursos', 'recursos.id', '=', 'prestamos.recurso_id')
        ->where('fecha_hora_entrega', '<',  Carbon::now())
        ->where('fecha_hora_devolucion', '=', null)
        ->select('prestamos.id',
                 'usuarios.nombres as usuario',
                 'recursos.tipo',
                 'prestamos.estado',
                 'recursos.titulo',
                 'fecha_hora_prestamo',
                 'fecha_hora_entrega',
                 'fecha_hora_devolucion',
                 'prestamos.created_at',
                 'prestamos.updated_at'
                );

        return $query->get();
    }

    public function libros_vencidos() {
        $libros = Recurso::where('inventario', '=', 0)->get();

        return $libros;
    }

    public function usuario_prestamo() {
        $query = Prestamo::query();
        $query ->join('usuarios', 'usuarios.id', '=', 'prestamos.usuario_id')
        ->join('recursos', 'recursos.id', '=', 'prestamos.recurso_id')
        ->select(
                 'usuarios.nombres as usuario',
                 DB::raw('COUNT(*) as total')
                )
        ->groupBy('usuarios.nombres');

        return $query->get();
    }

    public function usuario_prestamo_libro($nombre) {
        $query = Prestamo::query();
        $query ->join('usuarios', 'usuarios.id', '=', 'prestamos.usuario_id')
        ->join('recursos', 'recursos.id', '=', 'prestamos.recurso_id')
        ->where('usuarios.nombres',$nombre)
        ->select(
                 'recursos.titulo',
                 'fecha_hora_prestamo',
                 'recursos.tipo'
                 
                );

        return $query->get();   
    }
}
