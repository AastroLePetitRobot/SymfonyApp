<?php
namespace App\Controller;

use App\Entity\Materiel;
use App\Repository\MaterielRepository;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class MaterielsController extends AbstractController
{
    public function __construct(MaterielRepository $repository)
    {
        $this->repositery = $repository;
    }
    public function index() : Response
    {
        $materiel = $this->repositery->findAll();
        return $this->render('pages/materiels.html.twig', [
            'current_menu' => 'materiels',
            'materiel' => $materiel
        ]);
    }
}