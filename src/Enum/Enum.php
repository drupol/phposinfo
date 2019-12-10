<?php

declare(strict_types=1);

namespace drupol\phposinfo\Enum;

use Exception;
use Generator;
use ReflectionClass;
use ReflectionException;

use function constant;

/**
 * Class Enum.
 */
abstract class Enum
{
    /**
     * @return Generator<string>
     */
    final public static function getIterator()
    {
        $reflection = null;

        try {
            $reflection = new ReflectionClass(static::class);
        } catch (ReflectionException $e) {
            // Do something.
        }

        if (null !== $reflection) {
            yield from $reflection->getConstants();
        }
    }

    /**
     * @param string $key
     *
     * @return bool
     */
    final public static function has($key): bool
    {
        foreach (static::getIterator() as $keyConst => $valueConst) {
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
     * @return bool
     */
    final public static function isValid($value): bool
    {
        foreach (static::getIterator() as $keyConst => $valueConst) {
            if ($value !== $valueConst) {
                continue;
            }

            return true;
        }

        return false;
    }

    /**
     * @param int|string $value
     *
     * @throws Exception
     *
     * @return string
     */
    final public static function key($value): string
    {
        foreach (static::getIterator() as $keyConst => $valueConst) {
            if ($value === $valueConst) {
                return $keyConst;
            }
        }

        throw new Exception('No such key.');
    }

    /**
     * @param string $value
     *
     * @return int|string
     */
    final public static function value(string $value)
    {
        return constant('static::' . $value);
    }
}
