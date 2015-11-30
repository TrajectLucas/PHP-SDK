<?php

namespace GetFiveStars\Api;

class JsonRequest extends Request {

    /**
     * Init request
     * 
     * @param string $action
     * @param string $json
     */
    function __construct($action, $json) {
        parent::__construct($action, json_decode($json, true));
    }

}
