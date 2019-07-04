[![Latest Stable Version](https://img.shields.io/packagist/v/drupol/phposinfo.svg?style=flat-square)](https://packagist.org/packages/drupol/phposinfo)
 [![GitHub stars](https://img.shields.io/github/stars/drupol/phposinfo.svg?style=flat-square)](https://packagist.org/packages/drupol/phposinfo)
 [![Total Downloads](https://img.shields.io/packagist/dt/drupol/phposinfo.svg?style=flat-square)](https://packagist.org/packages/drupol/phposinfo)
 [![Build Status](https://img.shields.io/travis/drupol/phposinfo/master.svg?style=flat-square)](https://travis-ci.org/drupol/phposinfo)
 [![Build Status](https://img.shields.io/appveyor/ci/drupol/valuewrapper.svg?style=flat-square)](https://ci.appveyor.com/project/drupol/phposinfo)
 [![Scrutinizer code quality](https://img.shields.io/scrutinizer/quality/g/drupol/phposinfo/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/drupol/phposinfo/?branch=master)
 [![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/drupol/phposinfo/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/drupol/phposinfo/?branch=master)
 [![Mutation testing badge](https://badge.stryker-mutator.io/github.com/drupol/phposinfo/master)](https://stryker-mutator.github.io)
 [![License](https://img.shields.io/packagist/l/drupol/phposinfo.svg?style=flat-square)](https://packagist.org/packages/drupol/phposinfo)

# OS phposinfo

## Description

Allows you to launch a file or a resource with the your default OS application.

## Requirements

* PHP >= 7.1

## Installation

```composer require drupol/phposinfo```

## Usage

```php
<?php

declare(strict_types = 1);

include 'vendor/autoload.php';

use drupol\phposinfo\phposinfo;

// Open the default browser.
phposinfo::open('https://github.com/drupol/phposinfo');

// Open the default file manager.
phposinfo::open('/tmp');

// Open the default file manager.
phposinfo::open('C:\Windows');

// The parameter $resource is variadic.

// Open multiple resources.
phposinfo::open('https://google.com', 'https://github.com');
```

## Code quality, tests and benchmarks

Every time changes are introduced into the library, [Travis CI](https://travis-ci.org/drupol/phposinfo/builds) run the tests and the benchmarks.

The library has tests written with [PHPSpec](http://www.phpspec.net/).
Feel free to check them out in the `spec` directory. Run `composer phpspec` to trigger the tests.

Before each commit some inspections are executed with [GrumPHP](https://github.com/phpro/grumphp), run `./vendor/bin/grumphp run` to check manually.

[PHPBench](https://github.com/phpbench/phpbench) is used to benchmark the library, to run the benchmarks: `composer bench`

[PHPInfection](https://github.com/infection/infection) is used to ensure that your code is properly tested, run `composer infection` to test your code.

## Contributing

Feel free to contribute to this library by sending Github pull requests. I'm quite reactive :-)
