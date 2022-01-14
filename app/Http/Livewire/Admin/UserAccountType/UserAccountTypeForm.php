<?php

namespace App\Http\Livewire\Admin\UserAccountType;

use App\Forms\SidebarLayout;
use App\Http\Livewire\Admin\Resources\ResourceForm;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;

class UserAccountTypeForm extends ResourceForm
{
    public function getFormSchema(): array
    {
        /**
        $table->unsignedInteger("duration_in_months")->nullable(true)->after("name");
        $table->unsignedSmallInteger("included_credits")->nullable(true)->after("name");
         */
        return SidebarLayout::make()
            ->addTab([
                TextInput::make('name')
                    ->label(__("Name"))
                    ->required()
                    ->columnSpan(2),
                TextInput::make('price_per_year')
                    ->label(__("Price per year"))
                    ->placeholder("Price per year")
                    ->placeholder("Leave empty for free")
                    ->postfix("$")
                    ->numeric(),
                TextInput::make('included_credits')
                    ->label(__("Included credits"))
                    ->numeric()
                    ->nullable(true),
                TextInput::make('max_backups')
                    ->label(__("Max. backups"))
                    ->placeholder("Leave empty for unlimited")
                    ->numeric()
                    ->nullable(true),
                TextInput::make('max_csv_upload')
                    ->label(__("Max. CSV Uploads"))
                    ->numeric()
                    ->placeholder("Leave empty for unlimited")
                    ->postfix("MB")
                    ->nullable(true),
                Toggle::make("is_customer")
                    ->label(__("Is customer")),
                Toggle::make("active")
                    ->label(__("Active")),
            ], columns: 2)
            ->toArray();
    }
}
