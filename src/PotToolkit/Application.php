<?php

namespace PotToolkit;

use Symfony\Component\Console\Application as SymfonyApplication;
use PotToolkit\Output\CsvOutput;
use PotToolkit\Input\PotInput;
use PotToolkit\Command\CsvToPotCommand;
use PotToolkit\Command\PotToCsvCommand;

/**
 * @author Manuele Menozzi <mmenozzi@webgriffe.com>
 */
class Application extends SymfonyApplication
{
    public function __construct()
    {
        $name = 'Portable Text Toolkit';
        $version = '1.0';

        parent::__construct($name, $version);

        $this->add(new PotToCsvCommand(null, new PotInput(), new CsvOutput()));
        $this->add(new CsvToPotCommand());
    }

}
