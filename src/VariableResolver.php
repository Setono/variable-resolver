<?php

declare(strict_types=1);

namespace Setono\VariableResolver;

use function Safe\sprintf;
use Setono\VariableResolver\Parser\ParserInterface;
use Setono\VariableResolver\Variable\Value\ValueInterface;

final class VariableResolver implements VariableResolverInterface
{
    /** @var ValueInterface[] */
    private array $values = [];

    private ParserInterface $parser;

    public function __construct(ParserInterface $parser)
    {
        $this->parser = $parser;
    }

    public function resolve(string $str): string
    {
        $variables = $this->parser->parse($str);

        if (count($variables) === 0) {
            return $str;
        }

        foreach ($variables as $variable) {
            if (!isset($this->values[$variable->getName()])) {
                throw new \InvalidArgumentException(sprintf('The variable, "%s" does not have a corresponding variable value. Please add one.', $variable->getName())); // todo better exception
            }

            $str = str_replace($variable->getValue(), $this->values[$variable->getName()]->getValue(), $str);
        }

        return $str;
    }

    public function addValue(string $variable, ValueInterface $variableValue): void
    {
        $this->values[$variable] = $variableValue;
    }
}
