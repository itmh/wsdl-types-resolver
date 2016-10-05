<?php
namespace ITMH;

/**
 * Фабрика для создания экземпляров Resolver из экземпляра SoapClient
 */
final class ResolverFactory
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

        $functionParser = new FunctionParser($functions);
        $typeParser = new TypeParser($types);

        return new Resolver(
            $functionParser->getFunctions(),
            $typeParser->getTypes()
        );
    }
}
