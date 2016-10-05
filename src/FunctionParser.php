<?php

namespace ITMH;

/**
 * Класс для разбора сигнатур функций
 */
final class FunctionParser
{

    const SIGNATURE_PATTERN = '/(\w+) (\w+)\((.*)\)/';

    /**
     * Коллекция разобранных сигнатур функций
     *
     * @var array
     */
    private $functions = [];

    /**
     * Конструктор
     *
     * @param array $functions Коллекция строковых сигнатур функций
     */
    public function __construct(array $functions)
    {
        $this->parse($functions);
    }

    /**
     * Возвращает коллекцию разобранных сигнатур функций
     *
     * @return array
     */
    public function getFunctions()
    {
        return $this->functions;
    }

    /**
     * Возвращает разобранную сигнатуру функции
     *
     * @param string $signature Строковая сигнатура функции
     *
     * @return array
     */
    private function parse($signature)
    {
        $this->functions = array_reduce(
            $signature,
            static::parseFunctionCallback(),
            []
        );
    }

    /**
     * Возвращает функцию для разбора функции
     *
     * @return \Closure
     */
    private static function parseFunctionCallback()
    {
        return function ($carry, $item) {
            preg_match(static::SIGNATURE_PATTERN, $item, $matches);

            $name = trim($matches[2]);
            $arguments = array_reduce(
                $matches[3] ? explode(',', $matches[3]) : [],
                static::parseArgumentsCallback(),
                []
            );
            $result = trim($matches[1]);

            $carry[$name] = [
                'arguments' => $arguments,
                'result' => $result
            ];

            return $carry;
        };
    }

    /**
     * Возвращает функцию разбора аргумента
     *
     * @return \Closure
     */
    private static function parseArgumentsCallback()
    {
        return function ($carry, $item) {
            $arg = explode(' ', trim($item));
            $carry[ltrim($arg[1], '$')] = $arg[0];

            return $carry;
        };
    }
}
