<?php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use AppBundle\Entity\Ttn;

class TtnClearCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('ttn:clear');

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getContainer()->get('doctrine')
                ->getEntityManager();
        
        $res = $em->getRepository(Ttn::class)->ttnClear();
        
        $output->writeln($res);
    }
}