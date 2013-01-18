<?php

namespace PotToolkit\Tests\Input;

use PotToolkit\Input\PotInput;

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
        $this->assertInstanceOf('PotToolkit\Model\TranslationSet', $translationSet);
        $this->assertCount(4, $translationSet);

        $this->assertEquals(
            array(
                'Source string to be translated 1' => 'Translation 1',
                'Source string to be translated 2' => 'Translation 2',
                'Source string to be translated 3' => 'Translation 3',
                'Source string to be translated 4' => 'Translation 4',
            ),
            $translationSet->getAsArray()
        );
    }

    public function testLoadAndGetTranslationSetWithComplexPot()
    {
        $this->markTestIncomplete();
    }

}
