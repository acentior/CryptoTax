<?php

namespace App\Http\Livewire\Admin\BackendUser;

use App\Forms\SidebarLayout;
use App\Http\Livewire\Admin\Resources\ResourceForm;
use Filament\Forms;
use Illuminate\Database\Eloquent\Builder;

class BackendUserForm extends ResourceForm
{
    protected function getFormSchema(): array
    {
        return SidebarLayout::make()
            ->addTab([
                Forms\Components\TextInput::make('name')
                    ->label(__("Name"))
                    ->required(),
                Forms\Components\TextInput::make('email')
                    ->required()
                    ->email(),
                Forms\Components\BelongsToSelect::make('user_account_type_id')
                    ->required()
                    ->relationship("userAccountType", "name", fn (Builder $query) => $query->whereIn("id", $this->resource->typesArray))
                    ->label("Type"),
            ])
            ->toArray();
    }
}