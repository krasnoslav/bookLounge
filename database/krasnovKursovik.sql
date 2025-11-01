-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Хост: MySQL-8.4:3306
-- Время создания: Ноя 01 2025 г., 11:12
-- Версия сервера: 8.4.6
-- Версия PHP: 8.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `krasnovKursovik`
--

-- --------------------------------------------------------

--
-- Структура таблицы `bookCovers`
--

CREATE TABLE `bookCovers` (
  `id` bigint UNSIGNED NOT NULL,
  `bookCover` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `bookCovers`
--

INSERT INTO `bookCovers` (`id`, `bookCover`) VALUES
(1, 'Твердый переплет'),
(2, 'Мягкий переплет');

-- --------------------------------------------------------

--
-- Структура таблицы `bookGenres`
--

CREATE TABLE `bookGenres` (
  `id` bigint UNSIGNED NOT NULL,
  `bookGenre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `bookGenres`
--

INSERT INTO `bookGenres` (`id`, `bookGenre`) VALUES
(1, 'Фантастика'),
(2, 'Классика'),
(3, 'Детективы'),
(4, 'Психология'),
(5, 'Философия');

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE `books` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `descr` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bookCoverID` bigint UNSIGNED NOT NULL,
  `pagesCount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `publisher` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `series` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ageLimit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ISBN` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bookGenreID` bigint UNSIGNED NOT NULL,
  `qty` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `img`, `price`, `descr`, `bookCoverID`, `pagesCount`, `weight`, `publisher`, `series`, `ageLimit`, `ISBN`, `bookGenreID`, `qty`, `created_at`, `updated_at`) VALUES
(1, 'Дюна', 'Фрэнк Герберт', 'dune.jpeg', 499, 'Первая книга цикла «Хроники Дюны» — одного из самых культовых научно-фантастических романов, завоевавших сердца миллионов читателей по всему миру. \n                        Суммарный тираж превышает 20 000 000 экземпляров.\n                        Осенью 2021 года вышла крупнобюджетная экранизация «Дюны» с Тимоти Шаламе и Зендаей в главных ролях. \n                        Однако экранизация охватила только первую часть книги, а премьера второй части намечена аж на ноябрь 2023 года. \n                        Не ждите продолжение в кино, читайте первоисточник прямо сейчас!', 2, '768', '373', 'АСТ', 'Эксклюзивная классика', '16+', '978-5-17-151432-7', 1, 10000, '2025-10-22 21:00:00', NULL),
(2, 'Белые ночи', 'Федор Достоевский', 'whiteNights.jpeg', 299, 'В этот сборник вошли две ранние повести Достоевского – «Белые ночи» и «Неточка Незванова», которые считаются самыми поэтичными произведениями великого романиста.\n                        «Белые ночи» – одно из лучших произведений школы «сентиментального натурализма», по мнению критика Аполлона Григорьева. Это лирическая исповедь героя-мечтателя, одинокого и робкого человека, в жизни которого на какое-то время появляется девушка, а вместе с ней и надежда на более светлое будущее.\n                        «Неточка Незванова» – повесть, изначально задуманная автором как роман, где в основе сюжета лежит история жизни маленькой девочки. Неточка – тоже персонаж-мечтатель, она грезит о жизни в большом красивом особняке, который видит из окна каморки на чердаке. Но, очутившись в нем, Неточка сталкивается с действительностью, которая оказалась вовсе не так прекрасна…', 2, '320', '200', 'АСТ', 'Эксклюзив: Русская классика', '12+', '978-5-17-106575-1', 2, 20000, '2025-10-22 21:00:00', NULL),
(3, 'Вечеринка в Хэллоуин', 'Агата Кристи', 'partyAtHalloween.jpeg', 389, 'Агата Кристи — самый публикуемый автор всех времен и народов после Шекспира. Тиражи ее книг уступают только тиражам его произведений и Библии. В мире продано больше миллиарда книг Кристи на английском языке и столько же — на других языках. Она автор восьмидесяти детективных романов и сборников рассказов, двадцати пьес, двух книг воспоминаний и шести психологических романов, написанных под псевдонимом Мэри Уэстмакотт. Ее персонажи Эркюль Пуаро и мисс Марпл навсегда стали образцовыми героями остросюжетного жанра.\n                        Эта мрачная, зловещая книга была посвящена Агатой Кристи известному британскому юмористу, автору рассказов о Дживсе и Вустере П.Г. Вудхаузу. В частности, в посвящении содержалась благодарность за то, что «он был так добр, говоря, что ему нравятся мои книги».', 2, '320', '145', 'Эксмо', 'Агата Кристи. Любимая коллекция', '16+', '978-5-04-106088-6', 3, 20000, '2025-10-22 21:00:00', NULL),
(4, 'Мозг. Ваша личная история', 'Дэвид Иглмен', 'brain.jpeg', 499, 'Мы считаем, что наш мир во многом логичен и предсказуем, а потому делаем прогнозы, высчитываем вероятность землетрясений, \n                        эпидемий, экономических кризисов, пытаемся угадать результаты торгов на бирже и спортивных матчей. \n                        В этом безбрежном океане данных важно уметь правильно распознать настоящий сигнал и не отвлекаться на \n                        бесполезный информационный шум.', 2, '256', '270', 'КоЛибри', 'Природа человека', '16+', '978-5-389-14945-8', 4, 10000, '2025-10-22 21:00:00', NULL),
(5, 'Так говорил Заратустра', 'Фридрих Ницше', 'zaratustra.jpeg', 309, 'Трактат \"Так говорил Заратустра\" называют ницшеанской Библией.\n                        В нем сформулирована излюбленая идея Ницше – идея Сверхчеловека, который является для автора нравственным образцом, \n                        смыслом существования, тем, к чему нужно стремиться.\n                        Человек же – лишь мост между животным и Сверчеловеком.\n                        Необычная форма – поэтичная, афористичная – не совсем соответсвует нашим представлениям о философском трактате. \n                        Однако, вчитываясь, мы улавливаем ход мысли автора, все глубже проникаемся его идеями и убеждениями...', 2, '416', '260', 'АСТ', 'Эксклюзивная классика', '16+', '978-5-17-090944-5', 5, 10000, '2025-10-22 21:00:00', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` bigint UNSIGNED NOT NULL,
  `uid` int NOT NULL,
  `bid` int NOT NULL,
  `qty` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id`, `uid`, `bid`, `qty`) VALUES
(4, 1, 2, 1),
(5, 1, 4, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(8, '2025_10_24_062742_create_bookCovers_table', 6),
(9, '2025_10_22_113521_create_bookGenres_table', 7),
(11, '2025_10_22_113625_create_books_table', 8),
(12, '0001_01_01_000000_create_users_table', 9),
(13, '2025_10_30_091039_create_cart_table', 10),
(14, '2025_11_01_055205_create_orders_table', 11),
(15, '2025_11_01_065613_add_admin', 12);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `uid` int NOT NULL,
  `bid` int NOT NULL,
  `qty` int NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Новый',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('HKFbUAulfsGCznwx5Qob9LdSweWhDrpQaBxLPhfU', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNzlXM2R3SGIzNHgxeG91OXVqSjlZS0FmQVNrOTRsZ1RHdjVEdkFiUCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jcmVhdGUtb3JkZXIiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO30=', 1761981092);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `login`, `email`, `password`, `created_at`, `updated_at`, `is_admin`) VALUES
(1, 'Александр', 'Краснов', 'loginExample', 'user123@mail.com', '$2y$12$7Fo0zJZwebOSob8i4vFKPegiiCXHO9HEv9bEsspsepMhEXOkuVEDO', '2025-10-30 06:32:37', '2025-10-30 06:32:37', 0),
(2, 'Admin', 'admin', 'admin', 'admin@admin.com', '$2y$12$QUa2h2HbVBpXHS5/7tuhAu5dMP./8ifvghzE0/TqznQc5BVtu7zri', NULL, NULL, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `bookCovers`
--
ALTER TABLE `bookCovers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `bookGenres`
--
ALTER TABLE `bookGenres`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_bookcoverid_foreign` (`bookCoverID`),
  ADD KEY `books_bookgenreid_foreign` (`bookGenreID`);

--
-- Индексы таблицы `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Индексы таблицы `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Индексы таблицы `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Индексы таблицы `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_login_unique` (`login`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `bookCovers`
--
ALTER TABLE `bookCovers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `bookGenres`
--
ALTER TABLE `bookGenres`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_bookcoverid_foreign` FOREIGN KEY (`bookCoverID`) REFERENCES `bookCovers` (`id`),
  ADD CONSTRAINT `books_bookgenreid_foreign` FOREIGN KEY (`bookGenreID`) REFERENCES `bookGenres` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
