<?php

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
    public function request(RequestInterface $request): ResponseInterface;
}
