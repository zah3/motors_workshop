<?php

namespace OldMotorsBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MotorsForSaleControllerTest extends WebTestCase
{
    public function testAll()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/motorsForSale');
    }

    public function testSinglemotorforsale()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/motorForSale/{id}');
    }

}
