<?php

namespace PotToolkit;

use Symfony\Component\Console\Application as SymfonyApplication;
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

        $this->add(new PotToCsvCommand());
        $this->add(new CsvToPotCommand());
    }

}
