<?php

use ITMH\Definition;
use ITMH\Resolver;

/**
 * Тест для класса Resolver
 */
class ResolverTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test
     *
     * @return void
     *
     * @see \ITMH\Resolver::resolve
     */
    public function testResultIsArray()
    {
        $client = new SoapClient(__DIR__ . '/data/ArmPlatform.wsdl');

        $definition = new Definition($client->__getFunctions(), $client->__getTypes());
        $resolver = new Resolver($definition);

        $actual = $resolver->resolve('DocumentFileGet');
        $expected = [
            'request'  => [
                'DocumentFileGet' => [
                    'paper_version' => 'int'
                ]
            ],
            'response' => [
                'DocumentFileGetResponse' => [
                    'DocumentFileGetResult' => [
                        'Name' => 'string',
                        'Type' => 'string',
                        'Data' => 'base64Binary'
                    ]
                ]
            ]
        ];

        self::assertTrue(is_array($actual), 'Result is not an array');
        self::assertSame($expected, $actual);
    }
}
