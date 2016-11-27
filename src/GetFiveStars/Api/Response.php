<?php

namespace GetFiveStars\Api;

class Response {

    /**
     * Response container
     * 
     * @var array[string]
     */
    protected $response;

    /**
     * Error code
     * 
     * @var integer
     */
    protected $errorCode;

    /**
     * Error message
     * 
     * @var string 
     */
    protected $errorMessage;

    /**
     * Init response
     * 
     * @param array[string] $response
     */
    function __construct($response = array()) {
        if (!is_array($response) || !isset($response['errorCode']) || !isset($response['errorMessage'])) {
            $response = array();
            $response['errorCode'] = -1;
            $response['errorMessage'] = 'Unknown error';
        }

        $this->errorCode = intval($response['errorCode']);
        $this->errorMessage = $response['errorMessage'];

        unset($response['errorCode']);
        unset($response['errorMessage']);

        $this->response = $response;
    }

    /**
     * Get response status
     * 
     * @return boolean
     */
    function getStatus() {
        return $this->getErrorCode() === 0;
    }

    /**
     * Get error code
     * 
     * @return integer
     */
    function getErrorCode() {
        return $this->errorCode;
    }

    /**
     * Get error message
     * 
     * @return string
     */
    function getErrorMessage() {
        return $this->errorMessage;
    }

    /**
     * Get response
     * 
     * return array[string]
     */
    function getResponse() {
        return $this->response;
    }

    /**
     * Get response value
     * 
     * @param string $name
     * 
     * @return string
     */
    function get($name) {
        if (isset($this->response[$name])) {
            return $this->response[$name];
        }

        return null;
    }

}
