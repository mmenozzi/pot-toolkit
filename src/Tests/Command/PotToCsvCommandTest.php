<?php

namespace PotToolkit\Tests\Command;

use PotToolkit\Command\PotToCsvCommand;
use Mockery as m;

/**
 * Description of PotToCsvCommandTest
 *
 * @author Manuele Menozzi <mmenozzi@webgriffe.com>
 */
class PotToCsvCommandTest extends \PHPUnit_Framework_TestCase
{

    public function executeDataProvider()
    {
        return array(
            array('/path/to/file.pot', '/path/to/file.csv'),
            array('/anotherpath/to/file.pot', '/anotherpath/to/file.csv'),
        );
    }
    /**
     * @dataProvider executeDataProvider
     */
    public function testExecute($inputFilePath, $outputFilePath)
    {
        $translationSet = m::mock('Gettext\Entries');

        $potInput = m::mock('PotToolkit\Input\PotInput');
        $potInput->shouldReceive('load')->atLeast()->times(1)->with($inputFilePath);
        $potInput->shouldReceive('getTranslationSet')->atLeast()->times(1)->andReturn($translationSet);

        $csvOutput = m::mock('PotToolkit\Output\CsvOutput');
        $csvOutput->shouldReceive('setTranslationSet')->atLeast()->times(1)->with($translationSet);
        $csvOutput->shouldReceive('write')->atLeast()->times(1)->with($outputFilePath);

        $input = m::mock('Symfony\Component\Console\Input\InputInterface');
        $input->shouldReceive('getArgument')->atLeast()->times(1)->with('input')->andReturn($inputFilePath);

        $output = m::mock('Symfony\Component\Console\Output\OutputInterface');

        $command = new PotToCsvCommand(null, $potInput, $csvOutput);
        $command->execute($input, $output);
    }

}

?>
