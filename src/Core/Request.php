<?php

namespace Core;


class Request
{
    /**
     * @param null | $key
     * @return mixed
     */
    function get($key = null)
    {
        if($key) {
            return $_GET[$key];
        } else {
            return $_GET;
        }
    }

    /**
     * @param null | $key
     * @return mixed
     */
    function post($key = null)
    {
        if($key) {
            return $_POST[$key];
        } else {
            return $_POST;
        }
    }

    /**
     * @param null | $key
     * @return mixed
     */
    function request($key = null)
    {
        if($key) {
            return $_REQUEST[$key];
        } else {
            return $_REQUEST;
        }
    }
}