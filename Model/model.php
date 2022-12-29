<?php
    $db = new PDO("mysql:host=127.0.0.1;dbname=mydb;charset=utf8mb4", 'root', 'root');
    $select = $db->query(file_get_contents('./sql.sql'));
    // start
    class ClassName extends AnotherClass {
        
    }
       
    
?>