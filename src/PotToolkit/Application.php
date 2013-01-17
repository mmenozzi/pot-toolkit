<?php

namespace PotToolkit;

use Symfony\Component\Console\Application as SymfonyApplication;

/**
 * @author Manuele Menozzi <mmenozzi@webgriffe.com>
 */
class Application extends SymfonyApplication
{
    public function __construct()
    {
        $name = 'POT Toolkit';
        $version = '1.0';

        parent::__construct($name, $version);
    }

}
