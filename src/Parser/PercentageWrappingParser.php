<?php

declare(strict_types=1);

namespace Setono\VariableResolver\Parser;

use function Safe\preg_match_all;
use Setono\VariableResolver\Variable\Variable;

final class PercentageWrappingParser implements ParserInterface
{
    public function parse(string $str): array
    {
        preg_match_all('/%([A-Z_]+)%/', $str, $matches);

        if (!isset($matches[0]) || count($matches[0]) === 0) {
            return [];
        }

        $variables = [];

        foreach ($matches[0] as $key => $value) {
            $name = $matches[1][$key];
            $variables[] = new Variable($value, $name);
        }

        return $variables;
    }
}
