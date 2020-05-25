<?php

declare(strict_types=1);

namespace Setono\VariableResolver\Variable\Value;

use Symfony\Component\Process\PhpExecutableFinder;

final class PhpBinValue implements ValueInterface
{
    private ?string $value = null;

    public function getValue(): string
    {
        if (null === $this->value) {
            $phpBin = (new PhpExecutableFinder())->find();
            if (false === $phpBin) {
                throw new \RuntimeException('A PHP binary could not be found'); // todo better exception
            }

            $this->value = $phpBin;
        }

        return $this->value;
    }
}
