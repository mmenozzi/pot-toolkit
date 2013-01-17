<?php

namespace PotToolkit\Tests;

use PotToolkit\Command\PotToCsvCommand;

/**
 * Description of PotToCsvCommandTest
 *
 * @author Manuele Menozzi <mmenozzi@webgriffe.com>
 */
class PotToCsvCommandTest extends \PHPUnit_Framework_TestCase
{

    public function testExecute()
    {
        $potInput = $this->getMock('PotToolkit\Input\PotInput');
        $potInput->expects($this->once())
                ->method('load')
                ->with('/path/to/file.pot');

        $command = new PotToCsvCommand($potInput);

        $arguments = array('csv', '/path/to/file.pot');
        $command->execute($arguments);
    }

}

?>
