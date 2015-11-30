<?php

require_once(__DIR__ . '/autoloader.php');

use GetFiveStars\Api\JsonRequest;
use GetFiveStars\Api\AuthToken;
use GetFiveStars\Api\CurlClient;

$clientId = 'f0f0f0f0f0f0f00f0f0f0f00f0f0f0';
$privateKey = 'f0f0f0f0f0f00ff0f0f0f00f0f0f0f0f0f0f0f0f00f0f0f0f0ff0f00f0f';

// create new auth token
$auth = new AuthToken($clientId, $privateKey);

// create new request
$request = new JsonRequest('/feedbacks/get', '{
   "from":"2013-01-23",
   "page":"1",
   "to":"2015-01-23"
}');

// sign request
$auth->signRequest($request);

// send request
$client = new CurlClient($request);
$response = $client->sendRequest();

// handle response
if ($response->getStatus()) {
    print_r($response->getResponse());
} else {
    echo $response->getErrorCode() . ' ' . $response->getErrorMessage() . "\n";
}