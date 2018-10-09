<?php

namespace GatherUp\SDK;

/**
 * Class Authenticator
 *
 * @package GatherUp\SDK
 */
class Authenticator
{
    /**
     * @var string
     */
    protected $clientId;

    /**
     * @var string
     */
    protected $bearer;

    /**
     * AuthToken constructor.
     *
     * @param string $clientId
     * @param string $bearer
     */
    function __construct($clientId, $bearer)
    {
        $this->clientId = $clientId;
        $this->bearer   = $bearer;
    }

    /**
     * @return string
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * @return string
     */
    public function getBearer()
    {
        return $this->bearer;
    }
}
