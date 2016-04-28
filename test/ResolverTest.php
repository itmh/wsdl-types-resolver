<?php

use ITMH\Definition;
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
     * Test
     *
     * @return void
     *
     * @see \ITMH\Resolver::resolve
     */
    public function testResultIsArray()
    {
        $resolver = new Resolver(
            (new FunctionParser(self::$resolverFunctions))->getFunctions(),
            (new TypeParser(self::$resolverTypes))->getTypes()
        );
        $actual = $resolver->resolve('DocumentFileGet');

        $expected = [
            'request'  => [
                'DocumentFileGet' => [
                    'paper_version' => 'int'
                ]
            ],
            'response' => [
                'DocumentFileGetResponse' => [
                    'DocumentFileGetResult' => [
                        'Name' => 'string',
                        'Type' => 'string',
                        'Data' => 'base64Binary'
                    ]
                ]
            ]
        ];

        self::assertTrue(is_array($actual), 'Result is not an array');
        self::assertSame($expected, $actual);
    }
}
