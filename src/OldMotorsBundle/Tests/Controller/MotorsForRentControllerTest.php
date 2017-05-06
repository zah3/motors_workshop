<?php

namespace OldMotorsBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MotorsForRentControllerTest extends WebTestCase
{
    public function testAll()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/motorsForRent');
    }

    public function testSinglemotorforrent()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/motorForRent/{id}');
    }

}
