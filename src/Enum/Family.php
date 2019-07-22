<?php

namespace drupol\phposinfo\Enum;

/**
 * Class Family.
 */
final class Family extends Enum
{
    const BSD = 0x0003;
    const DARWIN = 0x0004;
    const LINUX = 0x0005;
    const UNIX_ON_WINDOWS = 0x0006;
    const UNKNOWN = 0x0001;
    const WINDOWS = 0x0002;
}
