<?php

namespace PotToolkit\Tests\Output;

use PotToolkit\Output\CsvOutput;
use Gettext\Entries;
use Keboola\Csv\CsvFile;

/**
 * @author Manuele Menozzi <mmenozzi@webgriffe.com>
 */
class CsvOutputTest extends \PHPUnit_Framework_TestCase
{
    protected $temp_file;

    public function setUp()
    {
        $this->temp_file = tempnam(sys_get_temp_dir(), 'csv_output_test');
    }

    public function tearDown()
    {
        unlink($this->temp_file);
    }

    public function setTranslationAndWriteDataProvider()
    {
        return array(
            array(
                array(
                    'Source str 1' => 'Translation 1',
                    'Source str 2' => 'Translation 2',
                    'Source str 3' => 'Translation 3',
                    'Source str 4' => 'Translation 4',
                )
            )
        );
    }

    /**
     * @dataProvider setTranslationAndWriteDataProvider
     *
     * @param array $translations
     */
    public function testSetTranslationAndWrite(array $translations)
    {
        $translationSet = new Entries();
        foreach ($translations as $s => $t) {
            $translationSet->insert(null, $s)->setTranslation($t);
        }

        $csvOutput = new CsvOutput();
        $csvOutput->setTranslationSet($translationSet);

        $csvOutput->write($this->temp_file);

        $csvFile = new CsvFile($this->temp_file);
        $this->assertCount(4, $csvFile);
    }

}
