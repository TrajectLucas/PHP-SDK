<?php
/**
 * Created by PhpStorm.
 * User: lukasz
 * Date: 09.10.18
 * Time: 19:02
 */

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
    public function getRawData();

    /**
     * @return int
     */
    public function getCode();

    /**
     * @return bool
     */
    public function isSuccess();

    /**
     * @return string
     */
    public function getMessage();

    /**
     * @param string $key
     *
     * @return mixed
     */
    public function has($key);

    /**
     * @param string $key
     *
     * @return mixed|null
     */
    public function get($key);
}
