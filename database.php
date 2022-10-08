<?php


function Database()
 {
    $db_host = 'localhost'; $db_user = 'root'; $db_password = 'root'; $db_db = 'test'; $db_port = 8889;

    $mysql = new mysqli($db_host, $db_user, $db_password, $db_db, $db_port);
    
    return $mysql;
 }
