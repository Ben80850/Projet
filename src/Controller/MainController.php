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





    
    



    
}
