<?php

defined('APP_PATH') || define('APP_PATH', realpath('.'));

return new \Phalcon\Config(array(
    'database' => array(
        'adapter'     => 'Mysql',
        'host'        => 'localhost',
        'username'    => 'root',
        'password'    => '58909624',
        'dbname'      => 'ranchogrande',
        'charset'     => 'utf8',
    ),
    'application' => array(
        'controllersDir' => '/var/www/rancho/app/controllers/',
        'modelsDir'      => '/var/www/rancho/app/models/',
        'migrationsDir'  => '/var/www/rancho/app/migrations/',
        'viewsDir'       => '/var/www/rancho/app/views/',
        'pluginsDir'     => '/var/www/rancho/app/plugins/',
        'libraryDir'     => '/var/www/rancho/app/library/',
        'cacheDir'       => '/var/www/rancho/app/cache/',
        'baseUri'        => '/',
    )
));
