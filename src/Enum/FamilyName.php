<?php

declare(strict_types = 1);

namespace drupol\phposinfo\Enum;

/**
 * Class FamilyName.
 */
final class FamilyName extends Enum
{
    const BSD = 'BSD';
    const DARWIN = 'Darwin';
    const LINUX = 'Linux';
    const UNIX_ON_WINDOWS = 'Unix on Windows';
    const UNKNOWN = 'Unknown';
    const WINDOWS = 'Windows';
}
