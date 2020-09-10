<?php
namespace App\Controller;


use App\Entity\Materiel;
use App\Form\MaterielType;
use App\Repository\MaterielRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class HomeController extends AbstractController
{
    public function __construct(MaterielRepository $repository,EntityManagerInterface $em)
    {
        $this->repositery = $repository;
        $this->em = $em;
    }
    public function index(Request $request):Response
    {
        $materiels = new Materiel();
        $form = $this->createForm(MaterielType::class,$materiels);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
           $this->em->persist($materiels);
            $this->em->flush();

        }
        return $this->render('pages/home.html.twig',
            [
                'materiel' => $materiels,
                'form' => $form->createView()
            ]);
    }
}