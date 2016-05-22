<?php

class Database {
    private static $instance = NULL;

    private function __construct() {}

    private function __clone() {}

    /**
     * @return null|\PDO
     */
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            self::$instance = new PDO('mysql:host=localhost;dbname=contact_manager', 'root', '86AhFf8NOI64J2UT33093aMlM', $pdo_options);
        }
        
        return self::$instance;
    }
}
