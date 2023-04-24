<?php

defined('ROOTPATH') OR exit ('Access Denied');

if($_SERVER['SERVER_NAME'] == 'localhost')
{
//    database config
    define('DBNAME', 'podcast_db');
    define('DBHOST', 'localhost');
    define('DBUSER', 'root');
    define('DBPASS', '');
    define('DBDRIVER', 'mysql');

    define("ROOT", 'http://localhost/podcast/public');

} else {
//    database config
    define('DBNAME', 'podcast_db');
    define('DBHOST', 'localhost');
    define('DBUSER', 'root');
    define('DBPASS', '');
    define('DBDRIVER', 'mysql');

    define("ROOT", 'https://www.yourwebsite.com');

}

define ('APP_NAME', 'Podcast');
define ('APP_DESC', 'Best website on the planet');

// True means show errors
define('DEBUG', true);