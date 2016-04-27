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
    private $signatureParser;

    /**
     * Конструктор
     *
     * @param Definition      $definition      Определение WSDL
     * @param SignatureParser $signatureParser Парсер сигнатуры
     */
    public function __construct(
        Definition $definition,
        SignatureParser $signatureParser
    ) {
        $this->definition = $definition;
        $this->signatureParser = $signatureParser;
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
        $this->signatureParser->parse($signature);
    }
}
