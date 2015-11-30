<?php

namespace GetFiveStars\Api;

class Request {

    /**
     * Request container
     * 
     * @var array[string]
     */
    protected $request;

    /**
     * Action
     * 
     * @var string
     */
    protected $action;
    
    /**
     * Init request
     * 
     * @param array[string] $request
     */
    function __construct($action, $request = array()) {
        $this->request = $request;
        $this->action = $action;
    }

    /**
     * Set request parameter
     * 
     * @param string $name
     * @param mixed $value
     */
    function set($name, $value) {
        $this->request[$name] = $value;
    }

    /**
     * Get request parameter
     * @param string $name
     */
    function get($name) {
        if (isset($this->request[$name])) {
            return $this->request[$name];
        }
        return null;
    }

    /**
     * Get request parameters
     * 
     * @return array[string]
     */
    function getParameters() {
        return $this->request;
    }
    
    /**
     * Get action
     * 
     * @return string
     */
    function getAction() {
        return $this->action;
    }

}
