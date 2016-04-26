<?php
use ITMH\Resolver;

/**
 * Тест для класса Resolver
 */
class ResolverTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test
     *
     * @see \ITMH\Resolver::resolve
     *
     * @return void
     */
    public function testResultIsArray()
    {
        $client = new SoapClient(__DIR__ . '/data/ArmPlatform.wsdl');

        $resolver = new Resolver($client->__getFunctions(), $client->__getTypes());
        $actual = $resolver->resolve('DocumentFileGet');

        self::assertTrue(is_array($actual), 'Result is not an array');
    }
}
