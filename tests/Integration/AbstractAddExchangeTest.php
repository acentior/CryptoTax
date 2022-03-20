<?php

namespace Tests\Integration;

use App\Models\CryptoAccount;
use App\Models\User;
use Tests\TestCase;

abstract class AbstractAddExchangeTest extends TestCase
{
    protected User $user;
    protected CryptoAccount $account;
    protected int $cryptoSourceId;
    protected array $credentials;

    protected function setUp(): void
    {
        parent::setUp();
        $this->customSetUp();
    }

    protected function customSetUp(): void
    {
        $this->user = User::factory()->create();
        $this->account = CryptoAccount::create([
            "user_id" => $this->user->id,
            "crypto_source_id" => $this->cryptoSourceId,
            "credentials" => $this->credentials,
            "fetching_scheduled_at" => now()
        ]);

        echo "tested1\n";

        // Update the account
        $this->account->getApi()->update();
        echo "tested2\n";
    }


    protected function tearDown(): void
    {
        parent::tearDown();
        $this->user->delete();
    }


    public function test_(): void
    {
        $account = $this->account;

        // Test if there are balances and transactions
        $this->assertGreaterThan(0, $account->cryptoAssets()->count(), "no assets found");
        $this->assertGreaterThan(0, $account->cryptoTransactions()->count(), "No transactions found");
    }
}
