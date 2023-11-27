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
    public function reflection(object|string $class): \ReflectionClass
    {
        $sClass = $this->ClassName($class);
        if (!isset($this->reflections[$sClass])) {
            $this->reflections[$sClass] = new \ReflectionClass($class);
        }
        return $this->reflections[$sClass];
    }

    /**
     * @param object|string $class
     * @param int $filter
     * @return array
     * @throws \ReflectionException
     */
    public function properties(object|string $class, int $filter = \ReflectionProperty::IS_PUBLIC): array
    {
        return $this->reflection($class)->getProperties($filter);
    }

    /**
     * @param object|string $class
     * @param int $filter
     * @return array
     * @throws \ReflectionException
     */
    public function methods(object|string $class, int $filter = \ReflectionMethod::IS_PUBLIC): array
    {
        return $this->reflection($class)->getMethods($filter);
    }

    /**
     * @param object|string $class
     * @param int $filter
     * @return array
     * @throws \ReflectionException
     */
    public function constants(object|string $class, int $filter = \ReflectionClassConstant::IS_PUBLIC): array
    {
        return $this->reflection($class)->getConstants($filter);
    }

    /**
     * @param object|string $class
     * @return string
     */
    private function ClassName(object|string $class): string
    {
        return is_string($class) ? $class : $class::class;
    }
}
