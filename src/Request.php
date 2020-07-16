<?php

namespace GatherUp\SDK;

/**
 * Class Request
 *
 * @package GatherUp\SDK
 */
class Request implements RequestInterface
{
    /**
     * @var string $endpoint
     */
    protected $endpoint;

    /**
     * @var array $data
     */
    protected $data;

    /**
     * Request constructor.
     *
     * @param string $endpoint
     * @param array  $data
     */
    public function __construct(string $endpoint, array $data = [])
    {
        $this->endpoint = $endpoint;
        $this->data     = $data;
    }

    /**
     * @return string
     */
    public function getEndpoint(): string
    {
        return $this->endpoint;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }
}
