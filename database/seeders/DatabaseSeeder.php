<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            // Base data
            DatacenterSeeder::class,
            TimezoneSeeder::class,
            TaxCountrySeeder::class,
            TaxCurrencySeeder::class,
            TaxCostModelSeeder::class,

            // Crypto Currency
            CryptoCurrencySeeder::class,

            // Users
            TestUserSeeder::class,
            UserCreditActionSeeder::class,
            UserAccountTypeSeeder::class,

            // Crypto tables
            CryptoSourceSeeder::class,
            CryptoAccountSeeder::class,

            // Crypapis supported tokens table
            // CryptoapisSupportedTokensSeeder::class,
        ]);
    }
}
