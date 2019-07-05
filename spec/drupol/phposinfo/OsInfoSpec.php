<?php

declare(strict_types = 1);

namespace spec\drupol\phposinfo;

use drupol\phposinfo\Enum\Family;
use drupol\phposinfo\OsInfo;
use PhpSpec\ObjectBehavior;

class OsInfoSpec extends ObjectBehavior
{
    public function it_can_detect_the_os()
    {
        if (OsInfo::isUnix()) {
            $this::isFamily(Family::LINUX)
                ->shouldReturn(true);

            $this::isOsName('Linux')
                ->shouldReturn(true);

            $this::isFamilyName('Linux')
                ->shouldReturn(true);
        }

        if (OsInfo::isWindows()) {
            $this::isFamily(Family::WINDOWS)
                ->shouldReturn(true);

            $this::isOsName('Windows')
                ->shouldReturn(true);

            $this::isFamilyName('Windows')
                ->shouldReturn(true);
        }

        if (OsInfo::isApple()) {
            $this::isFamily(Family::DARWIN)
                ->shouldReturn(true);
        }
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(OsInfo::class);
    }
}
