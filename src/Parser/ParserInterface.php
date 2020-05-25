<?php

declare(strict_types=1);

namespace Setono\VariableResolver\Parser;

use Setono\VariableResolver\Variable\Variable;

interface ParserInterface
{
    /**
     * @return Variable[]
     */
    public function parse(string $str): array;
}
