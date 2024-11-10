<?php

declare(strict_types=1);

namespace App\Livewire\Tables;

use App\Models\Vaccine;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\PowerGridFields;

final class VaccineTable extends PowerGridComponent
{
    public string $tableName = 'vaccines';

    public function datasource(): ?Builder
    {
        return Vaccine::query();
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('name')
            ->add('batch')
            ->add('expiration_date');
    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'id'),
            Column::make('Name', 'name')
                ->sortable()
                ->searchable(),
            Column::make('Batch', 'batch'),
            Column::make('Expiration date', 'expiration_date'),
            Column::action('Action'),
        ];
    }

    public function actions($row): array
    {
        return [
            Button::add('show')
                ->slot('<i class="fa-solid fa-eye"></i>')
                ->class('btn btn-light btn-sm')
                ->attributes([
                    'onclick' => "showVaccine({$row->id})",
                ]),
            Button::add('edit')
                ->slot('<i class="fa-solid fa-pen-to-square"></i>')
                ->class('btn btn-primary btn-sm')
                ->attributes([
                    'onclick' => "editVaccine({$row->id})",
                ]),
            Button::add('delete')
                ->slot('<i class="fa-solid fa-trash"></i>')
                ->class('btn btn-danger btn-sm')
                ->attributes([
                    'onclick' => "DeleteVaccine({$row->id})",
                ]),
        ];
    }
}
