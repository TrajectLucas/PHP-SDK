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
use GatherUp\SDK\JsonRequest;
use GuzzleHttp\Client as HttpClient;

$client   = new Client(new Credentials('abc', '123'), new HttpClient());
$response = $client->request(new JsonRequest('/test', '{}'));

echo $response->getBody()->getContents();
