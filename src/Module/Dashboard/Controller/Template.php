<?php

namespace Module\Dashboard\Controller;

use Core\ViewInterface;
use Core\Application;
use Core\Response as Response;

/**
 * Class Template
 * @package Module\Dashboard\Controller
 */
class Template implements ViewInterface
{

    /**
     * @param string $view
     * @param array | null $data
     */
    function show($view, $data = [])
    {
        $config = Application::$config;
        require __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'View' . DIRECTORY_SEPARATOR . 'header' . $config['viewSufix'];
        require __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'View' . DIRECTORY_SEPARATOR . $view . $config['viewSufix'];
        require __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'View' . DIRECTORY_SEPARATOR . 'footer' . $config['viewSufix'];
    }
}