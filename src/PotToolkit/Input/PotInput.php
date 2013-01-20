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

        $translation = array();
//        while (($line = fgets($potH)) !== false) {
//            $matches = array();
//            if (preg_match('/^msgid "(.*)"/', $line, $matches)) {
//                $translation[0] = $matches[1];
//            }
//
//            if (preg_match('/^msgstr "(.*)"/', $line, $matches)) {
//                $translation[1] = $matches[1];
//                if (empty($translation[1])) {
//                    $translation[1] = $translation[0];
//                }
//
//                $this->translation_set->addTranslation($translation[0], $translation[1]);
//                $translation = array();
//            }
//        }

        return true;
    }

    public function getTranslationSet()
    {
        return $this->translation_set;
    }

}

