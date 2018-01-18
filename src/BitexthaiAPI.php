<?php

namespace adman9000\binance;

use GuzzleHttp\Client;

class BitexthaiAPI
{
    protected $key;     // API key
    protected $secret;  // API secret
    protected $url;     // API base URL
    protected $pairs;     // API pairs

    function __construct()
    {
        $this->key = config('bitexthai.auth.key');
        $this->secret = config('bitexthai.auth.secret');
        $this->url = config('bitexthai.urls.api');
        $this->pairs = config('bitexthai.urls.pairs');
    }

    function setAPI($key, $secret)
    {
        $this->key = $key;
        $this->secret = $secret;
    }

    /**
     * Returns a list of all currency pairings
     *
     * @return null|string
     */
    public function getTicker()
    {
        $client = new Client();
        try {
            $request = $client->request('GET', $this->url . '/', [
                'http_errors' => false,
                'timeout' => 6,
            ]);
        } catch (\GuzzleHttp\Exception\ConnectException $e) {
            return null;
        }
        $response = $request->getBody()->getContents();
        return $response;
    }

    /**
     * Returns a list of all available currency pairings, including their "pairing_id" which is required
     * for some API calls. Will also include the minimum order amount for primary and secondary currency
     * in each pairing market.
     *
     * @return null|string
     */
    public function getCurrencyPairings()
    {
        $client = new Client();
        try {
            $request = $client->request('GET', $this->url . '/pairing/', [
                'http_errors' => false,
                'timeout' => 6,
            ]);
        } catch (\GuzzleHttp\Exception\ConnectException $e) {
            return null;
        }
        $response = $request->getBody()->getContents();
        return $response;
    }

    /**
     * Returns a list of all buy and sell orders in the order book for the selected pair
     *
     * @param string $first_currency
     * @param string $second_currency
     * @return null|array
     */
    public function getOrderBook($first_currency, $second_currency)
    {
        $pairing_id = $this->getPairingId($first_currency, $second_currency);

        if(!$pairing_id)
            return null;

        $client = new Client();
        try {
            $request = $client->request('GET', $this->url . '/orderbook/?pairing='. $pairing_id, [
                'http_errors' => false,
                'timeout' => 6,
            ]);
        } catch (\GuzzleHttp\Exception\ConnectException $e) {
            return null;
        }
        $response = $request->getBody()->getContents();
        return $response;
    }

    /**
     * Returns a list of 10 most recent trades, and top 10 asks and bids in order book for the selected pair
     *
     * @param string $first_currency
     * @param string $second_currency
     * @return null|array
     */
    public function getRecentTrades($first_currency, $second_currency)
    {
        $pairing_id = $this->getPairingId($first_currency, $second_currency);

        if (!$pairing_id)
            return null;

        $client = new Client();
        try {
            $request = $client->request('GET', $this->url . '/trade/?pairing='. $pairing_id, [
                'http_errors' => false,
                'timeout' => 6,
            ]);
        } catch (\GuzzleHttp\Exception\ConnectException $e) {
            return null;
        }
        $response = $request->getBody()->getContents();
        return $response;
    }

    /**
     * get pairing id
     *
     * @param string $first_currency
     * @param string $second_currency
     * @return int
     */
    private function getPairingId($first_currency, $second_currency)
    {
        $key = $this->getPair($first_currency, $second_currency);

        $pairing_id = $this->pairs[$key]? $this->pairs[$key] : null;

        if(!$pairing_id)
            return null;

        return $pairing_id;
    }
    /**
     * get pair
     *
     * @param string $first_currency
     * @param string $second_currency
     * @return string
     */
    private function getPair($first_currency, $second_currency)
    {
        return $first_currency . '/' . $second_currency;
    }
}