<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class MaterielsController extends AbstractController
{
    public function index() : Response
    {
        return $this->render('pages/materiels.html.twig', [
            'current_menu' => 'materiels'
        ]);
    }
}