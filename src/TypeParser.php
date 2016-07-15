<?php

namespace ITMH;

/**
 * Класс для разбора типа
 */
class TypeParser
{

    const STRUCT_MARK = 'struct';
    const STRUCT_PATTERN = '/struct (\w+) \{(.*)\}/s';
    const SCALAR_PATTERN = '/(\w+) (.*)/s';

    /**
     * Коллекция разобранных структур типов
     *
     * @var array
     */
    private $types = [];

    /**
     * Конструктор
     *
     * @param array $types Коллекция структур типов
     */
    public function __construct(array $types)
    {
        $this->parse($types);
    }

    /**
     * Возвращает коллекцию разобранных структур типов
     *
     * @return array
     */
    public function getTypes()
    {
        return $this->types;
    }

    /**
     * Разбирает строковые представления типов в коллекцию структур типов
     *
     * @param array $types Коллекция строковых представлений типов
     *
     * @return array
     */
    private function parse(array $types)
    {
        $this->types = array_reduce(
            $types,
            static::parseTypeCallback(),
            []
        );
    }

    /**
     * Возвращает функцию для разбора типа
     *
     * @return \Closure
     */
    private static function parseTypeCallback()
    {
        return function ($carry, $item) {
            $item = trim($item);

            self::parseTypeAsStruct($item, $carry);
            self::parseTypeAsScalar($item, $carry);

            return $carry;
        };
    }

    /**
     * Разбирает тип как структуру
     *
     * @param string $item  Сигнатура типа
     * @param array  $carry Коллекция разобранных сигнатур
     *
     * @return void
     */
    private static function parseTypeAsStruct($item, array &$carry)
    {
        if (!$item || strpos($item, static::STRUCT_MARK) !== 0) {
            return;
        }

        preg_match_all(static::STRUCT_PATTERN, $item, $matches);
        $fields = explode(';', trim($matches[2][0]));
        $carry[$matches[1][0]] = array_reduce(
            $fields,
            static::parseFieldCallback(),
            []
        );
    }

    /**
     * Разбирает тип как скалярное значение
     *
     * @param string $item  Сигнатура типа
     * @param array  $carry Коллекция разобранных сигнатур
     *
     * @return void
     */
    private static function parseTypeAsScalar($item, array &$carry)
    {
        if (!$item || strpos($item, static::STRUCT_MARK) === 0) {
            // Если сигнатура типа начинается с 'struct' – игнорировать
            return;
        }

        preg_match_all(static::SCALAR_PATTERN, $item, $matches);
        $carry[$matches[2][0]] = $matches[1][0];
    }

    /**
     * Возвращает функцию для разбора поля структуры
     *
     * @return \Closure
     */
    private static function parseFieldCallback()
    {
        return function ($carry, $item) {
            $type = explode(' ', trim($item));
            if (count($type) === 2) {
                $carry[$type[1]] = $type[0];
            }

            return $carry;
        };
    }
}
