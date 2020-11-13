<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Facturation;
use App\Form\FacturationFormType;
use App\Entity\Vehicule;




/**
 * Class FacturationController
 * @package App\Controller
 * @Route("/facturation", name="facturation")
 */
class FacturationController extends AbstractController
{
    /**
     * @Route("/", name="facturation")
     */
    public function index(): Response
    {
        return $this->render('facturation/index.html.twig', [
            'controller_name' => 'FacturationController',
        ]);
    }

    /**
     * @Route("/louer-{id}", name="louer")
     */
    public function louer(Request $request, Vehicule $voiture)
    {
        $Facturation = new Facturation();
        $form = $this->createForm(FacturationFormType::class, $Facturation);
        $form->handleRequest($request);
        $PrixLocation = $voiture->getPrixVehicule();
        if($form->IsSubmitted() && $form->isValid()){
            $Facturation->setEtatReglement(false);
            $dateDebut = $Facturation->getDateDebut();
            $dateFin = $Facturation->getDateFin();
            $nbJour = $dateDebut->diff($dateFin)->days;
            $Facturation->setValeurReglement($PrixLocation*$nbJour); 
            $Facturation->setVehicule($voiture);
            $Facturation->setUtilisateurs($this->getUser());
            $doctrine = $this->getDoctrine()->getManager();
            $doctrine->persist($Facturation);
            $doctrine->flush();
            $this->redirectToRoute('connect_voir');
        }
        return $this->render('facturation/louer.html.twig', [
            'facturationForm' => $form->createView(),
            'voiture' => $voiture
            
        ]);
    }
}
