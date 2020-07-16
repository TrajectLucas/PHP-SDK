<?php

namespace GatherUp\SDK;

use InvalidArgumentException;
use function GuzzleHttp\json_decode;

/**
 * Class JsonRequest
 *
 * @package GatherUp\SDK
 */
class JsonRequest extends Request
{
    /**
     * JsonRequest constructor.
     *
     * @param string $endpoint
     * @param string $data
     *
     * @throws InvalidArgumentException
     */
    public function __construct($endpoint, $data)
    {
        parent::__construct($endpoint, json_decode($data, true));
    }
}
