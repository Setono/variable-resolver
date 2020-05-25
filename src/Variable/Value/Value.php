<?php

declare(strict_types=1);

namespace Setono\VariableResolver\Variable\Value;

final class Value implements ValueInterface
{
    /** @var callable|string */
    private $value;

    /**
     * @param string|callable $value
     */
    private function __construct($value)
    {
        $this->value = $value;
    }

    public static function createFromString(string $value): self
    {
        return new self($value);
    }

    public static function createFromCallable(callable $callable): self
    {
        return new self($callable);
    }

    public function getValue(): string
    {
        if (is_callable($this->value)) {
            $this->value = call_user_func($this->value);
        }

        return $this->value;
    }
}
