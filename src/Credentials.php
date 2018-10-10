<?php
/**
 * Created by PhpStorm.
 * User: lukasz
 * Date: 09.10.18
 * Time: 18:45
 */

namespace GatherUp\SDK;

/**
 * Class Authenticator
 *
 * @package GatherUp\SDK
 */
class Credentials implements CredentialsInterface
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
    public function __construct($clientId, $bearer)
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

    /**
     * @return array
     */
    public function getBearerHeader()
    {
        return [
            'Authorization' =>
                'Bearer '
                . $this->getClientId()
                . '_'
                . $this->getBearer(),
        ];
    }
}
