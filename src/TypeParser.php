<?php

namespace ITMH;

/**
 * Класс для разбора типа
 */
class TypeParser
{
    /**
     * Коллекция типов
     *
     * @var array
     */
    private $types = [];

    /**
     * Конструктор
     *
     * @param array $types Коллекция типов
     */
    public function __construct(array $types)
    {
        $this->parse($types);
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
        $this->types = array_reduce($types,
            function ($carry, $item) {
                $item = trim($item);
                if (strpos($item, 'struct') !== 0) {
                    return $carry;
                }

                preg_match_all('/struct (\w+)/m', $item, $matches);
                $carry[$matches[1][0]] = [];

                return $carry;
            },
            []
        );
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
}
