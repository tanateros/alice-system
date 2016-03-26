<?php

namespace Core;

/**
 * Class ViewTemplate
 * @package Core
 */
class ViewTemplate implements ViewInterface
{
    public $view;

    function __construct ($view) {
        $this->view = $view;
    }
    /**
     * @param $view
     * @param array | null $data
     */
    function show($view, $data = [])
    {
        $config = Application::$config;
        require $config['pathViews'] . 'header' . $config['viewSufix'];
        require $config['pathViews'] . (isset($this->view) ? $this->view : $view) . $config['viewSufix'];
        require $config['pathViews'] . 'footer' . $config['viewSufix'];
    }
}