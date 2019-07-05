<?php

declare(strict_types = 1);

namespace drupol\phposinfo\Enum;

/**
 * Class Enum.
 */
abstract class Enum
{
    /**
     * Enum constructor.
     *
     * @throws \Exception
     */
    private function __construct()
    {
        throw new \Exception();
    }

    /**
     * @throws \Exception
     */
    private function __clone()
    {
        throw new \Exception();
    }

    /**
     * @param string $key
     *
     * @throws \ReflectionException
     *
     * @return bool
     */
    final public static function has($key): bool
    {
        foreach (static::list() as $keyConst => $valueConst) {
            if ($key !== $keyConst) {
                continue;
            }

            return true;
        }

        return false;
    }

    /**
     * @param int|string $value
     *
     * @throws \ReflectionException
     *
     * @return bool
     */
    final public static function isValid($value): bool
    {
        foreach (static::list() as $keyConst => $valueConst) {
            if ($value !== $valueConst) {
                continue;
            }

            return true;
        }

        return false;
    }

    /**
     * @return \Generator
     */
    final public static function list()
    {
        $reflection = null;

        try {
            $reflection = new \ReflectionClass(static::class);
        } catch (\ReflectionException $e) {
            // Do something.
        }

        if (null !== $reflection) {
            yield from $reflection->getConstants();
        }
    }

    /**
     * @param string $value
     *
     * @return int
     */
    final public static function value($value): int
    {
        return \constant('static::' . $value);
    }
}
