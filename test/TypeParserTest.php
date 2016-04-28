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
     * @param string $types    Коллекция структур типов
     * @param array  $expected Коллекция разобранных структур типов
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
            'no struct' => [
                [
                    'type Some { 
}'
                ],
                []
            ],
            'no fields' => [
                [
                    'struct RoleList { 
}'
                ],
                ['RoleList' => []]
            ],
            'one field' => [
                [
                    'struct ArrayOfDemandState {
  DemandStateType DemandState;
}'
                ],
                ['ArrayOfDemandState' => ['DemandState' => 'DemandStateType']]
            ],
            'few field' => [
                [
                    'struct ArrayOfDemandState {
  DemandStateType DemandState;
  array RoleList;
  mixed fooBar;
}'
                ],
                [
                    'ArrayOfDemandState' => [
                        'DemandState' => 'DemandStateType',
                        'RoleList'    => 'array',
                        'fooBar'      => 'mixed'
                    ]
                ]
            ]
        ];
    }
}
