<?php

class GameByIdTest extends ApiTestBase
{
    public function testSingleGet()
    {
        $response = $this->http->request('GET', 'v1/Games/ByGameID?apikey=5dbf1f77215bb51f68976ff2b9ae2240232c39ca41f608ef22a833ade09c0609&id=1');
        $json = json_decode($response->getBody()->getContents(), true);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(1, $json['data']['count']);
    }

    public function testMultipleGet()
    {
        $response = $this->http->request('GET', 'v1/Games/ByGameID?apikey=5dbf1f77215bb51f68976ff2b9ae2240232c39ca41f608ef22a833ade09c0609&id=1,2');
        $json = json_decode($response->getBody()->getContents(), true);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(2, $json['data']['count']);
    }

    public function testNotFound()
    {
        $response = $this->http->request('GET', 'v1/Games/ByGameID?apikey=5dbf1f77215bb51f68976ff2b9ae2240232c39ca41f608ef22a833ade09c0609&id=9999999999999999999999999999999');
        $json = json_decode($response->getBody()->getContents(), true);

        // Game not found and still status code 200?
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(0, $json['data']['count']);
    }

}