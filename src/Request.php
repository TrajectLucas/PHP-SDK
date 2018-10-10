<?php
/**
 * Created by PhpStorm.
 * User: lukasz
 * Date: 09.10.18
 * Time: 18:55
 */

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
    public function __construct($endpoint, array $data = [])
    {
        $this->endpoint = $endpoint;
        $this->data     = $data;
    }

    /**
     * @return string
     */
    public function getEndpoint()
    {
        return $this->endpoint;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }
}
