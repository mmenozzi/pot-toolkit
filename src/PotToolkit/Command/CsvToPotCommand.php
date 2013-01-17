<?php

namespace PotToolkit\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

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
        $csv_file = $input->getArgument('input');
        $csv_h = @fopen($csv_file, "r");

        $pot_file = $csv_file . '.pot';
        $pot_h = @fopen($pot_file, "w");

        while (($data = fgetcsv($csv_h)) !== FALSE) {
            fputs($pot_h, 'msgid "' . $data[0] . '"' . "\r\n");
            fputs($pot_h, 'msgstr "' . $data[1] . '"' . "\r\n\r\n");
            $output->writeln($data[0] . ' -> ' . $data[1]);
        }

        fclose($csv_h);
        fclose($pot_h);

        $output->writeln("Done!");
    }
}
