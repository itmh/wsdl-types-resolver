<?php

use ITMH\FunctionParser;
use ITMH\Resolver;
use ITMH\TypeParser;

/**
 * Тест для класса Resolver
 */
class ResolverTest extends PHPUnit_Framework_TestCase
{
    private static $resolverFunctions = [];
    private static $resolverTypes = [];

    /**
     * Настраивает окружение
     *
     * @return void
     */
    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();

        self::$resolverFunctions = include __DIR__ . '/fixtures/functions.php';
        self::$resolverTypes = include __DIR__ . '/fixtures/types.php';
    }

    /**
     * Тест
     *
     * @param string $function Имя функции
     * @param array  $expected Ожидаемый результат
     *
     * @return void
     * @throws InvalidArgumentException
     *
     * @see          \ITMH\Resolver::resolve
     * @dataProvider providerResolve
     */
    public function testResolve($function, $expected)
    {
        $resolver = new Resolver(
            (new FunctionParser(self::$resolverFunctions))->getFunctions(),
            (new TypeParser(self::$resolverTypes))->getTypes()
        );
        $actual = $resolver->resolve($function);

        self::assertSame($expected, $actual);
    }

    /**
     * Провайдер
     *
     * @return array
     */
    public function providerResolve()
    {
        return [
            'resolve arguments' => [
                'DocumentCreate',
                [
                    'arguments' => [
                        [
                            'demand'      => 'int',
                            'document_dt' => 'dateTime',
                            'mem'         => 'string',
                            'file'        => [
                                'Name' => 'string',
                                'Type' => 'string',
                                'Data' => 'base64Binary'
                            ],
                            'manager_api' => 'int'
                        ]
                    ],
                    'result'    => [
                        'DocumentCreateResult' => 'int'
                    ]
                ]
            ],
            'resolve result'    => [
                'DocumentFileGet',
                [
                    'arguments' => [['paper_version' => 'int']],
                    'result'    => [
                        'DocumentFileGetResult' => [
                            'Name' => 'string',
                            'Type' => 'string',
                            'Data' => 'base64Binary'
                        ]
                    ]
                ]
            ]
        ];
    }

    /**
     * Тест
     *
     * @return void
     *
     * @see \ITMH\Resolver::resolve
     */
    public function testException()
    {
        $resolver = new Resolver([], []);

        try {
            $resolver->resolve('DocumentFileGet');
            self::fail('Exception is not thrown');
        } catch (InvalidArgumentException $e) {
            $this->addToAssertionCount(1);
        }
    }
}
