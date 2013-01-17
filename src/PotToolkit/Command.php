<?php

namespace PotToolkit;

use PotToolkit\PotInput;

/**
 * Description of Command
 *
 * @author Manuele Menozzi <mmenozzi@webgriffe.com>
 */
class Command
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