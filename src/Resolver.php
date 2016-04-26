<?php

namespace ITMH;

/**
 * Класс для разрешения типов WSDL
 */
class Resolver
{
    /**
     * Коллекция типов
     *
     * @var array
     */
    private $types;

    /**
     * Конструктор
     *
     * @param array $types Коллекция типов
     */
    public function __construct(array $types)
    {
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
