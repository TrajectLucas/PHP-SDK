<?php
/**
 * Created by PhpStorm.
 * User: lukasz
 * Date: 09.10.18
 * Time: 19:02
 */

namespace GatherUp\SDK;

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
     */
    public function __construct($content)
    {
        $this->data = \GuzzleHttp\json_decode($content, true);
    }

    /**
     * @return array
     */
    public function getRawData()
    {
        return $this->data;
    }

    /**
     * @return int
     */
    public function getCode()
    {
        if (isset($this->data['errorCode'])) {
            return intval($this->data['errorCode']);
        }

        return -1;
    }

    /**
     * @return bool
     */
    public function isSuccess()
    {
        return $this->getCode() === 0;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        if (isset($this->data['errorMessage'])) {
            return $this->data['errorMessage'];
        }

        return 'Unknown';
    }

    /**
     * @param string $key
     *
     * @return mixed
     */
    public function has($key)
    {
        return isset($this->data[$key]);
    }

    /**
     * @param string $key
     *
     * @return mixed|null
     */
    public function get($key)
    {
        if ($this->has($key)) {
            return $this->data[$key];
        }

        return null;
    }
}
