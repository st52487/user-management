<?php
define('DB_HOST', 'db');
define('DB_USER','root');
define('DB_PASSWORD','docker');
define('DB_NAME','db_dev');

define('BASE_URL',parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
define('CURRENT_URL', $_SERVER['SCRIPT_NAME'] . '?' . $SERVER['QUERZ_STRING']);
?>
/**
 * Created by PhpStorm.
 * User: David
 * Date: 22.10.2018
 * Time: 10:07
 */