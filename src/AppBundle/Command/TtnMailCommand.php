<?php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use AppBundle\Entity\Ttn;

class TtnMailCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('ttn:mail');

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        
        $em = $this->getContainer()->get('doctrine')
                ->getEntityManager();
        
        $res = $em->getRepository(Ttn::class)->getTtnUsers();
        
        $to = '';
        
        $data_sender = [];
        
        foreach ($res as  $key => $val)
        {
            $em->getRepository(Ttn::class)->upDateTtn($val['id']);
            
            if(isset($val['email']) && !empty($val['email']))
            {

                if($to && $to == $val['email']){
                   $data_sender[] = $val;
                } 

                if(!$to){
                    $to = $val['email'];
                    $data_sender[] = $val;
                }

                if(!isset($res[$key+1]) || $to && $to != $res[$key+1]['email'])
                {
                    $subject = "Отчет о статусе новой почты";

                    $message = $this->getContainer()->get('templating')
                        ->render('Mail/mailform.html.twig',['data_ttn' => $data_sender]);

                    $headers= "MIME-Version: 1.0\r\n";
                    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
                    mail($to, $subject, $message, $headers);
                    $data_sender = [];
                } 
            }
        
        }
        $em->flush();
        $output->writeln('mail sender success');
    }
}