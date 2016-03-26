<?php

namespace Core;

/**
 * Class Application
 * @package Core
 *
 * @author Tanateros
 */
class Application {
    /**
     * @var array $config
     */
    static public $config;

    function __construct($config){
        Session::start();
        self::$config = $config;
    }

    /**
     * @return mixed
     */
    function handle(){
        $route = substr($_SERVER['QUERY_STRING'], 6);
        if(!$route) $route = 'default';
        $routes = self::$config['routes'];

        $ns = self::$config['routes'][$route];

        if(!$ns) {
            foreach ($routes as $r=>$link) {
                if(($pos = strpos($route, $r)) !== false) {
                    $ns = self::$config['routes'][$r];
                }
            }
        }
        if($ns) {
            return (new $ns['controller']())->$ns['method']();
        } else {
            header("HTTP/1.0 404 Not Found");
            header("Status: 404 Not Found");
            echo 'Error 404';
            exit;
        }
    }
}
