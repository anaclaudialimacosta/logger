<?php

namespace Test\Loggyfier;

use Loggyfier\Foo;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class FooTest extends TestCase
{
    public function testFoo(): void
    {
        $foo = Foo::foo();
        Assert::assertTrue($foo);
    }
}
