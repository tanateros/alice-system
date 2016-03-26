<?php

namespace Module\MainPage\Controller;

use Core\Response as Response;
use Core\ViewTemplate as ViewTemplate;

/**
 * Class MainPage
 * @package MainPage\Controller
 */
class MainPage {
    /**
     * @return Response
     */
    function index()
    {
        $data = array('hello' => 'Hi, guys! This basic simple example', 'title' => 'Home page');
        $view = new ViewTemplate('..\Module\MainPage\View\home');
        return new Response($view, $data);
    }
}