-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:8889
-- Время создания: Апр 29 2019 г., 00:11
-- Версия сервера: 5.7.23
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `diplom`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(30) NOT NULL,
  `img` varchar(140) DEFAULT NULL,
  `desc` varchar(300) DEFAULT NULL,
  `link` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `category`, `img`, `desc`, `link`) VALUES
(5, 'Телефоны', NULL, 'Будь на связи! Будь в теме! Делай сэлфачи с нашими телефонами', 'phones'),
(6, 'Ноутбуки', NULL, 'Работай в любой точке мира с нашими ноутбуками', 'notepad'),
(7, 'Наушники', NULL, 'Музыка стала неотъемлемой чатью нашей жизни. Хорошие наушники позволят вам наслаждаться ей.', 'headphones'),
(8, 'Телевизоры', NULL, 'Только с нашими телевизорами ты сможешь получить полную гамму эмоций от просмотра Игры престолов', 'tv'),
(9, 'Фотоаппараты', NULL, 'Плохая память? Пользуйся нашими фотоаппаратами!', 'photo');

-- --------------------------------------------------------

--
-- Структура таблицы `delivery`
--

CREATE TABLE `delivery` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `delivery`
--

INSERT INTO `delivery` (`id`, `type`, `price`) VALUES
(1, 'Доставка на следующий день', 500),
(2, 'Стандартная доставка', 250),
(3, 'Самовывоз', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `item` varchar(100) NOT NULL,
  `category` varchar(30) NOT NULL,
  `price` int(11) NOT NULL,
  `salePrice` int(11) DEFAULT NULL,
  `about` varchar(455) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `item`, `category`, `price`, `salePrice`, `about`, `img`, `status`, `quantity`) VALUES
(2, 'Смартфон Motorola Moto G7 Powe', 'Телефоны', 15290, NULL, 'Смартфон Motorola Moto G7 Power XT1955-7 DS 6,2(1570x720)IPS LTE Cam(12/8) SDM632 1.8ГГц(8) (4/64)Гб microSD 256Гб A9.0 5000мАч Черный PAEK0008RU ', '1motorolamotog7powerxt1955-7.jpg', 'hot', 10),
(3, 'Смартфон Redmi 7 3/32GB', 'Телефоны', 9350, 9000, 'смартфон на платформе Android, поддержка двух SIM-карт, экран 6.26\", разрешение 1520x720, двойная камера 12 МП/2 МП, автофокус, память 32 Гб, слот для карты памяти, 3G, 4G LTE, Wi-Fi, Bluetooth, GPS, ГЛОНАСС, объем оперативной памяти 3 Гб, аккумулятор 4000 мА⋅ч, вес 180 г, ШxВxТ 75.58x158.73x8.47 мм', 'm_99699.jpg', 'sale', 2),
(17, 'Смартфон Samsung Galaxy S10e 6/128GB', 'Телефоны', 56350, NULL, 'Смартфон Samsung Galaxy S10e 6/128GB аквамарин (SM-G970FZGDSER)', '655804_r4643.jpg', '', 1),
(18, 'Наушники JBL T205BT', 'Наушники', 1452, NULL, 'Bluetooth-наушники с микрофоном вкладыши время работы 6 ч чувствительность 100 дБ/мВт импеданс 32 Ом вес 16.5 г', '19944f72802991ac8df67ac594110642.jpg', '', 3),
(19, 'Наушники Apple AirPods 2 (без беспроводной зарядки чехла)', 'Наушники', 12680, NULL, 'Bluetooth-наушники с микрофоном вкладыши время работы 5 ч', '1-500x500.png', '', 4),
(20, 'Наушники JBL T500BT', 'Наушники', 2290, NULL, 'Bluetooth-наушники с микрофоном накладные, закрытые время работы 16 ч импеданс 32 Ом вес 155 г складная конструкция голосовой набор', '1231122314523421.jpeg', 'new', 12),
(21, 'Телевизор Philips 50PUT6023', 'Телевизоры', 25500, NULL, 'диагональ: 50, разрешение: 3840 x 2160, HDTV Ultra HD 4K (2160p), тюнер DVB-T, DVB-T2, тип USB: мультимедийный, VESA 200×200, цвет: черный', '9232-02-1-800x500.jpg', '', 0),
(22, 'Ноутбук Xiaomi Mi Notebook Pro 15.6', 'Ноутбуки', 64000, NULL, 'Объем жесткого диска: 256 ГБ Диагональ экрана: 15.6 \" Видеокарта: NVIDIA GeForce MX150 Вес: 1.95 кг Оптический привод: DVD нет 4G LTE: нет Bluetooth: есть Wi-Fi: есть', '10292.750x0@2x.jpg', '', 23),
(23, 'Ноутбук Apple MacBook Air 13 with Retina display Late 2018', 'Ноутбуки', 74990, 56000, 'Процессор: Core i5 Частота процессора: 1600 МГц Диагональ экрана: 13.3 \" Видеокарта: Intel UHD Graphics 617 Вес: 1.25 кг Оптический привод: DVD нет 4G LTE: нет Bluetooth: есть Wi-Fi: есть', '1-228x228.jpg', 'sale', 2),
(24, 'Смартфон Sony Xperia 10 Dual 3/64GB', 'Телефоны', 20570, NULL, 'Смартфон с Android 9.0 поддержка двух SIM-карт экран 6\" двойная камера 13 МП/5 МП, автофокус память 64 Гб, слот для карты памяти 3G, 4G LTE, LTE-A, Wi-Fi, Bluetooth, NFC, GPS, ГЛОНАСС объем оперативной памяти 3 Гб аккумулятор 2870 мА⋅ч вес 162 г, ШxВxТ 68x156x8.40 мм', 'Sony_Xperia_10_Dual__i4193__64Gb_LTE_Blue_0-500x500.jpg', '', 4),
(25, 'Смартфон OnePlus 6T 8/128GB', 'Телефоны', 35380, NULL, 'смартфон с Android 9.0 поддержка двух SIM-карт экран 6.41\", разрешение 2340x1080 двойная камера 16 МП/20 МП, автофокус память 128 Гб, без слота для карт памяти 3G, 4G LTE, LTE-A, Wi-Fi, Bluetooth, NFC, GPS, ГЛОНАСС объем оперативной памяти 8 Гб аккумулятор 3700 мА⋅ч вес 185 г, ШxВxТ 74.80x157.50x8.20 мм', 'c43c608bc1f75a654f13bb284f008ada.png', '', 1),
(26, 'Наушники Xiaomi AirDots', 'Наушники', 2740, NULL, 'Bluetooth-наушники с микрофоном вкладыши время работы 4 ч поддержка NFC', '14921.750x0@2x.png', '', 1),
(27, 'Наушники Honor AM61', 'Наушники', 1736, NULL, 'Bluetooth-наушники с микрофоном вставные (затычки) чувствительность 96 дБ импеданс 32 Ом вес 19.7 г поддержка iPhone защита от воды', 'maximus-ru-Huawei-AM61-Red-02.jpg', 'hot', 23),
(28, 'Ноутбук DELL INSPIRON 5370', 'Ноутбуки', 32452, NULL, 'Диагональ экрана: 13.3 \" Видеокарта: Intel HD Graphics 620 Вес: 1.4 кг Оптический привод: DVD нет 4G LTE: нет Bluetooth: есть Wi-Fi: есть', '3076beedd1f10e56eb2e06344825c284.jpg', '', 3),
(30, 'Ноутбук ASUS Zenbook UX310UA', 'Ноутбуки', 39900, NULL, 'Диагональ экрана: 13.3 \" Видеокарта: Intel HD Graphics 520 Вес: 1.45 кг Оптический привод: DVD нет 4G LTE: нет Wi-Fi: есть', '3d68b2c9342c74a737af0a5485d4c8f3.png', '', 57),
(31, 'Ноутбук DELL Vostro 5481', 'Ноутбуки', 39010, NULL, 'Диагональ экрана: 14 \" Видеокарта: Intel UHD Graphics 620 Вес: 1.55 кг Оптический привод: DVD нет 4G LTE: нет Bluetooth: есть Wi-Fi: есть', '921944.jpg', '', 32),
(32, 'Наушники Elari NanoPods', 'Наушники', 4444, NULL, 'Bluetooth-наушники с микрофоном вставные (затычки) время работы 3.50 ч вес 6 г поддержка iPhoneё', 'd9f68819aac7230c68d25d756122bc8d.jpg', '', 0),
(33, 'Наушники Knowledge Zenith ZST', 'Наушники', 1390, NULL, 'вставные (затычки) арматурные+динамические чувствительность 106 дБ/мВт импеданс 18 Ом разъем mini jack 3.5 mm', 'kz-zst-color-02-380x380.jpg', '', 5),
(34, 'LED Телевизор Samsung LT24H390SI', 'Телевизоры', 14990, NULL, 'ЖК-телевизор, 1080p Full HD диагональ 23.6\" (60 см) Smart TV (Tizen), Wi-Fi HDMI x2, USB, DVB-T2 тип подсветки: Edge LED', 'p790402-0mw.jpg', 'new', 3),
(35, 'Телевизор Sony KD-65XF9005', 'Телевизоры', 93000, NULL, 'ЖК-телевизор, 4K UHD диагональ 64.5\" (164 см) Smart TV (Android), Wi-Fi HDMI x4, USB x3, DVB-T2 поддержка HDR тип подсветки: Direct LED', 'Sony KD-65XF9005-228x228.jpg', '', 0),
(36, 'Телевизор LG 55SK8500', 'Телевизоры', 62900, NULL, 'ЖК-телевизор, 4K UHD, Nano Cell диагональ 54.6\" (139 см), TFT IPS Smart TV (webOS), Wi-Fi HDMI x4, USB x3, DVB-T2 поддержка HDR тип подсветки: Direct LED', '7c0a90810fc39f949135a31dffaa5b79.jpg', 'hot', 23),
(37, 'Телевизор AquaView 42\n', 'Телевизоры', 301000, NULL, 'ЖК-телевизор, 1080p Full HD диагональ 42\" (107 см) влагозащищенный корпус', '81db251639080e7f7ae8d415489bc203.jpg', '', 0),
(38, 'Телевизор Panasonic TX-65DXR780\n', 'Телевизоры', 169920, 100000, '3D ЖК-телевизор, 4K UHD диагональ 65\" (165 см) Smart TV, Wi-Fi HDMI x4, USB x3, DVB-T2 поддержка HDR картинка в картинке', '5c3c64522b982.jpg', 'sale', 11);

-- --------------------------------------------------------

--
-- Структура таблицы `subscribe`
--

CREATE TABLE `subscribe` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `flag` tinyint(4) DEFAULT '0',
  `token` varchar(150) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `subscribe`
--

INSERT INTO `subscribe` (`id`, `email`, `flag`, `token`, `date`) VALUES
(1, 'sdaf@asd.df', 0, '5c71b183b07c089cfd614b75245f0524', '1556364228'),
(3, 'sd@as.fd', 0, 'b72ea364d655130a684ff4ebec8b7ef8', '1556364910');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_category_uindex` (`category`);

--
-- Индексы таблицы `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `delivery_type_uindex` (`type`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products___fk_cat` (`category`);

--
-- Индексы таблицы `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscribe_email_uindex` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT для таблицы `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `products___fk_cat` FOREIGN KEY (`category`) REFERENCES `category` (`category`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
