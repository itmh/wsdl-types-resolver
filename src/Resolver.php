<?php

namespace ITMH;

/**
 * Класс для разрешения типов WSDL
 */
class Resolver
{
    /**
     * Коллекция функций
     *
     * @var string[]
     */
    private $functions;

    /**
     * Коллекция типов
     *
     * @var string[]
     */
    private $types;

    /**
     * Конструктор
     *
     * @param string[] $functions Коллекция функций
     * @param string[] $types     Коллекция типов
     */
    public function __construct(array $functions, array $types)
    {
        $this->functions = $functions;
        $this->types = $types;
    }

    /**
     * Возвращает коллекцию типов метода
     *
     * @param string $signature Сигнатура метода
     *
     * @return array
     */
    public function resolve($signature)
    {
    }
}
