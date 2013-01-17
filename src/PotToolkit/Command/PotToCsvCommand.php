<?php

namespace PotToolkit\Command;

use PotToolkit\Input\PotInput;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Description of PotToCsvCommand
 *
 * @author Manuele Menozzi <mmenozzi@webgriffe.com>
 */
class PotToCsvCommand extends Command
{

    protected function configure()
    {
        $this
            ->setName('potkit:pottocsv')
            ->addArgument('input')
            ->addArgument('output', InputArgument::OPTIONAL);
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {

    }

}

?>