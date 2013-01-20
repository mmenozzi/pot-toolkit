<?php

namespace PotToolkit\Tests\Input;

use PotToolkit\Input\PotInput;
use Gettext\Translation;
use Gettext\Entries;

/**
 * @author Manuele Menozzi <mmenozzi@webgriffe.com>
 */
class PotInputTest extends \PHPUnit_Framework_TestCase
{
    public function testLoadAndGetTranslationSet()
    {
        $potInput = new PotInput();
        $this->assertTrue($potInput->load(__DIR__ . '/../Fixtures/files/pot/pot_input_1.pot'));

        $translationSet = $potInput->getTranslationSet();
        $this->assertInstanceOf('Gettext\Entries', $translationSet);
        $this->assertCount(4, $translationSet);

        $translation = new Translation(null, 'Source string to be translated 1');
        $translation->setTranslation('Translation 1');


        $this->assertSimpleTranslationsEquals(
            array(
                'Source string to be translated 1' => 'Translation 1',
                'Source string to be translated 2' => 'Translation 2',
                'Source string to be translated 3' => 'Translation 3',
                'Source string to be translated 4' => 'Translation 4',
            ),
            $translationSet
        );
    }

    public function testLoadAndGetTranslationSetWithComplexPot()
    {
        $this->markTestIncomplete();
    }

    private function assertSimpleTranslationsEquals(array $expectedTranslations, Entries $translationSet)
    {
        $translationSetArray = $translationSet->getArrayCopy();
        $i = 0;
        foreach ($expectedTranslations as $s => $t) {
            $translation = new Translation(null, $s);
            $translation->setTranslation($t);
            $this->assertEquals($translation, $translationSetArray[$i++]);
        }
    }

}
