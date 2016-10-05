<?php

use ITMH\FunctionParser;
use ITMH\Resolver;
use ITMH\TypeParser;
use Yandex\Allure\Adapter\Annotation\Title;

/**
 * Тест для класса Resolver
 *
 * @Title("Разрешение рекурсивного вложенного типа")
 */
class ResolverRecursiveTest extends PHPUnit_Framework_TestCase
{

    /**
     * Список функций из метаданных Soap клиента
     *
     * @var array
     */
    private static $resolverFunctions = [];

    /**
     * Список типов из метаданных Soap клиента
     *
     * @var array
     */
    private static $resolverTypes = [];

    /**
     * Настраивает окружение
     *
     * @return void
     */
    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();

        self::$resolverFunctions = include __DIR__ . '/fixtures/recursive/functions.php';
        self::$resolverTypes = include __DIR__ . '/fixtures/recursive/types.php';
    }

    /**
     * Тест
     *
     * @param string $function Имя функции
     * @param array $expected Ожидаемый результат
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
            'resolve recursive arguments' => [
                'BaseImageTree',
                [
                    'arguments' => [
                        []
                    ],
                    'result' => [
                        'BaseImageTree' => [
                            'IsUsed' => 'boolean',
                            'Count' => 'int',
                            'ParentID' => 'int',
                            'Group' => 'BaseImageInfo',
                            'Leaf' => [
                                'IsUsed' => 'boolean'
                            ]
                        ]
                    ]
                ]
            ]
        ];
    }
}
