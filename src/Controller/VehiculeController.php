<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Vehicule;
use App\Form\VehiculeFormType;
use Symfony\Component\HttpFoundation\Request;




/**
 * Class VehiculeController
 * @package App\Controller
 * @Route("/vehicule", name="vehicule")
 */
class VehiculeController extends AbstractController
{
    /**
     * @Route("/", name="vehicules")
     */
    public function index()
    {
        // Méthode findBy qui permet de récupérer les données avec des critères de filtre et de tri
        $vehicule = $this->getDoctrine()->getRepository(Vehicule::class)->findAll();

        return $this->render('vehicule/index.html.twig', [
            'vehicules' => $vehicule,
        ]);
    }

    /**
     * @Route("/nouveau", name="ajout_vehicule")
     */
    public function add(Request $request)
    {
        $vehicule = new Vehicule();
        $form = $this->createForm(VehiculeFormType::class, $vehicule);
        $form->handleRequest($request);
        if($form->IsSubmitted() && $form->isValid()){
            $doctrine = $this->getDoctrine()->getManager();
            $doctrine->persist($vehicule);
            $doctrine->flush();
        }
        return $this->render('vehicule/ajout.html.twig', [
            'vehiculeForm' => $form->createView()
        ]);
    }
}
