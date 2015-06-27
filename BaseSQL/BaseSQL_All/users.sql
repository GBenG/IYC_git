-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Май 28 2014 г., 18:08
-- Версия сервера: 5.6.16-log
-- Версия PHP: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `u5088_contracts`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(30) NOT NULL,
  `user_password` varchar(32) NOT NULL,
  `user_hash` varchar(32) NOT NULL,
  `user_ip` int(10) unsigned NOT NULL DEFAULT '0',
  `surname` varchar(300) NOT NULL,
  `name` varchar(300) NOT NULL,
  `fname` varchar(300) NOT NULL,
  `dnumber` varchar(30) NOT NULL,
  `situation` text NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=28 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `user_login`, `user_password`, `user_hash`, `user_ip`, `surname`, `name`, `fname`, `dnumber`, `situation`) VALUES
(25, '8212', 'cdabb7c05f929ce081e76ba80a731c26', '9a75a7f3d6a6a1bc74c6625fa8e3ccac', 1593314136, 'Виконавчий комітет до Колеснікової Евгенії Миколаївни', 'Про стягнення орендної плати за користування землею', 'Ленінський районний суд  Суддя  Кравченко', '12.05.2011 року на 16.30', 'Подано заперечення на позовну заяву від 15.04.2011 р.'),
(24, '8211', '82f26dea803018bec9e6c135c540b4cd', 'bb1c3ede414db09f371227c7544e4d61', 1593313065, 'Переходченко А.В. до редакції газети «ХХІ век»', 'Про захист честі гідності та ділової репутації та стягнення моральної шкоди', 'Жовтневий районний суд Суддя Калашнік', '31.05.2011 року на 9.00', 'Подана позовна заява від 01.04.2011 року.\r\n');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
