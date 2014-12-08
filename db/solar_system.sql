-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Хост: localhost:8889
-- Время создания: Дек 08 2014 г., 10:54
-- Версия сервера: 5.5.38
-- Версия PHP: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- База данных: `solar_system`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) unsigned NOT NULL,
  `title` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `article_id` bigint(20) unsigned DEFAULT NULL,
  `comment` text,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `quiz`
--

CREATE TABLE `quiz` (
  `id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `variant` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
`id` bigint(20) unsigned NOT NULL,
  `login` varchar(30) DEFAULT NULL,
  `password` text,
  `email` varchar(30) DEFAULT NULL,
  `access_level` int(11) DEFAULT NULL,
  `image_path` text
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `email`, `access_level`, `image_path`) VALUES
(1, 'super_admin', 'cfcd208495d565ef66e7dff9f98764da', 'supermail@gmail.com', 3, 'avatars/_21184552.jpg'),
(2, 'eee', '4daa3db355ef2b0e64b472968cb70f0d', 'eeesds@fasas.com', 1, NULL),
(22, 'user2', 'cfcd208495d565ef66e7dff9f98764da', 'user@gmai.con', 1, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`), ADD KEY `article_id` (`article_id`);

--
-- Индексы таблицы `quiz`
--
ALTER TABLE `quiz`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `quiz`
--
ALTER TABLE `quiz`
ADD CONSTRAINT `quiz_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
