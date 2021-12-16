<?php

namespace App\Controller;

use App\Form\EditProfileType;
use ContainerRVrnr86\getEditProfileTypeService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserController extends AbstractController
{
    /**
     * @Route("/profil", name="user_home")
     */
    public function index(): Response
    {
        return $this->render('user/index.html.twig',);
    }

    /**
     * @Route("/profil/modification", name="user_edit")
     */
    public function editprofil(Request $request): Response
    {
        // fonction pour permetre a l'user de modifier certaine info

        $user = $this->getUser(); // on recul l'user

        $form = $this->createForm(EditProfileType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('user_home');
        }

        return $this->render('user/editprofil.html.twig',[
            'profilform' => $form->createView(),
        ]);
    }

    /**
     * @Route("/profil/pass/modification", name="user_edit_pass")
     */
    public function editpass(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        // fonction pour permetre a l'user de modifier son mdp en étant connecter
        if($request->isMethod('POST')){
            // si le form et bien en méthode post, on appel la doctine pour la demande bdd
            $em =$this->getDoctrine()->getManager();

            $user = $this->getUser();

            if($request->request>get('pass') == $request->request->get('pass2')){
                $user->setPassword($passwordEncoder->encodePassword($user,$request->request->get('pass')));
                $em->flush();
                    // vérif que les 2 mdp son identique et conforme si ok on enregistre le new mdp
                return $this->redirectToRoute('user_home');
            }
        }


        return $this->render('user/editpassword.html.twig');
    }
}
