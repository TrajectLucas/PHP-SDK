<?php
/**
 * Created by PhpStorm.
 * User: lukasz
 * Date: 09.10.18
 * Time: 18:53
 */

require_once __DIR__ . '/vendor/autoload.php';

use GatherUp\SDK\Client;
use GatherUp\SDK\Credentials;
use GatherUp\SDK\Request;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\GuzzleException;

$client = new Client(
    new Credentials(
        'rgrg4g34h4h43h4h',
        'ewfewgewgg23g23tg23t'
    ),
    new HttpClient()
);

try {
    $response = $client->request(
        new Request('/test')
    );

    print_r($response->getRawData());
} catch (GuzzleException $e) {
}
