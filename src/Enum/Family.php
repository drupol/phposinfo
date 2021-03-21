<?php

declare(strict_types=1);

namespace drupol\phposinfo\Enum;

final class Family extends Enum
{
    public const BSD = 0x0003;

    public const DARWIN = 0x0004;

    public const LINUX = 0x0005;

    public const UNIX_ON_WINDOWS = 0x0006;

    public const UNKNOWN = 0x0001;

    public const WINDOWS = 0x0002;
}
