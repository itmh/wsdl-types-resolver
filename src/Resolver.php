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
     */
    const SCALARS = [
        'string',
        'boolean',
        'float',
        'double',
        'decimal',
        'binary',
        'integer',
        'nonPositiveInteger',
        'negativeInteger',
        'long',
        'int',
        'short',
        'byte',
        'nonNegativeInteger',
        'unsignedLong',
        'unsignedInt',
        'unsignedShort',
        'unsignedByte',
        'positiveInteger',
        'date',
        'time',
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
     * Коллекция отметок о разобранных типах (во избежание бесконечной рекурсии)
     *
     * @var array
     */
    private $alreadyResolved = [];

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
        $this->alreadyResolved = [];
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
     * Возвращает ркурсивно разрешенную структуру типа
     *
     * @param string $type Название типа
     *
     * @return array
     */
    private function resolveType($type)
    {
        if ($this->isResolved($type)) {
            return $type;
        }

        $resolvedTypes = [];
        array_walk_recursive(
            $this->types[$type],
            $this->resolveTypeCallback($type, $resolvedTypes)
        );

        return $resolvedTypes;
    }

    /**
     * Возвращает факт разрешения типа
     * Возвращает true если тип скалярный или уже помечен разрешенным
     *
     * @param string $type Название типа
     *
     * @return bool
     */
    private function isResolved($type)
    {
        $isScalar = in_array($type, self::SCALARS, true);
        $isAlreadyResolved = array_key_exists($type, $this->alreadyResolved);

        return $isScalar || $isAlreadyResolved;
    }

    /**
     * Возвращает функцию-обработчик для рекурсивного разрешения типа
     *
     * @param string $type          Имя разрешаемого типа
     * @param array  $resolvedTypes Коллекция разрешенных структур типов
     *
     * @return \Closure
     */
    private function resolveTypeCallback($type, array &$resolvedTypes)
    {
        return function ($fieldType, $fieldName) use ($type, &$resolvedTypes) {
            // Добавляем тип в массив разрешенных, чтобы избежать бесконечной рекурсии
            $this->alreadyResolved[$type] = true;
            $resolvedTypes[$fieldName] = $this->resolveType($fieldType);
        };
    }
}
