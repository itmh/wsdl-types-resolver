<?php

namespace ITMH;

/**
 * Класс для разбора сигнатуры функции
 */
class SignatureParser
{
    /**
     * Сигнатура функции
     *
     * @var string
     */
    private $signature;

    /**
     * Конструктор
     *
     * @param string $signature Сигнатура функции
     */
    public function __construct($signature)
    {
        $this->signature = $signature;
    }

    /**
     * Возвращает разобранную сигнатуру функции
     *
     * @param string $signature Сигнатура функции
     *
     * @return Signature
     */
    public function parse($signature)
    {
        
    }
}
