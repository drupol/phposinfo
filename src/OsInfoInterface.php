<?php

namespace drupol\phposinfo;

/**
 * Interface OsInfoInterface.
 */
interface OsInfoInterface
{
    const AIX = 65537; // 65536 + 1

    const BE_OS = 8192;  //  8192 + 0

    const BSD = 4097;  //  4096 + 1

    const CYGWIN = 257;   //   256 + 1

    const GEN_UNIX = 17;    //    16 + 2

    const HP_UX = 16385; // 16384 + 1

    const LINUX = 65;    //    64 + 1

    const MACOSX = 33;    //    32 + 1

    const MSYS = 129;   //   128 + 1

    const NONSTOP = 1024;  //  1024 + 0

    const OTHER_FAMILY = 0;

    const QNX = 2049;  //  2048 + 1

    const SUN_OS = 513;   //   512 + 1

    const UNIX_FAMILY = 1;

    const UNIX_ON_WINDOWS_FAMILY = 4;

    const WINDOWS = 10;    //     8 + 2

    const WINDOWS_FAMILY = 2;

    const ZOS = 32769; // 32768 + 1

    /**
     * @return string
     */
    public static function arch();

    /**
     * @return int
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
     * @param int $family
     *
     * @return bool
     */
    public static function isFamily($family);

    /**
     * @param int $os
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
     * @return int
     */
    public static function os();

    /**
     * @return string
     */
    public static function release();

    /**
     * @return string
     */
    public static function version();
}
