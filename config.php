<?php

$config['pathViews'] = __DIR__ . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'View' . DIRECTORY_SEPARATOR;
$config['viewSuffix'] = '.phtml';
$config['rootPath'] = __DIR__;

$config['routes'] = [
    'home' => ['controller' => "\\Module\\MainPage\\Controller\\MainPage", 'method' => 'index'],
    'default' => ['controller' => "\\Module\\Comment\\Controller\\Comment", 'method' => 'index'],

    'comments' => ['controller' => "\\Module\\Comment\\Controller\\Comment", 'method' => 'index'],
    'comment/edit' => ['controller' => "\\Module\\Comment\\Controller\\Admin", 'method' => 'adminCommentEdit'],
    'comment/add' => ['controller' => "\\Module\\Comment\\Controller\\Comment", 'method' => 'add'],
    'comment/login' => ['controller' => "\\Module\\Comment\\Controller\\Admin", 'method' => 'login'],
    'comment/logout' => ['controller' => "\\Module\\Comment\\Controller\\Admin", 'method' => 'logout'],
    'comment/admin' => ['controller' => "\\Module\\Comment\\Controller\\Admin", 'method' => 'admin'],

    'login' => ['controller' => "\\Module\\Dashboard\\Controller\\Admin", 'method' => 'index'],
    'admin' => ['controller' => "\\Module\\Dashboard\\Controller\\Admin", 'method' => 'index'],
    'logout' => ['controller' => "\\Module\\Dashboard\\Controller\\Admin", 'method' => 'logout'],
    'dashboard' => ['controller' => "\\Module\\Dashboard\\Controller\\Admin", 'method' => 'index'],
    'dashboard/page/' => ['controller' => "\\Module\\Dashboard\\Controller\\Admin", 'method' => 'page'],


    /**
     * 'error404' => ['controller'=>'ErrorPage', 'method'=>'err404'],
     * 'error500' => ['controller'=>'ErrorPage', 'method'=>'err500'],
     */
];

$config['db'] = [
    'driver' => 'pdo_sqlite',
    'path' => __DIR__ . DIRECTORY_SEPARATOR . 'databaseSQLite.db',
    /**
     *           'user' => 'root',
     *           'password' => '123',
     *           'dbname' => 'db',
     */
];
$config['module'] = [
    'Comment',
    'Dashboard',
];

$config['adminMenu'] = [
    ['link'=>'pages', 'title'=>'Страницы'],
    ['link'=>'comments', 'title'=>'Комментарии'],
    ['link'=>'news', 'title'=>'Новости'],
    ['link'=>'menus', 'title'=>'Меню'],
];
$config['adminMenuTitle'] = [
    'id'=>'№',
    'parent_id'=>'Родитель',
    'menu_group'=>'Группа&nbsp;меню',
    'type_service'=>'Тип&nbsp;запроса',
    'icon'=>'Иконка',
    'title'=>'Название',
    'link'=>'Ссылка',
    'weight'=>'Позиция',
    'thumb'=>'Превью',
    'text'=>'Текст',
    'content'=>'Контент',
    'name_slider'=>'Название&nbspслайда',
    'date_create'=>'Дата&nbsp;создания',
    'create_time'=>'Время&nbsp;создания',
];
$config['adminLink'] = 'dashboard/page/';