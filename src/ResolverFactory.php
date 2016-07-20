<?php
namespace ITMH;

/**
 * Фабрика для создания экземпляров Resolver
 */
class ResolverFactory
{

    /**
     * Возвращает экземпляр Resolver на основе переданного SOAP клиента
     *
     * @param \SoapClient $client Клиент
     *
     * @return Resolver
     */
    public static function createFromClient(\SoapClient $client)
    {
        $functions = $client->__getFunctions();
        $types = $client->__getTypes();

        return new Resolver(
            (new FunctionParser($functions))->getFunctions(),
            (new TypeParser($types))->getTypes()
        );
    }
}
