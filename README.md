# fixer-exchange

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![StyleCI](https://github.styleci.io/repos/168179774/shield?branch=master)](https://github.styleci.io/repos/168179774)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

This package is an API wrapper to interact with [fixer.io](https://fixer.io) free tier service.

## Install

Via Composer

``` bash
$ composer require victoravelar/fixer-exchange
```

## Usage

For a test run you can execute the [Examples](examples.php) file.

**You will need to set up an API key, you can grab one for free at [fixer.io](https://fixer.io)**

```bash
$ php examples.php
```

``` php
<?php // example.php

use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;
use VictorAvelar\Fixer\FixerHttpClient;
use VictorAvelar\Fixer\Resources\CurrencySupportResource;
use VictorAvelar\Fixer\Resources\LatestRatesResource;

require 'vendor/autoload.php';

// Get all supported symbols
$client = new FixerHttpClient('YOUR_KEY_HERE');

$endpoint = new CurrencySupportResource($client);

try {
    $results = $endpoint->execute();
} catch (GuzzleException $e) {
    echo $e->getMessage();
}

echo PHP_EOL;

/** @var ResponseInterface $results */
print_r($results->getBody()->getContents());

// Get the latest exchange rates
$endpoint = new LatestRatesResource($client);

try {
    $latest = $endpoint->execute();
} catch (GuzzleException $e) {
    echo $e->getMessage();
}

print_r($latest->getBody()->getContents());

```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) and [CODE_OF_CONDUCT](.github/CODE_OF_CONDUCT.md) for details.

## TODO
- [ ] Implement Historical endpoint
- [ ] Implement Currency exchange service
- [ ] Implement converter to Fowler's money principle

## Security

If you discover any security related issues, please email deltatuts@gmail.com instead of using the issue tracker.

## Credits

- [Victor Hugo Avelar][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/VictorAvelar/fixer-exchange.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/VictorAvelar/fixer-exchange/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/VictorAvelar/fixer-exchange.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/VictorAvelar/fixer-exchange.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/VictorAvelar/fixer-exchange.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/VictorAvelar/fixer-exchange
[link-travis]: https://travis-ci.org/VictorAvelar/fixer-exchange
[link-scrutinizer]: https://scrutinizer-ci.com/g/VictorAvelar/fixer-exchange/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/VictorAvelar/fixer-exchange
[link-downloads]: https://packagist.org/packages/VictorAvelar/fixer-exchange
[link-author]: https://github.com/VictorAvelar
[link-contributors]: ../../contributors
