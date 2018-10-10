<?php
/**
 * Created by PhpStorm.
 * User: lukasz
 * Date: 09.10.18
 * Time: 17:25
 */

namespace GatherUp\Tests\SDK;

use GatherUp\SDK\Authenticator;
use GatherUp\SDK\Credentials;
use PHPUnit\Framework\TestCase;

/**
 * Class CredentialsTest
 *
 * @package GatherUp\Tests\SDK
 */
class CredentialsTest extends TestCase
{
    function test()
    {
        $bearer   = '123';
        $clientId = 'abc';

        $auth = new Credentials($clientId, $bearer);
        $this->assertEquals($clientId, $auth->getClientId());
        $this->assertEquals($bearer, $auth->getBearer());
        $header = $auth->getBearerHeader();
        $this->assertEquals(
            'bearer ' . $clientId . '_' . $bearer,
            strtolower($header['Authorization'])
        );
    }
}
