<?php
use ITMH\TypeParser;
use Yandex\Allure\Adapter\Annotation\Title;

/**
 * Тест для класса TypeParser
 *
 * @Title("Парсер входных и выходных параметров функций")
 */
class TypeParserTest extends PHPUnit_Framework_TestCase
{

    /**
     * Тест
     *
     * @param string $types Коллекция структур типов
     * @param array $expected Коллекция разобранных структур типов
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
     * Провайдер
     *
     * @return array
     */
    public function providerParse()
    {
        return [
            'scalar' => [
                [
                    'string Mode',
                    ''
                ],
                ['Mode' => 'string']
            ],
            'no struct' => [
                [],
                []
            ],
            'no fields' => [
                [
                    'struct RoleList { 
}',
                    ''
                ],
                ['RoleList' => []]
            ],
            'one field' => [
                [
                    'struct ArrayOfDemandState {
  DemandStateType DemandState;
}',
                    ''
                ],
                ['ArrayOfDemandState' => ['DemandState' => 'DemandStateType']]
            ],
            'few field' => [
                [
                    'struct ArrayOfDemandState {
  DemandStateType DemandState;
  array RoleList;
  mixed fooBar;
}',
                    ''
                ],
                [
                    'ArrayOfDemandState' => [
                        'DemandState' => 'DemandStateType',
                        'RoleList' => 'array',
                        'fooBar' => 'mixed'
                    ]
                ]
            ],
            'recursive struct' => [
                [
                    'struct BaseImageInfo {
  boolean IsUsed;
  int Count;
  int ParentID;
  BaseImageInfo Group;
  Leaf ImageInfo;
}',
                    ''
                ],
                [
                    'BaseImageInfo' => [
                        'IsUsed' => 'boolean',
                        'Count' => 'int',
                        'ParentID' => 'int',
                        'Group' => 'BaseImageInfo',
                        'ImageInfo' => 'Leaf'
                    ]
                ]
            ]
        ];
    }
}
