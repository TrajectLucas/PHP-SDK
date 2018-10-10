<?php
/**
 * Created by PhpStorm.
 * User: lukasz
 * Date: 09.10.18
 * Time: 18:38
 */

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
    public function getEndpoint();

    /**
     * @return array
     */
    public function getData();
}
