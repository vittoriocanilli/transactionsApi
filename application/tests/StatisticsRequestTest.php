<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client as HttpClient;

class StatisticsRequestTest extends TestCase
{
    protected $client;
    
    protected function setUp()
    {
        $this->client = new HttpClient([
            'base_uri' => 'http://localhost'
        ]);
    }
    
    /*
     * Test statistics based on previous transactions
     */
    public function testStatistics()
    {
        $response = $this->client->get('/statistics');
        $this->assertEquals(200, $response->getStatusCode());
        $data = json_decode($response->getBody(), true);
        $this->assertTrue(is_array($data['data']));
        $this->assertEquals(5, count($data['data']));
        $this->assertEquals(16.97, $data['data']['sum']);
        $this->assertEquals(5.66, $data['data']['avg']);
        $this->assertEquals(9.99, $data['data']['max']);
        $this->assertEquals(1.99, $data['data']['min']);
        $this->assertEquals(3, $data['data']['count']);
    }
    
    /*
    * Access the API with unsupported method
    */
    public function testUnsupportedMethodTransactions()
    {
        $response = $this->client->post('/transactions', [
            'http_errors' => false
        ]);
        $this->assertEquals(405, $response->getStatusCode());
        $data = json_decode($response->getBody(), true);
        $this->assertEquals('Method not allowed', $data['message']);
    }
}