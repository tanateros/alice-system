<?php

namespace Core;

/**
 * Class Response
 * @package Core
 */
class Response
{
    private $view;
    private $data;

    /**
     * If construction on not $view then create response object and no write
     *
     * @param string $view
     * @param $data
     */
    function __construct($view = null, $data = null)
    {
        if (!$view) {
            return false;
        }
        $this->setData($data);
        $this->setView($view);
        $this->response($view);
    }

    /**
     * @param string $view
     * @return $this
     */
    function setView($view)
    {
        if ($view) {
            $this->view = $view;
        }
        return $this;
    }

    /**
     * @param mixed $data
     * @return $this
     */
    function setData($data)
    {
        if ($data) {
            $this->data = $data;
        }
        return $this;
    }

    /**
     * @param null | $template
     */
    function response(ViewInterface $template = null)
    {
        try {
            if(!$template) {
                http_response_code(200);
                echo (new ViewTemplate())->show($this->view, $this->data);
            } else {
                http_response_code(200);
                echo $template->show($this->view, $this->data);
            }
        } catch (\Exception $e) {
            echo "Error response: " . $e;
        }
        return $this;
    }

    /**
     * @param null | $text
     */
    static function text($text = null)
    {
        try {
            http_response_code(200);
            echo $text;
        } catch (\Exception $e) {
            echo "Error response: " . $e;
        }
    }

    function jsonData()
    {
        try {
            http_response_code(200);
            echo json_encode($this->data);
        } catch (\Exception $e) {
            echo json_encode(['error' => $e]);
        }
    }
}