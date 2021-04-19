<?php


define('DB_HOST', 'localhost'); // 'your-database-host';
define('DB_NAME', 'db_aerolinea');   // 'your-database-name';  php-mvc1
define('DB_USER', 'root');      // 'your-database-user';
define('DB_PASS', '');      // 'your-database-password';

class Db
{
    private static $instance = NULL;

    private function __construct()
    {
    }

///PATRON DE DISEÑO SINGLETON
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8';
            self::$instance = new PDO($dsn.'', DB_USER, DB_PASS, $pdo_options);
        }
        return self::$instance;
    }
}


?>


