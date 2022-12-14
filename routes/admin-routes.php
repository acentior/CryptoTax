<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

//Route::middleware(['auth:admin', 'verified'])->middleware("user-account-type:admin")->name("admin.")->prefix("admin")->group(function(){
Route::redirect("/", "/admin/dashboard");

Route::get('/dashboard', function () {
    return view('pages.dashboard');
})->name('dashboard');

// Users
\App\CaravelAdmin\Resources\Customer\CustomerResource::routes();
\App\CaravelAdmin\Resources\TaxAdvisor\TaxAdvisorResource::routes();
\App\CaravelAdmin\Resources\AffiliateUser\AffiliateUserResource::routes();
\App\CaravelAdmin\Resources\BackendUser\BackendUserResource::routes();

// Other resources
\App\CaravelAdmin\Resources\CryptoSource\CryptoSourceResource::routes();
\App\CaravelAdmin\Resources\CryptoAccount\CryptoAccountResource::routes();
\App\CaravelAdmin\Resources\UserAccountType\UserAccountTypeResource::routes();
\App\CaravelAdmin\Resources\UserCreditAction\UserCreditActionResource::routes();
\App\CaravelAdmin\Resources\UserCreditLog\UserCreditLogResource::routes();

// Settings
Route::get("settings/affiliate", \App\CaravelAdmin\Settings\AffiliateSettingForm::class)->name("settings.affiliate");

// Specials
Route::view('/todo', 'errors.todo')->name('todo');

// Cryptos
Route::prefix("crypto")->name("crypto.")->group(function(){
    Route::get("currency-stats", [Controllers\CryptoController::class, "currency_stats"])->name("currency-stats");
});

// Just for testing/dev
Route::prefix("dev")->name("dev.")->group(function(){
    Route::get("index", [Controllers\Admin\DevController::class, "index"])->name("index");
    Route::get("icons", [Controllers\Admin\DevController::class, "icons"])->name("icons");
    Route::get("test", function(){
       //dd(DateTimeZone::listIdentifiers(DateTimeZone::ALL));
    });

    Route::get("coin-stats", [Controllers\TestController::class, "coinStats"]);
});
