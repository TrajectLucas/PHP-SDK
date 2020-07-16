<?php

namespace GatherUp\SDK;

use GuzzleHttp\ClientInterface as HttpClientInterface;
use GuzzleHttp\RequestOptions;
use Throwable;

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
        bool $aggregate = true,
        string $url = 'https://app.gatherup.com/api'
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
     */
    public function request(RequestInterface $request): ResponseInterface
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
        } catch (Throwable $e) {
            $response = '{}';
        }

        return new Response($response);
    }
}
