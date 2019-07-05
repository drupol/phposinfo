<?php

declare(strict_types = 1);

namespace drupol\phposinfo;

use drupol\phposinfo\Enum\Family;
use drupol\phposinfo\Enum\Os;

/**
 * Class OsInfo.
 */
final class OsInfo implements OsInfoInterface
{
    /**
     * {@inheritdoc}
     */
    public static function arch(): string
    {
        return \php_uname('m');
    }

    /**
     * {@inheritdoc}
     */
    public static function family(): int
    {
        return self::detectFamily();
    }

    /**
     * {@inheritdoc}
     */
    public static function hostname(): string
    {
        return \php_uname('n');
    }

    /**
     * {@inheritdoc}
     */
    public static function isApple(): bool
    {
        return self::isFamily(Family::DARWIN);
    }

    /**
     * {@inheritdoc}
     */
    public static function isBSD(): bool
    {
        return self::isFamily(Family::BSD);
    }

    /**
     * {@inheritdoc}
     */
    public static function isFamily(int $family): bool
    {
        return self::detectFamily() === $family;
    }

    /**
     * {@inheritdoc}
     */
    public static function isOs(int $os): bool
    {
        return self::detectOs() === $os;
    }

    /**
     * {@inheritdoc}
     */
    public static function isUnix(): bool
    {
        return self::isFamily(Family::LINUX);
    }

    /**
     * {@inheritdoc}
     */
    public static function isWindows(): bool
    {
        return self::isFamily(Family::WINDOWS);
    }

    /**
     * {@inheritdoc}
     */
    public static function os(): string
    {
        // We do not use PHP_OS because it can return wrong information.
        return \php_uname('s');
    }

    /**
     * {@inheritdoc}
     */
    public static function release(): string
    {
        return \php_uname('r');
    }

    /**
     * {@inheritdoc}
     */
    public static function version(): string
    {
        return \php_uname('v');
    }

    /**
     * @param null|int $os
     *
     * @throws \ReflectionException
     *
     * @return int
     */
    private static function detectFamily(int $os = null): int
    {
        $os = $os ?? self::detectOs();

        // Get the last 4 bits.
        $family = $os - (($os >> 16) << 16);

        if (true === Family::isValid($family)) {
            return $family;
        }

        self::errorMessage();
    }

    /**
     * @throws \ReflectionException
     *
     * @return int
     */
    private static function detectOs(): int
    {
        $os = self::normalizeOs(self::os());

        if (Os::has($os)) {
            return Os::value($os);
        }

        self::errorMessage();
    }

    /**
     * @throws \Exception
     */
    private static function errorMessage()
    {
        $message = <<<'EOF'
Unable to find a proper information for this operating system.

Please open an issue on https://github.com/drupol/phposinfo with
the output of the following shell command:

php -r "print_r(php_uname());"

Thanks.
EOF;

        throw new \Exception($message);
    }

    /**
     * @param string $name
     *
     * @return string
     */
    private static function normalizeOs(string $name): string
    {
        $name = (string) \preg_replace('/[^a-zA-Z0-9]/', '', $name);

        $name = \str_replace('-.', '', $name);

        return \strtoupper($name);
    }
}
