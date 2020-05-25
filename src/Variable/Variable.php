<?php

declare(strict_types=1);

namespace Setono\VariableResolver\Variable;

final class Variable
{
    /**
     * This is the whole variable value, i.e. %PHP%
     */
    private string $value;

    /**
     * This is the actual name of the variable, i.e. PHP for a variable value like %PHP%
     */
    private string $name;

    public function __construct(string $value, string $name)
    {
        $this->value = $value;
        $this->name = $name;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
