<?php

namespace GatherUp\SDK;

use InvalidArgumentException;
use function GuzzleHttp\json_decode;

/**
 * Class Response
 *
 * @package GatherUp\SDK
 */
class Response implements ResponseInterface
{
    /**
     * @var array
     */
    protected $data;

    /**
     * Response constructor.
     *
     * @param string $content
     *
     * @throws InvalidArgumentException
     */
    public function __construct($content)
    {
        $this->data = json_decode($content, true);
    }

    /**
     * @return array
     */
    public function getRawData(): array
    {
        return $this->data;
    }

    /**
     * @return int
     */
    public function getCode(): int
    {
        if (isset($this->data['errorCode'])) {
            return intval($this->data['errorCode']);
        }

        return -1;
    }

    /**
     * @return bool
     */
    public function isSuccess(): bool
    {
        return $this->getCode() === 0;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        if (isset($this->data['errorMessage'])) {
            return $this->data['errorMessage'];
        }

        return 'Unknown';
    }

    /**
     * @param string $key
     *
     * @return bool
     */
    public function has(string $key): bool
    {
        return isset($this->data[$key]);
    }

    /**
     * @param string $key
     *
     * @return mixed|null
     */
    public function get(string $key)
    {
        if ($this->has($key)) {
            return $this->data[$key];
        }

        return null;
    }
}
