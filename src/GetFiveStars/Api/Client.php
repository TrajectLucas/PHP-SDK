<?php

namespace GetFiveStars\Api;

abstract class Client {

    const URL = 'https://getfivestars.com/api';

    /**
     * Request
     * 
     * @var Request 
     */
    protected $request;

    /**
     * Init client
     * 
     * @param Request
     */
    function __construct(Request $request) {
        $this->request = $request;
    }

    /**
     * Send request
     * 
     * @return Response
     */
    abstract function sendRequest();
}
