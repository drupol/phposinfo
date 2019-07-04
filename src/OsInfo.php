<?php

namespace drupol\phposinfo;

/**
 * Class OsInfo.
 */
final class OsInfo implements OsInfoInterface
{
    /**
     * {@inheritdoc}
     */
    public static function arch()
    {
        return \php_uname('m');
    }

    /**
     * {@inheritdoc}
     */
    public static function family()
    {
        $infos = self::detect();

        return $infos['family'];
    }

    /**
     * {@inheritdoc}
     */
    public static function hostname()
    {
        return \php_uname('n');
    }

    /**
     * {@inheritdoc}
     */
    public static function isApple()
    {
        return self::isOs(self::MACOSX);
    }

    /**
     * {@inheritdoc}
     */
    public static function isBSD()
    {
        return self::isFamily(self::BSD);
    }

    /**
     * {@inheritdoc}
     */
    public static function isFamily($family)
    {
        $infos = self::detect();

        return $family === $infos['family'];
    }

    /**
     * {@inheritdoc}
     */
    public static function isOs($os)
    {
        $infos = self::detect();

        return $os === $infos['os'];
    }

    /**
     * {@inheritdoc}
     */
    public static function isUnix()
    {
        return self::isFamily(self::UNIX_FAMILY);
    }

    /**
     * {@inheritdoc}
     */
    public static function isWindows()
    {
        return self::isFamily(self::WINDOWS_FAMILY);
    }

    /**
     * {@inheritdoc}
     */
    public static function os()
    {
        $infos = self::detect();

        return $infos['os'];
    }

    /**
     * {@inheritdoc}
     */
    public static function release()
    {
        return \php_uname('r');
    }

    /**
     * {@inheritdoc}
     */
    public static function version()
    {
        return \php_uname('v');
    }

    /**
     * {@inheritdoc}
     */
    private static function detect($os = null)
    {
        // We do not use PHP_OS because it can return wrong information.
        $name = $os === null ? \php_uname('s') : $os;

        $name = \strtoupper($name);

        if ('\\' === \DIRECTORY_SEPARATOR) {
            $name = 'WINDOWS';
        }

        if (false !== \stripos($name, 'CYGWIN')) {
            $name = 'CYGWIN';
        }

        if (false !== \stripos($name, 'MSYS') || false !== \stripos($name, 'MINGW')) {
            $name = 'MINGW';
        }

        switch ($name) {
            case 'WINDOWS':
            case 'WINNT':
            case 'WIN32':
            case 'INTERIX':
            case 'UWIN':
            case 'UWIN-W7':
                $family = self::WINDOWS_FAMILY;
                $osConst = self::WINDOWS;

                break;

            case 'CYGWIN':
            case 'CYGWIN_NT-5.1':
            case 'CYGWIN_NT-6.1':
            case 'CYGWIN_NT-6.1-WOW64':
                $family = self::UNIX_ON_WINDOWS_FAMILY;
                $osConst = self::CYGWIN;

                break;

            case 'MINGW':
            case 'MINGW32_NT-6.1':
            case 'MSYS_NT-6.1':
                $family = self::UNIX_ON_WINDOWS_FAMILY;
                $osConst = self::MSYS;

                break;

            case 'DARWIN':
                $family = self::UNIX_FAMILY;
                $osConst = self::MACOSX;

                break;

            case 'LINUX':
            case 'GNU':
            case 'GNU/LINUX':
                $family = self::UNIX_FAMILY;
                $osConst = self::LINUX;

                break;
            //HP UNIX systems
            case 'AIX':
                $family = self::UNIX_FAMILY;
                $osConst = self::AIX;

                break;

            case 'OS390':
            case 'OS/390':
            case 'OS400':
            case 'OS/400':
            case 'ZOS':
            case 'Z/OS':
                $family = self::UNIX_FAMILY;
                $osConst = self::ZOS;

                break;

            case 'HP-UX':
                $family = self::UNIX_FAMILY;
                $osConst = self::HP_UX;

                break;
            // SUN's UNIX systems
            case 'SOLARIS':
            case 'SUNOS':
                $family = self::UNIX_FAMILY;
                $osConst = self::SUN_OS;

                break;
            // UNIX BSD Systems
            case 'DRAGONFLY':
            case 'OPENBSD':
            case 'FREEBSD':
            case 'NETBSD':
            case 'GNU/KFREEBSD':
            case 'GNU/FREEBSD':
            case 'DEBIAN/FREEBSD':
                $family = self::UNIX_FAMILY;
                $osConst = self::BSD;

                break;
            //Other UNIX systems
            case 'MINIX':
            case 'IRIX':
            case 'IRIX64':
            case 'OSF1':
            case 'SCO_SV':
            case 'ULTRIX':
            case 'RELIANTUNIX-Y':
            case 'SINIX-Y':
            case 'UNIXWARE':
            case 'SN5176':
            case 'K-OS':
            case 'KOS':
                $family = self::UNIX_FAMILY;
                $osConst = self::GEN_UNIX;

                break;
            //Blackberry's Unix System
            case 'QNX':
                $family = self::UNIX_FAMILY;
                $osConst = self::QNX;

                break;
            // HAIKU
            case 'BEOS':
            case 'BE_OS':
            case 'HAIKU':
                $family = self::OTHER_FAMILY;
                $osConst = self::BE_OS;

                break;
            // NONSTOP
            case 'NONSTOP KERNEL':
            case 'NONSTOP':
                $family = self::OTHER_FAMILY;
                $osConst = self::NONSTOP;

                break;
            default:
                $family = 0;
                $osConst = 0;
        }

        if (0 === $family + $osConst) {
            list($osConst, $family) = self::detect(PHP_OS);
        }

        return array(
            'os' => $osConst,
            'family' => $family,
        );
    }
}
