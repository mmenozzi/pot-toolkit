<?php

namespace POTToolkit;

use POTToolkit\POTInput;

/**
 * Description of Command
 *
 * @author Manuele Menozzi <mmenozzi@webgriffe.com>
 */
class Command
{

    /**
     * @var POTInput
     */
    protected $potInput;

    public function __construct(POTInput $potInput)
    {
        $this->potInput = $potInput;
    }

    public function execute(array $args)
    {
        $this->potInput->load('/path/to/file.pot');
    }

}

?>