<?php

namespace Tests\POTToolkit;

use POTToolkit\Command;

/**
 * Description of CommandTest
 *
 * @author Manuele Menozzi <mmenozzi@webgriffe.com>
 */
class CommandTest extends \PHPUnit_Framework_TestCase
{

    public function testExecute()
    {
        $potInput = $this->getMock('\POTToolkit\POTInput');
        $potInput->expects($this->once())
                ->method('load')
                ->with('/path/to/file.pot');

        $command = new Command($potInput);

        $arguments = array('csv', '/path/to/file.pot');
        $command->execute($arguments);
    }

}

?>
