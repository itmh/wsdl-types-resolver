<?php

namespace ITMH;

/**
 * Класс для разбора сигнатуры функции
 */
class SignatureParser
{
    const SIGNATURE_PATTERN = '/(\w+) (\w+)\((.*)\)/';

    /**
     * Конструктор
     */
    public function __construct()
    {
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
        preg_match(self::SIGNATURE_PATTERN, $signature, $matches);

        $name = $matches[2];
        $requestTypes = $matches[3] ? explode(',', $matches[3]) : [];
        $responseType = $matches[1];

        return new Signature($name, $requestTypes, $responseType);
    }
}
