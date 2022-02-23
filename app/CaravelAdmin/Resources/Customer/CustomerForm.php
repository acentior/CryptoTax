<?php

namespace App\CaravelAdmin\Resources\Customer;

use App\CaravelAdmin\Resources\CryptoExchangeAccount\CryptoExchangeAccountResource;
use App\Forms\Components\ButtonField;
use App\Models\CryptoExchangeAccount;
use App\Models\User;
use App\Models\UserCreditLog;
use WebCaravel\Admin\Forms\Components\RelatedTableField;
use WebCaravel\Admin\Resources\ResourceForm;
use App\CaravelAdmin\Resources\UserCreditLog\UserCreditLogResource;
use WebCaravel\Admin\Forms\SidebarLayout;
use Filament\Forms;

use function moneyFormat;

class CustomerForm extends ResourceForm
{
    protected function getFormSchema(): array
    {
        return SidebarLayout::make()
            // General tab
            ->addTab(Forms\Components\Tabs\Tab::make(__('General'))->schema([
                Forms\Components\TextInput::make('name')
                    ->label(__("Name"))
                    ->required(),
                Forms\Components\TextInput::make('email')
                    ->required()
                    ->email(),
            ]))

            // Credit logs
            ->addTab(Forms\Components\Tabs\Tab::make("Credit Logs")->schema([
                RelatedTableField::make(RelatedUserCreditLogTable::class)
            ])->visible(fn($record) => $record->exists && auth()->user()->can("viewAny", UserCreditLog::class)))

            // Exchange accounts
            ->addTab(Forms\Components\Tabs\Tab::make("Exchange Accounts")->schema([
                RelatedTableField::make(RelatedCryptoExchangeAccountTable::class)
                //HasManyRelationField::make('cryptoExchangeAccounts')
                //    ->resource(CryptoExchangeAccountResource::make())
            ])->visible(fn($record) => $record->exists && auth()->user()->can("viewAny", CryptoExchangeAccount::class)))

            // Info card
            ->addCard([
                Forms\Components\Placeholder::make("id")->label(__("ID"))
                    ->content(fn ($record): string => $record ? $record->id : '-'),
                Forms\Components\Placeholder::make("credits")->label(__("Credits"))
                    ->content(fn ($record): string => moneyFormat($record->credits)),
                Forms\Components\Placeholder::make("created_at")->label(__("Registered at"))
                    ->content(fn ($record): string => $record ? $record->created_at : '-'),
                Forms\Components\Placeholder::make("email_verified_at")->label(__("E-Mail verified"))
                    ->content(fn ($record): string => $record && $record->email_verified_at ? $record->email_verified_at : __("unverified")),
                Forms\Components\Placeholder::make("account_type_id")->label(__("Account type"))
                    ->content(fn (User $record): string => $record->userAccountType->getName()),
                ButtonField::make(__("Affiliate Url"))
                    ->href(fn (User $record): string => $record->getAffiliateUrl())
                    ->hidden(fn(User $record): bool => !$record->hasVerifiedEmail())
                    ->targetBlank(),
                ButtonField::make(__("Recruited by"))
                    ->href(fn (User $record): string => CustomerResource::make()->getRoute("show", $record->userAffiliate->recruitedBy))
                    ->content(fn (User $record): string => $record->userAffiliate->recruitedBy->email)
                    ->hidden(fn(User $record): bool => !$record->hasVerifiedEmail() || !$record->userAffiliate->recruitedBy),
            ])
            ->toArray();
    }
}
