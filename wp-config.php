<?php
/**
 * Основные параметры WordPress.
 *
 * Этот файл содержит следующие параметры: настройки MySQL, префикс таблиц,
 * секретные ключи, язык WordPress и ABSPATH. Дополнительную информацию можно найти
 * на странице {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Кодекса. Настройки MySQL можно узнать у хостинг-провайдера.
 *
 * Этот файл используется сценарием создания wp-config.php в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать этот файл
 * с именем "wp-config.php" и заполнить значения.
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'homework-3');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется снова авторизоваться.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '=HmKHkuIxctbK|f|<;C[GpQX=)rF:s(I-ebjpTDc;(7*g(w!&W0KOz!$s`o>|F6/');
define('SECURE_AUTH_KEY',  'p]UCV[xJ1q!,JMKx$%Rvs`n6LvT1dT#$92T!8`)%~{pn-}g7%ELF1RyixfJKP1O4');
define('LOGGED_IN_KEY',    '3}w&%oxv_pPvPN?LJx<akxm|!LZo}Ke `fnA|46q*Bh:XyJ8#fOm1Z!10c,_MYs+');
define('NONCE_KEY',        'V`$g.s9z/sXn-F e.>O$-k[!WgEIx&epvpDo@C<pygo6|* dY$wBqE-Tu4)5Janb');
define('AUTH_SALT',        '(;Vi<(y?ivY_OE9![yCqM}`Qgr#}R5|w+Wg0<3f2T&pPT!VGI52So`Sx,o8j&-;*');
define('SECURE_AUTH_SALT', 'fZ5})wWFmx1@3MQ6Evn|$@{oBVeS-Mq{R|;*#Ouqo5@DG^O<G*1|I5l*3HPYey,Q');
define('LOGGED_IN_SALT',   '`S~IeMHum=n+o-]>lXqZtyFTANVu,p0nWy-7=<f+J?kI#I-|5?D0B0+|Z2mjAXYs');
define('NONCE_SALT',       'LHd31rh`o&imigzh~B+]5a&N<t|izU8bl-uRQ|v_jf oAm X@C|u6<8z)6vEjMoD');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько блогов в одну базу данных, если вы будете использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Настоятельно рекомендуется, чтобы разработчики плагинов и тем использовали WP_DEBUG
 * в своём рабочем окружении.
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
