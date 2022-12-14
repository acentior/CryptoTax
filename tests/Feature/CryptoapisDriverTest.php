<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Cryptos\Drivers\CryptoapisDriver;
use App\Models\CryptoAccount;
use App\Helpers\TestHelper;


class CryptoapisDriverTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // public function test_getAccountTest() {
    //     $accounts = CryptoAccount::get();
    //     $this->assertTrue($accounts->count()>0, 'Crypto_account table is empty');
    //     $account = $accounts[0];
    //     $driver = CryptoapisDriver::make($account);
    //     $this->assertIsObject($driver, 'Failed to make CryptoapisDriver');
    //     $this->assertIsArray($driver->getRequiredCredentials(), 'Failed to get requiredCredentials for api');
    //     $this->assertIsObject($driver->getApi(), 'Failed to get api');
    //     $balances = $driver->fetchBalances();
    //     $this->assertIsArray($balances, 'Failed to get balance');
    //     $driver->saveBalances($balances);
    //     // var_dump($balances);
    //     // var_dump();
    // }

    public function test_getTransactionsTest()
    {
        $accounts = CryptoAccount::get();
        $this->assertTrue($accounts->count()>0, 'Crypto_account table is empty');
        $account = $accounts[1];
        $driver = CryptoapisDriver::make($account);
        $this->assertIsObject($driver, 'Failed to make CryptoapisDriver');
        $this->assertIsArray($driver->getRequiredCredentials(), 'Failed to get requiredCredentials for api');
        $this->assertIsObject($driver->getApi(), 'Failed to get api');
        $transactions = $driver->fetchTransactions();
        $this->assertIsArray($transactions, 'Failed to get balance');
        $driver->saveTransactions($transactions, 1);
  //      TestHelper::save2file('../litecoin_test_trades.php', $transactions);
        // var_dump($transactions);
    }

    // public function test_update() {
    //     $accounts = CryptoAccount::get();
    //     $this->assertTrue($accounts->count()>0, 'Crypto_account table is empty');
    //     $account = $accounts[5];
    //     $account->update(['fetched_at' => NULL]);
    //     // var_dump($account);
    //     $driver = CryptoapisDriver::make($account);
    //     $this->assertIsObject($driver, 'Failed to make CryptoapisDriver');
    //     $this->assertIsArray($driver->getRequiredCredentials(), 'Failed to get requiredCredentials for api');
    //     $this->assertIsObject($driver->getApi(), 'Failed to get api');
    //     $driver->update();
    // }
}
