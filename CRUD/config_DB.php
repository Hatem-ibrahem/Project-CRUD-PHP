<?php

    $DB_host = "localhost";
    $DB_username = "ROOT";
    $DB_password = "4432525SS";
    $DB_name ="crud";

    $dsn = "mysql:host=" . $DB_host . ";dbname=" . $DB_name;

    $connection = new PDO($dsn , $DB_username,$DB_password);

    
   
    ?>