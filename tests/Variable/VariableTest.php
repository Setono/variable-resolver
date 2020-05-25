<?php

declare(strict_types=1);

namespace Setono\VariableResolver\Variable;

use PHPUnit\Framework\TestCase;

final class VariableTest extends TestCase
{
    /**
     * @test
     */
    public function it_instantiates(): void
    {
        $variable = new Variable('val', 'name');

        $this->assertSame('val', $variable->getValue());
        $this->assertSame('name', $variable->getName());
    }
}
