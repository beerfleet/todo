<?php

namespace TodoBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TodoControllerTest extends WebTestCase
{
    public function testNew()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/todo/new');
    }

    public function testShowlist()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/todo/list');
    }

}
