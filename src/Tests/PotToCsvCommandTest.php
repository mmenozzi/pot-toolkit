<?php

namespace PotToolkit\Tests;

use PotToolkit\Command\PotToCsvCommand;
use Mockery as m;

/**
 * Description of PotToCsvCommandTest
 *
 * @author Manuele Menozzi <mmenozzi@webgriffe.com>
 */
class PotToCsvCommandTest extends \PHPUnit_Framework_TestCase
{

    public function testExecute()
    {

        $potInput = m::mock('PotToolkit\Input\PotInput');
        $potInput->shouldReceive('load')->with('/path/to/file.pot');

        $command = new PotToCsvCommand($potInput);

        $arguments = array('csv', '/path/to/file.pot');
        $command->execute($arguments);
    }

}

?>
