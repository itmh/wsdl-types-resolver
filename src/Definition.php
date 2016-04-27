<?php

namespace ITMH;

/**
 * Класс для передачи сигнатур функций и типов
 */
class Definition
{
    /**
     * Коллекция функций
     *
     * @var array
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
     * @param array $functions Коллекция функций
     * @param array $types     Коллекция типов
     */
    public function __construct(array $functions, array $types)
    {
        $this->functions = $functions;
        $this->types = $types;
    }

    /**
     * Возвращает коллекцию функций
     *
     * @return array
     */
    public function getFunctions()
    {
        return $this->functions;
    }

    /**
     * Возвращает коллекцию типов
     *
     * @return array
     */
    public function getTypes()
    {
        return $this->types;
    }
}
