<?php

namespace Core;

/**
 * Interface ViewInterface
 * @package Core
 */
interface ViewInterface {
    /**
     * @param $view
     * @param array $data
     * @return mixed
     */
    function show($view, $data = []);
}