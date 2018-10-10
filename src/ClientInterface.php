<?php
/**
 * Created by PhpStorm.
 * User: lukasz
 * Date: 10.10.18
 * Time: 20:37
 */

namespace GatherUp\SDK;

/**
 * Interface ClientInterface
 *
 * @package GatherUp\SDK
 */
interface ClientInterface
{
    /**
     * @param RequestInterface $request
     *
     * @return ResponseInterface
     */
    public function request(RequestInterface $request);
}
