<?php

declare(strict_types = 1);

namespace drupol\phposinfo;

use drupol\phposinfo\Enum\Family;
use drupol\phposinfo\Enum\Group;
use drupol\phposinfo\Enum\Os;
use drupol\phposinfo\Enum\OsGroupMap;

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
    public static function group(): int
    {
        return self::detectOsGroup();
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
        return self::isGroup(Group::MACOSX);
    }

    /**
     * {@inheritdoc}
     */
    public static function isBSD(): bool
    {
        return self::isGroup(Group::BSD);
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
    public static function isGroup(int $group): bool
    {
        return self::detectOsGroup() === $group;
    }

    /**
     * {@inheritdoc}
     */
    public static function isOs(string $name): bool
    {
        $name = self::normalizeOs($name);

        return self::detectOs() === $name;
    }

    /**
     * {@inheritdoc}
     */
    public static function isUnix(): bool
    {
        return self::isFamily(Family::UNIX);
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
     * @param null|int $group
     *
     * @throws \ReflectionException
     *
     * @return int
     */
    private static function detectFamily(int $group = null): int
    {
        $group = $group ?? self::detectOsGroup();

        $family = (int) \ceil(\log(($group & -$group) + 1, 2));

        if (true === Family::isValid($family)) {
            return $family;
        }

        self::errorMessage();
    }

    /**
     * @return string
     */
    private static function detectOs(): string
    {
        return self::normalizeOs(self::os());
    }

    /**
     * @param null|string $os
     *
     * @throws \ReflectionException
     *
     * @return int
     */
    private static function detectOsGroup(string $os = null): int
    {
        $os = $os ?? self::detectOs();

        if ('\\' === \DIRECTORY_SEPARATOR) {
            return Group::WINDOWS;
        }

        if (false !== \stripos($os, 'CYGWIN')) {
            return Group::CYGWIN;
        }

        if (false !== \stripos($os, 'MSYS') || false !== \stripos($os, 'MINGW')) {
            return Group::MSYS;
        }

        if (true === OsGroupMap::has($os)) {
            return OsGroupMap::value($os);
        }

        return self::detectOsGroup(PHP_OS);
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
