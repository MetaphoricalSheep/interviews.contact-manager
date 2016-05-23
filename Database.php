<?php

class Database {
    private static $instance = NULL;
    
    private static $user = 'root';
    private static $password = '';
    private static $host = 'localhost';
    private static $db = 'contact_manager';

    private function __construct() {}

    private function __clone() {}

    /**
     * @return null|\PDO
     */
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            self::$instance = new PDO(sprintf('mysql:host=%s;dbname=%s', self::$host, self::$db), self::$user, self::$password, $pdo_options);
        }
        
        return self::$instance;
    }
}
