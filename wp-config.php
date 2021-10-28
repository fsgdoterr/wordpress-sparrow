<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'sparrow' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'root' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', '' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ']aK~<@jizX~R)B~Zq/WO@(MC<21={h8+<`HX[T2L>Y93V>?KVkR:x=CQtoWZ~/1)' );
define( 'SECURE_AUTH_KEY',  'Eo?`|0-++29YTO-t>no4-W!XI5E/S&]1#DF=[NW9]7>f)?,LO2]qU=x=;rh+vHKA' );
define( 'LOGGED_IN_KEY',    '{TI-LN;`F9=g>>[J,0>C-[]Kp7U-ju?Y19yeE[*1JeWgY0:])+!ge>Lf|iqZgD@B' );
define( 'NONCE_KEY',        'AL!7?dhsK%):)gl!Q{<UamyxdQ&~~Ui@np-`<uBp2uY`P !+6MC^[kllV>SPiQ*1' );
define( 'AUTH_SALT',        'BU)d~()mJW@|CKYgWT@2;15-D74PEFB>fkHTzyvwLAsBOz~#89w<,6DLq!kWai7U' );
define( 'SECURE_AUTH_SALT', '3(zq2OWvTQ1}E)A}yG_Lo;eP3OV,0Kb/$B=X]/bj*z_Q-|`180g$t-Xv*8@1NF$/' );
define( 'LOGGED_IN_SALT',   ':yIzbq3%S+Rpus27=v29`EWx._/4E:.</l+WN!?I;l$Os($E)XtJiyfWUprFz*gY' );
define( 'NONCE_SALT',       '[lxH-+0_32(hCT}~ *Ws/Q(;zr@aGB2E(l@V4oLB@J*jBqdj@2n +_o%1rV0lbI{' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
