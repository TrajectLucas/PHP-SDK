<?php

namespace GatherUp\Tests\SDK;

use GatherUp\SDK\Credentials;
use PHPUnit\Framework\TestCase;

/**
 * Class CredentialsTest
 *
 * @package GatherUp\Tests\SDK
 */
class CredentialsTest extends TestCase
{
    public function test(): void
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
