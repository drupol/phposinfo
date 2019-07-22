<?php

namespace drupol\phposinfo\Enum;

/**
 * Class Enum.
 */
abstract class Enum
{
    /**
     * @return \Generator
     */
    final public static function getIterator()
    {
        $reflection = null;

        try {
            $reflection = new \ReflectionClass(static::class);
        } catch (\ReflectionException $e) {
            // Do something.
        }

        if (null !== $reflection) {
            return $reflection->getConstants();
        }

        return [];
    }

    /**
     * @param string $key
     *
     * @return bool
     */
    final public static function has($key)
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
    final public static function isValid($value)
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
     * @throws \Exception
     *
     * @return string
     */
    final public static function key($value)
    {
        foreach (static::getIterator() as $keyConst => $valueConst) {
            if ($value === $valueConst) {
                return $keyConst;
            }
        }

        throw new \Exception('No such key.');
    }

    /**
     * @param string $value
     *
     * @return int|string
     */
    final public static function value($value)
    {
        return \constant('static::' . $value);
    }
}
