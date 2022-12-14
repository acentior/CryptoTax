<?php

namespace App\Cryptos\Coingecko;

use Codenixsv\CoinGeckoApi\CoinGeckoClient;
use GuzzleHttp\Client;

class CoingeckoAPI
{
    public CoinGeckoClient $client;


    /**
     * Get the api interface
     *
     * @return static $obj
     */
    public static function make(): static
    {
        // Free or premium:
        if($apiKey = config("app.cryptos.coingecko.api_key")) { // Premium
            $client = new CoinGeckoClient(
                new Client([
                    'base_uri' => 'https://pro-api.coingecko.com',
                    'query' => [
                        'x_cg_pro_api_key' => $apiKey
                    ]
                ])
            );
        }
        else { // Free API
            $client = new CoinGeckoClient();
        }

        // New object
        $obj = new static();
        $obj->client = $client;

        return $obj;
    }


    /**
     * Check if the api server is available
     *
     * @return array
     * @throws \Exception
     */
    public function ping(): array
    {
        return $this->client->ping() ?: [];
    }


    /**
     * Get historical data in the specific time and currency with fiat
     *
     * @return array
     * @throws \Exception
     */
    public function coinHistory(string $coingeckoCoinId, string $date)
    {
        // Fix weird date format: dd-mm-yyyy eg. 30-12-2017, so that we can use standard one (Y-m-d)
        $tmp = explode("-", $date);
        $date = $tmp[2] . "-" . $tmp[1] . "-" . $tmp[0];

        return $this->client->coins()->getHistory($coingeckoCoinId, $date);
    }
}
