<?php

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
    public function __construct(string $clientId, string $bearer)
    {
        $this->clientId = $clientId;
        $this->bearer   = $bearer;
    }

    /**
     * @return string
     */
    public function getClientId(): string
    {
        return $this->clientId;
    }

    /**
     * @return string
     */
    public function getBearer(): string
    {
        return $this->bearer;
    }

    /**
     * @return array
     */
    public function getBearerHeader(): array
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
