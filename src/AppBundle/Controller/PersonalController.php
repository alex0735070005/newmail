<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Form\ChangePasswordType;
use AppBundle\Form\Model\ChangePasswordModel;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Ttn;

class PersonalController extends Controller
{
    private $PForm;

    /**
     * @Route("/personal", name="personal")
     */
    public function indexAction(SessionInterface $session)
    {        
        if(!$this->getUser()){
            return $this->redirectToRoute('login');
        }
        
        $data_ttn = $session->get('ttn');
        
        $this->setFormPass();
        
        return $this->render(
            'Personal/index.html.twig',
            array('PForm' => $this->PForm->createView(), 'data_ttn' => $data_ttn)
        );
    }
    
    public function changePasswdAction(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $this->setFormPass();
        
        $this->PForm->handleRequest($request);
        
        $changed = false;
        if($this->PForm->isSubmitted() && $this->PForm->isValid()) 
        {
            $params = $request->request->all();   
            
            $User = $this->getUser();
            
            $encoded = $encoder->encodePassword($User, $params['change_password']['newPassword']['first']);
            
            $User->setPassword($encoded);
            
            $em = $this->getDoctrine()->getManager();
            
            $em->persist($User);
            $em->flush();
            $changed = true;
        }        
        
        return $this->render(
            'Personal/formpass.html.twig',
            array('PForm' => $this->PForm->createView(), 'changed' => $changed)
        );
    }
    
    public function changeEmailAction()
    {
        $params = (array)json_decode(file_get_contents('php://input'));
        
        
        if($this->validEmail($params['email'])) 
        {   
            $User = $this->getUser();
            
            $User->setEmail($params['email']);
            
            $em = $this->getDoctrine()->getManager();
            
            $em->persist($User);
            $em->flush();
            
            $response = new Response(json_encode(['answer' => true]));
            $response->headers->set('Content-Type', 'application/json');
            return $response;
        }        
        
        $response = new Response(json_encode(['answer' => false]));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
    
    private function setFormPass() 
    {
        $changePasswordModel = new ChangePasswordModel();                
        $this->PForm = $this->createForm(ChangePasswordType::class, $changePasswordModel, [ 'action' => $this->generateUrl('passchange')]);
    }
    
    private function validEmail($email){
        return preg_match('/^[a-zA-Z0-9_\-\.]{2,}@[a-zA-Z0-9_\-\.]{1,}\.[a-zA-Z]{2,6}$/', $email);
    }
       
}
