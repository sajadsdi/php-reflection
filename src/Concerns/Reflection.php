<?php

namespace Sajadsdi\PhpReflection\Concerns;

use ReflectionClass;
use ReflectionClassConstant;
use ReflectionException;
use ReflectionMethod;
use ReflectionProperty;

/**
 * The Reflection trait provides methods for performing reflection on classes, properties, methods, and constants.
 */
trait Reflection
{
    protected array $reflections = [];

    /**
     * Returns the reflection class for the given object or class.
     *
     * @param object|string $class The object or class to reflect upon.
     * @return ReflectionClass The reflection class.
     * @throws ReflectionException If the reflection class cannot be created.
     */
    public function reflection(object|string $class): ReflectionClass
    {
        $sClass = is_string($class) ? $class : $class::class;

        if (!isset($this->reflections[$sClass])) {
            $this->reflections[$sClass] = new ReflectionClass($class);
        }

        return $this->reflections[$sClass];
    }

    /**
     * Returns an array of properties for the given object or class.
     *
     * @param object|string $class The object or class to reflect upon.
     * @param int $filter The filter to apply to the properties (default is ReflectionProperty::IS_PUBLIC).
     * @return array The array of properties.
     * @throws ReflectionException If the reflection class cannot be created.
     */
    public function properties(object|string $class, int $filter = ReflectionProperty::IS_PUBLIC): array
    {
        return $this->reflection($class)->getProperties($filter);
    }

    /**
     * Returns an array of methods for the given object or class.
     *
     * @param object|string $class The object or class to reflect upon.
     * @param int $filter The filter to apply to the methods (default is ReflectionMethod::IS_PUBLIC).
     * @return array The array of methods.
     * @throws ReflectionException If the reflection class cannot be created.
     */
    public function methods(object|string $class, int $filter = ReflectionMethod::IS_PUBLIC): array
    {
        return $this->reflection($class)->getMethods($filter);
    }

    /**
     * Returns an array of constants for the given object or class.
     *
     * @param object|string $class The object or class to reflect upon.
     * @param int $filter The filter to apply to the constants (default is ReflectionClassConstant::IS_PUBLIC).
     * @return array The array of constants.
     * @throws ReflectionException If the reflection class cannot be created.
     */
    public function constants(object|string $class, int $filter = ReflectionClassConstant::IS_PUBLIC): array
    {
        return $this->reflection($class)->getConstants($filter);
    }

}
