<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main")
     */
    public function index(): Response
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }


    /**
     * @Route("register", name="register")
     */
    public function register(): Response
    {
        return $this->render('main/register.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    /**
     * @Route("login", name="login")
     */
    public function login(): Response
    {
        return $this->render('main/login.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    /**
     * @Route("profil", name="profil")
     */
    public function profil(): Response
    {
        return $this->render('main/profil.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
    /**
     * @Route("candidatures", name="candidatures")
     */
    public function candidatures(): Response
    {
        return $this->render('main/candidatures.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }



       /**
     * @Route("Liste candidatures", name="Liste candidatures")
     */
    public function Listecandidatures(): Response
    {
        return $this->render('main/Liste candidatures.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }









    
    



    
}
