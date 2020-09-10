<?php
namespace App\Controller;


use App\Entity\Materiel;
use App\Form\MaterielType;
use App\Repository\MaterielRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class HomeController extends AbstractController
{
    public function index():Response
    {
       $form = $this->createForm(MaterielType::class);
        return $this->render('pages/home.html.twig',
            [
                'form' => $form->createView()
            ]);
    }
}