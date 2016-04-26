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
        $types = [];
        $signature = '';
        $resolver = new Resolver($types);
        $actual = $resolver->resolve($signature);

        self::assertTrue(is_array($actual), 'Result is not an array');
    }
}
