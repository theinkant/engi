<?php

declare(strict_types=1);

namespace Engi\Placeholders;

use Engi\ResolverAbstract;

class NamedPlaceholder extends Placeholder
{
    public function __construct(
        protected string|int $name,
        ResolverAbstract $resolver
    ) {
        parent::__construct($resolver);
    }

    public function name(): int|string
    {
        return $this->name;
    }
}