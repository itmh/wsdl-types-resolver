<?php

namespace ITMH;

use InvalidArgumentException;

/**
 * Класс для разрешения типов WSDL
 */
class Resolver
{
    /**
     * Коллекция скалярных типов, не требующих разрешения
     *
     * @var array
     */
    private static $scalars = [
        'int',
        'long',
        'string',
        'boolean',
        'dateTime',
        'base64Binary'
    ];

    /**
     * Коллекция разобранных сигнатур функций
     *
     * @var array
     */
    private $functions;

    /**
     * Коллекция разобранных структур типов
     *
     * @var array
     */
    private $types;

    /**
     * Конструктор
     *
     * @param array $functions Коллекция разобранных сигнатур функций
     * @param array $types     Коллекция разобранных структур типов
     */
    public function __construct(array $functions, array $types)
    {
        $this->functions = $functions;
        $this->types = $types;
    }

    /**
     * Возвращает разобранное представление типов функции
     *
     * @param string $function Название функции
     *
     * @return array
     * @throws InvalidArgumentException
     */
    public function resolve($function)
    {
        if (false === array_key_exists($function, $this->functions)) {
            throw new InvalidArgumentException;
        }

        $signature = $this->functions[$function];

        return [
            'arguments' => array_reduce(
                $signature['arguments'],
                function ($carry, $item) {
                    $carry[] = $this->resolveType($item);

                    return $carry;
                },
                []
            ),
            'result'    => $this->resolveType($signature['result'])
        ];
    }

    /**
     * Возвращает рекурсивно разрешённый тип
     *
     * @param string $type Название типа
     *
     * @return array
     */
    private function resolveType($type)
    {
        if (in_array($type, self::$scalars, true)) {
            return $type;
        }

        $types = $this->types[$type];
        array_walk(
            $types,
            function (&$item) {
                $item = $this->resolveType($item);
            }
        );

        return [$type => $types];
    }
}
