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

        $name = $this->parseName($matches);
        $requestTypes = $this->parseRequestTypes($matches);
        $responseType = $this->parseResponseType($matches);

        return new Signature($name, $requestTypes, $responseType);
    }

    /**
     * Возвращает имя функции
     *
     * @param array $matches Результаты разбора
     *
     * @return string
     */
    private function parseName($matches)
    {
        return $matches[2];
    }

    /**
     * Возвращает коллекцию типов аргументов
     *
     * @param array $matches Результаты разбора
     *
     * @return array
     */
    private function parseRequestTypes($matches)
    {
        return array_reduce(
            $matches[3] ? explode(',', $matches[3]) : [],
            function ($carry, $item) {
                $arg = explode(' ', trim($item));
                $carry[ltrim($arg[1], '$')] = $arg[0];

                return $carry;
            },
            []
        );
    }

    /**
     * Возвращает тип результата
     *
     * @param array $matches Результаты разбора
     *
     * @return string
     */
    private function parseResponseType($matches)
    {
        return $matches[1];
    }
}
