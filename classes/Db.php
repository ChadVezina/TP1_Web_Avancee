<?php
    class Db extends PDO {
        public function __construct() {
            parent::__construct('mysql:host=localhost;dbname=myBlog;port=3307;charset=utf8', 'root', '');
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }