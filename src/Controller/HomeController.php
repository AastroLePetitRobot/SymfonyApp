<?php

namespace App\Controller;

use App\Entity\Materiel;
use App\Form\MaterielType;
use App\Repository\MaterielRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{
    public function __construct(MaterielRepository $repository, EntityManagerInterface $em)
    {
        $this->repositery = $repository;
        $this->em = $em;
    }

    public function index(Request $request): Response
    {
        $materiels = new Materiel();
        $form = $this->createForm(MaterielType::class, $materiels);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->persist($materiels);
            $this->em->flush();
            $this->addFlash('sucess', 'Votre matériel à bien été ajouté');
        }

        return $this->render('pages/home.html.twig',
            [
                'materiel' => $materiels,
                'form' => $form->createView(),
            ]);
    }
}
