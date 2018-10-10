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
     * @var string
     */
    protected $content;

    /**
     * Response constructor.
     *
     * @param string $content
     */
    function __construct($content)
    {
        $this->content = $content;
    }
}
