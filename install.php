<?php

header("Content-Type: text/html; charset=utf8");

require 'autoloader.php';
require 'config.php';
try {
    header("Refresh: 5; /");
    \Core\InstallDumpSqlite::getInstance();
    echo 'Установка прошла успешно. Вы будете переведены на главную страницу через 5 секунд.';
} catch (Exception $e) {
    echo 'Ошибка установки: ' . $e;
}
