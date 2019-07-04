<?php

declare(strict_types = 1);

namespace drupol\phposinfo;

/**
 * Interface OsInfoInterface.
 */
interface OsInfoInterface
{
    /**
     * @return string
     */
    public static function arch(): string;

    /**
     * @return int
     */
    public static function family(): int;

    /**
     * @return int
     */
    public static function group(): int;

    /**
     * @return string
     */
    public static function hostname(): string;

    /**
     * @return bool
     */
    public static function isApple(): bool;

    /**
     * @return bool
     */
    public static function isBSD(): bool;

    /**
     * @param int $family
     *
     * @return bool
     */
    public static function isFamily(int $family): bool;

    /**
     * @param string $name
     *
     * @return bool
     */
    public static function isOs(string $name): bool;

    /**
     * @return bool
     */
    public static function isUnix(): bool;

    /**
     * @return bool
     */
    public static function isWindows(): bool;

    /**
     * @return string
     */
    public static function release(): string;

    /**
     * @return string
     */
    public static function version(): string;
}
