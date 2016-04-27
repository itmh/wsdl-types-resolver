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

        $name = $this->parseName($matches[2]);
        $requestTypes = $this->parseRequestTypes($matches[3]);
        $responseType = $this->parseResponseType($matches[1]);

        return new Signature($name, $requestTypes, $responseType);
    }

    /**
     * Возвращает имя функции
     *
     * @param array $match Результат разбора
     *
     * @return string
     */
    private function parseName($match)
    {
        return trim($match);
    }

    /**
     * Возвращает коллекцию типов аргументов
     *
     * @param array $match Результат разбора
     *
     * @return array
     */
    private function parseRequestTypes($match)
    {
        return array_reduce(
            $match ? explode(',', $match) : [],
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
     * @param array $match Результат разбора
     *
     * @return string
     */
    private function parseResponseType($match)
    {
        return trim($match);
    }
}
