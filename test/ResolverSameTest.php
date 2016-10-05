<?php

use ITMH\FunctionParser;
use ITMH\Resolver;
use ITMH\TypeParser;
use Yandex\Allure\Adapter\Annotation\Title;

/**
 * Тест для класса Resolver
 *
 * @Title("Разрешение повторяющихся типов")
 */
class ResolverSameTest extends PHPUnit_Framework_TestCase
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

        self::$resolverFunctions = include __DIR__ . '/fixtures/same/functions.php';
        self::$resolverTypes = include __DIR__ . '/fixtures/same/types.php';
    }

    /**
     * Провайдер
     *
     * @return array
     */
    public function providerResolve()
    {
        return [
            'resolve same types arguments' => [
                'TaskDetailsGet',
                [
                    'arguments' => [
                        ['task_id' => 'long']
                    ],
                    'result' => [
                        'TaskDetailsGet' => [
                            'Id' => 'long',
                            'WorkflowId' => 'int',
                            'Workflow' => [
                                'ID' => 'int',
                                'Name' => 'string',
                                'Code' => 'string',
                            ],
                            'CreatedDt' => 'dateTime',
                            'ModifiedDt' => 'dateTime',
                            'SolveDt' => 'dateTime',
                            'PlanDt' => 'dateTime',
                            'AuthorId' => 'int',
                            'Author' => [
                                'Id' => 'int',
                                'ClientId' => 'int',
                                'JobId' => 'int',
                                'ManagerId' => 'int',
                                'ManagerGroupId' => 'int',
                                'IsFired' => 'boolean',
                            ],
                            'ExecutorId' => 'int',
                            'Executor' => [
                                'Id' => 'int',
                                'ClientId' => 'int',
                                'JobId' => 'int',
                                'ManagerId' => 'int',
                                'ManagerGroupId' => 'int',
                                'IsFired' => 'boolean',
                            ],
                            'StatusId' => 'int',
                            'Status' => [
                                'Id' => 'int',
                                'Name' => 'string',
                                'Code' => 'string',
                                'SubStatuses' => [
                                    'SubStatus' => [
                                        'Code' => 'string',
                                        'Id' => 'int',
                                        'Name' => 'string',
                                    ]
                                ]
                            ],
                            'SubStatusId' => 'int',
                            'Priority' => 'int',
                            'Main' => 'string',
                            'Mem' => 'string',
                        ]
                    ]
                ]
            ]
        ];
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
}
