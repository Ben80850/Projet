<?php

namespace App\Controller\Admin;

use App\Entity\Candidatures;
use App\Entity\Scene;
use App\Entity\Users;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {

        //page acceuil des admin
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Projet');
    }

    public function configureMenuItems(): iterable
    {
        return [

            // affichage des info et rediction voulue

            MenuItem::section(''),
            MenuItem::linkToDashboard('Acceuil administration', 'fa fa-home'),

            MenuItem::section(''),
            MenuItem::linktoRoute('Retour au site','fa fa-home','app_home'),

            MenuItem::section('Administration Générale pour les utilisateur'),
            MenuItem::linkToCrud('Utilisateurs', 'fa fa-tags', Users::class),

            MenuItem::section('Candidatures'),
            MenuItem::linkToCrud('Candidatures', 'fa fa-tags', Candidatures::class),

            MenuItem::section('Scène'),
            MenuItem::linkToCrud('Scène', 'fa fa-tags', Scene::class),
        ];
    }
}
