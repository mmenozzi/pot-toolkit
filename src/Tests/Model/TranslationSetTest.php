<?php

namespace PotToolkit\Tests\Model;

use PotToolkit\Model\TranslationSet;
use PotToolkit\Model\Translation;

/**
 * @author Manuele Menozzi <mmenozzi@webgriffe.com>
 */
class TranslationSetTest extends \PHPUnit_Framework_TestCase
{
    public function testTranslationSet()
    {
        $set = new TranslationSet();
        $set->addTranslation('source1', 'translation1');

        $this->assertCount(1, $set);

        $set->addTranslation('source2', 'translation2');
        $set->addTranslation('source3', 'translation3');

        $this->assertCount(3, $set);

        $set->addTranslation('source2', 'translation2');

        $this->assertCount(3, $set);

        $translations = array();
        foreach ($set as $source => $translation) {
            $translations[$source] = $translation;
        }

        $this->assertEquals(
            array(
                'source1' => 'translation1',
                'source2' => 'translation2',
                'source3' => 'translation3',
            ),
            $set->getAsArray()
        );
    }
}
