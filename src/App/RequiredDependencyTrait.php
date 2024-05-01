<?php

declare(strict_types=1);

namespace Engi\App;

use Engi\App\Exceptions\RequiredDependencyNotFound;

trait RequiredDependencyTrait
{
    /**
     * @param class-string $class
     * @param mixed ...$dependencies
     * @return mixed
     * @throws RequiredDependencyNotFound
     */
    protected function required(string $class, mixed ...$dependencies): mixed
    {
        foreach ($dependencies as $d) {
            if (is_a($d, $class)) {
                return $d;
            }
        }
        throw new RequiredDependencyNotFound($class);
    }
}
