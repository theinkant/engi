<?php

declare(strict_types=1);

namespace Tests\Resolvers;

use Engi\App\Assembler;
use Engi\App\Resolvers\ListResolver;
use Engi\App\Resolvers\NumericResolver;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class ListResolverTest extends TestCase
{
    protected static ListResolver $resolver;
    protected static Assembler $assembler;

    public static function setUpBeforeClass(): void
    {
        static::$assembler  = new Assembler();
        static::$resolver   = new ListResolver(
            new NumericResolver()
        );
    }

    public static function positives(): array
    {
        return [
            "value [1, 2.38]"   => [[1, 2.38], '1,2.38'],
            "value [111]"       => [[111], '111'],
        ];
    }

    #[DataProvider('positives')]
    public function testPositive(
        array $values,
        string $result
    ) {
        $this->assertSame(
            $result,
            static::$assembler->assemble(
                static::$resolver->resolve($values)->compile()
            )
        );
    }
}
