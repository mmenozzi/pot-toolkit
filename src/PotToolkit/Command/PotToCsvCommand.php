<?php

namespace PotToolkit\Command;

use PotToolkit\Input\PotInput;
use PotToolkit\Output\CsvOutput;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Description of PotToCsvCommand
 *
 * @author Manuele Menozzi <mmenozzi@webgriffe.com>
 */
class PotToCsvCommand extends Command
{
    /**
     * @var \PotToolkit\Input\PotInput
     */
    protected $potInput;

    /**
     * @var \PotToolkit\Output\CsvOutput
     */
    protected $csvOutput;

    public function __construct($name = null, PotInput $potInput, CsvOutput $csvOutput)
    {
        $this->potInput = $potInput;
        $this->csvOutput = $csvOutput;
        parent::__construct($name);
    }


    protected function configure()
    {
        $this
            ->setName('pot2csv')
            ->setDescription('Converts translations from Portable Text format to CSV format.')
            ->addArgument(
                'input',
                InputArgument::REQUIRED,
                'The input file in Portable Text format.'
            )
            ->addArgument(
                'output',
                InputArgument::OPTIONAL,
                'The CSV output file path. If not specified output file will be stored in the same directory of the ' .
                'input file.'
            );
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $potFilePath = $input->getArgument('input');

        $this->potInput->load($potFilePath);
        $translationSet = $this->potInput->getTranslationSet();

        $this->csvOutput->setTranslationSet($translationSet);

        $outputFilePath = $this->computeOutputFilePath($potFilePath);

        $this->csvOutput->write($outputFilePath);

//        $pot_h = @fopen($pot_file, "r");
//
//        $csv_file = $pot_file . '.csv';
//        $csv_h = @fopen($csv_file, "w");
//
//        $csv_line = array();
//        while (($line = fgets($pot_h)) !== false) {
//            $matches = array();
//            if (preg_match('/^msgid "(.*)"/', $line, $matches)) {
//                $csv_line[0] = $matches[1];
//            }
//
//            if (preg_match('/^msgstr "(.*)"/', $line, $matches)) {
//                $csv_line[1] = $matches[1];
//                if (empty($csv_line[1])) {
//                    $csv_line[1] = $csv_line[0];
//                }
//                $output->writeln($csv_line[0] . ' -> ' . $csv_line[1]);
//                fputcsv($csv_h, $csv_line);
//                $csv_line = array();
//            }
//        }
//        $output->writeln("Done!");
    }

    private function computeOutputFilePath($potFilePath)
    {
        $parts = pathinfo($potFilePath);
        return $parts['dirname'] . DIRECTORY_SEPARATOR . $parts['filename'] . '.csv';
    }

}

?>