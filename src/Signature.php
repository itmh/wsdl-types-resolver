<?php

namespace ITMH;

/**
 * Класс для содержания сигнатуры функции
 */
class Signature
{
    /**
     * Имя функции
     *
     * @var string
     */
    private $name;

    /**
     * Коллекция типов аргументов
     *
     * @var array
     */
    private $requestTypes;

    /**
     * Тип результата
     *
     * @var string
     */
    private $responseType;

    /**
     * Конструктор
     *
     * @param string $name         Имя функции
     * @param array  $requestTypes Коллекция типов аргументов
     * @param string $responseType Тип результата
     */
    public function __construct($name, array $requestTypes, $responseType)
    {
        $this->name = $name;
        $this->requestTypes = $requestTypes;
        $this->responseType = $responseType;
    }

    /**
     * Возвращает имя функции
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Возвращает коллекцию типов аргументов
     *
     * @return array
     */
    public function getRequestTypes()
    {
        return $this->requestTypes;
    }

    /**
     * Возвращает тип результата
     *
     * @return array
     */
    public function getResponseType()
    {
        return $this->responseType;
    }
}
