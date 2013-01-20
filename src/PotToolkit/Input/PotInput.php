<?php

namespace PotToolkit\Input;

use PotToolkit\Model\TranslationSet;
use Gettext\Extractors\Po;
use Gettext\Entries;

/**
 * Description of PotInput
 *
 * @author Manuele Menozzi <mmenozzi@webgriffe.com>
 */
class PotInput
{
    /**
     * @var Entries
     */
    protected $translation_set;

    /**
     * @param $filename string
     */
    public function load($filename)
    {
        $this->translation_set = Po::extract($filename);
        return true;
    }

    public function getTranslationSet()
    {
        return $this->translation_set;
    }

}

