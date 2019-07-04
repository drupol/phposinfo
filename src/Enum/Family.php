<?php

declare(strict_types = 1);

namespace drupol\phposinfo\Enum;

/**
 * Class Family.
 */
final class Family extends Enum
{
    const OTHER = 1;
    const UNIX = 2;
    const UNIX_ON_WINDOWS = 8;
    const WINDOWS = 4;
}
