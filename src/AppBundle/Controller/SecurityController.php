<?php

// src/AppBundle/Controller/SecurityController.php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use AppBundle\Entity\Ttn;


class SecurityController extends Controller
{
    /**
    * @Route("/login", name="login")
    */
    public function loginAction(SessionInterface $session)
    {
        $authenticationUtils = $this->get('security.authentication_utils');
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();
        
        if($this->getUser() && !$session->get('ttn')){
            $em =$this->getDoctrine()->getEntityManager();
            $Repository = $em->getRepository(Ttn::class);
            $Ttn = $Repository->findTtnAll($this->getUser());          
            $session->set('ttn', $Ttn);
        }
        
        if($this->getUser()){
            return $this->redirect('personal');
        }
        
        return $this->render(
            'Login/login.html.twig',
            array(
                // last username entered by the user
                'last_username' => $lastUsername,
                'error'         => $error,
            )
        );
    }

    /**
     * @Route("/logout")
     */
    public function logoutAction()
    {
        //throw new \RuntimeException('This shoud newer be called directly');
        return $this->redirectToRoute('login');
    }
    
}