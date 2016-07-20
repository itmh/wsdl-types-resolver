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
     * Коллекция отметок о разобираемых типах (во избежание бесконечной рекурсии)
     *
     * @var array
     */
    private $inResolving = [];

    /**
     * Коллекция полностью разобранных типов
     *
     * @var array
     */
    private $fullyResolved = [];

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
        $this->inResolving = [];
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
            'result' => $this->resolveType($signature['result'])
        ];
    }

    /**
     * Возвращает рекурсивно разрешенную структуру типа
     *
     * @param string $type Название типа
     *
     * @return array
     */
    private function resolveType($type)
    {
        // Если тип уже полностью разрешен - вернуть описание типа
        if (array_key_exists($type, $this->fullyResolved)) {
            return $this->fullyResolved[$type];
        }

        // Если тип в процессе разрешения (рекурсия) или скаляр - вернуть название типа
        if (array_key_exists($type, $this->inResolving) || in_array($type, self::SCALARS, true)) {
            return $type;
        }

        $resolveType = [];
        $nextType = $this->types[$type];
        if (is_array($nextType)) {
            array_walk_recursive(
                $nextType,
                function ($fieldType, $fieldName) use ($type, &$resolveType) {
                    $this->inResolving[$type] = true;
                    $resolveType[$fieldName] = $this->resolveType($fieldType);
                }
            );
            $this->fullyResolved[$type] = $resolveType;

            return $resolveType;
        }

        return $nextType;
    }
}
