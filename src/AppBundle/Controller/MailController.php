<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use AppBundle\Entity\Ttn;

class MailController extends Controller
{
    /**
     * @Route("/getstatus", name="getstatus")
     */
    public function GetStatusAction(SessionInterface $session)
    {
        
        $params = (array)json_decode(file_get_contents('php://input'));
        $response = new Response('not_valid');
        if($this->validTtn($params['ttn'])) 
        {   
            $em = $this->getDoctrine()->getManager();
            
            $Repository = $em->getRepository(Ttn::class);
            
            $Ttn = $Repository->findTtn($params['ttn']);
            $data_ttn = $Repository->sendGetStatus([['DocumentNumber'=> $params['ttn']]]);
            
            if(!$Ttn && $data_ttn)
            {
                $ttn_all  = $Repository->addTtn($data_ttn[0], $this->getUser());
                
                $session->set('ttn', $ttn_all);
                
                return $this->render(
                    'Personal/ttnform.html.twig',
                    array('data_ttn' => $ttn_all)
                );
            }
            return $response;
        }        
        return $response;
        
    }
    
    public function UpdateTtnAction(SessionInterface $session)
    {
        $em = $this->getDoctrine()->getManager();
        $Repository = $em->getRepository(Ttn::class);
        
        $data_ttn = $Repository->isCanged($session->get('ttn'));
        
        if($data_ttn){
            
            $session->set('ttn', $data_ttn);
            
            return $this->render(
                'Personal/ttnform.html.twig',
                array('data_ttn' => $data_ttn)
            );
        }
        else {
            $response = new Response('not_date_up');
            return $response;
        }
    }

    private function validTtn($ttn){
        return preg_match('/^[0-9]{10,}$/', $ttn);
    }
    
}
