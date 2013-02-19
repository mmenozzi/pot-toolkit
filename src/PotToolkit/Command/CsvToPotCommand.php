<?php

namespace PotToolkit\Command;

use Symfony\Component\Console\Command\Command;
use Gettext\Translation;
use Gettext\Entries;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Keboola\Csv\CsvFile;
use Gettext\Generators\Po;

/**
 * @author Manuele Menozzi <mmenozzi@webgriffe.com>
 */
class CsvToPotCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('csv2pot')
            ->setDescription('Converts translations from CSV format to Portable Text format.')
                ->addArgument(
                'input',
                InputArgument::REQUIRED,
                'The input file in CSV format.'
            )
            ->addArgument(
                'output',
                InputArgument::OPTIONAL,
                'The Portable Text output file path. If not specified output file will be stored in the same ' .
                'directory of the input file.'
            );
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $csvFilePath = $input->getArgument('input');
        $csvFile = new CsvFile($csvFilePath);

        $translations = new Entries();
        foreach ($csvFile as $csvRow) {
           $translation = new Translation(null, $csvRow[0]);
           $translation->setTranslation($csvRow[1]);
           $translations->append($translation);
        }

        $potFilePath = $this->computeOutputFilePath($csvFilePath);
        Po::generateFile($translations, $potFilePath);

        $output->writeln(
            sprintf(
                "Done! %s translations exported to %s.",
                count($translations),
                $potFilePath
            )
        );
    }

    private function computeOutputFilePath($csvFilePath)
    {
        $parts = pathinfo($csvFilePath);
        return $parts['dirname'] . DIRECTORY_SEPARATOR . $parts['filename'] . '.pot';
    }
}
