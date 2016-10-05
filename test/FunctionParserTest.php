<?php

use ITMH\FunctionParser;
use Yandex\Allure\Adapter\Annotation\Features;
use Yandex\Allure\Adapter\Annotation\Stories;
use Yandex\Allure\Adapter\Annotation\Title;

/**
 * Тест для класса SignatureParser
 *
 * @Title("Разбор сигнатур функций")
 * @Features({"Разрешение типов"})
 * @Stories({"Разбор сигнатур функций"})
 */
class FunctionParserTest extends PHPUnit_Framework_TestCase
{

    /**
     * Тест
     *
     * @param string $functions Коллекция сигнатур функций
     * @param array $expected Коллекция разобранных сигнатур функции
     *
     * @return void
     *
     * @see          \ITMH\Resolver::resolve
     * @dataProvider providerParse
     */
    public function testParse($functions, $expected)
    {
        $parser = new FunctionParser($functions);
        $actual = $parser->getFunctions();

        self::assertSame($expected, $actual);
    }

    /**
     * Провайдер
     *
     * @return array
     */
    public function providerParse()
    {
        return [
            'no arguments' => [
                ['string foobar()'],
                [
                    'foobar' => [
                        'arguments' => [],
                        'result' => 'string'
                    ]
                ]
            ],
            'one argument' => [
                ['mixed foobaz(int $input)'],
                [
                    'foobaz' => [
                        'arguments' => ['input' => 'int'],
                        'result' => 'mixed'
                    ]
                ]
            ],
            'few arguments' => [
                ['ComplexTypeResponse foobaw(int $input, ComplexType $payload)'],
                [
                    'foobaw' => [
                        'arguments' => ['input' => 'int', 'payload' => 'ComplexType'],
                        'result' => 'ComplexTypeResponse'
                    ]
                ]
            ]
        ];
    }
}
