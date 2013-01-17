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
        $input = m::mock('Symfony\Component\Console\Input\InputInterface');
        $output = m::mock('Symfony\Component\Console\Output\OutputInterface');

        $potInput = m::mock('PotToolkit\Input\PotInput');
        //$potInput->shouldReceive('load')->atLeast()->times(1)->with('/path/to/file.pot');

        $command = new PotToCsvCommand();
        $command->execute($input, $output);
    }

}

?>
