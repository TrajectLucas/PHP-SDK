<?php

namespace GetFiveStars\Api;

class CurlClient extends Client {

    /**
     * Init client
     * 
     * @param Request
     */
    function __construct(Request $request) {
        parent::__construct($request);
    }

    /**
     * Send request
     * 
     * @param $timeout Timeout in seconds 
     * 
     * @return Response
     */
    function sendRequest($timeout = 30) {
        $action = $this->request->getAction();
        $params = $this->request->getParameters();

        $response = $this->doJsonPost($timeout, $action, $params);

        return new Response(json_decode($response, true));
    }

    /**
     * JSON POST HTTP request
     * 
     * @param integer $timeout
     * @param string $resource
     * @param array[string] $request
     * 
     * @return string JSON response
     */
    protected function doJsonPost($timeout, $resource, $request) {
        $ch = curl_init(self::URL . $resource);

        curl_setopt_array($ch, array(
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => $timeout,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
            CURLOPT_POSTFIELDS => json_encode($request)
        ));

        return curl_exec($ch);
    }

}
