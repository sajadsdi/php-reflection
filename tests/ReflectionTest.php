<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Sajadsdi\PhpReflection\Reflections;

class ReflectionTest extends TestCase
{
    public $reflections;

    public function setUp(): void
    {
        parent::setUp();
        $this->reflections = new Reflections();
    }

    public function testReflection()
    {
        $class = new class() {};
        $reflection = $this->reflections->reflection($class);

        $this->assertInstanceOf(ReflectionClass::class, $reflection);
    }

    public function testProperties()
    {
        $class = new class() {
            public $publicProperty;
            protected $protectedProperty;
            private $privateProperty;
        };

        $properties = $this->reflections->properties($class);

        $this->assertCount(1, $properties);
        $this->assertEquals('publicProperty', $properties[0]->getName());
    }

    public function testMethods()
    {
        $class = new class() {
            public function publicMethod() {}
            protected function protectedMethod() {}
            private function privateMethod() {}
        };

        $methods = $this->reflections->methods($class);

        $this->assertCount(1, $methods);
        $this->assertEquals('publicMethod', $methods[0]->getName());
    }

    public function testConstants()
    {
        $class = new class() {
            const PUBLIC_CONSTANT = 'public';
            protected const PROTECTED_CONSTANT = 'protected';
            private const PRIVATE_CONSTANT = 'private';
        };

        $constants = $this->reflections->constants($class);

        $this->assertCount(1, $constants);
        $this->assertEquals('PUBLIC_CONSTANT', array_key_first($constants));
    }
}
