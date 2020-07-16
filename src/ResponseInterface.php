<?php

namespace GatherUp\SDK;

/**
 * Interface ResponseInterface
 *
 * @package GatherUp\SDK
 */
interface ResponseInterface
{
    /**
     * @return array
     */
    public function getRawData(): array;

    /**
     * @return int
     */
    public function getCode(): int;

    /**
     * @return bool
     */
    public function isSuccess(): bool;

    /**
     * @return string
     */
    public function getMessage(): string;

    /**
     * @param string $key
     *
     * @return bool
     */
    public function has(string $key): bool;

    /**
     * @param string $key
     *
     * @return mixed|null
     */
    public function get(string $key);
}
