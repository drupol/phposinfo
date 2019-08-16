<?php

namespace drupol\phposinfo;

/**
 * Interface OsInfoInterface.
 */
interface OsInfoInterface
{
    /**
     * @return string
     */
    public static function arch();

    /**
     * @return string
     */
    public static function family();

    /**
     * @return string
     */
    public static function hostname();

    /**
     * @return bool
     */
    public static function isApple();

    /**
     * @return bool
     */
    public static function isBSD();

    /**
     * @param int|string $family
     *
     * @return bool
     */
    public static function isFamily($family);

    /**
     * @param int|string $os
     *
     * @return bool
     */
    public static function isOs($os);

    /**
     * @return bool
     */
    public static function isUnix();

    /**
     * @return bool
     */
    public static function isWindows();

    /**
     * @return string
     */
    public static function os();

    /**
     * Register new constants.
     */
    public static function register();

    /**
     * @return string
     */
    public static function release();

    /**
     * @return string
     */
    public static function version();
}
