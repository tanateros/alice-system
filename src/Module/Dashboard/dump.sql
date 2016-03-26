CREATE TABLE IF NOT EXISTS `pages` (
  `id` INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  `title` VARCHAR(300) NOT NULL,
  `link` VARCHAR(255) NOT NULL UNIQUE,
  `title_SEO` VARCHAR(355) NOT NULL,
  `content` TEXT NOT NULL,
  `description` VARCHAR(1000) NOT NULL,
  `keywords` VARCHAR(500) NOT NULL,
  `weight` INTEGER NOT NULL,
  `date_create` DATETIME NOT NULL
);

INSERT INTO `pages` (`id`, `title`, `link`, `title_SEO`, `content`, `description`, `keywords`, `weight`, `date_create`) VALUES
(NULL, 'Пример статичной страницы', 'example', 'title', '<p>content tut</p>\r\n', '', '', 0, '2015-03-11 12:14:16');


CREATE TABLE IF NOT EXISTS `menus` (
  `id` INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  `parent_id` INTEGER NOT NULL,
  `menu_group` INTEGER NOT NULL,
  `icon` VARCHAR(255) NOT NULL,
  `title` VARCHAR(255) NOT NULL,
  `link` VARCHAR(255) NOT NULL UNIQUE,,
  `weight` INTEGER NOT NULL
);

INSERT INTO `menus` (`id`, `parent_id`, `menu_group`, `icon`, `title`, `link`, `weight`) VALUES
(NULL, 0, 1, '2', 'Главная', '', 1),
(NULL, 0, 1, '3', 'Новости', 'news/page', 3),
(NULL, 0, 1, '1', 'Пример статичной страницы', 'example', 2);

CREATE TABLE IF NOT EXISTS `menu_icons` (
  `id` INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  `icon` VARCHAR(255) NOT NULL
);

INSERT INTO `menu_icons` (`id`, `icon`) VALUES
(NULL, ''),
(NULL, '<i class="fa fa-home"></i>'),
(NULL, '<i class="fa fa-reddit"></i>'),
(NULL, '<i class="fa fa-check-square-o"></i>'),
(NULL, '<i class="fa fa-sitemap"></i>'),
(NULL, '<i class="fa fa-weixin"></i>'),
(NULL, '<i class="glyphicon glyphicon-globe"></i>');

CREATE TABLE IF NOT EXISTS `news` (
  `id` INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `about_text` VARCHAR(255) NOT NULL,
  `text` TEXT NOT NULL,
  `link` VARCHAR(255) NOT NULL UNIQUE,
  `thumb` VARCHAR(255) NOT NULL,
  `description` VARCHAR(1000) NOT NULL,
  `keywords` VARCHAR(500) NOT NULL,
  `date_create` DATETIME NOT NULL
);

INSERT INTO `news` (`id`, `title`, `about_text`, `text`, `link`, `thumb`, `description`, `keywords`, `date_create`) VALUES
(1, 'Новость 1', 'Новсоть', '<p>Чтото по новости</p>\r\n', 'news1', '', 'descr', 'keywords', '2014-10-23 09:00:55'),
(41, 'Новость 2', 'Новсоть', '<p>Описание</p>\r\n', 'news2', '', '', '', '2014-12-10 10:20:28');
