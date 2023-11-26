<?php

namespace Sajadsdi\PhpReflection\Concerns;

trait Reflection
{
    protected array $reflections      = [];

    /**
     * @param object|string $class
     * @return \ReflectionClass
     * @throws \ReflectionException
     */
    public function getReflection(object|string $class): \ReflectionClass
    {
        $sClass = $this->getClass($class);
        if (!isset($this->reflections[$sClass])) {
            $this->reflections[$sClass] = new \ReflectionClass($class);
        }
        return $this->reflections[$sClass];
    }

    /**
     * @param object|string $class
     * @param int|null $filter
     * @return array
     * @throws \ReflectionException
     */
    public function getProperties(object|string $class, int|null $filter = \ReflectionProperty::IS_PUBLIC): array
    {
        return $this->getReflection($class)->getProperties($filter);
    }

    /**
     * @param object|string $class
     * @param int|null $filter
     * @return array
     * @throws \ReflectionException
     */
    public function getMethods(object|string $class, int|null $filter = \ReflectionMethod::IS_PUBLIC): array
    {
        return $this->getReflection($class)->getMethods($filter);
    }

    /**
     * @param object|string $class
     * @param int|null $filter
     * @return array
     * @throws \ReflectionException
     */
    public function getConstants(object|string $class, int|null $filter = \ReflectionClassConstant::IS_PUBLIC): array
    {
        return $this->getReflection($class)->getConstants($filter);
    }

    /**
     * @param object|string $class
     * @return string
     */
    private function getClass(object|string $class): string
    {
        return is_string($class) ? $class : $class::class;
    }
}
