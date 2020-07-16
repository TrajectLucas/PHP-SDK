<?php

require_once __DIR__ . '/vendor/autoload.php';

use GatherUp\SDK\Client;
use GatherUp\SDK\Credentials;
use GatherUp\SDK\Request;
use GuzzleHttp\Client as HttpClient;

$client = new Client(
    new Credentials(
        'rgrg4g34h4h43h4h',
        'ewfewgewgg23g23tg23t'
    ),
    new HttpClient()
);

$response = $client->request(
    new Request('/test')
);

print_r($response->getRawData());

