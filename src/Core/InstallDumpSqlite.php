<?php

namespace Core;


class InstallDumpSqlite
{
    public $db;
    static $instance;

    private function __construct()
    {
        require __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "config.php";
        $this->db = new \PDO('sqlite:' . $config['db']['path']);

        foreach($config['module'] as $module) {
            $file = __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "Module" . DIRECTORY_SEPARATOR . $module . DIRECTORY_SEPARATOR . 'dump.sql';
            $this->db->exec(file_get_contents($file));
        }
    }

    private function __clone()
    {
    }

    public static function getInstance()
    {
        if (!(self::$instance instanceof self)) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}