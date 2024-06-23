<?php

namespace App\DataTables;

use App\Models\Editorial;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class EditorialsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'editorials.action')
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Editorial $model): QueryBuilder
    {
        return $model->newQuery()
                     ->select('id', 'nombre', 'telefono', 'direccion', 'estatus');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('editorials-table')
                    ->columns($this->getColumns())
                    ->scrollerRowHeight(500)
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
            Column::make('nombre')->title('Nombre'),
            Column::make('telefono')->title('Teléfono'),
            Column::make('direccion')->title('Dirección'),
            Column::make('estatus')->title('Estado'),
            //Column::make('created_at')->title('FECHA CREACION'),
            //Column::make('updated_at')->title('FECHA ACTUALIZACION'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Editorials_' . date('YmdHis');
    }
}
