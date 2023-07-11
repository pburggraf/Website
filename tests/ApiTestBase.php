<?php

abstract class ApiTestBase extends PHPUnit\Framework\TestCase
{
    protected $http;

    public function setUp(): void
    {
        $this->http = new GuzzleHttp\Client(['base_uri' => 'http://tgdb_api/']);
    }

    public function tearDown(): void
    {
        $this->http = null;
    }
}