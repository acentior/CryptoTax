<?php

namespace App\Http\Livewire\Blockchain;

use App\Http\Livewire\Traits\DemoUserTrait;
use App\Jobs\CryptoAccountFetchJob;
use App\Models\CryptoAccount;
use Livewire\Component;
use WireUi\Traits\Actions;

class BlockchainForm extends Component
{
    use Actions, DemoUserTrait;

    public ?CryptoAccount $blockchainAccount = null;
    public ?string $newBlockchainAddress = null;
    public ?int $newBlockchainId= null;


    public function render()
    {
        return view('livewire.blockchain.blockchain-form', [
            "blockchainAccounts" => auth()->user()->blockchainAccounts,
            "blockchains" => Blockchain::all()
        ]);
    }


    public function delete(CryptoAccount $blockchainAccount)
    {
        if($this->preventDemoUser()) return;

        if ($this->blockchainAccount && $this->blockchainAccount->id == $blockchainAccount->id) {
            $this->blockchainAccount = null;
        }
        $blockchainAccount->delete();

        // Update table
        $this->emit("transactionTable.updateTable");

        // Notify
        $this->notification()->success(
            $title = __('Successfully deleted'),
            $description = ''
        );
    }


    public function fetch(CryptoAccount $blockchainAccount)
    {
        if($this->preventDemoUser()) return;

        try {
            $blockchainAccount->fetching_scheduled_at = now();
            $blockchainAccount->save();
            CryptoAccountFetchJob::dispatch($blockchainAccount);
            $this->notification()->info(
                __("Fetching :name is now scheduled", ["name" => $blockchainAccount->getName()]),
                "Please check blockchain transactions in a couple of minutes"
            );
        }
        catch (\Exception $e) {
            $this->notification()->error(__("An error occured"), $e->getMessage());
        }
    }


    public function add()
    {
        if($this->preventDemoUser()) return;
        $user = auth()->user();

        if (! $this->newBlockchainId) {
            $this->notification()->info(__("Please select a blockchain"));
            return;
        }
        if (! $this->newBlockchainAddress) {
            $this->notification()->info(__("Please enter a blockchain address"));

            return;
        }

        // Check
        $exists = $user
            ->blockchainAccounts()
            ->where("blockchain_id", $this->newBlockchainId)
            ->where("address", $this->newBlockchainAddress)
            ->first();

        // Create it
        if (!$exists) {
            $blockchainAccount = new BlockchainAccount([
                "user_id" => $user->id,
                "blockchain_id" => $this->newBlockchainId,
                "address" => $this->newBlockchainAddress
            ]);
            $blockchainAccount->save();
            $this->fetch($blockchainAccount);
            $this->newBlockchainAddress = null;
            $this->newBlockchainId = null;
        }
        else {
            $this->notification()->info(__("Blockchain address already exists in your account"));
            return;
        }
    }
}
