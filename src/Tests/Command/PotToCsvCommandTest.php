<?php

namespace PotToolkit\Tests\Command;

use PotToolkit\Command\PotToCsvCommand;
use Gettext\Entries;
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
        $translationSet = $this->getTranslationSet();

        $potInput = m::mock('PotToolkit\Input\PotInput');
        $potInput->shouldReceive('load')->atLeast()->times(1)->with($inputFilePath);
        $potInput->shouldReceive('getTranslationSet')->atLeast()->times(1)->andReturn($translationSet);

        $csvOutput = m::mock('PotToolkit\Output\CsvOutput');
        $csvOutput->shouldReceive('setTranslationSet')->atLeast()->times(1)->with($translationSet);
        $csvOutput->shouldReceive('write')->atLeast()->times(1)->with($outputFilePath);

        $input = m::mock('Symfony\Component\Console\Input\InputInterface');
        $input->shouldReceive('getArgument')->atLeast()->times(1)->with('input')->andReturn($inputFilePath);

        $output = m::mock('Symfony\Component\Console\Output\OutputInterface');
        $output->shouldReceive('writeln')->once()->with(
            "<fg=white;options=bold>10</fg=white;options=bold> translations from <fg=white;options=bold>$inputFilePath</fg=white;options=bold> converted in CSV to <fg=white;options=bold>$outputFilePath</fg=white;options=bold>!"
        );

        $command = new PotToCsvCommand(null, $potInput, $csvOutput);
        $command->execute($input, $output);
    }

    private function getTranslationSet()
    {
        $translationSet = new Entries();
        for ($i = 0; $i < 10; $i++) {
            $translationSet->insert(null, "Source $i")->setTranslation("Translation $i");
        }

        return $translationSet;
    }

}

?>
