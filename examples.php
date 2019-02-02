<?php

use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;
use VictorAvelar\Fixer\Endpoints\CurrencySupportEndpoint;
use VictorAvelar\Fixer\Endpoints\LatestRatesEndpoint;
use VictorAvelar\Fixer\FixerHttpClient;

require 'vendor/autoload.php';

// Get all supported symbols
$client = new FixerHttpClient('YOUR_KEY_HERE');

$endpoint = new CurrencySupportEndpoint($client);

try {
    $results = $endpoint->execute();
} catch (GuzzleException $e) {
    echo $e->getMessage();
}

echo PHP_EOL;

/** @var ResponseInterface $results */
print_r($results->getBody()->getContents());

// Get the latest exchange rates
$endpoint = new LatestRatesEndpoint($client);

try {
    $latest = $endpoint->execute();
} catch (GuzzleException $e) {
    echo $e->getMessage();
}

print_r($latest->getBody()->getContents());
