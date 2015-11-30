<?php

/**
 * Autoloader
 * 
 * @param string $classname
 */
function __autoload($classname) {
    $path = __DIR__ . '/src/' . str_replace('\\', '/', $classname) . '.php';
    if (file_exists($path)) {
        require_once($path);
    }
}
