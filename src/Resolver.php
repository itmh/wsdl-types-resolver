<?php

namespace ITMH;

use InvalidArgumentException;

/**
 * Класс для разрешения типов WSDL
 */
class Resolver
{
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
    }
}
