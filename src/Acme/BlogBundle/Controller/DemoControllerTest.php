<?php

namespace Acme\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class DemoControllerTest extends WebTestCase
{
    public  function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/car/new');

        $this->assertGreaterThan(
            -2,
            $crawler->filter('html:contains("number")')->count());
        $this->assertEquals(
            Response::HTTP_OK,
            $client->getResponse()->getStatusCode()
        );
    }
}