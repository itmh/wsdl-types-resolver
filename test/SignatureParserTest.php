<?php

use ITMH\Signature;
use ITMH\SignatureParser;

/**
 * Тест для классв SignatureParser
 */
class SignatureParserTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test
     *
     * @param string    $signature Строковое представление сигнатуры функции
     * @param Signature $expected  Сигнатура функции
     *
     * @return void
     *
     * @see          \ITMH\Resolver::resolve
     * @dataProvider providerParse
     */
    public function testParse($signature, $expected)
    {
        $parser = new SignatureParser($signature);
        $actual = $parser->parse($signature);

        self::assertEquals($expected, $actual);
    }

    /**
     * Provider
     *
     * @return array
     */
    public function providerParse()
    {
        return [
            'simple signature without arguments' => [
                'string foobar()',
                new Signature('foobar', [], 'string')
            ]
        ];
    }
}
