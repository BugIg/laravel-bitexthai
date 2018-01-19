<?php
namespace BugIg\Bitexthai\Test;

use \BugIg\Bitexthai\BitexthaiAPI;

class BitexthaiAPITest extends TestCase
{
    /**
     * Test get list of all available currency pairings
     * @return void
     */
    public function testGetCurrencyPairings()
    {
        $bitexthaiAPI = new BitexthaiAPI;

        $ticker = $bitexthaiAPI->getCurrencyPairings();

        $this->assertEquals('1',  $ticker->{1}->pairing_id);
        $this->assertEquals('THB',  $ticker->{1}->primary_currency);
        $this->assertEquals('BTC',  $ticker->{1}->secondary_currency);
    }

    /**
     * Test get currency pairing THB/BTC
     * @return void
     */
    public function testGetCurrencyPairing()
    {
        $bitexthaiAPI = new BitexthaiAPI;

        $currencyPairing = $bitexthaiAPI->getCurrencyPairing('THB', 'BTC');


        $this->assertEquals('1',  $currencyPairing->pairing_id);
        $this->assertEquals('THB',  $currencyPairing->primary_currency);
        $this->assertEquals('BTC',  $currencyPairing->secondary_currency);
    }

    /**
     * Test get list of all buy and sell orders in the order book for the selected pairing market.
     * @return void
     */
    public function testGetOrderBook()
    {
        $bitexthaiAPI = new BitexthaiAPI;

        $orders = (array) $bitexthaiAPI->getOrderBook('THB', 'BTC');
        $this->assertArrayHasKey('bids',  $orders);
        $this->assertArrayHasKey('asks',  $orders);
    }

    /**
     * Test get list of all buy and sell orders in the order book for the selected pairing market.
     * @return void
     */
    public function testGetRecentTrades()
    {
        $bitexthaiAPI = new BitexthaiAPI;

        $trades = (array) $bitexthaiAPI->getRecentTrades('THB', 'BTC');

        $this->assertArrayHasKey('trades',  $trades);
        $this->assertArrayHasKey('lowask',  $trades);
        $this->assertArrayHasKey('highbid',  $trades);
        $this->assertArrayHasKey('user_orders',  $trades);
    }

}