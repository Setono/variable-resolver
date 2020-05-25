<?php

declare(strict_types=1);

namespace Setono\VariableResolver;

interface VariableResolverInterface
{
    /**
     * @param string $str This is the string containing placeholders
     *
     * @return string This is the string where placeholders has been replaced
     */
    public function resolve(string $str): string;
}
