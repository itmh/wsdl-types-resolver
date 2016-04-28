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

        $resolve = ['arguments' => [], 'result' => []];
        foreach ($signature['arguments'] as $type) {
            $resolve['arguments'][] = $this->resolveType($type);
        }
        $resolve['result'] = $this->resolveType($signature['result']);

        return $resolve;
    }

    private function resolveType($type)
    {
        if (in_array($type, self::$scalars, true)) {
            return $type;
        }

        $self = $this;
        $types = $this->types[$type];
        array_walk($types, function (&$item) use ($self) {
            $item = $self->resolveType($item);
        });

        return [$type => $types];
    }
}
