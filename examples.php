<?php

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
