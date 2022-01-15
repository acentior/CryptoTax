<?php

namespace App\Http\Livewire\Admin\UserCreditAction;

use App\Http\Livewire\Admin\Resources\ResourceTable;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

class UserCreditActionTable extends ResourceTable
{
    protected function getTableColumns(): array
    {
        return [
            TextColumn::make("name")
                ->sortable()
                ->searchable(),
            TextColumn::make("value")
                ->label("Credits")
                ->sortable(),
            TextColumn::make('valid_from')
                ->dateTime()
                ->sortable(),
            TextColumn::make('valid_till')
                ->dateTime()
                ->sortable()

        ];
    }


    protected function getTableFilters(): array
    {
        return [

        ];
    }
}
