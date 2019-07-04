<?php

declare(strict_types = 1);

namespace drupol\phposinfo\Enum;

/**
 * Class Group.
 */
final class Group extends Enum
{
    const AIX = 65538; // 65536 + 2
    const BE_OS = 8193;  //  8192 + 1
    const BSD = 4098;  //  4096 + 2
    const CYGWIN = 258;   //   256 + 2
    const HP_UX = 16386; // 16384 + 2
    const LINUX = 66;    //    64 + 2
    const MACOSX = 34;    //    32 + 2
    const MSYS = 130;   //   128 + 2
    const NONSTOP = 1025;  //  1024 + 1
    const QNX = 2050;  //  2048 + 2
    const SUN_OS = 514;   //   512 + 2
    const UNIX = 18;    //    16 + 2
    const WINDOWS = 12;    //     8 + 4
    const ZOS = 32770; // 32768 + 2
}
