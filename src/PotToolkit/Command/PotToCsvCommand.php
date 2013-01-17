<?php

namespace PotToolkit\Command;

use PotToolkit\Input\PotInput;

/**
 * Description of PotToCsvCommand
 *
 * @author Manuele Menozzi <mmenozzi@webgriffe.com>
 */
class PotToCsvCommand
{

    /**
     * @var PotInput
     */
    protected $potInput;

    public function __construct(PotInput $potInput)
    {
        $this->potInput = $potInput;
    }

    public function execute(array $args)
    {
        $this->potInput->load('/path/to/file.pot');
    }

}

?>