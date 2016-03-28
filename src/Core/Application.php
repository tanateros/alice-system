<?php

namespace Core;

/**
 * Class Application
 * @package Core
 *
 * @author Tanateros
 * @todo Class for system core
 */
class Application
{
    /**
     * @var array $config
     */
    static public $config;
     /**
      * @var string
      * @todo default route
      */
     private $defaultRoute = 'default';

    /**
     * @param $config
     * @todo Constructor Application class. Starting session, initialization global config
     */
    function __construct($config)
    {
        Session::start();
        self::$config = $config;

        foreach ($config as $key => $value) {
            if (isset($this->{$key})) {
                $this->{$key} = $value;
            }
        }
    }

    /**
     * @return mixed
     * @todo handle method for working application
     */
    function handle()
    {
        $route = substr($_SERVER['QUERY_STRING'], 6);
        if (!$route) {
            $route = 'default';
        }

        $routes = isset(self::$config['routes']) ? self::$config['routes'] : array($route);
        $ns = $routes[$route];

        if (!$ns) {
            foreach ($routes as $r=>$link) {
                if(($pos = strpos($route, $r)) !== false) {
                    $ns = self::$config['routes'][$r];
                }
            }
        }
        if ($ns && class_exists($ns['controller'])) {
            return (new $ns['controller']())->$ns['method']();
        }
        header("HTTP/1.0 404 Not Found");
        header("Status: 404 Not Found");
        echo 'Error 404';
        exit;
    }
}
