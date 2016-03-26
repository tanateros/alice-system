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
     * @param string $view
     * @param array $data
     */
    function show($view, $data = [])
    {
        $config = Application::$config;

        $pathTwigTemplate = explode(DIRECTORY_SEPARATOR, __DIR__ . DIRECTORY_SEPARATOR . (isset($this->view) ? $this->view : $view));
        $templateFile = $pathTwigTemplate[count($pathTwigTemplate) - 1];
        unset($pathTwigTemplate[count($pathTwigTemplate) - 1]);
        $pathTwigTemplate = implode(DIRECTORY_SEPARATOR, $pathTwigTemplate);

        $loader = new \Twig_Loader_Filesystem(array($config['pathViews'], $pathTwigTemplate));
        $twig = new \Twig_Environment($loader, array('debug' => true));

        $data['app']['session'] = $_SESSION;
        $data['app']['get'] = $_GET;
        $data['app']['post'] = $_POST;
        $data['app']['request'] = $_REQUEST;
        $data['app']['server'] = $_SERVER;

        echo $twig->render('header' . $config['viewSuffix'], $data);
        echo $twig->render($templateFile . $config['viewSuffix'], $data);
        echo $twig->render('footer' . $config['viewSuffix'], $data);
    }
}