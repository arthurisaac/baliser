<?php

namespace App\DataTables;

use App\Models\KeyLogger;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Exceptions\Exception;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class KeyLoggersDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @throws Exception
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return datatables()
            ->eloquent($query);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(): QueryBuilder
    {
        //return $model->newQuery();
        //$data = KeyLogger::select();
        $data = KeyLogger::query()->where("phone", $this->id)->orderByDesc("id");
        return $this->applyScopes($data);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('keyloggers-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1)
            ->language(["url" => asset("assets/datatable-fr-FR.json") ])
            ->selectStyleSingle()
            ->lengthMenu([ [10, 25, 50, -1], [10, 25, 50, "Tout"] ])
            ->parameters([
                'dom' => 'Bfrtip',
                'buttons' => ['excel', 'csv', 'copyHtml5', 'pdfHtml5', 'pageLength', 'reload'],
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('text'),
            //Column::make('created_at'),
            //Column::make('updated_at'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'KeyLoggers_' . date('YmdHis');
    }
}
