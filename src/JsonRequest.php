<?php
/**
 * Created by PhpStorm.
 * User: lukasz
 * Date: 09.10.18
 * Time: 18:55
 */

namespace GatherUp\SDK;

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
     * @throws \InvalidArgumentException
     */
    function __construct($endpoint, $data)
    {
        parent::__construct($endpoint, \GuzzleHttp\json_decode($data, true));
    }
}
