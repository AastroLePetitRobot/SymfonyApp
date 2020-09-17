<?php

namespace App\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class HomeControllerTest extends WebTestCase
{

    public function testHomeController()
    {
        $client = static::CreateClient();
        $client->request('GET','/');
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $this->assertSelectorTextContains('h1','Gestion matériel');
    }
    public function testHomeMaterielsController()
    {
        $client = static::CreateClient();
        $client->request('GET','/materiels');
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
    }

}
