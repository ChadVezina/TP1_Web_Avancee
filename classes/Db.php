<?php
require_once dirname(__DIR__) . '/config/database.php';

class Db extends PDO {
    public function __construct() {
        $dsn = "mysql:host=" . DB_HOST . 
               ";dbname=" . DB_NAME . 
               ";port=" . DB_PORT . 
               ";charset=" . DB_CHARSET;
        
        try {
            parent::__construct($dsn, DB_USER, DB_PASS);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Log error but don't expose sensitive information
            error_log("Database connection error: " . $e->getMessage());
            die("Could not connect to the database.");
        }
    }
}