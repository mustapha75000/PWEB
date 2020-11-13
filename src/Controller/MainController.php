<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Vehicule;
use App\Form\VehiculeFormType;
use Symfony\Component\HttpFoundation\Request;


class MainController extends AbstractController
{

    /**
     * @Route("/", name="voir")
     */
    public function voir()
    {
         // Méthode findBy qui permet de récupérer les données avec des critères de filtre et de tri
         $vehicule = $this->getDoctrine()->getRepository(Vehicule::class)->findAll();

         return $this->render('main/index.html.twig', [
             'vehicules' => $vehicule,
         ]);

    }


    /**
     * @Route("/", name="app_home")
     */
    public function index(): Response
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);

    }



}
