<?php

namespace App\Controller;

use App\Entity\Utilisateurs;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Vehicule;
use App\Form\VehiculeFormType;
use Symfony\Component\HttpFoundation\Request;

/**
  *@Route("/connect", name="connect_")
**/
class ConnectController extends AbstractController
{
    /**
     *@Route("/voir", name="voir")
    **/
    public function voir()
    {
         // Méthode findBy qui permet de récupérer les données avec des critères de filtre et de tri
         $vehicule = $this->getDoctrine()->getRepository(Vehicule::class)->findAll();
         
         return $this->render('connect/index.html.twig', [
             'vehicules' => $vehicule,
         ]);

    }

        
    /**
     * @Route("/connect", name="app_connect")
     */
    public function index(): Response
    {
        return $this->render('connect/index.html.twig', [
            'controller_name' => 'ConnectController',
        ]);
    }


}
