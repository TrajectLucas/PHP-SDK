<?php
/**
 * Created by PhpStorm.
 * User: lukasz
 * Date: 09.10.18
 * Time: 18:33
 */

namespace GatherUp\SDK;

use GuzzleHttp\ClientInterface as HttpClientInterface;
use GuzzleHttp\RequestOptions;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Class Client
 *
 * @package GatherUp\SDK
 */
class Client implements ClientInterface
{
    /**
     * @var Credentials
     */
    protected $credentials;

    /**
     * @var HttpClientInterface
     */
    protected $client;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var bool
     */
    protected $aggregate;

    /**
     * Client constructor.
     *
     * @param CredentialsInterface $credentials
     * @param HttpClientInterface  $client
     * @param bool                 $aggregate
     * @param string               $url
     */
    public function __construct(
        CredentialsInterface $credentials,
        HttpClientInterface $client,
        $aggregate = true,
        $url = 'https://app.gatherup.com/api'
    ) {
        $this->credentials = $credentials;
        $this->client      = $client;
        $this->aggregate   = $aggregate;
        $this->url         = $url;
    }

    /**
     * @param RequestInterface $request
     *
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function request(RequestInterface $request)
    {
        try {
            $data = $request->getData();
            if ($this->aggregate) {
                $data['aggregateResponse'] = 1;
            }

            $response = $this->client->request(
                'POST',
                $this->url . $request->getEndpoint(),
                [
                    RequestOptions::JSON    => $data,
                    RequestOptions::HEADERS => [
                        'Authorization' => 'Bearer '
                            . $this->credentials->getClientId()
                            . '_'
                            . $this->credentials->getBearer(),
                    ],
                ]
            )->getBody()->getContents();
        } catch (\Exception $e) {
            $response = '';
        }

        return new Response($response);
    }
}
