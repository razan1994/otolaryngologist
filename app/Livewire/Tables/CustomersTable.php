<?php

namespace App\Livewire\Tables;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class CustomersTable extends PowerGridComponent
{
    public string $tableName = 'customers-table';

    public function setUp(): array
    {
        return [
            PowerGrid::header()
                ->showSearchInput(),
            PowerGrid::footer()
                ->showPerPage(
                    $perPage = 20,
                    $perPageValues = [10, 20, 50, 100]
                )
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return Customer::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('name')
            ->add('username')
            ->add('email')
            ->add('phone')
            ->add('user_status')
            ->add('status_badge', function ($row) {
                if ($row->user_status == 1) {
                    return '<span class="badge badge-success">Active</span>';
                } elseif ($row->user_status == 2) {
                    return '<span class="badge badge-warning">Pending</span>';
                } else {
                    return '<span class="badge badge-danger">Inactive</span>';
                }
            })
            ->add('created_at_formatted', fn ($row) => $row->created_at ? $row->created_at->format('d/m/Y H:i') : '-');
    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'id')
                ->sortable()
                ->searchable(),

            Column::make('Name', 'name')
                ->sortable()
                ->searchable(),

            Column::make('Username', 'username')
                ->sortable()
                ->searchable(),

            Column::make('Email', 'email')
                ->sortable()
                ->searchable(),

            Column::make('Phone', 'phone')
                ->sortable()
                ->searchable(),

            Column::make('Status', 'status_badge'),

            Column::make('Created At', 'created_at_formatted')
                ->sortable(),

            Column::action('Actions'),
        ];
    }

    public function filters(): array
    {
        return [];
    }

    #[\Livewire\Attributes\On('delete')]
    public function delete($rowId): void
    {
        $customer = Customer::find($rowId);
        if (!$customer) {
            $this->js('toastr.error("Customer not found")');
            return;
        }

        $customer->delete();
        $this->js('toastr.success("Customer deleted successfully")');
    }

    public function actions(Customer $row): array
    {
        return [
            Button::add('edit')
                ->slot('<i class="fas fa-edit"></i>')
                ->class('btn btn-sm btn-primary')
                ->route('super_admin.customers-edit', ['id' => $row->id]),

            Button::add('delete')
                ->slot('<i class="fas fa-trash"></i>')
                ->class('btn btn-sm btn-danger')
                ->dispatch('delete', ['rowId' => $row->id])
                ->confirm('Are you sure you want to delete this Customer?'),
        ];
    }
}
