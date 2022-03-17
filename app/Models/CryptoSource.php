<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CryptoSource extends Model
{
    // Source types
    const SOURCE_TYPE_EXCHANGE = "E";
    const SOURCE_TYPE_BLOCKCHAIN = "B";
    const SOURCE_TYPE_WALLET = "W";
    // Sources
    const SOURCE_EXCHANGE_KUCOIN = 1;
    const SOURCE_EXCHANGE_HITBTC = 2;
    const SOURCE_EXCHANGE_BINANCE = 3;
    const SOURCE_BLOCKCHAIN_ETHEREUM = 4;
    const SOURCE_BLOCKCHAIN_LITECOIN = 5;


    public function getName(): string
    {
        return $this->name;
    }


    public function scopeActiveExchanges($query)
    {
        return $query
            ->where("active", true)
            ->where("type", static::SOURCE_TYPE_EXCHANGE);
    }


    public function scopeActiveBlockchains($query)
    {
        return $query
            ->where("active", true)
            ->where("type", static::SOURCE_TYPE_BLOCKCHAIN);
    }


    public function isExchangeType(): bool
    {
        return  $this->type == static::SOURCE_TYPE_EXCHANGE;
    }


    public function isWalledType(): bool
    {
        return  $this->type == static::SOURCE_TYPE_WALLET;
    }


    public function isBlockchainType(): bool
    {
        return  $this->type == static::SOURCE_TYPE_BLOCKCHAIN;
    }
}
