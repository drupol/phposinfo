<?php

declare(strict_types = 1);

namespace drupol\phposinfo\Enum;

/**
 * Class OsGroupMap.
 */
final class OsGroupMap extends Enum
{
    const AIX = Group::AIX;
    const BEOS = Group::BE_OS;
    const CYGWIN = Group::CYGWIN;
    const CYGWINNT51 = Group::CYGWIN;
    const CYGWINNT61 = Group::CYGWIN;
    const CYGWINNT61WOW64 = Group::CYGWIN;
    const DARWIN = Group::MACOSX;
    const DEBIANFREEBSD = Group::BSD;
    const DRAGONFLY = Group::BSD;
    const FREEBSD = Group::BSD;
    const GNU = Group::LINUX;
    const GNUFREEBSD = Group::BSD;
    const GNUKFREEBSD = Group::BSD;
    const GNULINUX = Group::LINUX;
    const HAIKU = Group::BE_OS;
    const HPUX = Group::HP_UX;
    const INTERIX = Group::WINDOWS;
    const IRIX = Group::UNIX;
    const IRIX64 = Group::UNIX;
    const KOS = Group::UNIX;
    const LINUX = Group::LINUX;
    const MINGW = Group::CYGWIN;
    const MINGW32NT = Group::CYGWIN;
    const MINIX = Group::UNIX;
    const MSYSNT61 = Group::CYGWIN;
    const NETBSD = Group::BSD;
    const NONSTOP = Group::NONSTOP;
    const NONSTOPKERNEL = Group::NONSTOP;
    const OPENBSD = Group::BSD;
    const OS390 = Group::ZOS;
    const OS400 = Group::ZOS;
    const OSF1 = Group::UNIX;
    const QNX = Group::QNX;
    const RELIANTUNIXY = Group::UNIX;
    const SCOSV = Group::UNIX;
    const SINIXY = Group::UNIX;
    const SN5176 = Group::UNIX;
    const SOLARIS = Group::SUN_OS;
    const SUNOS = Group::SUN_OS;
    const ULTRIX = Group::UNIX;
    const UNIXWARE = Group::UNIX;
    const UWIN = Group::WINDOWS;
    const UWINW7 = Group::WINDOWS;
    const WIN32 = Group::WINDOWS;
    const WINDOWS = Group::WINDOWS;
    const WINNT = Group::WINDOWS;
    const ZOS = Group::ZOS;
}
