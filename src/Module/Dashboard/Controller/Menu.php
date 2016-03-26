<?php

namespace Module\Dashboard\Controller;
use Core\Application;

/**
 * Class Menu
 * @package Module\Dashboard\Controller
 */
class Menu
{
    /**
     * @return array
     */
    static function getMenu()
    {
        $adminLink = Application::$config['adminLink'];
        $adminListMenu = Application::$config['adminMenu'];
        $menu = [];

        foreach ($adminListMenu as $m) {
            $menu[$m['title']] = '/' . $adminLink . $m['link'];
        }
        return $menu;
    }

    /**
     * @return string
     */
    static function getStringMenu()
    {
        $adminLink = Application::$config['adminLink'];
        $adminListMenu = Application::$config['adminMenu'];
        $str = '';

        foreach ($adminListMenu as $m) {
            $str = $str . '<li><a ';
            if ($adminLink . '/' . $m['link'] == substr($_SERVER['QUERY_STRING'], 6))
                $str = $str . 'class="active"';
            $str = $str . 'href="/' . $adminLink . $m['link'] . '">' . $m['title'] . '</a></li>';
        }
        return $str;
    }
}