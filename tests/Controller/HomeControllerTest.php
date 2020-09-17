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
    public function testValidFormPost()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $buttonCrawlerNode = $crawler->selectButton('Ajouter');

        $form = $buttonCrawlerNode->form();

        $form = $buttonCrawlerNode->form([
            'materiel[type]' => 'pc',
            'materiel[number]' => '667',
            'materiel[description]' => 'Ekip',
        ]);
        $form = $buttonCrawlerNode->form([], 'DELETE');
        $client->submit($form);
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);

    }

}
