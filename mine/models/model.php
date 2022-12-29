<?php
    abstract class Model
    {
        public function __construct()
        {
            $this->pdo = new PDO('mysql:host=localhost;dbname=mydb', 'root', 'root');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }
?>