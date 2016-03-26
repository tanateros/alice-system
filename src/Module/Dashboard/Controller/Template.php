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

        $pathTwigTemplate = explode(DIRECTORY_SEPARATOR, __DIR__ . DIRECTORY_SEPARATOR . (isset($this->view) ? $this->view : $view));
        $templateFile = $pathTwigTemplate[count($pathTwigTemplate) - 1];
        unset($pathTwigTemplate[count($pathTwigTemplate) - 1]);
        $pathTwigTemplate = implode(DIRECTORY_SEPARATOR, $pathTwigTemplate);

        $loader = new \Twig_Loader_Filesystem(array(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'View' . DIRECTORY_SEPARATOR, $pathTwigTemplate));
        $twig = new \Twig_Environment($loader, array('debug' => true));

        $data['app']['session'] = $_SESSION;
        echo $twig->render('header' . $config['viewSuffix'], $data);
        echo $twig->render($templateFile . $config['viewSuffix'], $data);
        echo $twig->render('footer' . $config['viewSuffix'], $data);
    }
}