<?php

namespace Core;

/**
 * Class Session
 * @package Core
 */
class Session
{
    function __construct()
    {
        @session_start();
    }

    static function start()
    {
        @session_start();
    }

    static function destroy()
    {
        @session_destroy();
    }

    /**
     * @param $key
     * @return mixed
     */
    function get($key)
    {
        return $_SESSION[$key];
    }

    /**
     * @param string $key
     * @param $value
     * @return $this
     */
    function set($key, $value)
    {
        $_SESSION[$key] = $value;
        return $this;
    }

    /**
     * @param $key
     * @return $this
     */
    function __unset($key)
    {
        unset($_SESSION[$key]);
        return $this;
    }
}