<?php

header("Content-Type: text/html; charset=utf8");

require 'autoloader.php';
require 'config.php';

if (file_exists('install.php')) {
    if ($_GET['route'] == 'delete_install_file') {
        unlink('install.php');
        header("Refresh: 1; /");
    } else {
        header("Location: /install.php");
    }
}

/*

// install.php
<?php

header("Content-Type: text/html; charset=utf8");

require 'autoloader.php';
require 'config.php';
try {
    header("Refresh: 5; /delete_install_file");
    \Core\InstallDumpSqlite::getInstance();
    echo 'Установка прошла успешно. Вы будете переведены на главную страницу через 5 секунд.';
} catch (Exception $e) {
    echo 'Ошибка установки: ' . $e;
}

*/
