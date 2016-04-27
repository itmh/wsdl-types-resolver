<?php
use ITMH\TypeParser;

/**
 * Тест для класса TypeParser
 */
class TypeParserTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test
     *
     * @param string $types    Коллекция строковых представлений типов
     * @param array  $expected Коллекция структур типов
     *
     * @return void
     *
     * @see          \ITMH\Resolver::resolve
     * @dataProvider providerParse
     */
    public function testParse($types, $expected)
    {
        $parser = new TypeParser($types);
        $actual = $parser->getTypes();

        self::assertSame($expected, $actual);
    }

    /**
     * Provider
     *
     * @return array
     */
    public function providerParse()
    {
        return [
            'struct without fields' => [
                [
                    'struct RoleList { 
}'
                ],
                ['RoleList' => []]
            ]
        ];
    }
}
