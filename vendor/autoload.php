<?php

// autoload.php @generated by Composer

/**
 * Url para acessar o projeto no host atual
 */
define('BASE_URL', 'http://actickets-master.test/Public');
define('BASE_PATH', '/Users/geiziane/Documents/Sites/actickets-master/');

/**
 * Inicia a sessao
 */
//session_save_path('C:'.DIRECTORY_SEPARATOR.'xampp'.DIRECTORY_SEPARATOR.'htdocs'.DIRECTORY_SEPARATOR.'projeto'.DIRECTORY_SEPARATOR.'session'.DIRECTORY_SEPARATOR);
session_save_path('/Users/geiziane/Documents/Sites/actickets-master/session');
session_start();

/**
 * Banco de dados
 */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'actickets');

require_once __DIR__ . '/composer/autoload_real.php';
return ComposerAutoloaderInit8600e122d615603c55f0430d491408e4::getLoader();
