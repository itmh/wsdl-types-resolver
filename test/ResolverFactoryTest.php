<?php

use ITMH\Resolver;
use ITMH\ResolverFactory;
use Yandex\Allure\Adapter\Annotation\Features;
use Yandex\Allure\Adapter\Annotation\Stories;
use Yandex\Allure\Adapter\Annotation\Title;
use Yandex\Allure\Adapter\Support\StepSupport;

/**
 * Тест для класса ResolverFactory
 *
 * @Title("Создание экземпляра Resolver из SoapClient")
 * @Features({"Интеграция библиотеки"})
 * @Stories({"Создание экземпляра Resolver из SoapClient"})
 */
class ResolverFactoryTest extends PHPUnit_Framework_TestCase
{
    use StepSupport;

    /**
     * Тест
     *
     * @return void
     *
     * @see \ITMH\ResolverFactory::createFromClient
     */
    public function testCreateFromClient()
    {
        $client = null;
        $this->executeStep('Создание SOAP клиента', function () use (&$client) {
            $client = new SoapClient(__DIR__ . '/fixtures/weather.wsdl');
        });

        $actual = null;
        $this->executeStep('Получение Resolver из фабрики', function () use ($client, &$actual) {
            $actual = ResolverFactory::createFromClient($client);
        });

        $this->executeStep('Проверка Resolver на соответствие классу', function () use ($actual) {
            self::assertInstanceOf(Resolver::class, $actual);
        });
    }
}
