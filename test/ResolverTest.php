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
            'arguments' => [['paper_version' => 'int']],
            'result'    => [
                'DocumentFileGetResult' => [
                    'Name' => 'string',
                    'Type' => 'string',
                    'Data' => 'base64Binary'
                ]
            ]
        ];

        self::assertSame($expected, $actual);
    }

    /**
     * Test
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
