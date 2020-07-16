<?php

namespace GatherUp\SDK;

/**
 * Interface CredentialsInterface
 *
 * @package GatherUp\SDK
 */
interface CredentialsInterface
{
    /**
     * @return string
     */
    public function getClientId(): string;

    /**
     * @return string
     */
    public function getBearer(): string;

    /**
     * @return array
     */
    public function getBearerHeader(): array;
}
