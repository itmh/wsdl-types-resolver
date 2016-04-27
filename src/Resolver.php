<?php

namespace ITMH;

/**
 * Класс для разрешения типов WSDL
 */
class Resolver
{
    /**
     * Определение WSDL
     *
     * @var Definition
     */
    private $definition;

    /**
     * Конструктор
     *
     * @param Definition $definition Определение WSDL
     */
    public function __construct(Definition $definition)
    {
        $this->definition = $definition;
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
