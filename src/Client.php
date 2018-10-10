<?php
/**
 * Created by PhpStorm.
 * User: lukasz
 * Date: 09.10.18
 * Time: 18:33
 */

namespace GatherUp\SDK;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\RequestOptions;

/**
 * Class Client
 *
 * @package GatherUp\SDK
 */
class Client
{
    /**
     * @var Credentials
     */
    protected $credentials;

    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var string
     */
    protected $url;

    /**
     * Client constructor.
     *
     * @param CredentialsInterface $credentials
     * @param ClientInterface      $client
     * @param string               $url
     */
    function __construct(
        CredentialsInterface $credentials,
        ClientInterface $client,
        $url = 'https://app.gatherup.com/api'
    ) {
        $this->credentials = $credentials;
        $this->client      = $client;
        $this->url         = $url;
    }

    /**
     * @param RequestInterface $request
     *
     * @return ResponseInterface
     */
    public function request(RequestInterface $request)
    {
        try {
            $response = $this->client->request(
                'POST',
                $this->url . $request->getEndpoint(),
                [
                    RequestOptions::JSON => $request->getData(),
                ]
            )->getBody()->getContents();
        } catch (\Exception $e) {
            $response = '';
        }

        return new Response($response);
    }

}
