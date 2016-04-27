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
     * Парсер сигнатуры
     *
     * @var SignatureParser
     */
    private $parser;

    /**
     * Конструктор
     *
     * @param Definition      $definition Определение WSDL
     * @param SignatureParser $parser     Парсер сигнатуры
     */
    public function __construct(Definition $definition, SignatureParser $parser)
    {
        $this->definition = $definition;
        $this->parser = $parser;
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
        $this->parser->parse($signature);
    }
}
