<?php

namespace GetFiveStars\Api;

class AuthToken {

    protected $clientId;
    protected $privateKey;

    /**
     * Init auth
     * 
     * @param string $clientId
     * @param string $privateKey
     */
    function __construct($clientId, $privateKey) {
        $this->clientId = $clientId;
        $this->privateKey = $privateKey;
    }

    /**
     * Sign request with private key
     * 
     * @param Request request
     */
    function signRequest(Request $request) {
        $request->set('clientId', $this->clientId);

        $params = $request->getParameters();
        ksort($params);

        $token = $this->privateKey;
        foreach ($params as $key => $value) {
            $token .= $key . $value;
        }

        $request->set('hash', hash('sha256', $token));
    }

}
