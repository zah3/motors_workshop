<?php

namespace OldMotorsBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ContactControllerTest extends WebTestCase
{
    public function testSend()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/send');
    }

}
