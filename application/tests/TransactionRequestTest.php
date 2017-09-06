<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client as HttpClient;

class TransactionRequestTest extends TestCase
{
    protected $client;
    
    protected function setUp()
    {
        $this->client = new HttpClient([
            'base_uri' => 'http://localhost'
        ]);
    }
    
    /*
     * Send transactions which are newer than 60 seconds
     */
    public function testRecentTransactions()
    {
        $response = $this->client->post('/transactions', [
            'form_params' => [
                'amount' => 9.99,
                'timestamp' => (time() - 30)
            ]
        ]);
        $this->assertEquals(201, $response->getStatusCode());
        
        $response = $this->client->post('/transactions', [
            'form_params' => [
                'amount' => 4.99,
                'timestamp' => (time() - 55)
            ]
        ]);
        $this->assertEquals(201, $response->getStatusCode());
        
        $response = $this->client->post('/transactions', [
            'form_params' => [
                'amount' => 1.99,
                'timestamp' => (time() - 15)
            ]
        ]);
        $this->assertEquals(201, $response->getStatusCode());
    }
    
    /*
     * Send transactions which are older than 60 seconds
     */
    public function testOutdatedTransactions()
    {
        $response = $this->client->post('/transactions', [
            'form_params' => [
                'amount' => '5.99',
                'timestamp' => (time() - 120)
            ]
        ]);
        $this->assertEquals(204, $response->getStatusCode());
        
        $response = $this->client->post('/transactions', [
            'form_params' => [
                'amount' => '12.99',
                'timestamp' => (time() - 75)
            ]
        ]);
        $this->assertEquals(204, $response->getStatusCode());
        
        $response = $this->client->post('/transactions', [
            'form_params' => [
                'amount' => '7.99',
                'timestamp' => (time() - 150)
            ]
        ]);
        $this->assertEquals(204, $response->getStatusCode());
    }
    
    /*
     * Access the API with unsupported method
     */
    public function testUnsupportedMethodTransactions()
    {
        $response = $this->client->get('/transactions', [
            'http_errors' => false
        ]);
        $this->assertEquals(405, $response->getStatusCode());
        $data = json_decode($response->getBody(), true);
        $this->assertEquals('Method not allowed', $data['message']);
    }
}