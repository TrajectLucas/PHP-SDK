<?php
/**
 * Created by PhpStorm.
 * User: lukasz
 * Date: 09.10.18
 * Time: 18:45
 */

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
    public function getClientId();

    /**
     * @return string
     */
    public function getBearer();

    /**
     * @return array
     */
    public function getBearerHeader();
}
