<?php

namespace App\Controller;

use App\Form\CandidaturesType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Candidatures;
use App\Entity\Users;
use App\Repository\CandidaturesRepository;


class CandidaturesController extends AbstractController
{
    /**
     * @Route("/candidatures", name="candidatures")
     */
    public function index(): Response
    {
        return $this->render('candidatures/index.html.twig', [
            'controller_name' => 'CandidaturesController',
        ]);
    }


     /**
     * @Route("/candidatures/ajout", name="candidatures_ajout")
     */
    public function ajoutCandidature(Request $request)
    {
        //  fonction qui permet l'ajout du candidature sur le site


        $candidatures = new Candidatures; // déclaration d'un nouvelle candidature

        $form = $this->createForm(CandidaturesType::class, $candidatures); // création du formulaire qui demandera les information présent dans l'entity candidature

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            // si formulaire validé et conforme

            $userConnected = $this->getUser(); // on récup l'id de l'user

            $candidatures->setUser($userConnected); // et on set la relation entre les table avec l'id de l'user

            $em = $this->getDoctrine()->getManager();
            $em->persist($candidatures);
            $em->flush();// sauvegarde dans la bdd
        }
        return $this->render('candidatures/ajoutcandidatures/ajout.html.twig',[
            'candidaturesForm' => $form->createView()
        ]);
    }


    /**
     * @Route("/candidatures/modifier/{id}", name="app_modifer_candidature")
     */
    public function modifierCandidature(Candidatures $candidatures, Request $request)
    {

        //todoo

        $form = $this->createForm(CandidaturesType::class, $candidatures);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $userConnected = $this->getUser();
            $candidatures->setUser($userConnected);
            $em = $this->getDoctrine()->getManager();
            $em->persist($candidatures);
            $em->flush();
            return $this->redirectToRoute('app_home');
        }
        return $this->render('candidatures/modifcandidatures/modif.html.twig',[
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/mes-candidatures", name="app_mes_candidature")
     */
    public function mescandidature(CandidaturesRepository $candidatures, Request $request)
    {
        return $this->render('candidatures/mescanditature/mescandidature.html.twig');
    }


}
