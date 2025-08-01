<?php

namespace App\DataTables;

use App\Models\ServiceType;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Column;

class ServiceTypeDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function ($serviceType) {
                $editUrl = route('service-types.edit', $serviceType->id);
                $showUrl = route('service-types.show', $serviceType->id);
                $deleteUrl = route('service-types.destroy', $serviceType->id);

                return view('global.datatable-action', compact('editUrl', 'showUrl', 'deleteUrl'));
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\ServiceType $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ServiceType $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('service-types-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->parameters([
                'dom' => 'Bfrtip',
                'buttons' => [
                    'export',
                    'print',
                    'reset',
                    'reload',
                ],
                'order' => [[0, 'desc']],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id')->title('ID'),
            Column::make('name')->title('Name'),
            Column::make('description')->title('Description'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(120)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'ServiceType_' . date('YmdHis');
    }
}
