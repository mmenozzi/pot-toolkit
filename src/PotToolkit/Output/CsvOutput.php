<?php

namespace PotToolkit\Output;

use Gettext\Entries;
use Keboola\Csv\CsvFile;
use Gettext\Translation;

/**
 * @author Manuele Menozzi <mmenozzi@webgriffe.com>
 */
class CsvOutput
{
    /**
     * @var Entries
     */
    protected $translation_set;

    /**
     * @param Entries $translationSet
     */
    public function setTranslationSet(Entries $translationSet)
    {
        $this->translation_set = $translationSet;
    }

    /**
     * @param $filename
     */
    public function write($filename)
    {
        $csvFile = new CsvFile($filename);
        foreach ($this->translation_set as $translation) {
            /** @var $translation Translation */
            $csvFile->writeRow(
                array($translation->getOriginal(), $translation->getTranslation())
            );
        }
    }
}
