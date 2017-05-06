<?php

namespace OldMotorsBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RenovatedMotorsControllerTest extends WebTestCase
{
    public function testAll()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/renovatedMotors');
    }

    public function testSinglerenovatedmotor()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/renovatedMotor/{id}');
    }

}
