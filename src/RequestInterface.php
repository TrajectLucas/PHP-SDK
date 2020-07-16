<?php

namespace GatherUp\SDK;

/**
 * Interface Request
 *
 * @package GatherUp\SDK
 */
interface RequestInterface
{
    /**
     * @return string
     */
    public function getEndpoint(): string;

    /**
     * @return array
     */
    public function getData(): array;
}
