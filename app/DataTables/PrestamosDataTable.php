<?php

namespace App\DataTables;

use App\Models\Prestamo;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\QueryDataTable;

class PrestamosDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'prestamos.action')
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Prestamo $model): QueryBuilder
    {
        $query = $model->newQuery();
        $query ->join('usuarios', 'usuarios.id', '=', 'prestamos.usuario_id')
        ->join('recursos', 'recursos.id', '=', 'prestamos.recurso_id')
        ->select('prestamos.id',
                 'usuarios.nombres as usuario',
                 'recursos.tipo',
                 'prestamos.estado',
                 'recursos.titulo',
                 'fecha_hora_prestamo',
                 'fecha_hora_entrega',
                 'fecha_hora_devolucion',
                 //'prestamos.created_at',
                 //'prestamos.updated_at'
                );


        error_log($query->get());
        return $query;
      
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('prestamos-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id')->title('Id'),
            Column::make('usuario')->title('Usuario'),
            Column::make('tipo')->title('Tipo'),        
            Column::make('titulo')->title('Recurso'),   
            Column::make('estado')->title('Estado'),       
            Column::make('fecha_hora_prestamo')->title('Fecha del prestamo'),     
            Column::make('fecha_hora_entrega')->title('Fecha de entrega'),     
            Column::make('fecha_hora_devolucion')->title('Fecha de devolución'),     
           
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Prestamos_' . date('YmdHis');
    }
}
