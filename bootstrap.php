<?php

// phpcs:ignoreFile

declare(strict_types = 1);

namespace drupol\phposinfo;

$family = OsInfo::family();
$os = OsInfo::os();

if (!\defined('PHP_OS_FAMILY')) {
    \define('PHP_OS_FAMILY', $family);
}

if (!\defined('PHP_OS')) {
    \define('PHP_OS', $os);
}

if (!\defined('PHPOSINFO_OS_FAMILY')) {
    \define('PHPOSINFO_OS_FAMILY', $family);
}

if (!\defined('PHPOSINFO_OS')) {
    \define('PHPOSINFO_OS', $os);
}
